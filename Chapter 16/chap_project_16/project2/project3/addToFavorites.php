<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	if(isset($_GET['pid']) && isset($_GET['image']) && isset($_GET['title'])) {
		if(!isset($_SESSION['favorites'])) {
			$_SESSION['favorites'] = array();
			$_SESSION['numOfFavs'] = 0;
		}
		//Search for pid and add only if it painting is not already present as a favorite
		$pid = $_GET['pid'];
		$favInSet = false;
		foreach($_SESSION['favorites'] as $fav) {
			if($pid == $fav['pid']) $favInSet = true;	
		}
		if(!$favInSet) {
			$_SESSION['favorites'][] = array('pid' => $_GET['pid'], 'fileName' => $_GET['image'].'.jpg', 'title' => $_GET['title']);
			$_SESSION['numOfFavs'] += 1;
		}
		header('Location: /view-favorites.php');
	} else {
		//Do nothing I guess
	}
} else {
	//Do nothing I guess
}
?>
