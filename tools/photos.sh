#!/bin/sh
# Makes the web-sized photos the site serves.
#
#   sh tools/photos.sh              make whatever is missing or out of date
#   sh tools/photos.sh --force      make everything again
#   sh tools/photos.sh the-pianist  only the photos of one show (any number of ids)
#   sh tools/photos.sh --jobs 4     how many photos to work on at once (default: every core)
#   sh tools/photos.sh --dry-run    list what would be made, and make nothing
#
# For each photo it reads the full-size original in imgs/portfolio/theatre
# (<id>-<n>.jpg). A photo that has no original there is read from the older
# shrunk copy in imgs/portfolio/theatre-min (<id>-<n>-min.jpg) instead.
#
# It writes three WebP sizes to imgs/portfolio/web:
#   <id>-<n>.webp     1800 wide, for the photo viewer on a show page
#   <id>-<n>-m.webp   1000 wide, for the carousels and the Portfolio grid
#   <id>-<n>-s.webp   300 wide, for the thumbnail strip
# Photos are turned the right way up, converted to sRGB and stripped of
# camera data. Nothing is ever made larger than its source.
#
# It also makes WebP copies of the home, headshot and contact photos, and
# removes web photos whose source has gone.
#
# It needs vips: brew install vips

set -e

# One photo at one size. The pipeline below calls this once per file.
if [ "$1" = "--one" ]; then
  # source, output, width, quality
  tmp="$3.tmp.webp"
  vips thumbnail "$2" "$tmp[Q=$5,effort=5,smart_subsample,strip]" "$4" --size down --export-profile srgb
  mv "$tmp" "$3"
  echo "made $3"
  exit 0
fi

cd "$(dirname "$0")/.."
self="tools/$(basename "$0")"

command -v vips >/dev/null || { echo "vips is not installed: brew install vips" >&2; exit 1; }

force=0
dry=0
jobs=$(sysctl -n hw.ncpu 2>/dev/null || nproc 2>/dev/null || echo 4)
only=""

while [ $# -gt 0 ]; do
  case "$1" in
    --force) force=1 ;;
    --dry-run) dry=1 ;;
    --jobs) shift; jobs="$1" ;;
    -h|--help) sed -n '2,24p' "$0" | sed 's/^# \{0,1\}//'; exit 0 ;;
    -*) echo "Unknown option: $1" >&2; exit 1 ;;
    *) only="$only $1" ;;
  esac
  shift
done

orig=imgs/portfolio/theatre
min=imgs/portfolio/theatre-min
out=imgs/portfolio/web
mkdir -p "$out"

# The source for a photo name: the original if there is one, else the shrunk copy.
source_for() {
  if [ -f "$orig/$1.jpg" ]; then echo "$orig/$1.jpg"
  elif [ -f "$min/$1-min.jpg" ]; then echo "$min/$1-min.jpg"
  fi
}

# Every photo name, from both folders.
names() {
  {
    for f in "$orig"/*.jpg; do [ -f "$f" ] && basename "$f" .jpg; done
    for f in "$min"/*-min.jpg; do [ -f "$f" ] && basename "$f" -min.jpg; done
  } | sort -u
}

wanted() { # is this photo name one of the shows asked for?
  [ -z "$only" ] && return 0
  for id in $only; do
    case "$1" in "$id"-[0-9]*|"$id"-thumb) return 0 ;; esac
  done
  return 1
}

job() { # source, output, width, quality
  if [ "$force" = 1 ] || [ ! -f "$2" ] || [ "$1" -nt "$2" ]; then
    printf '%s\t%s\t%s\t%s\n' "$1" "$2" "$3" "$4"
  fi
}

list() {
  names | while read -r name; do
    wanted "$name" || continue
    src=$(source_for "$name")
    job "$src" "$out/$name.webp" 1800 78
    job "$src" "$out/$name-m.webp" 1000 74
    job "$src" "$out/$name-s.webp" 300 70
  done
  if [ -z "$only" ]; then
    job imgs/home.jpg imgs/home.webp 2400 76
    job imgs/headshot.jpg imgs/headshot.webp 900 80
    job imgs/working.jpg imgs/working.webp 1200 80
  fi
}

todo=$(list)
count=$(printf '%s' "$todo" | grep -c . || true)

if [ "$dry" = 1 ]; then
  [ -n "$todo" ] && printf '%s\n' "$todo" | cut -f2
  echo "$count to make"
  exit 0
fi

if [ "$count" -gt 0 ]; then
  echo "Making $count photos, $jobs at a time"
  # vips uses one thread per photo here, because the photos already run side by side.
  printf '%s\n' "$todo" | tr '\t' '\n' | VIPS_CONCURRENCY=1 xargs -n 4 -P "$jobs" sh "$self" --one
fi

# Remove web photos whose source photo has gone.
if [ -z "$only" ]; then
  for f in "$out"/*.webp; do
    [ -f "$f" ] || continue
    name=$(basename "$f" .webp)
    name=${name%-m}
    name=${name%-s}
    [ -n "$(source_for "$name")" ] || { rm "$f"; echo "removed $f"; }
  done
fi

echo "Done: $(ls "$out" | wc -l | tr -d ' ') web photos, $(du -sh "$out" | cut -f1 | tr -d ' ') in $out"
