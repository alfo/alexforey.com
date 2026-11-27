<?php
  http_response_code(404);

  $title = 'Page Not Found';
  $page = 'notfound';
  include 'includes/header.php';
?>

  <div class="container">

    <header class="top-of-page">
      <h1 class="underline"><?php echo $title; ?></h1>
    </header>

    <div class="not-found" data-in>
      <p>There is nothing at this address.</p>
      <div class="actions">
        <a href="/portfolio">See my portfolio</a>
        <a href="/credits">See my credits</a>
        <a href="/">Go to the home page</a>
      </div>
    </div>

  </div>

<?php include 'includes/footer.php'; ?>
