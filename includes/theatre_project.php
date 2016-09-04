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

  $images = glob('imgs/portfolio/theatre/' . $project['id'] . '-*.jpg');

?>

  <div class="container">
    <header>
      <h1><?php echo $project['title']; ?></h1>
    </header>
  </div>

  <div class="photo project slider">

    <ul>
      <?php foreach ($images as $image) { ?>
        <li><div class="image" style="background-image: url(/<?php echo $image; ?>)"></div></li>
      <?php } ?>
    </ul>
  </div>

  <div class="container">

    <p class="photo-credit">Photos by <?php echo $project['image_credit']; ?></p>

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

<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
