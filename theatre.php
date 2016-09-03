<?php
  $title = 'Theatre';

  include 'includes/header.php';

  if (isset($_GET['id'])) {
    include 'includes/theatre_project.php';
  } else {
    include 'includes/theatre_list.php';
  }


  include 'includes/footer.php';
?>
