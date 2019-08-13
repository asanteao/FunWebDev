<?php
include_once('config.php');

function DBQuery($sql) {
	try {
		$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$result = $pdo->query($sql);
		$pdo = null;
		return $result;
	} catch(PDOException $e) {
		die( $e->getMessage());
	}
}
?>
