<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 13-1 | Using Cookies</title>
</head>

<body>
<header>
</header>


<?php
session_start();

function getLoginForm(){
   return "
<form action='' method='post' role='form'>
<div class ='form-group'>
  <label for='username'>Username</label>
  <input type='text' name='username' class='form-control'/>
</div>
<div class ='form-group'>
  <label for='pword'>Password</label>
  <input type='password' name='pword' class='form-control'/>
</div>
<input type='submit' value='Login' class='form-control' />

</form>";
}

function getLogoutForm(){
   return "
<form action='/logout.php' method='get' role='form'>
<div class ='form-group'>
	<button type='submit'>logout</button>
</div>

</form>";
}

function validLogin() {
	$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
	// very simple (and insecure) check of valid credentials
	$sql = "SELECT * FROM Credentials WHERE Username=:user and Password=:pass";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':user', $_POST['username']);
	$statement->bindValue(':pass', $_POST['pword']);
	$statement->execute();
	if($statement->rowCount() > 0) {
		return true;
	}
	return false;
}
?>
 <div class="container theme-showcase" role="main">  
      <div class="jumbotron">
        <h1>
<?php
   require_once("config.php");
   $loggedIn = false;
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   if(validLogin()) {
		   echo "Welcome ". $_POST['username'];
		   // add 1 to the current time for expiry time
		   $expiryTime = time() + 60*60*24;
		   $_SESSION["Username"] = $_POST['username'];
		   $loggedIn = true;
	   } else {
		   echo "Login Unsuccessful";
	   }
   } else if(isset($_SESSION['Username'])) {
	   echo "Welcome ".$_SESSION['Username'];
	   $loggedIn = true;
   } else {
     echo "No Post detected";
   } 
?>

</h1>
      </div>
<?php
   if(!$loggedIn) {
	echo getLoginForm(); 
   } else {
	   echo 'Some content';
	   echo getLogoutForm();
   }
?>
 </div>
</body>
</html>
