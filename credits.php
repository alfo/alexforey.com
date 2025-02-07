<?php
  $title = 'Credits';
  include 'includes/header.php';

  $projects = getProjects('theatre');

  $currentProjects = [];
  $futureProjects = [];
  $pastProjects = [];

  function displayProject($project) {
    echo '<div class="credit">';
    echo '  <h2>' . $project['title'] . '</h2>';
    if ($project['role'] == "Co-Lighting Designer") {
        echo '  <p>' . $project['role'] . ' with ' . $project['people']['Co-Lighting Designer'] . '</p>';
    } elseif ($project['role'] != "Lighting Designer") {
        echo '  <p>' . $project['role'] . ' for ' . $project['people']['Lighting Designer'] . '</p>';
    }
    echo '  <p>' . $project['venue'] . '</p>';
    echo '  <p>' . key($project['people']). ': ' . reset($project['people']) . '</p>';
    array_shift($project['people']);
    echo '  <p>' . key($project['people']). ': ' . reset($project['people']) . '</p>';
    echo '</div>';
  }

  // Separate projects into current, future, and past
  foreach ($projects['projects'] as $project) {
    $projectDate = strtotime($project['date']);
    $projectDateEnd = isset($project['date-end']) ? strtotime($project['date-end']) : null;

    if ($projectDate > time()) {
      $futureProjects[] = $project;
    } elseif ($projectDateEnd && ($projectDateEnd > time())) {
      $currentProjects[] = $project;
    } else {
      $pastProjects[] = $project;
    }
  }

?>

  <div class="container">

    <header class="top-of-page">
      <h1><?php echo $title; ?></h1>
    </header>

  </div>

  <div class="credits-list">

    <div class="container">

      <?php

        // Display future projects
        if (!empty($futureProjects)) {
          echo '<h2 class="year">Future</h2>';
          foreach ($futureProjects as $project) {
            displayProject($project);
          }
        }

        // Display current projects
        if (!empty($currentProjects)) {
          echo '<h2 class="year">Current</h2>';
          foreach ($currentProjects as $project) {
            displayProject($project);
          }
        }

        // Display past projects
        $currentYear = null;
        foreach ($pastProjects as $project) {
          $projectYear = date('Y', strtotime($project['date']));
          if ($projectYear !== $currentYear) {
            $currentYear = $projectYear;
            echo '<h2 class="year">' . $currentYear . '</h2>';
          }
          displayProject($project);
        }
      ?>

    </div>

  </div>

<?php include 'includes/footer.php'; ?>
