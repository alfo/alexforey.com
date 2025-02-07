<?php

  date_default_timezone_set("UTC");

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

?>

<!DOCTYPE html>

<!--

     _   _           ___
    /_\ | |_____ __ | __|__ _ _ ___ _  _
   / _ \| / -_) \ / | _/ _ \ '_/ -_) || |
  /_/ \_\_\___/_\_\ |_|\___/_| \___|\_, |
                                    |__/

-->

<html>
  <head>
    <title>Alex Forey Lighting | <?php echo $title; ?></title>

    <meta name="author" content="Alex Forey">
    <meta name="description" content="The website of a lighting designer with wide-ranging interests in theatre, technology, photography, art, and literature. See photos of my designs, projects I've created, and find out more about me.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/imgs/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="/imgs/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="/imgs/favicon-16x16.png?v=2">
    <link rel="manifest" href="/site.webmanifest?v=2">
    <link rel="mask-icon" href="/imgs/safari-pinned-tab.svg?v=2" color="#c71616">
    <link rel="shortcut icon" href="/favicon.ico?v=2">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <script src="/js/libs.js"></script>
    <script src="/js/app.js"></script>

  </head>

  <body>

    <div class="nav-container <?php echo $title; ?>">
      <div class="container">
        <nav>
          <ul>
            <li id="home"><a href="/">Alex Forey</a></li>
            <li id="work"><a href="/work">Portfolio</a></li>
            <li id="credits"><a href="/credits">Credits</a></li>
            <li id="contact"><a href="/contact">Contact</a></li>
            <li id="about"><a href="/about">About</a></li>
            <li id="press"><a href="/press">Press</a></li>
          </ul>
        </nav>

        <div class="clear"></div>

      </div>
    </div>
