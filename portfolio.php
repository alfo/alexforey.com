<?php
  $title = 'Portfolio';
  $description = 'Production photos from the theatre, opera and dance that Alex Forey has lit.';
  include 'includes/header.php';

  $projects = getProjects('theatre');
  $projectsWithPhotos = getProjectsWithPhotos($projects);
?>

  <div class="container-wide">

    <header class="top-of-page portfolio-top">
      <h1 class="underline"><?php echo $title; ?></h1>
      <p class="intro" data-in>You can find photos of some of the productions I have worked on here, to see an exhaustive list, visit the <a class="link" href="/credits">Credits page</a>.</p>
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
