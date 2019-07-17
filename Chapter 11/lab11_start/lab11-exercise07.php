<html>
<head>
<title>Exercise 8-7</title>
</head>
<body>
<h1>Simple Calendar using Loops</h1>

<table border="1">
<?php 
	$month = date("F");
	echo "<tr><th colspan='7'>". $month . "</th></tr>";
?>
<tr>
  <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
</tr>
<?php 
$daysInMonth = date("t");
echo "<tr>";
$offset = date("w", mktime(0,0,0,date("n"), 1, date("Y")));
for($i = 0; $i<$offset; $i++) {
	echo "<td style='border: none'></td>";
}
$day = 1; 
while($day <= $daysInMonth) {
	echo "<td>" . ($day). "</td>";
	if(($day + $offset)%7 == 0) {
		echo "</tr><tr>";
	}
	$day++;
}
echo "</tr>";

?>

</table>


</body>
</html>
