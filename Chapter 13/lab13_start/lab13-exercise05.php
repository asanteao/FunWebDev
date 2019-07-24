<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 13-5 Inheritance</title>   
   
   <!-- Latest compiled and minified Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
<h1>A List of Vehicles</h1>
</header>


<div class='container'>
<?php 

ini_set("display_errors",1);
date_default_timezone_set('GMT');

include_once("Vehicle.class.php");


$modelT =   new Vehicle("Ford", "Model-T", "Gas","30");
$hybridCar =   new Vehicle("Ford", "Prius", "Hybrid","160");

echo $modelT;
echo $hybridCar;

?>
</div>

</body>
</html>
