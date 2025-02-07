<?php

  $projects = getProjects($title);

  foreach ($projects['projects'] as $project) {
    $projectDate = strtotime($project['date']);
    $projectDateEnd = isset($project['date-end']) ? strtotime($project['date-end']) : null;
  
    if ($projectDate > time()) {
      $futureProjects[] = $project;
    } elseif ($projectDateEnd && ($projectDateEnd > time())) {
      if (isset($project['image_credit'])) {
        $currentProjects[] = $project;
      }
    } else {
      if (isset($project['image_credit'])) {
        $pastProjects[] = $project;
      }
    }
  }

  function displayProject($project) {
?>
  <div class="project">
    <div class="image">
      <a href="/work/<?php echo $project['id']; ?>">
        <div class="image" style="background-image: url(/imgs/portfolio/theatre-min/<?php echo $project['id']; ?>-thumb-min.jpg)"></div>
        <div class="overlay"></div>
        <h1><?php echo $project['title']; ?></h1>
      </a>
    </div>
  </div>
<?php
}
?>

<div class="photo project slider slider-with-caption">

  <ul>
    <?php foreach ($projects['featured'] as $id => $photo) {
      $show = getProjectWithID($projects, $id);
    ?>
      <li>
        <div class="image" style="background-image: url(/imgs/portfolio/theatre-min/<?php echo $id, '-', $photo; ?>-min.jpg)"></div>
        <p class="caption">
          <a href="/work/<?php echo $show['id']; ?>"><em><?php echo $show['title']; ?></em>,
          <?php echo $show['venue']; ?></a>
        </p>
      </li>
    <?php } ?>
  </ul>
</div>

<div class="unslider-clear"></div>


<div class="project-list">

<?php
foreach($currentProjects as $project) {
  displayProject($project);
}

foreach($pastProjects as $project) {
  displayProject($project);
}
?>

  <div class="clear"></div>
</div>
