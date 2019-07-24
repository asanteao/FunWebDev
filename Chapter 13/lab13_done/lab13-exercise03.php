<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Bootstrap theme -->
<link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 10-3 | Static Variables</title>
</head>
<body>

<header>
<h1>Weather forecast using classes</h1>
</header>


<div class='container'>
<?php 

ini_set("display_errors",1);
date_default_timezone_set('GMT');
include_once("Forecastv2.class.php");

$today = time();
$oneday = 60*60*24;

$forecast = array ();
$dayOne = new Forecast (date("d M, Y", $today),30,20,"sunny");
$dayTwo = new Forecast (date("d M, Y", $today+$oneday),32,22,"sunny");
$dayThree = new Forecast (date("d M, Y", $today+$oneday+$oneday),18,16,"rainy");

$forecast[]=$dayOne;
$forecast[]=$dayTwo;
$forecast[]=$dayThree;

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
