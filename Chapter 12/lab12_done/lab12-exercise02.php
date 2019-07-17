<?php

$forecast = array("Monday" => array(20,10,"Cloudy"),
                  "Tuesday" => array(30,11,"Sunny"),
                  "Wednesday" => array(26,15,"Sunny"),
                  "Thursday" => array(30,18,"Cloudy"),
                  "Friday" => array(30,20,"Rain"),
                  "Saturday" => array(29,13,"Rain"),
                  "Sunday" => array(25,11,"Cloudy"));

/*
 Outputs the relevant bootstrap markup to display the weather forcast 
 for a single day
*/
function outputForecast($day,$high,$low, $description) {
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
   echo '<div class="panel-footer"><img src="' . $description . '.png" /> ' . $description . '</div>';
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
foreach ($forecast as $key => $weather) {
   outputForecast($key, $weather[0], $weather[1], $weather[2]);
}
?>
</div>
<footer >
<div class="well"><small>Icon made by <a href="http://yanlu.de" title="Yannick">Yannick</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed under <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></small></div>
</footer>
</body>
</html>