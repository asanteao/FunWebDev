<?php

// version 1
//$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
//$highs = array(20,30,26,30,30,29,25);
//$lows =  array(10,11,15,18,20,13,11);

// version 2
$highs = array("Monday" => 20,"Tuesday" => 30,"Wednesday" => 26,"Thursday" => 30,"Friday" => 30,"Saturday" => 29,"Sunday" => 25);
$lows =  array("Monday" => 10,"Tuesday" => 11,"Wednesday" => 15,"Thursday" => 18,"Friday" => 20,"Saturday" => 13,"Sunday" => 11);


/*
 Outputs the relevant bootstrap markup to display the weather forcast 
 for a single day
*/
function outputForecast($day,$high,$low){
   echo '<div class="panel panel-default col-lg-3 col-md-3 col-sm-6">';
   echo '<div class="panel-heading">';
   echo '<h3 class="panel-title">' . $day . '</h3>';
   echo '</div>';
   echo '<div class="panel-body">';
   echo '<table class="table table-hover">';
   echo '<tr><td>High:</td><td>' . $high . '</td></tr>';
   echo '<tr><td>Low:</td><td>' . $low . '</td></tr>';
   echo '</table>';
   echo '</div>';
   echo '</div>';
}
?>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 12-2 Weather Forecast</title>   
   
   <!-- Latest compiled and minified Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<header>
   <div class="jumbotron">
      <h1>Weather Forecast!</h1>
         <p>Coming soon...</p>
   </div>
</header>

<div class="container theme-showcase" role="main">  
<?php 
   /* version 1
   for ($i=0; $i<count($days); $i++) {
      outputForecast($days[$i], $highs[$i], $lows[$i]);
   }
   */
   
   /* version 2 */
   foreach ($highs as $key => $todayHigh) {
      outputForecast($key, $todayHigh, $lows[$key]);
   }
?>
</div>
</body>
</html>