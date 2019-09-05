<?php
session_start();

if(isset($_GET['pid']) && isset($_SESSION['favorites'])) {
	foreach($_SESSION['favorites'] as $index => $fav) {
		if($fav['pid'] == $_GET['pid']) {
			unset($_SESSION['favorites'][$index]);
			$_SESSION['numOfFavs'] -= 1;
		}
	}
}
header("Location: /view-favorites.php");
?>
