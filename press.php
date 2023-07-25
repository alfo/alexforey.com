<?php
  $title = 'Press';
  include 'includes/header.php';

  $projects = getProjects('theatre');

?>

  <div class="container">

    <header class="top-of-page">
      <h1>Press</h1>
    </header>

  </div>

  <div class="press-quotes">

    <div class="container">

      <?php

        foreach($projects['projects'] as $project) {

          if ($project['press']) {
          ?>

          <div class="press">
          <?php foreach ($project['press'] as $quote => $pub) { ?>
            <blockquote><?php echo $quote; ?> <small>— <?php echo $pub; ?></small></blockquote>
        <?php  } ?>
          </div>

      <?php
          }
        }
      ?>

    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
