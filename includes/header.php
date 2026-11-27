<?php

  include_once 'includes/functions.php';

  // $page picks the nav link to underline. A project's page sets it to portfolio.
  if (!isset($page)) {
    $page = strtolower($title);
  }

  // What a link to this page shows when it is shared. A page can set its own $description and $shareImage.
  if (!isset($description)) {
    $description = 'Alex Forey is a lighting designer working in Theatre, Opera, Dance, TV, and Events.';
  }
  if (!isset($shareImage)) {
    $shareImage = '/imgs/home-share.jpg';
  }
  $path = rtrim(strtok($_SERVER['REQUEST_URI'], '?'), '/');

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
    <meta name="description" content="<?php echo e($description); ?>">

    <?php // The page that could not be found has no address of its own ?>
    <?php if (http_response_code() == 200) { ?>
      <link rel="canonical" href="<?php echo e(getURL($path)); ?>">
      <meta property="og:url" content="<?php echo e(getURL($path)); ?>">
    <?php } ?>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alex Forey Lighting">
    <meta property="og:title" content="<?php echo e($title == 'Home' ? 'Alex Forey Lighting' : $title); ?>">
    <meta property="og:description" content="<?php echo e($description); ?>">
    <meta property="og:image" content="<?php echo e(getURL($shareImage)); ?>">
    <meta name="twitter:card" content="summary_large_image">

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
