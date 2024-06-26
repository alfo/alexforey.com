<?php

  $filename = "includes/projects.json";

  $file = fopen($filename, "r");
  $json = fread($file, filesize($filename));
  fclose($file);

  $projects = json_decode($json, true);
  $featured = $projects['projects'][$projects['featured']];

?>

  <div class="container">

    <header class="top-of-page">
      <h1>Projects</h1>
    </header>

    <?php if ($featured['video']) { ?>

      <div class="video fitvid project">
        <iframe src="//player.vimeo.com/video/<?php echo $featured['video']; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ff6e6e" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
      </div>

    <?php } else { ?>

      <div class="photo project">
        <img src="/imgs/portfolio/<?php echo strtolower($title), '/', $featured['image']; ?>">
      </div>

    <?php } ?>

    <div class="info">
      <h2><?php echo $featured['title']; ?></h2>
      <p><?php echo nl2br($featured['long_description']); ?></p>
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
      <img src="/imgs/portfolio/<?php echo strtolower($title), '/', $project['image']; ?>">
      <div class="info">
        <h1><?php echo $project['title']; ?></h1>
        <h2><?php echo $project['role']; ?></h2>
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
