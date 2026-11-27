<?php
  $title = 'About';
  include 'includes/header.php';

  $projects = getProjects('theatre');
  $about = $projects['about'];

?>

  <div class="container">

    <header class="top-of-page">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <div class="about-me">

      <img class="headshot" src="<?php echo getImage($about['image']); ?>" alt="Alex Forey" width="900" height="900" data-in>

      <div class="words" data-in>
        <?php foreach ($about['lead'] as $paragraph) { ?>
          <p class="big"><?php echo e($paragraph); ?></p>
        <?php } ?>

        <?php foreach ($about['body'] as $paragraph) { ?>
          <p><?php echo e($paragraph); ?></p>
        <?php } ?>

        <div class="actions">
          <a href="/credits">See my credits</a>
          <a href="/contact">Get in touch</a>
        </div>
      </div>

    </div>

    <dl class="facts">
      <?php foreach ($about['facts'] as $name => $fact) { ?>
        <div data-in>
          <dt><?php echo e($name); ?></dt>
          <dd><?php echo e($fact); ?></dd>
        </div>
      <?php } ?>
    </dl>

  </div>

<?php include 'includes/footer.php'; ?>
