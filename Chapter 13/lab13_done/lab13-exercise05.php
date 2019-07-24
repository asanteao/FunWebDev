<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Bootstrap theme -->
<link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 10-5 | Inheritance</title>
</head>
<body>

<header>
<h1>A List of Vehicles</h1>
</header>


<div class='container'>
<?php 

ini_set("display_errors",1);

include_once("Vehicle.class.php");


$modelT =   new Vehicle("Ford", "Model-T", "Gas","30");
$hybridCar =   new LandVehicle("Ford", "Prius", "Hybrid","160",4);
$boat =   new WaterVehicle("White Star Line", "Titanic", "Steam","24",3327,1178);

echo $modelT;
echo $hybridCar;
echo $boat;


?>
</div>

</body>
</html>
