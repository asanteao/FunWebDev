<?php
error_reporting(E_ALL & ~E_NOTICE);

$m = new Memcached();
$m->addServer("localhost", 11211);

$m->set("foo", "Hello");
$m->set("bar", "Memcached");

$arr = array(
	$m->get("foo"),
	$m->get("bar")
);

print_r($arr);
?>
