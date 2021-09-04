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
      <h1>About Me</h1>
    </header>

  </div>

  <div class="about-me">

    <div class="container">

      <img class="headshot" src="/imgs/headshot.jpg">

      <p>I'm an <?php echo $age; ?>-year-old lighting designer, associate, programmer, and technician. I have been working in professional theatre since 2016 across all scales of theatre, from 50-seat fringe venues to the West End. I am currently a third year student at the Royal Academy of Dramatic Art, where I started in September 2019. My work while undertaking training can <a href="https://www.rada.ac.uk/profiles/alex-forey/" target="_blank">be seen here</a>.</p>

      <p>
        My work as lighting designer includes: <i>Polyeucte</i> (Theatre Royal Stratford East), <i>Libuše</i>, <i>Rhapsody 2019</i>, <i>From Here To Eternity</i> (Bloomsbury Theatre), <i>Babel</i> (Lyric Hammersmith), <i>Into The Woods</i>, <i>Exhibition</i> (Shaw Theatre), <i>A Sexual Odyssey</i>, <i>Written on the Body</i> (Cockpit Theatre), <i>Songs for a New World</i> (Drayton Arms Theatre), <i>The Piper of Hamelin</i> (Rose Theatre Kingston), <i>Manifestos</i> (Bloomsbury Festival, RADA Studios), <i>Graduate Showcase 2019</i> (Italia Conti Academy), <i>Henry V</i>, <i>Hiroshima: Crucible of Light</i> (Samuel Pepys Theatre), <i>Grey Matter</i>, <i>Twelfth Night</i> (Edinburgh Fringe).
      </p>

      <p>Awards include: winner of the <a href="https://www.vectorworks.net/scholarship/winners?winnerid=1109">Vectorworks Design Scholarship 2020</a> (UK, Entertainment Category), UCL Arts Award for Best Design 2018 (joint with scenic design) for <i>Polyeucte</i> and UCL Arts Award for Best Design 2019 (lighting) for <i>Rhapsody 2019</i>.

      <p>As associate lighting designer: <i>Quintessential</i> (LD Andrew Ellis, Peacock Theatre, Sadler’s Wells), <i>Legally Blonde</i>, <i>The Drowsy Chaperone</i>, <i>RENT</i>, <i>The Pajama Game</i> (LD Andrew Ellis, Pleasance Islington), <i>Modern Love</i> (LD Tom Turner, Etcetera Theatre).</p>

      <p>As assistant lighting designer: <i>Growl</i> (LD Zoe Spurr, Tour: Theatre Royal Bury St Edmunds, Curve Leicester, Rose Theatre Kingston), <i>Parade</i>, <i>Legend Trippers</i>, <i>Anything Goes</i> (LD Aaron Dootson, The Other Palace).</p>

      <p>As programmer: <i>Nature of Why</i> (LD Seb Blaber, Queen Elizabeth Hall, Souhtbank Centre), <i>Quintessential</i> (Peacock Theatre, Sadler’s Wells).</p>

      <p>I studied Maths, Physics, and English Literature for A Level, and attended University College London for Computer Science before switching to theatre full-time. Since then, I have assisted Zoe Spurr, Andrew Ellis and others on their designs for plays, musicals, and dance, both in London and on tour. I have worked as a casual at Wyndham’s Theatre (board operator cover: <i>Red</i>, <i>The Height of the Storm</i>, <i>The Price</i>, <i>The Starry Messenger</i>; followspot cover: Bill Bailey's <i>Larks in Transit</i>), the Donmar Warehouse, Lyric Hammersmith (Chief of Projection: <i>City of Glass</i>, electrician on 10+ shows), and Shakespeare’s Globe (where I operated the last ever performance with production lighting at the end of Emma Rice’s tenure).</p>

      <p>I own my own <a href="https://newfangled.me/eos-nomad-setup/">EOS Nomad 6K</a> system, and have worked as an assistant EOS trainer for ETC at their London office, alongside Declan Randall. I hold Level 3 certification in EOS, as well their two Expert level certifications, and am part of the closed EOS beta testing group, catching bugs before they reach the wider userbase.</p>

      <p>In my early years I made short films and worked as an event and corporate videographer to earn money for equipment, before a shadowing placement at the National Theatre convinced me that theatre was the path for me.</p>

      <p>Since an early age I have enjoyed tinkering with software and hardware design, both for its own sake and in order to enhance my other areas of interest. I have written and released two iOS apps: one <a href="/focus-mate">an app for Apple Watch</a> for voice controlling ETC EOS lightng consoles, the other digital version of my school's student magazine. Further, I'm interested in networking and the internet of things, and have created both server back-ends (mostly Ruby on Rails) and C code to run on Arduino and other microprocessors. For these projects, I have designed circuit boards and had them manufactured in China.</p>

    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
