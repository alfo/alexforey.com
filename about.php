<?php
  $title = 'About';
  include 'includes/header.php';

  $projects = getProjects('theatre');
?>

  <div class="container">

    <header class="top-of-page">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <div class="about-me">

      <img class="headshot" src="<?php echo getImage('headshot'); ?>" alt="Alex Forey" width="900" height="900" data-in>

      <div class="words" data-in>
        <p class="big">Alex Forey is a lighting designer working in Theatre, Opera, Dance, TV, and Events. He is primarily based in London, but has worked on projects across the UK, Europe, New York, and beyond.</p>
        <p class="big">He also works as an Associate Designer for Woodroffe Bassett Design, and as a freelance lighting programmer.</p>

        <p>He cares about how a show is made as much as how it looks. He has developed his own ways of working, and builds his own tools to support them, so that an ambitious design can come together in a short technical period and leave more time for the work with the director and the company. He publishes some of those tools for other lighting teams as <a class="link" href="https://flatfield.co" target="_blank" rel="noopener">Flat Field</a>.</p>

        <div class="actions">
          <a href="/credits">See my credits</a>
          <a href="https://vimeo.com/1058236271" target="_blank" rel="noopener">Watch my showreel</a>
          <a href="/contact">Get in touch</a>
        </div>
      </div>

    </div>

    <dl class="facts">
      <div data-in>
        <dt>Based in</dt>
        <dd>London</dd>
      </div>
      <div data-in>
        <dt>Trained at</dt>
        <dd>Royal Academy of Dramatic Art</dd>
      </div>
      <div data-in>
        <dt>Associate for</dt>
        <dd>Woodroffe Bassett Design</dd>
      </div>
    </dl>

    <?php if ($projects['awards']) { ?>
      <section class="awards">
        <h2 class="underline underline-thin" data-in>Awards</h2>

        <ul>
          <?php foreach ($projects['awards'] as $award) { ?>
            <?php
              // An award for a show takes its year from the show
              $project = isset($award['id']) ? getProjectWithID($projects, $award['id']) : null;
              $year = isset($award['year']) ? $award['year'] : date('Y', strtotime($project['date']));
            ?>
            <li class="award<?php if (!empty($award['won'])) echo ' won'; ?>" data-in>
              <div class="year"><?php echo $year; ?></div>
              <div class="about">
                <div class="result"><?php echo empty($award['won']) ? 'Nominee' : 'Winner'; ?></div>
                <div class="name"><?php echo e($award['award']); ?></div>
                <?php if (isset($award['category'])) { ?>
                  <div class="category"><?php echo e($award['category']); ?></div>
                <?php } ?>
                <?php if ($project && hasPhotos($project)) { ?>
                  <div class="show">For <a class="link" href="/work/<?php echo $project['id']; ?>"><em><?php echo e($project['title']); ?></em></a></div>
                <?php } elseif ($project) { ?>
                  <div class="show">For <em><?php echo e($project['title']); ?></em></div>
                <?php } ?>
                <?php if (isset($award['note'])) { ?>
                  <div class="note"><?php echo e($award['note']); ?></div>
                <?php } ?>
              </div>
            </li>
          <?php } ?>
        </ul>
      </section>
    <?php } ?>

  </div>

<?php include 'includes/footer.php'; ?>
