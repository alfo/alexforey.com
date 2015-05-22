<?php

  $filename = "includes/" . $title . ".json";

  $file = fopen($filename, "r");
  $json = fread($file, filesize($filename));
  fclose($file);

  $projects = json_decode($json, true);
  $featured = $projects['projects'][$projects['featured']];

?>

  <div class="container">

    <header>
      <h1>Alex's <?php echo $title; ?> Projects</h1>
    </header>

    <?php if ($featured['video']) { ?>

      <div class="video fitvid project">
        <?php echo $featured['video']; ?>
      </div>

    <?php } else { ?>

      <div class="photo project">
        <img src="/imgs/portfolio/<?php echo $title, '/', $featured['image']; ?>">
      </div>

    <?php } ?>

    <div class="info">
      <h2><?php echo $featured['title']; ?></h2>
      <p><?php echo $featured['description']; ?></p>
      <a class="readmore" href="<?php echo $featured['link']; ?>">Read More</a>
    </div>

  </div>

</section>

<section class="projects">

  <div class="container">

    <?php

      foreach($projects['projects'] as $project) {
        ?>

    <div class="project">
      <img src="/imgs/portfolio/<?php echo $title, '/', $project['image']; ?>">
      <div class="info">
        <h1><?php echo $project['title']; ?></h1>
        <time><?php echo $project['date']; ?></time>
        <p><?php echo nl2br($project['description']); ?></p>
        <?php if ($project['link']) { ?>
          <a class="readmore" href="<?php echo $project['link']?>">Read More</a>
        <?php } ?>
      </div>
    </div>

        <?php
      }

    ?>
    <div class="clear"></div>
  </div>
</section>
