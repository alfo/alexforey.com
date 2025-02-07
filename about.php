<?php
  $title = 'About';
  include 'includes/header.php';

  $tz  = new DateTimeZone('Europe/London');
  $age = DateTime::createFromFormat('d/m/Y', '07/09/1997', $tz)
       ->diff(new DateTime('now', $tz))
       ->y;
?>

  <div class="container">

    <header class="top-of-page">
      <h1><?php echo $title; ?></h1>
    </header>

  </div>

  <div class="about-me">

    <div class="container">

      <img class="headshot" src="/imgs/headshot.jpg">

      <p class="big">Alex Forey is a lighting designer working in Theatre, Opera, Dance, TV, and Events. He is a graduate of the Royal Academy of Dramatic Art.</p>

      <p class="big">He also works as an Associate Designer for Woodroffe Bassett Design, as a Staff Designer at Peloton Studios London, and as a freelance lighting programmer.</p>

      <p>In addition to his design work, he explores the integration of new design processes with custom hardware/software solutions that enhance his creative output and streamline his workflow to tackle demanding projects.</p>

      <div class="clear"></div>
    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
