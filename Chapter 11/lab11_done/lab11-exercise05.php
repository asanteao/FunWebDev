<html>
<head>
<title>Exercise 8-5</title>
</head>
<body>
<h1>Age calculator</h1>
<?php
//step 2
$birthday = mktime(0,0,0,1,15,2004); //Jan 15, 2014 00:00:00
$today = time(); // current time in seconds since the epoch.
// step 3
$secondsOld = $today - $birthday;
//step 4
echo "<p>Time elapsed since " . date("M d, Y",$birthday) . ":</p>";

//step 5 below in each tag set
$numYears = $secondsOld / (60*60*24*365.242375);
$numMonths = $secondsOld / (60*60*24*30.4);
$numDays = $secondsOld / (60*60*24);
?> 
<ul>
   <li><?php echo $secondsOld; ?> seconds, or </li>
   <li><?php echo number_format($numDays, 0); ?> days, or </li>
   <li><?php echo number_format($numMonths, 1); ?> months, or </li>
   <li><?php echo number_format($numYears, 2); ?> years</li>
</ul>
</body>
</html>
