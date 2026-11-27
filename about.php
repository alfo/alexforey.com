<?php
  $title = 'About';
  include 'includes/header.php';
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

  </div>

<?php include 'includes/footer.php'; ?>
