<?php
  $title = 'About';
  include 'includes/header.php';

  $tz  = new DateTimeZone('Europe/London');
  $age = DateTime::createFromFormat('d/m/Y', '07/09/1997', $tz)
       ->diff(new DateTime('now', $tz))
       ->y;
?>

  <div class="container">

    <header>
      <h1>About Me</h1>
    </header>

  </div>

  <div class="about-me">

    <div class="container">

      <p>I'm an 18-year-old student, lighting designer, filmmaker, and coder in London. I'm currently studying Maths, Physics, and English Literature for A Level. The intersection of art and technology is where I am happiest, often creating new technologies to enhance my creative projects.</p>

      <p>Lighting and technical theatre has been a passion of mine since I was 8 in prep school. One day I saw a production being prepared that moved the stage into the seating of our proscenium arch theatre, using projection and a pair of Mac 250s, and it captured my imagination. Ever since, I have worked as many school productions as I've been able to, and started recently to branch out into work outside of school. In the summer of 2015 I spent a week at work experience at the National Theatre, and that solidified in my mind that I wanted to go into the theatre industry. I make a point of going to the theatre as often as I can both to see new and different design ideas, and also because I really enjoy it as an art form. This has been possible mostly due to the National Theatre's EntryPass £5 ticket scheme, and other student deals in London. I also tag along to the school Theatre Studies trips to the theatre to see more unusual pieces. I own my own EOS Nomad console setup.</p>

      <p>I am also interested in software and hardware design, both for its own sake and in order to enhance my other hobbies. I have written and released two iOS apps: one <a href="/focus-mate">an app for Apple Watch</a> for voice controlling ETC EOS lightng consoles, the other digital version of my school's student magazine. Further, I'm interested in networking and the internet of things, and can create both server backends (mostly Ruby on Rails or Sinatra) and C code to run on Arduino and other microprocessors. For these projects, it's not unusual that I'll design a PCB in Eagle and have it fabricated in China.</p>

      <p>Filmmaking has also been a love of mine. I started by making stop motion animation, and then went on to produce and direct a few short narrative short films. My real interest, however, is cinematography (perhaps unsurprisingly). To fund my projects and gear, I've also worked as an event videographer for my school and also for events, such as the <a href="http://thishappened.org">This Happened</a> series of talks on interaction design. I frequently do multicamera shoots (sometimes on my own), and am now very efficient at editing and publishing these videos with a very short turnaround. I can also produce DVDs, if that's your thing.</p>

      <p>After my A Levels, I'll be taking a gap year to do some work and work experience in my various areas of interest, and likely do some travelling.</p>

    </div>

  </div>

</section>

<?php include 'includes/footer.php'; ?>
