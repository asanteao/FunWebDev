<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 13-4 Data Encapsulation</title>   
   
   <!-- Latest compiled and minified Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
<h1>Weather forecast using classes and encapsulation</h1>
</header>


<div class='container'>
<?php 

ini_set("display_errors",1);
date_default_timezone_set('GMT');

include_once("Forecast.class.php");

$today = time();
$oneday = 60*60*24;

$forecast = array ();
for ($i=0;$i<7;$i++) {
   $dayOne = new Forecast();
   $dayOne->high = $i*5;
   $dayOne->low = $i*-5;
   $dayOne->date = date("d M, Y", $today+$i*$oneday);
   $dayOne->description = "Sunny";
   $forecast[]=$dayOne;
}
foreach($forecast as $oneDay) {
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
