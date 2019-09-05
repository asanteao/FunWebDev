<?php
session_start();

function getFavorites() {
	foreach($_SESSION['favorites'] as $fav) {
		echo '<tr>';
		echo '<td><a href="single-painting.php?id='.$fav['pid'].'">'
			.'<img src="images/art/works/square-medium/'.$fav['fileName'].'"/></a></td>';
		echo '<td>'.$fav['title'].'</td>';
		echo '<td><a href="/remove-favorites.php?pid='.$fav['pid'].'">';
		echo '<button class="ui right labeled icon button">Remove</button></a>';
		echo '</td>';
		echo '</tr>';
	}
}
?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
        <script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
</head>
<body>
<?php include_once('header.inc.php'); ?>

<main class="ui segment doubling stackable grid container">
<table class="ui very basic collapsing celled table">
	<thead>
		<td>Image</td>
		<td>Title</td>
		<td>Action</td>
	</thead>
	<tbody>
	<?php getFavorites(); ?>
	</tbody>
</table>

</main>

  <footer class="ui black inverted segment">
      <div class="ui container">footer for later</div>
  </footer>
</body>
</html>

