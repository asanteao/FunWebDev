<?php

?>

<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/validation.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
</head>
<body >
    
<?php include 'includes/art-header.inc.php'; ?>
<div class="banner-container">
    <div class="ui sizer container">
        <h1 class="ui huge header">Welcome!</h1>
    </div>  
</div>  
<h2 class="ui horizontal divider"><i class="write icon"></i> Registration Successful</h2>   
    
<main>
   <section class="ui stackable container">
        <div class="ui icon message">
          <i class="add user icon"></i>
          <div class="content">
            <div class="header">
              Thank you for registering!
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                echo "<p><strong>" . $_POST['firstname'] . " " . $_POST['lastname'] . "</strong><br>";
                echo $_POST['email'] . "</p>";
            }
            ?> 
          </div>
        </div>        
 
   </section>
</main>
</body>
</html>
