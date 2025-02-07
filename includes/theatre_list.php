<?php

  $projects = getProjects($title);

?>

<div class="photo project slider slider-with-caption">

  <ul>
    <?php foreach ($projects['featured'] as $id => $photo) {
      $show = getProjectWithID($projects, $id);
    ?>
      <li>
        <div class="image" style="background-image: url(/imgs/portfolio/theatre-min/<?php echo $id, '-', $photo; ?>-min.jpg)"></div>
        <p class="caption">
          <a href="/lighting/<?php echo $show['id']; ?>"><em><?php echo $show['title']; ?></em>,
          <?php echo $show['venue']; ?></a>
        </p>
      </li>
    <?php } ?>
  </ul>
</div>

<div class="unslider-clear"></div>

<section class="projects">

  <div class="container">

    <?php

      foreach($projects['projects'] as $project) {
        if (!isset($show['image_credit'])) {
          continue;
        } else {
        ?>

    <div class="project">
      <!--<img src="/imgs/portfolio/theatre-min/<?php echo $project['id']; ?>-thumb-min.jpg">-->
      <div class="info">
        <h1><?php echo $project['title']; ?></h1>
      </div>
    </div>

    <?php
      }
    }
    ?>

    <div class="clear"></div>
  </div>
</section>
   