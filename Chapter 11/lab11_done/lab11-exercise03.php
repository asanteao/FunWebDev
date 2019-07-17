<html>
<head>
<title>Exercise 8-3</title>
<style>
   img { float:left; width: 132px; }
   div { margin-left: 140px; }
   h1 { margin: 0; font-size: 1.5em;}
   h2 { margin: 0; font-size: 1.25em;}
</style>
</head>
<body>
<?php
   $thumbnail = "120010.jpg";
   $title = "Portrait of Eleanor of Toledo";
   $artist = "Agnolo Bronzino";
   $year = 1545;
   $width = 115;
   $height = 96;
   $medium = "Oil on Panel";
   $era = "Post Renaissance";   
   $dimensions = $width . "cm x " . $height . "cm";   
?> 

<img src="images/art/thumbs/<?php echo $thumbnail; ?>"  />
<div>
   <h1><?php echo $title; ?> (<?php echo $year; ?>) </h1>
   <h2>By <?php echo $artist; ?> </h2>
   <p>
   <?php echo $dimensions; ?> <br/>
   <?php echo $medium; ?><br/>
   <?php echo $era; ?><br/>
   </p>
</div>


</body>
</html>
