<html>
<head>
<title>Exercise 8-4</title>
</head>
<body>
<h1>Age calculator</h1>
<?php
	$birthday = mktime(0,0,0,1, 5, 1986); //January 15, 2004 00:00:00
	$today = time();	//current time in seconds since 1970.
	$secondsOld = $today - $birthday;
	$daysOld = $secondsOld/(60*60*24);
	$monthsOld = $secondsOld/(60*60*24*30.4);
	$yearsOld = $secondsOld/(60*60*24*30.4*12);
	echo "<p>Time elapsed since " .date("M d, Y", $birthday) . "</p>";
?>
<ul>
   <li><?php echo number_format($secondsOld); ?> seconds, or </li>
   <li><?php echo number_format($daysOld); ?> days, or </li>
   <li><?php echo number_format($monthsOld, 1)?> months, or </li>
   <li><?php echo number_format($yearsOld, 2);?> years</li>
</ul>
</body>
</html>
