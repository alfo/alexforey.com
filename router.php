<?php
  // For running the site on your own machine: php -S localhost:8000 router.php
  // It does what .htaccess does on the server. The server never uses this file.

  if (php_sapi_name() !== 'cli-server') { http_response_code(404); exit; }

  $path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

  if ($path !== '' && is_file(__DIR__ . $path)) return false;

  if (preg_match('#^/work/([^/]*)$#', $path, $match)) {
    $_GET['id'] = urldecode($match[1]);
    require __DIR__ . '/work.php';
  } elseif ($path === '/projects') {
    header('Location: /portfolio', true, 301);
  } elseif ($path === '') {
    require __DIR__ . '/index.php';
  } elseif (preg_match('#^/[a-z]+$#', $path) && is_file(__DIR__ . $path . '.php')) {
    require __DIR__ . $path . '.php';
  } else {
    http_response_code(404);
    echo 'Not found';
  }
