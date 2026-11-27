<?php
  include_once 'includes/functions.php';

  $projects = getProjects('theatre');

  // /work/<id> is a project's page. /work by itself used to be the list, which is now at /portfolio.
  $project = null;
  if (isset($_GET['id'])) {
    $project = getProjectWithID($projects, $_GET['id']);
  }

  if (!$project) {
    if (isset($_GET['id']) && $_GET['id'] != "") {
      header('Location: /portfolio', true, 302);
    } else {
      header('Location: /portfolio', true, 301);
    }
    exit;
  }

  $title = $project['title'];
  $page = 'portfolio';
  include 'includes/header.php';

  // The numbered photos in order, then the photo from the Portfolio page
  $photos = getPhotoNumbers($project['id']);
  if (file_exists('imgs/portfolio/theatre-min/' . $project['id'] . '-thumb-min.jpg')) {
    $photos[] = 'thumb';
  }

  // The photo viewer has two copies of each photo, and js/app.js picks the one that suits the screen
  $viewerPhotos = [];
  $largePhotos = [];
  foreach ($photos as $photo) {
    $viewerPhotos[] = getPhoto($project['id'], $photo);
    $largePhotos[] = getPhoto($project['id'], $photo, 'l');
  }

  $press = getPress($project);

  // The projects either side of this one on the Portfolio page
  $projectsWithPhotos = getProjectsWithPhotos($projects);
  $newerProject = null;
  $olderProject = null;
  foreach ($projectsWithPhotos as $index => $other) {
    if ($other['id'] == $project['id']) {
      if ($index > 0) $newerProject = $projectsWithPhotos[$index - 1];
      if ($index < count($projectsWithPhotos) - 1) $olderProject = $projectsWithPhotos[$index + 1];
    }
  }
?>

  <?php if ($photos) { ?>
    <section aria-label="Production photos">

      <div class="photo-viewer" data-photos="<?php echo e(json_encode($viewerPhotos)); ?>" data-large-photos="<?php echo e(json_encode($largePhotos)); ?>">
        <img src="<?php echo $viewerPhotos[0]; ?>" srcset="<?php echo $viewerPhotos[0]; ?> 1800w, <?php echo $largePhotos[0]; ?> 2400w" sizes="(max-width: 850px) 100vw, min(84vw, 1140px)" alt="<?php echo e($project['title']); ?>, production photo" width="1800" height="1200">
        <?php if (count($photos) > 1) { ?>
          <button class="arrow prev" type="button" aria-label="Previous photo" data-step="-1"><span class="ring"><svg width="14" height="14" viewBox="0 0 20 20"><path d="M13 2 L5 10 L13 18" stroke="#ffffff" stroke-width="2" fill="none"></path></svg></span></button>
          <button class="arrow next" type="button" aria-label="Next photo" data-step="1"><span class="ring"><svg width="14" height="14" viewBox="0 0 20 20"><path d="M7 2 L15 10 L7 18" stroke="#ffffff" stroke-width="2" fill="none"></path></svg></span></button>
          <div class="photo-count">1 / <?php echo count($photos); ?></div>
        <?php } ?>
      </div>

      <?php if (count($photos) > 1) { ?>
        <div class="thumbnails">
          <?php foreach ($photos as $index => $photo) { ?>
            <button class="thumbnail<?php if ($index == 0) echo ' current'; ?>" type="button" aria-label="Photo <?php echo $index + 1; ?> of <?php echo count($photos); ?>" aria-pressed="<?php echo $index ? 'false' : 'true'; ?>">
              <img src="<?php echo getPhoto($project['id'], $photo, 's'); ?>" alt="" width="132" height="88" loading="lazy">
            </button>
          <?php } ?>
        </div>
      <?php } ?>

    </section>
  <?php } ?>

  <div class="container">

    <header class="project-title" data-in>
      <h1 class="underline"><?php echo e($project['title']); ?></h1>
      <?php if ($project['role'] != "Lighting Designer") { ?>
        <h2 class="role"><?php echo e(getRole($project)); ?></h2>
      <?php } ?>
      <h2 class="venue"><?php echo e($project['venue']); ?></h2>
      <h3 class="date"><?php echo getDates($project); ?></h3>
      <?php foreach (getAwards($projects, $project) as $award) { ?>
        <div class="award"><?php echo e(getAwardLine($award)); ?></div>
      <?php } ?>
    </header>

    <?php if (!empty($project['description'])) { ?>
      <div class="description" data-in>
        <?php foreach (preg_split('/\n\s*\n|\r\n\s*\r\n/', trim($project['description'])) as $paragraph) { ?>
          <p><?php echo nl2br(e(trim($paragraph))); ?></p>
        <?php } ?>
      </div>
    <?php } ?>

    <div class="project-info">

      <section class="credits" aria-label="Creative team" data-in>
        <?php if (!empty($project['people'])) { ?>
          <h2 class="underline underline-thin">Creative Team</h2>
          <dl>
            <?php foreach ($project['people'] as $job => $person) { ?>
              <div>
                <dt><?php echo e($job); ?></dt>
                <dd><?php echo e($person); ?></dd>
              </div>
            <?php } ?>
          </dl>
        <?php } ?>

        <?php if (!empty($project['image_credit'])) { ?>
          <p class="photo-credit">Photos by <?php echo e($project['image_credit']); ?></p>
        <?php } ?>

        <?php if (!empty($project['paperwork']) || !empty($project['link'])) { ?>
          <p class="project-links">
            <?php if (!empty($project['paperwork'])) { ?>
              <a class="link small-link" id="plots" href="/plots/<?php echo date('Y', strtotime($project['date'])); ?>/<?php echo e($project['id']); ?>.zip">Download the lighting plots</a>
            <?php } ?>
            <?php if (!empty($project['link'])) { ?>
              <a class="link small-link" id="readmore" href="<?php echo e($project['link']); ?>">Read more about the show</a>
            <?php } ?>
          </p>
        <?php } ?>
      </section>

      <?php if ($press) { ?>
        <section class="project-press" aria-label="Press" data-in>
          <h2 class="underline underline-thin">Press</h2>
          <div class="press">
            <?php foreach ($press as $review) { ?>
              <figure>
                <blockquote class="quote"><?php echo e($review['quote']); ?></blockquote>
                <?php if ($review['link']) { ?>
                  <figcaption class="quote-source"><a class="link" href="<?php echo e($review['link']); ?>"><?php echo e($review['pub']); ?></a></figcaption>
                <?php } else { ?>
                  <figcaption class="quote-source"><span><?php echo e($review['pub']); ?></span></figcaption>
                <?php } ?>
              </figure>
            <?php } ?>
          </div>
        </section>
      <?php } ?>

    </div>

    <?php if (!empty($project['videos'])) { ?>
      <section class="videos" aria-label="Video" data-in>
        <h2 class="underline underline-thin">Video</h2>
        <?php
          foreach ($project['videos'] as $video) {
            // A number is a Vimeo video, anything else is a YouTube one
            if (ctype_digit((string) $video)) {
              $videoURL = 'https://player.vimeo.com/video/' . $video . '?title=0&byline=0&portrait=0&dnt=1';
            } else {
              $videoURL = 'https://www.youtube-nocookie.com/embed/' . rawurlencode($video);
            }
        ?>
          <div class="video"><iframe src="<?php echo e($videoURL); ?>" title="Video of <?php echo e($project['title']); ?>" loading="lazy" allow="fullscreen; picture-in-picture" allowfullscreen></iframe></div>
        <?php } ?>
      </section>
    <?php } ?>

    <?php if ($newerProject || $olderProject) { ?>
      <nav class="more-projects" aria-label="More shows">
        <?php if ($newerProject) { ?>
          <a href="/work/<?php echo $newerProject['id']; ?>">
            <div class="label">Newer show</div>
            <div class="title"><?php echo e($newerProject['title']); ?></div>
          </a>
        <?php } else { ?>
          <span></span>
        <?php } ?>
        <?php if ($olderProject) { ?>
          <a class="older" href="/work/<?php echo $olderProject['id']; ?>">
            <div class="label">Older show</div>
            <div class="title"><?php echo e($olderProject['title']); ?></div>
          </a>
        <?php } ?>
      </nav>
    <?php } ?>

  </div>

<?php include 'includes/footer.php'; ?>
