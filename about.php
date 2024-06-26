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

      <p>I'm a <?php echo $age; ?>-year-old lighting designer, associate, programmer, and technician. I have been working in professional theatre since 2016 across all scales, from fringe to the West End. I am a graduate of the Royal Academy of Dramatic Art.</p>

      <p>
        My work as lighting designer includes: <i>Polyeucte</i> (Theatre Royal Stratford East), <i>Libuše</i>, <i>Rhapsody 2019</i>, <i>From Here To Eternity</i> (Bloomsbury Theatre), <i>Babel</i> (Lyric Hammersmith), <i>Into The Woods</i>, <i>Exhibition</i> (Shaw Theatre), <i>Network</i>, <i>Killology</i>, <i>Mums</i>, <i>Till Death Do We Part</i>, <i>Honey Badger</i>, <i>Three Sisters</i>, <i>The Importance of Being Earnest</i>, <i>Electra</i>, <i>Yerma</i>, & <i>The Tempest</i> (Wimbledon College of Art), <i>Message in a Clay River</i>, <i>A Sexual Odyssey</i>, <i>Written on the Body</i> (Cockpit Theatre), <i>Songs for a New World</i> (Drayton Arms Theatre), <i>The Piper of Hamelin</i> (Rose Theatre Kingston), <i>Manifestos</i> (Bloomsbury Festival, RADA Studios), <i>Graduate Showcase 2019</i> (Italia Conti Academy), <i>Henry V</i>, <i>Hiroshima: Crucible of Light</i> (Samuel Pepys Theatre), <i>Grey Matter</i>, <i>Twelfth Night</i> (Edinburgh Fringe).
      </p>

      <p>Awards include: winner of the <a href="https://www.vectorworks.net/scholarship/winners?winnerid=1109">Vectorworks Design Scholarship 2020</a> (UK, Entertainment Category), UCL Arts Award for Best Design 2018 (joint with scenic design) for <i>Polyeucte</i> and UCL Arts Award for Best Design 2019 (lighting) for <i>Rhapsody 2019</i>.

      <p>As associate lighting designer: <i>Quintessential</i> (LD Andrew Ellis, Peacock Theatre, Sadler’s Wells), <i>Legally Blonde</i>, <i>The Drowsy Chaperone</i>, <i>RENT</i>, <i>The Pajama Game</i> (LD Andrew Ellis, Pleasance Islington), <i>Modern Love</i> (LD Tom Turner, Etcetera Theatre).</p>

      <p>As assistant lighting designer: <i>Growl</i> (LD Zoe Spurr, Tour: Theatre Royal Bury St Edmunds, Curve Leicester, Rose Theatre Kingston), <i>Parade</i>, <i>Legend Trippers</i>, <i>Anything Goes</i> (LD Aaron Dootson, The Other Palace).</p>

      <p>As lighting programmer: <i>The Beauty Queen of Leenane</i> (LD Kevin Treacy, Lyric Hammersmith), <i>Nature of Why</i> (LD Seb Blaber, Queen Elizabeth Hall, Souhtbank Centre), <i>Quintessential</i> (Peacock Theatre, Sadler’s Wells).</p>

      <p>I have also worked as a lighting technician in a variety of roles — freelance electrician for Ammonite <i>Cabaret at the Kit Kat Club</i> (Playhouse Theatre), <i>Back To The Future The Musical</i> (Adelphi Theatre), <i>The Mirror and the Light</i> (Gielgud Theatre), Lyric Hammersmith (Chief of Video <i>City of Glass</i>, duty LX), Wyndham's Theatre (board operator cover: <i>RED</i>, <i>The Man in the White Suit</i>, <i>The Height of the Storm</i>, <i>The Price</i>, <i>The Starry Messenger</i>; followspot cover: Bill Bailey's <i>Larks in Transit</i>), the Donmar Warehouse, and Shakespeare’s Globe (where I operated the last ever performance with production lighting at the end of Emma Rice’s tenure).</p>

      <p>I own my own <a href="https://newfangled.me/eos-nomad-setup/">EOS Nomad 6K</a> system, and have worked as an assistant EOS trainer for ETC at their London office, alongside Declan Randall. I hold Level 3 certification in EOS, as well their two Expert level certifications, and am part of the closed EOS beta testing group, catching bugs before they reach the wider userbase.</p>

      <p>I studied Maths, Physics, and English Literature for A Level, and attended University College London for Computer Science before switching to theatre full-time.</p>

      <p>In my early years I made short films and worked as an event and corporate videographer to earn money for equipment, before a shadowing placement at the National Theatre convinced me that theatre was the path for me.</p>

      <p>Since an early age I have enjoyed tinkering with software and hardware design, both for its own sake and in order to enhance my other areas of interest. I have written and released two iOS apps: one <a href="/focus-mate">an app for Apple Watch</a> for voice controlling ETC EOS lightng consoles, the other digital version of my school's student magazine. Further, I'm interested in networking and the internet of things, and have created both server back-ends (mostly Ruby on Rails) and C code to run on Arduino and other microprocessors. For these projects, I have designed circuit boards and had them manufactured in China.</p>

    </div>

  </div>

  <div class="elsewhere">

    <h1>Contact</h1>

    <div class="container">
      <ul>
        <span>
        <li><a id="mail" href="mailto:hello@.alexforey.com" title="Email"></a></li>
        <li><a id="twitter" href="https://twitter.com/alexforey" target="_blank" title="Twitter"></a></li>
        </span>
        <li><a id="instagram" href="https://instagram.com/alexforeylighting/" target="_blank" title="Instagram"></a></li>
        <li><a id="vimeo" href="https://vimeo.com/alexforey" target="_blank" title="Vimeo"></a></li>
      </ul>
    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
