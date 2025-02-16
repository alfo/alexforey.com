<?php

  $projects = getProjects($title);

  $project = getProjectWithID($projects, $_GET['id']);

  $images = glob('imgs/portfolio/theatre-min/' . $project['id'] . '-?-min.jpg');
  $images[] = 'imgs/portfolio/theatre-min/' . $project['id'] . '-thumb-min.jpg';

?>

  <?php if(isset($project['image_credit'])) { ?>}

  <div class="photo project slider">

    <ul>
      <?php foreach ($images as $image) { ?>
        <li><div class="image" style="background-image: url(/<?php echo $image; ?>)"></div></li>
      <?php } ?>
    </ul>
  </div>

  <div class="unslider-clear"></div>

  <?php } else { ?>

    <div class="no-unslider"></div>

  <?php } ?>

  <div class="container">

    <header class="project-title">
      <h1><?php echo $project['title']; ?></h1>
    </header>

    <div class="project-info">

      <?php if ($project['role'] !== "Lighting Designer") echo "<h2 class='role'>", $project['role'], "</h2>"; ?>

      <h2 class="venue"><?php echo $project['venue']; ?></h2>
      
      <h3 class="date"><?php echo date("F Y", strtotime($project['date'])); ?></h3>

      <div class="credits">

        <?php
          foreach ($project['people'] as $title => $person) {
            echo "<p><small>", $title, "</small>", $person, "</p>";
          }
        ?>

      </div>

      <p class="description"><?php echo nl2br($project['description']); ?></p>

      <?php if (isset($project['press'])) { ?>
        <div class="press-list">
        <div class="press">
        <?php foreach ($project['press'] as $quote => $pub) { ?>
          <blockquote><?php echo $quote; ?> <small>— <?php echo $pub; ?></small></blockquote>
      <?php  } ?>
        </div>
        </div>
      <?php } ?>

      <p class="photo-credit">Photos by <?php echo $project['image_credit']; ?></p>

      <?php if (isset($project['paperwork']) & $project['paperwork']) { ?>
        <a class="button" id="plots" href="/plots/<?php echo substr($project['date'], -4), '/', $project['id']; ?>.zip">View Plots</a>
      <?php } ?>

      <?php if (isset($project['link']) && $project['link']) { ?>
        <a class="button" id="readmore" href="<?php echo $project['link']; ?>">Read More</a>
      <?php } ?>

      <div class="clear"></div>

      <?php if (isset($project['videos'])) {
        foreach ($project['videos'] as $video) {
        ?>
        <div class="video fitvid">
          <?php if (is_numeric($video)) { ?>
          <iframe src="//player.vimeo.com/video/<?php echo $video; ?>?title=1&amp;byline=0&amp;portrait=0&amp;color=f52323" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        <?php } else { ?>
          <iframe src="//www.youtube.com/embed/<?php echo $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php } ?>
        </div>

      <?php } } ?>

    </div>

  </div>

</section>

<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script>
