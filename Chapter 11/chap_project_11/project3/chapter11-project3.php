<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 7</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />

</head>
<?php
function generateLink($url, $label, $class) {
	echo "<a href='". $url. "' class='".$class ."'>" . $label . "</a>";
}

function outputPostRow($number) {
	/* Pull in data */
	include("travel-data.inc.php");

	echo "<div class='row'>";
	
	echo "<div class='col-md-4'>";
	$url = "post.php?id=". $number;
	
	//TEST
//	$paintings = file($filename) ? print("dead") : print("and");

	$label = "<img src='images/". ${"thumb". $number}. "' alt='". ${"title". $number}. "' class='img-responsive'>";
	$class = "";
	generateLink($url, $label, $class);
	echo "</div>";

	

	echo "<div class='col-md-8'>";
	echo "<h2>". ${"title". $number}. "</h2>";
	echo "<div class='details'>";
	$url = "user.php?id=". ${"userId". $number};
	$class = "";
	$label = ${"userName". $number};
	echo "Posted by ";
	generateLink($url, $label, $class);
	echo "<span class='pull-right'>". ${"date". $number}. "</span>";

	echo "<p class='ratings'>";
	$gold = ${"reviewsRating" .$number};
	printRatings($gold);
	echo ${"reviewsNum". $number}. " Reviews</p>";
	
	echo "</div>";
	
	echo "<p class='excerpt'>". ${"excerpt". $number}. "</p>";

	echo "<p class='pull-right'>";
	$url = "post.php?id=". $number;
	$class = "btn btn-primary btn-sm";
	$label = "Read more";
	generateLink($url, $label, $class);
	echo "</p>";

	echo "</div>";
	echo "</div>";
	echo "<hr/>";
}

function printRatings($gold) {
	//Loop to print stars
	$notGold = 5 - $gold;
	for($i = 0; $i < $gold; $i++) {
		echo "<img src='images/star-gold.svg' width='16'/>";
	}
	for($i = 0; $i < $notGold; $i++) {
		echo "<img src='images/star-white.svg' width='16'/>";
	}
}
?>

<body>
<?php
	include("header.inc.php");
?>


    <!-- Page Content -->
    <main class="container">
        <div class="row">
	    <?php
		include("leftnav.inc.php");
	    ?>

            <div class="col-md-10">

                <div class="jumbotron" id="postJumbo">
                    <h1>Posts</h1>
                    <p>Read other travellers' posts ... or create your own.</p>
                    <p><a class="btn btn-warning btn-lg">Learn more &raquo;</a></p>
                </div>        
      
                 <!-- start post summaries -->
                 <div class="postlist">

                   <!-- replace each of these rows with a function call -->
		   <?php
			outputPostRow(1);
			outputPostRow(2);
			outputPostRow(3);
		   ?>
                 </div>   <!-- end postlist -->         
                            
            </div>  <!-- end col-md-10 -->
        </div>   <!-- end row -->
    </main>
    

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
