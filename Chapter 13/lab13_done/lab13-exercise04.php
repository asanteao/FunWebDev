<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Bootstrap theme -->
<link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 10-4 | Data Encapsulation</title>
</head>
<body>

<header>
<h1>Weather forecast using classes and encapsulation</h1>
</header>

<div class='container'>
<?php 

ini_set("display_errors",1);
date_default_timezone_set('GMT');
include_once("Forecastv3.class.php");

$today = time();
$oneday = 60*60*24;

$forecast = array();
for ($i=0;$i<7;$i++) {
	$dayOne = new Forecast();
	$dayOne->setHigh($i*5);
	$dayOne->setLow($i*-5);
	$dayOne->setDate(date("d M, Y", $today+$i*$oneday));
	$dayOne->setDescription("Sunny");
	$forecast[]=$dayOne;
}
foreach($forecast as $oneDay){
   echo $oneDay;
}

?>
</div>

<footer>
	<h3>Record High: <?php echo Forecast::$allTimeHigh; ?></h3>
	<h3>Record Low: <?php echo Forecast::$allTimeLow; ?></h3>
</footer>

</body>
</html>
