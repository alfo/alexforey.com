<?php
  $title = 'Press';
  include 'includes/header.php';

  $projects = getProjects('theatre');

?>

  <div class="container">

    <header class="top-of-page">
      <h1><?php echo $title; ?></h1>
    </header>

  </div>

  <div class="press-list">

    <div class="container">

      <?php

        foreach($projects['projects'] as $project) {

          if (isset($project['press'])) {
          ?>

          <h2>
            <a href="/lighting/<?php echo $project['id']?>">
                <?php echo $project['title']; ?> (<?php echo date('Y', strtotime($project['date'])); ?>)
            </a>
          </h2>
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
