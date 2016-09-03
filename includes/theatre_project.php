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

      <?php if ($project['role'] !== "Lighting Designer") echo "<p class='role'>", $project['role'], "</p>"; ?>

      <div class="credits">
        <p><small>Director</small><?php echo $project['director']; ?></p>
        <p><small>Designer</small><?php echo $project['designer']; ?></p>
        <p><small>Lighting Designer</small>
          <?php if ($project['role'] !== 'Lighting Designer') { ?>
            <?php echo $project['lighting_designer']; ?>
          <?php } else { ?>
            Alex Forey
          <?php } ?>
        <p><small>Sound Designer</small><?php echo $project['sound_designer']; ?></p>
      </div>

      <?php if ($project['paperwork']) { ?>
        <a class="paperwork-dl" href="/plots/<?php echo $project['id']; ?>.zip">Download Paperwork</a>
      <?php } ?>

      <p><?php echo nl2br($featured['long_description']); ?></p>

    </div>

  </div>

</section>
