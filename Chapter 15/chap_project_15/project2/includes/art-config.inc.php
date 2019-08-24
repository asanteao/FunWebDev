<?php
define('DBCONNECTION', 'mysql:host=localhost;dbname=art');
define('DBUSER', 'testuser2');
define('DBPASS', 'mypassword');


spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file)) 
      include $file;
});

 $pdo = DatabaseHelper::setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));

?>
