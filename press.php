<?php
  $title = 'Press';
  include 'includes/header.php';

  $projects = getProjects('theatre');

  // The big quote at the top of the page, which is set in the JSON
  $lead = isset($projects['press']['lead']) ? $projects['press']['lead'] : null;
  $leadProject = $lead ? getProjectWithID($projects, $lead['id']) : null;

?>

  <div class="container">

    <header class="top-of-page">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <?php if ($lead) { ?>
      <figure class="press-lead" data-in>
        <blockquote class="quote"><?php echo e($lead['text']); ?></blockquote>
        <?php if ($leadProject) { ?>
          <figcaption class="quote-source"><?php echo e($lead['source']); ?> on <em><?php echo e($leadProject['title']); ?></em></figcaption>
        <?php } else { ?>
          <figcaption class="quote-source"><?php echo e($lead['source']); ?></figcaption>
        <?php } ?>
      </figure>
    <?php } ?>

    <div class="press-list">

      <?php

        foreach ($projects['projects'] as $project) {

          if (isset($project['press'])) {
          ?>

          <section class="press-project" data-in>
            <div class="press-about">
              <h2 class="underline underline-thin"><?php echo e($project['title']); ?></h2>
              <div class="venue"><?php echo e($project['venue']); ?>, <?php echo date('Y', strtotime($project['date'])); ?></div>
              <?php if (hasPhotos($project)) { ?>
                <a class="link small-link" href="/work/<?php echo $project['id']; ?>">See the photos</a>
              <?php } ?>
            </div>
            <div class="press">
              <?php foreach (getPress($project) as $review) { ?>
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

      <?php
          }
        }
      ?>

    </div>

  </div>

<?php include 'includes/footer.php'; ?>
