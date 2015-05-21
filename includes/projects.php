<?php

  $filename = "includes/" . $title . ".json";

  $file = fopen($filename, "r");
  $json = fread($file, filesize($filename));
  fclose($file);

  $projects = json_decode($json, true);

?>

  <div class="container">

    <header class="big">
      <h1>Alex's <?php echo $title; ?> Projects</h1>
    </header>

    <div class="video fitvid">
      <iframe src="http://player.vimeo.com/video/115494621?title=0&amp;byline=0&amp;portrait=0&amp;color=da594c" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    </div>

    <div class="info">
      <h2>Project Title</h2>
      <p>Some informational text to go here about each project.</p>
    </div>

  </div>

</section>

<section class="projects">

  <div class="container">

    <?php

      foreach($projects as $project) {
        ?>

    <div class="project">
      <img src="/imgs/portfolio/<?php echo $title, '/', $project['image']; ?>">
      <h1><?php echo $project['title']; ?></h1>

    </div>

        <?php
      }

    ?>
    <div class="clear"></div>
  </div>
</section>
