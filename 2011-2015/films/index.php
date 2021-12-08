<?php

	$slug = $_GET['film'];
	
	mysql_connect('localhost', 'alexforey', 'b=@KEXM6S}8b');
	mysql_select_db('alexforey')
	
	$query = mysql_query("SELECT * FROM films WHERE slug = '$slug'");
	
	$results = array();
	while($line = mysql_fetch_assoc($query)) {
		$results[] = $line;
	}
	
	$row = $results[0];
	
	require_once('../design/h.php');
	
?>

<section class="fullwidth dark">
	<div class="heading black">
		<h1><?php echo $row['title']; ?></h1>
	</div>
	
	<div class="featured-video fitvid">
		<?php
			if ($row['type'] == 'vimeo') {
				echo '<iframe src="http://player.vimeo.com/video/'.$row['video_id'].'?title=0&byline=0&portrait=0&color=da594c" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>';
			} elseif ($row['type'] == 'youtube') {
				echo 'yaya youtube';
			}
		?>
		<div class="info">
			<h2><?php echo $row['title']; ?></h2>
			<p class="description"><?php echo $row['description']; ?></p>
		</div>
	</div>
</section>

<?php
	require_once('../design/f.php');
?>