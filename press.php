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

  <div class="press-list">

    <div class="container">

      <?php

        foreach($projects['projects'] as $project) {

          if ($project['press']) {
          ?>

          <h1>
            <a href="/lighting/<?php echo $project['id']?>">
              <?php echo $project['title']; ?> (<?php echo explode(' ', $project['date'])[0]; ?>)
            </a>
          </h1>
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
