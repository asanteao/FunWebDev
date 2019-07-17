<?php
function convertUnits($startVal, $startUnits, $endUnits){
   $mlToOz = 0.033814;
   $mlToCup = 0.00422675;
   if($startUnits=="ml"){
      if($endUnits=="cups"){
         return  number_format($startVal*$mlToCup, 2);
      }
      else if ($endUnits=="oz"){
         return  number_format($startVal*$mlToOz, 2);
     }
   }
   return "???";
}
?>
<html>
<head>
<title>Exercise 8-8</title>
</head>
<body>
<h1>Making and using functions</h1>


<table border=1>
<tr>
  <th>milliliters</th><th>Cups</th><th>Ounces</th>
<?php
for($i=50;$i<=1000;$i+=50){
   echo "<tr>";
   echo "<td>$i</td>";
   // replace the ??? with the calls to convertUnits function
   echo "<td>" . convertUnits($i,"ml","cups") . "</td>";
   echo "<td>" . convertUnits($i,"ml","oz") . "</td>";

   echo "</tr>";
}
?>
</tr>
</table>


</body>
</html>
