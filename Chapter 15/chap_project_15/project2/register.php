<?php

$firstnameError = false;
$lastnameError = false;
$phoneError = false;
$emailError = false;
$password1Error = false;
$password2Error = false;
$agreeError = false;
$error = false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['firstname'])) {
	        $firstname = $_POST['firstname'];
	        $namePatt = '/^[\s]*[a-zA-Z]+-*[a-zA-Z]+[\s]*$/';
	        $firstnameError = !preg_match($namePatt, $firstname);
	        if($firstnameError) $error = true;
	} else {
	        $firstnameError = true;
	        $error = true;
	}
	
	if(isset($_POST['lastname'])) {
	        $lastname = $_POST['lastname'];
	        $namePatt = '/^[\s]*[a-zA-Z]+-*[a-zA-Z]+[\s]*$/';
	        $lastnameError = !preg_match($namePatt, $lastname);
	        if($lastnameError) $error = true;
	} else {
	        $lastnameError = true;
	        $error = true;
	}
	
	if(isset($_POST['phone'])) {
	        $phone = $_POST['phone'];
	        $phonePatt = '/(^[1-9]{1}[0-9]{2}\-[0-9]{3}\-[0-9]{4}$)|(^\([1-9]{1}[0-9]{2}\) [0-9]{3}\-[0-9]{4}$)/';
	        $phoneError = !preg_match($phonePatt, $phone);
	        if($phoneError) $error = true;
	} else {
	        $phoneError = true;
	        $error = true;
	}
	
	if(isset($_POST['email'])) {
	        $email = $_POST['email'];
	        $emailPatt = '/^\w{1,}@\w{1,}\.\w{1,}$/';
	        $emailError = !preg_match($emailPatt, $email);
	        if($emailError) $error = true;
	} else {
	        $emailError = true;
	        $error = true;
	}
	
	if(isset($_POST['password1'])) {
	        $password1 = $_POST['password1'];
	        $passPatt = '/^.{8,16}$/';
	        $password1Error = !preg_match($passPatt, $password1);
	        if($password1Error) $error = true;
	} else {
	        $password1Error = true;
	        $error = true;
	}
	
	if(isset($_POST['password2'])) {
	        $password2 = $_POST['password2'];
	        if(isset($_POST['password1'])) {
	                if($password2 !== $_POST['password1']) {
	                        $password2Error = true;
	                        $error = true;
	                }
	        }
	} else {
	        $password2Error = true;
	        $error = true;
	}
	
	if($_POST['agree'] !== 'on') {
	        $agreeError = true;
	        $error = true;
	}
	
	if(!$error) {
		header('Location: process-register.php', true, 307);
	}
}

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
        <h1 class="ui huge header">Come join us</h1>
    </div>  
</div>  
<h2 class="ui horizontal divider"><i class="write icon"></i> Register</h2>   
    
<main>
   <section class="ui stackable container">
      <form class="ui form" method="post" action="register.php">
         <h4 class="ui dividing header">Personal Information</h4>
         <div class="field" >
            <label>Name</label>
            <div class="two fields">
	    <div class="field <?php if($firstnameError) echo 'error'?>" id="firstnamecontainer">
	    	<input type="text" name="firstname" placeholder="First Name" id="firstname" <?php echo 'value="'.$firstname.'"';?>>
               </div>
               <div class="field <?php if($lastnameError) echo 'error'?>" id="lastnamecontainer">
	       <input type="text" name="lastname" placeholder="Last Name" id="lastname" <?php echo 'value="'.$lastname.'"';?>>
               </div>
            </div>
         </div>
         <div class="two wide field <?php if($phoneError) echo 'error'?>" id="phonecontainer">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="xxx-xxx-xxxx" id="phone" <?php echo 'value="'.$phone.'"';?>>
         </div>
         <h4 class="ui dividing header">Login Information</h4>
         <div class="field <?php if($emailError) echo 'error'?>" id="emailcontainer">
            <label>E-mail</label>
            <input type="email" placeholder="joe@schmoe.com" name="email" id="email"<?php echo 'value="'.$email.'"';?>>
         </div>
         <div class="fields">
            <div class="eight wide field <?php if($password1Error) echo 'error'?>" id="password1container">
               <label>Password</label>
               <input type="password" name="password1" maxlength="16" placeholder="Password" id="password1">
            </div>
            <div class="eight wide field <?php if($password2Error) echo 'error'?>" id="password2container">
               <label>Password Again</label>
               <input type="password" name="password2" maxlength="16" placeholder="Repeat" id="password2">
            </div>
         </div>
         <div class="inline field <?php if($password2Error) echo 'error'?>" id="agreecontainer">
            <div class="ui checkbox">
	    	<input type="checkbox" tabindex="0" name="agree" id="agree" <?php if(!$agreeError) echo 'checked'?>>
               <label>I agree to the terms and conditions</label>
            </div>
         </div>
         
	 <div id="errors" class="ui negative message" <?php if($error) echo 'style="display: block;"'?>>
            <h3 class="header">Errors were encountered</h3>
            <div class="ui divider"></div>
	    <div id="errorMessages">
		<?php
			if($firstnameError) echo '<p>[PHP] Please enter proper first name</p>';
			if($lastnameError) echo '<p>[PHP] Please enter a proper last name</p>';
			if($phoneError) echo '<p>[PHP] Please enter a proper phone number</p>';
			if($emailError) echo '<p>[PHP] Please enter a proper email</p>';
			if($password1Error) echo '<p>[PHP] Please enter a proper password</p>';
			if($password2Error) echo '<p>[PHP] Passwords do not match</p>';
			if($agreeError) echo '<p>[PHP] You must agree to the terms to register</p>';
		?>
		</div>
         </div>
         
         <button type="submit" class="ui primary button" tabindex="0" id="register">Register</div>
      </form>
   </section>
</main>
</body>
</html>
