<?php
  $title = 'Contact';
  $description = 'How to get in touch with Alex Forey about lighting your show.';
  include 'includes/header.php';
?>

  <div class="container">

    <header class="top-of-page">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <div class="contact-me">

      <img class="headshot" src="<?php echo getImage('working'); ?>" alt="Alex Forey at a lighting desk" width="1200" height="1050" data-in>

      <div class="words" data-in>
        <p class="big">Alex is always interested in collaborating with new companies on upcoming shows. If you are interested in working together, please get in touch.</p>

        <p>He can be reached by email at:</p>

        <?php // The address is written backwards, and js/app.js turns it the right way round, to keep it from scrapers ?>
        <div class="actions email" data-user="olleh" data-website="moc.yerofxela"></div>
      </div>

    </div>

    <dl class="facts">
      <div data-in>
        <dt>Instagram</dt>
        <dd><a class="link" href="https://instagram.com/alexforeylighting" target="_blank" rel="noopener">@alexforeylighting</a></dd>
      </div>
      <div data-in>
        <dt>X</dt>
        <dd><a class="link" href="https://x.com/alexforey" target="_blank" rel="noopener">@alexforey</a></dd>
      </div>
      <div data-in>
        <dt>Bluesky</dt>
        <dd><a class="link" href="https://bsky.app/profile/alexforey.bsky.social" target="_blank" rel="noopener">@alexforey.bsky.social</a></dd>
      </div>
      <div data-in>
        <dt>Printables</dt>
        <dd><a class="link" href="https://www.printables.com/@alfo_468511" target="_blank" rel="noopener">@alfo</a></dd>
      </div>
      <div data-in>
        <dt>GitHub</dt>
        <dd><a class="link" href="https://github.com/alfo" target="_blank" rel="noopener">alfo</a></dd>
      </div>
    </dl>

  </div>

<?php include 'includes/footer.php'; ?>
