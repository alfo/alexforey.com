<?php
  $title = 'Home';
  $navInHero = true;
  include 'includes/header.php';

  $projects = getProjects('theatre');
  $home = $projects['home'];
  $currentProjects = getCurrentProjects($projects);

  // The quotes that take turns next to On Stage Now, each with the title of its project
  $quotes = [];
  foreach ($home['press'] as $reference) {
    $quote = getPressQuote($projects, $reference);
    if ($quote) $quotes[] = $quote;
  }
?>

  <section class="hero snap">
    <img class="hero-image" src="<?php echo getImage($home['image']); ?>" alt="" width="2400" height="1600" fetchpriority="high">
    <div class="hero-shade" aria-hidden="true"></div>

    <div class="video-container" data-video="<?php echo e($home['showreel']); ?>" aria-hidden="true">
      <div class="video-shade-top"></div>
      <div class="video-shade-bottom"></div>
      <div class="video-progress"></div>
    </div>

<?php include 'includes/nav.php'; ?>

    <div class="video-overlay">
      <div data-in>
        <h1 class="underline"><?php echo e($home['title']); ?></h1>
        <p><?php echo e($home['subtitle']); ?></p>
      </div>
    </div>

    <div class="hero-foot">
      <button class="play-button" type="button" aria-label="Play Showreel" aria-pressed="false" data-in>
        <span class="ring" aria-hidden="true">
          <svg class="icon-play" width="13" height="15" viewBox="0 0 20 22"><path d="M1 1 L19 11 L1 21 Z" fill="#ffffff"></path></svg>
          <svg class="icon-exit" width="16" height="16" viewBox="0 0 20 20"><path d="M2 2 L18 18 M18 2 L2 18" stroke="#ffffff" stroke-width="2" fill="none"></path></svg>
        </span>
        <span class="label" aria-hidden="true">Play Showreel</span>
      </button>
      <button class="scroll-cue" type="button" aria-label="Scroll to Selected Work"><span></span></button>
    </div>
  </section>

  <section class="selected-work snap">

    <div class="selected-work-head" data-in>
      <h2 class="underline">Selected Work</h2>
      <a class="link" href="/portfolio">See every production</a>
    </div>

    <div class="carousels">
      <?php foreach ($home['carousel'] as $index => $row) { ?>
        <div class="carousel" data-in>
          <div class="carousel-track" style="animation-duration: <?php echo $index % 2 ? '104s' : '90s'; ?>; animation-direction: <?php echo $index % 2 ? 'reverse' : 'normal'; ?>">
            <?php
              // Every item is printed twice so that the row can loop without a gap
              for ($copy = 0; $copy < 2; $copy++) {
                foreach ($row as $item) {
                  $project = getProjectWithID($projects, $item['id']);
                  if (!$project) continue;

                  // A project with a long title or a list of venues can have a short one for here
                  $itemTitle = isset($project['title-short']) ? $project['title-short'] : $project['title'];
                  $itemVenue = isset($project['venue-short']) ? $project['venue-short'] : $project['venue'];
            ?>
              <a class="carousel-item" href="/work/<?php echo $project['id']; ?>"<?php if ($copy) echo ' aria-hidden="true" tabindex="-1"'; ?>>
                <div class="image">
                  <img src="<?php echo getPhoto($item['id'], $item['photo'], 'm'); ?>" alt="<?php echo e($itemTitle); ?>, production photo" width="1000" height="667" loading="lazy" decoding="async">
                  <div class="caption">
                    <span class="title"><?php echo e($itemTitle); ?></span>
                    <div class="venue"><?php echo e($itemVenue); ?></div>
                  </div>
                </div>
              </a>
            <?php
                }
              }
            ?>
          </div>
        </div>
      <?php } ?>
    </div>

  </section>

  <section class="latest snap">

    <?php if ($currentProjects) { ?>
      <div class="on-stage" data-in>
        <h2 class="underline">On Stage Now</h2>
        <div class="on-stage-list">
          <?php foreach ($currentProjects as $project) { ?>
            <div>
              <?php if (hasPhotos($project)) { ?>
                <div class="title"><a href="/work/<?php echo $project['id']; ?>"><?php echo e($project['title']); ?></a></div>
              <?php } else { ?>
                <div class="title"><?php echo e($project['title']); ?></div>
              <?php } ?>
              <div class="venue"><?php echo e($project['venue']); ?>, until <?php echo getEndDate($project); ?></div>
              <?php if ($project['role'] != "Lighting Designer") { ?>
                <div class="role"><?php echo e(getRole($project)); ?></div>
              <?php } ?>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>

    <?php if ($quotes) { ?>
      <div class="quotes" data-quotes="<?php echo e(json_encode($quotes)); ?>" data-in>
        <figure aria-live="polite">
          <blockquote class="quote"><?php echo e($quotes[0]['text']); ?></blockquote>
          <figcaption class="quote-source"><span class="source"><?php echo e($quotes[0]['source']); ?></span> on <em class="show"><?php echo e($quotes[0]['show']); ?></em></figcaption>
        </figure>
        <div class="quote-dots">
          <?php foreach ($quotes as $index => $quote) { ?>
            <button type="button" aria-label="Show the quote from <?php echo e($quote['source']); ?>" aria-pressed="<?php echo $index ? 'false' : 'true'; ?>"><span></span></button>
          <?php } ?>
          <a class="link" href="/press">Read all the press</a>
        </div>
      </div>
    <?php } ?>

  </section>

<?php include 'includes/footer.php'; ?>
