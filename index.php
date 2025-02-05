<?php
  $title = 'Home';
  include 'includes/header.php';
?>

    <!-- <div class="video fitvid">
      <iframe src="//player.vimeo.com/video/344649840?title=0&amp;byline=0&amp;portrait=0&amp;color=f52323" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    </div> -->

    <div class="video-container">

    
      <video id="video" autoplay muted loop playsinline>
        <source src="video/hevc-2160.mov" type="video/mp4; codecs=hvc1" media="(min-width: 500px)">
        <!--<source src="video/hevc-1080.mp4" type="video/mp4; codecs=hvc1" media="(min-width: 1400px)">
        <source src="video/hevc-720.mp4" type="video/mp4; codecs=hvc1" media="(min-width: 1000px)">
        <source src="video/hevc-540.mp4" type="video/mp4; codecs=hvc1" media="(min-width: 500px)">
        <source src="video/hevc-540.mp4" type="video/mp4; codecs=hvc1" media="(min-width: 500px)">-->
        <source src="video/mp4-540.mp4" type="video/mp4; codecs=avc1" media="(min-width: 500px)">
        Your browser does not support the video tag.
      </video>

      <h1>Alex Forey Lighting</h1>


        <button id="unmuteButton">Unmute</button>
      </div>
</section>

<script>
  document.getElementById('unmuteButton').addEventListener('click', function() {
    var video = document.getElementById('video');
    if (video.muted) {
      video.muted = false;
      this.textContent = 'Mute';
    } else {
      video.muted = true;
      this.textContent = 'Unmute';
    }
  });
</script>

<?php include 'includes/footer.php'; ?>
