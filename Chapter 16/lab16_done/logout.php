<?php

session_start();
unset($_SESSION['Username']);

setcookie("Username", "", -1);
header("Location: ".$_SERVER['HTTP_REFERER']);

?>