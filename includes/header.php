<?php

  include_once 'includes/functions.php';

  // $page picks the nav link to underline. A project's page sets it to portfolio.
  if (!isset($page)) {
    $page = strtolower($title);
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

<html lang="en" class="page-<?php echo e($page); ?>">
  <head>
    <title>Alex Forey Lighting | <?php echo e($title); ?></title>

    <meta name="author" content="Alex Forey">
    <meta name="description" content="Alex Forey is a lighting designer working in Theatre, Opera, Dance, TV, and Events.">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

    <link rel="preload" href="/css/sf-ui-display-light.otf" as="font" type="font/otf" crossorigin>
    <link rel="stylesheet" type="text/css" href="/css/style.css?v=<?php echo filemtime('css/style.css'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="/imgs/apple-touch-icon.png?v=2">
    <link rel="icon" type="image/png" sizes="32x32" href="/imgs/favicon-32x32.png?v=2">
    <link rel="icon" type="image/png" sizes="16x16" href="/imgs/favicon-16x16.png?v=2">
    <link rel="manifest" href="/site.webmanifest?v=2">
    <link rel="mask-icon" href="/imgs/safari-pinned-tab.svg?v=2" color="#c71616">
    <link rel="shortcut icon" href="/favicon.ico?v=2">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <script defer src="/js/app.js?v=<?php echo filemtime('js/app.js'); ?>"></script>

  </head>

  <body>

<?php if (empty($navInHero)) include 'includes/nav.php'; ?>
