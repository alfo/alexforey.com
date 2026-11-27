<?php
  $title = 'Credits';
  $description = 'Every production Alex Forey has worked on as a lighting designer, associate lighting designer and programmer.';
  include 'includes/header.php';

  $projects = getProjects('theatre');

  $currentProjects = getCurrentProjects($projects);
  $years = [];
  $roleCounts = ['ld' => 0, 'as' => 0, 'pr' => 0];

  // Projects on stage today come first as "Now", the rest are grouped by the year they opened
  $groups = [];
  if (!empty($currentProjects)) {
    $groups['Now'] = $currentProjects;
  }

  foreach ($projects['projects'] as $project) {
    $projectYear = date('Y', strtotime($project['date']));
    $years[] = $projectYear;

    foreach (getRoleTags($project) as $tag) {
      $roleCounts[$tag]++;
    }

    if (!isCurrent($project)) {
      $groups[$projectYear][] = $project;
    }
  }

  $total = count($projects['projects']);

  function displayRoleButton($tag, $name, $count) {
    echo '<button class="role-button" type="button" aria-pressed="' . ($tag == "" ? 'true' : 'false') . '" data-filter="' . $tag . '">';
    echo $name . ' <span>' . $count . '</span>';
    echo '</button>';
  }

?>

  <div class="container">

    <header class="top-of-page credits-top">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <div class="credits-filter">
      <div class="roles" role="group" aria-label="Filter credits by role">
        <?php
          displayRoleButton('', 'All', $total);
          displayRoleButton('ld', 'Lighting Designer', $roleCounts['ld']);
          displayRoleButton('as', 'Associate Lighting Designer', $roleCounts['as']);
          displayRoleButton('pr', 'Programmer', $roleCounts['pr']);
        ?>
        <span class="role-underline" aria-hidden="true"></span>
      </div>
      <div class="summary" aria-live="polite">Showing <?php echo $total; ?> credits, <?php echo min($years); ?> to <?php echo max($years); ?></div>
    </div>

    <div class="credits-list">
      <?php foreach ($groups as $year => $groupProjects) { ?>
        <section class="year-group<?php if ($year == "Now") echo ' now'; ?>">

          <div class="year-head">
            <h2 class="year"><?php echo $year; ?></h2>
            <?php if ($year == "Now") { ?>
              <div class="count">On stage</div>
            <?php } else { ?>
              <div class="count"><?php echo count($groupProjects); ?> <?php echo count($groupProjects) == 1 ? 'credit' : 'credits'; ?></div>
            <?php } ?>
          </div>

          <div class="year-credits">
            <?php foreach ($groupProjects as $project) { ?>
              <article class="credit" data-tags="<?php echo implode(' ', getRoleTags($project)); ?>" data-year="<?php echo date('Y', strtotime($project['date'])); ?>" data-in>
                <span class="dot" aria-hidden="true"></span>
                <div class="credit-head">
                  <h3><?php echo e($project['title']); ?></h3>
                  <?php if ($year == "Now") { ?>
                    <div class="date">Until <?php echo date('j M', strtotime($project['date-end'])); ?></div>
                  <?php } else { ?>
                    <div class="date"><?php echo date('M Y', strtotime($project['date'])); ?></div>
                  <?php } ?>
                </div>
                <?php if ($project['role'] != "Lighting Designer") { ?>
                  <div class="line"><?php echo e(getRole($project)); ?></div>
                <?php } ?>
                <div class="line"><?php echo e($project['venue']); ?></div>
                <?php if (getDirector($project)) { ?>
                  <div class="line quiet">Directed by <?php echo e(getDirector($project)); ?></div>
                <?php } ?>
                <?php foreach (getAwards($projects, $project) as $award) { ?>
                  <div class="line award"><?php echo e(getAwardLine($award)); ?></div>
                <?php } ?>
                <?php if (hasPhotos($project)) { ?>
                  <a class="link small-link" href="/work/<?php echo $project['id']; ?>">See the photos</a>
                <?php } ?>
              </article>
            <?php } ?>
          </div>

        </section>
      <?php } ?>
    </div>

  </div>

<?php include 'includes/footer.php'; ?>
