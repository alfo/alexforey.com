<?php

  $filename = "includes/" . strtolower($title) . ".json";

  $file = fopen($filename, "r");
  $json = fread($file, filesize($filename));
  fclose($file);

  $projects = json_decode($json, true);

  $search = array_filter($projects['projects'], function($ar) {
    return ($ar['id'] == $_GET['id']);
  });

  $project = array_shift(array_values($search));

  $file_search = 'imgs/portfolio/theatre/' . $project['id'] . '-*.jpg';

  $images = glob($file_search);

  array_walk($images, 'pad');

  function pad(&$input) {
    $input = "/".$input;
  }

  // this is such trash
  echo "<script> var images = ", json_encode($images), ";</script>";

?>

  <div class="container">

    <header>
      <h1><?php echo $project['title']; ?></h1>
    </header>

      <div class="photo project">
        <img src="/imgs/portfolio/<?php echo 'theatre/', $project['id']; ?>-thumb.jpg">
        <p class="photo-credit">Photos by <?php echo $project['image_credit']; ?></p>
      </div>

    <div class="info">

      <h2 class="venue"><?php echo $project['venue']; ?></h2>
      <?php if ($project['role'] !== "Lighting Designer") echo "<h3 class='role'>", $project['role'], "</h3>"; ?>
      <h3 class="date"><?php echo $project['date']; ?></h3>

      <div class="credits">

        <?php
          foreach ($project['people'] as $title => $person) {
            echo "<p><small>", $title, "</small>", $person, "</p>";
          }
        ?>

      </div>

      <?php if ($project['paperwork']) { ?>
        <a class="button" id="plots" href="/plots/<?php echo $project['id']; ?>.zip">View Plots</a>
      <?php } ?>

      <?php if ($project['link']) { ?>
        <a class="button" id="readmore" href="<?php echo $project['link']; ?>">Read More</a>
      <?php } ?>

      <p><?php echo nl2br($featured['long_description']); ?></p>

    </div>

  </div>

</section>
