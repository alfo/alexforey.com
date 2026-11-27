<?php
  $title = 'Portfolio';
  include 'includes/header.php';

  $projects = getProjects('theatre');
  $projectsWithPhotos = getProjectsWithPhotos($projects);
?>

  <div class="container-wide">

    <header class="top-of-page portfolio-top">
      <h1 class="underline"><?php echo $title; ?></h1>
      <p class="intro" data-in>These are the <?php echo count($projectsWithPhotos); ?> productions I have photos of, with the newest first. Every production I have worked on is on the <a class="link" href="/credits">Credits page</a>.</p>
    </header>

    <main class="project-list">
      <?php foreach ($projectsWithPhotos as $project) { ?>
        <a class="project" href="/work/<?php echo $project['id']; ?>" data-in>
          <div class="image">
            <img src="<?php echo getPhoto($project['id'], 'thumb', 'm'); ?>" alt="<?php echo e($project['title']); ?>, production photo" width="900" height="600" loading="lazy" decoding="async">
          </div>
          <div class="caption">
            <span class="title"><?php echo e($project['title']); ?></span>
            <div class="venue"><?php echo e($project['venue']); ?></div>
            <div class="meta"><?php echo date('Y', strtotime($project['date'])); ?>, <?php echo e($project['role']); ?></div>
          </div>
        </a>
      <?php } ?>
    </main>

  </div>

<?php include 'includes/footer.php'; ?>
