<?php

  date_default_timezone_set("Europe/London");

  function getProjects($type) {
    $filename = "includes/" . strtolower($type) . ".json";

    $file = fopen($filename, "r");
    $json = fread($file, filesize($filename));
    fclose($file);

    return json_decode($json, true);
  }

  function getProjectWithID($projects, $id) {

    $search = array_filter($projects['projects'], function($ar) use($id) {
      return ($ar['id'] == $id);
    });

    $result = array_values($search);

    return array_shift($result);
  }

  // Projects with photos are the ones that get a page of their own
  function hasPhotos($project) {
    return isset($project['image_credit']);
  }

  function getProjectsWithPhotos($projects) {
    return array_values(array_filter($projects['projects'], 'hasPhotos'));
  }

  // On stage today: it has opened, and it has a closing date that has not passed
  function isCurrent($project) {
    $today = date('Y-m-d');
    return $project['date'] <= $today && isset($project['date-end']) && $project['date-end'] >= $today;
  }

  function getCurrentProjects($projects) {
    return array_values(array_filter($projects['projects'], 'isCurrent'));
  }

  // Makes text from the JSON safe to print inside HTML.
  // An "&" stays on the same line as the word after it.
  function e($text) {
    return str_replace('&amp; ', '&amp;&nbsp;', htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8'));
  }

  // A site photo such as the headshot: the WebP copy when tools/photos.sh has made one
  // The full address of a page or a file, for the sitemap and for links that get shared
  function getURL($path = '') {
    return 'https://alex.lighting' . $path;
  }

  function getImage($name) {
    if (file_exists('imgs/' . $name . '.webp')) {
      return '/imgs/' . $name . '.webp';
    }
    return '/imgs/' . $name . '.jpg';
  }

  // A production photo. $photo is a number or "thumb"; $size is "" (the photo viewer), "l" (the
  // photo viewer on a large display), "m" or "s".
  // Falls back to the old JPEG until tools/photos.sh has been run for a new photo.
  function getPhoto($id, $photo, $size = '') {
    $web = 'imgs/portfolio/web/' . $id . '-' . $photo . ($size ? '-' . $size : '') . '.webp';
    if (file_exists($web)) {
      return '/' . $web;
    }
    // A photo whose source is small has no "l" copy
    if ($size == 'l') {
      return getPhoto($id, $photo);
    }
    return '/imgs/portfolio/theatre-min/' . $id . '-' . $photo . '-min.jpg';
  }

  // The photo numbers a project has, in order
  function getPhotoNumbers($id) {
    $numbers = [];
    foreach (glob('imgs/portfolio/theatre-min/' . $id . '-*-min.jpg') as $image) {
      if (preg_match('/^' . preg_quote($id, '/') . '-(\d+)-min\.jpg$/', basename($image), $match)) {
        $numbers[] = (int) $match[1];
      }
    }
    sort($numbers);
    return $numbers;
  }

  // "Associate Lighting Designer and Programmer for Tim Lutkin": the role, with the
  // designer I worked for when the JSON names one
  function getRole($project) {
    $role = str_replace(', ', ' and ', $project['role']);
    if (isset($project['people']['Lighting Designer'])) {
      $role .= ' for ' . $project['people']['Lighting Designer'];
    }
    return $role;
  }

  // Which of the role filters on the Credits page a project belongs to
  function getRoleTags($project) {
    $role = $project['role'];
    $tags = [];
    if (preg_match('/^(Co-)?Lighting Designer$/', $role)) $tags[] = 'ld';
    if (preg_match('/Associate|Assistant/', $role)) $tags[] = 'as';
    if (strpos($role, 'Programmer') !== false) $tags[] = 'pr';
    return $tags;
  }

  // A show with no Director is credited to its "Writer & Director", Creative Director and so on
  function getDirector($project) {
    foreach ($project['people'] as $title => $person) {
      if (preg_match('/^(Co-)?Director/', $title)) return $person;
    }
    foreach ($project['people'] as $title => $person) {
      if (preg_match('/^((Writer|Adaptor|Creator) (and|&)|Creative|Artistic) Director$/', $title)) return $person;
    }
    return '';
  }

  // The people on a show, split into teams without changing their order in the JSON.
  // The lighting team is the run of programmers, electricians and suppliers. Everyone before it
  // is the creative team and everyone after it is the show team. A short list stays as one team.
  function getTeams($project) {
    $people = isset($project['people']) ? $project['people'] : [];
    if (count($people) <= 12) return $people ? ['Creative Team' => $people] : [];

    $teams = ['Creative Team' => [], 'Lighting Team' => [], 'Show Team' => []];
    $team = 'Creative Team';
    foreach ($people as $job => $person) {
      if (preg_match('/^(Lighting (Programmer|Supplier)|Head of Lighting|(Lead )?Production Electricians?)\b/', $job)) {
        $team = 'Lighting Team';
      } elseif ($team == 'Lighting Team') {
        $team = 'Show Team';
      }
      $teams[$team][$job] = $person;
    }
    return array_filter($teams);
  }

  // The awards and nominations are a list of their own in the JSON, newest first. "id" is the project
  // an award was for, "year" is for one that was not for a project, and "won" marks a win.
  function getAwards($projects, $project) {
    return array_values(array_filter($projects['awards'], function($award) use($project) {
      return isset($award['id']) && $award['id'] == $project['id'];
    }));
  }

  // "OFFIE Award nominee, IDEA Design (Lighting)"
  function getAwardLine($award) {
    $line = $award['award'] . (empty($award['won']) ? ' nominee' : ' winner');
    if (isset($award['category'])) $line .= ', ' . $award['category'];
    return $line;
  }

  // "29 November", with the year when it is not this year
  function getEndDate($project) {
    $projectDateEnd = strtotime($project['date-end']);
    if (date('Y', $projectDateEnd) == date('Y')) {
      return date('j F', $projectDateEnd);
    }
    return date('j F Y', $projectDateEnd);
  }

  // "30 June to 26 July 2025" when the JSON has both dates, otherwise "June 2025"
  function getDates($project) {
    $projectDate = strtotime($project['date']);
    if (!isset($project['date-end'])) return date('F Y', $projectDate);

    $projectDateEnd = strtotime($project['date-end']);
    if (date('Y', $projectDate) != date('Y', $projectDateEnd)) {
      return date('j F Y', $projectDate) . ' to ' . date('j F Y', $projectDateEnd);
    } elseif (date('n', $projectDate) != date('n', $projectDateEnd)) {
      return date('j F', $projectDate) . ' to ' . date('j F Y', $projectDateEnd);
    }
    return date('j', $projectDate) . ' to ' . date('j F Y', $projectDateEnd);
  }

  // A project's press as quote, publication and link. In the JSON each quote sits under the
  // name of its publication, and the link is optional.
  function getPress($project) {
    $press = [];
    if (!isset($project['press'])) return $press;

    foreach ($project['press'] as $pub => $review) {
      $press[] = ['quote' => $review['quote'], 'pub' => $pub, 'link' => isset($review['link']) ? $review['link'] : ''];
    }
    return $press;
  }

  // The home page and the top of the Press page point at a quote that a project already has:
  // "id" is the project and "source" is the publication. "until" is optional, and gives the
  // last words to print when only the start of the quote is wanted.
  function getPressQuote($projects, $reference) {
    $project = getProjectWithID($projects, $reference['id']);
    if (!$project || !isset($project['press'][$reference['source']])) return null;

    $text = $project['press'][$reference['source']]['quote'];
    if (isset($reference['until'])) {
      $end = strpos($text, $reference['until']);
      if ($end !== false) $text = substr($text, 0, $end + strlen($reference['until']));
    }
    return ['text' => $text, 'source' => $reference['source'], 'show' => $project['title']];
  }

?>
