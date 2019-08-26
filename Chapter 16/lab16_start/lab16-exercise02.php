<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 13-2 | Serializing Objects</title>
</head>

<body>
<header>
</header>


<?php
include_once("Artist.class.php");

// instantiate some sample objects
$picasso = new Artist("Pablo","Picasso","Malaga","May 11,904", "Apr 8, 1973");
$guernica = new Painting("1937",$picasso,"Guernica","Oil on canvas");
$stein = new Painting("1907",$picasso,"Portrait of Gertrude Stein","Oil on canvas");
$woman = new Sculpture("1909",$picasso,"Head of a Woman", "bronze",30.5);

?>
<html>
<body>
<h1>Tester for Art Classes</h1>
<h2>Paintings</h2>
<p><em>Use the __toString() methods </em></p>
<p><?php echo $guernica; ?></p>
<p><?php echo $stein; ?></p>

<h2>Sculptures</h2>
<p> <?php echo $woman; ?></p>

</body>
</html>
