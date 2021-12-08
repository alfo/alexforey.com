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
            <?php echo $show['venue']; ?>,
            <?php echo $show['date']; ?></a>
          </p>
        </li>
      <?php } ?>
    </ul>
  </div>

  <div class="container">
    <header>
      <h1>Lighting Design</h1>
    </header>
  </div>

</section>

<section class="projects">

  <div class="container">

    <?php

      foreach($projects['projects'] as $project) {
        ?>

    <div class="project">
      <img src="/imgs/portfolio/theatre-min/<?php echo $project['id']; ?>-thumb-min.jpg">
      <div class="info">
        <h1><?php echo $project['title']; ?></h1>
        <h2><?php echo $project['role']; ?></h2>
        <time><?php echo $project['date']; ?></time>
        <p class="description"><?php echo nl2br($project['description']); ?></p>
        <p><?php echo $project['venue']; ?></p>
        <a class="readmore" href="/lighting/<?php echo $project['id']?>">View</a>
      </div>
    </div>

    <?php
      }
    ?>

    <div class="clear"></div>
  </div>
</section>
