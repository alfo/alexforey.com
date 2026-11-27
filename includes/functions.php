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

  // Makes text from the JSON safe to print inside HTML
  function e($text) {
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
  }

  // A site photo such as the headshot: the WebP copy when tools/photos.sh has made one
  function getImage($name) {
    if (file_exists('imgs/' . $name . '.webp')) {
      return '/imgs/' . $name . '.webp';
    }
    return '/imgs/' . $name . '.jpg';
  }

  // A production photo. $photo is a number or "thumb"; $size is "" (large), "m" or "s".
  // Falls back to the old JPEG until tools/photos.sh has been run for a new photo.
  function getPhoto($id, $photo, $size = '') {
    $web = 'imgs/portfolio/web/' . $id . '-' . $photo . ($size ? '-' . $size : '') . '.webp';
    if (file_exists($web)) {
      return '/' . $web;
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

  function getDirector($project) {
    foreach ($project['people'] as $title => $person) {
      if (preg_match('/^(Co-)?Director/', $title)) return $person;
    }
    return '';
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

  // A project's press as quote, publication and link. The JSON keeps the publication as an HTML link.
  function getPress($project) {
    $press = [];
    if (!isset($project['press'])) return $press;

    foreach ($project['press'] as $quote => $pub) {
      $link = preg_match('/href=[\'"]([^\'"]+)[\'"]/', $pub, $match) ? $match[1] : '';
      $press[] = ['quote' => $quote, 'pub' => trim(strip_tags($pub)), 'link' => $link];
    }
    return $press;
  }

?>
