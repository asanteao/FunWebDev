<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 13-5 | Cache</title>
</head>

<body>
<header>
</header>

<?php

function getMultiplicationTable($x){
   $table = "<table class='table'>"; 
   for ($i=1;$i<=$x;$i++){
     $table.="<tr>";
      for ($j=1;$j<=$x;$j++){
         $table.="<td title='".$i."x".$j."=".$i*$j."'>".$i*$j."</td>";		    
     }
    $table.="</tr>";
   }
   $table.="</table>";
 return $table;
}
?>
 <div class="container theme-showcase" role="main">  
      <div class="jumbotron">
	Multiplication Tables
      </div>
 </div>

<div class='container'>
<?php
$multTable =  getMultiplicationTable($_GET['size']);
echo $multTable;
?>
</div>
</body>
</html>
