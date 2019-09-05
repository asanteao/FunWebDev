<?php
if(isset($_POST['theme']) && isset($_POST['philosopher'])) {
	setcookie("theme", $_POST['theme'], time()+60*60*24);
	setcookie("philosopher", $_POST['philosopher'], 0);
	header("Location: chapter16-project1.php");
}
?>
