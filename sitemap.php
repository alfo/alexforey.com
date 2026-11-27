<?php
  // The server sends /sitemap.xml here. It lists every page, and every project that has photos.
  include_once 'includes/functions.php';

  $projects = getProjects('theatre');

  $paths = ['', '/about', '/portfolio', '/credits', '/press', '/contact'];
  foreach (getProjectsWithPhotos($projects) as $project) {
    $paths[] = '/work/' . $project['id'];
  }

  header('Content-Type: application/xml; charset=utf-8');
  echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($paths as $path) { ?>
  <url><loc><?php echo e(getURL($path)); ?></loc></url>
<?php } ?>
</urlset>
