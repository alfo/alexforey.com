<?php
  $title = 'Contact';
  include 'includes/header.php';

  $projects = getProjects('theatre');
  $contact = $projects['contact'];

?>

  <div class="container">

    <header class="top-of-page">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <div class="contact-me">

      <img class="headshot" src="<?php echo getImage($contact['image']); ?>" alt="Alex Forey at a lighting desk" width="1200" height="1050" data-in>

      <div class="words" data-in>
        <?php foreach ($contact['lead'] as $paragraph) { ?>
          <p class="big"><?php echo e($paragraph); ?></p>
        <?php } ?>

        <p>He can be reached by email at:</p>

        <?php // The address is printed backwards, and js/app.js turns it the right way round, to keep it from scrapers ?>
        <div class="actions email" data-user="<?php echo e(strrev($contact['email']['user'])); ?>" data-website="<?php echo e(strrev($contact['email']['domain'])); ?>"></div>
      </div>

    </div>

    <dl class="facts">
      <?php foreach ($contact['links'] as $name => $link) { ?>
        <div data-in>
          <dt><?php echo e($name); ?></dt>
          <dd><a class="link" href="<?php echo e($link['url']); ?>" target="_blank" rel="noopener"><?php echo e($link['name']); ?></a></dd>
        </div>
      <?php } ?>
    </dl>

  </div>

<?php include 'includes/footer.php'; ?>
