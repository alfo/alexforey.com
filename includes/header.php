<?php

  date_default_timezone_set("UTC");
  $age = (date("md", date("U", mktime(0, 0, 0, 7, 9, 1997))) > date("md")
    ? ((date("Y") - 1997) - 1)
    : (date("Y") - 1997));

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

    return array_shift(array_values($search));
  }

?>

<!DOCTYPE html>

<!--

     _   _           ___
    /_\ | |_____ __ | __|__ _ _ ___ _  _
   / _ \| / -_) \ / | _/ _ \ '_/ -_) || |
  /_/ \_\_\___/_\_\ |_|\___/_| \___|\_, |
                                    |__/

yeah, I spent way too much time on that ASCII art.
-->

<html>
  <head>
    <title><?php echo $title; ?> | Alex Forey's Website</title>

    <meta name="author" content="Alex Forey">
    <meta name="description" content="The Website of a <?php echo $age; ?> year old interested in lighting design, filmmaking, photography, the web, coding, and making things.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="shortcut icon" href="http://28.media.tumblr.com/avatar_6187ac9a2b35_16.png">

    <script src="/js/libs.js"></script>
    <script src="/js/app.js"></script>

  </head>

  <body>

    <section id="first">

      <div class="container">

        <nav>
          <ul>
            <li><a href="http://alexforey.com/#portfolio" id="portfolio_link">Portfolio</a></li>
            <li><a href="http://newfangled.me/">Blog</a></li>
            <li><a href="http://alexforey.com/about">About</a></li>
            <li><a href="http://photos.alexforey.com">Photos</a></li>
            <li id="home"><a href="http://alexforey.com/">Alex Forey</a></li>
          </ul>
        </nav>

        <div class="clear"></div>

      </div>
