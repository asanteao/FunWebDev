<html lang="en">
<head>
<title>Exercise 15.5 - Error Handlers</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
<?php

function validateEmail($email) {
	$pattern = '/^[\-0-9a-zA-Z\.\+_]+@[\-0-9a-zA-Z\.\+_]+\.[a-zA-Z\.]{2,5}$/';
	if(preg_match($pattern, $email)) {
		return true;
	}
	return false;
}

function validateName($name) {
	$pattern = "/^[A-Za-z\.\s\-]+$/";
	if(preg_match($pattern, $name))
		return true;
	return false;
}

function validatePhone($phone) {
	$pattern = "/^\(?\s*\d{3}\s*[\)\-\.]?\s*[2-9]\d{2}\s*[\-\.]\s*\d{4}$/";
	if(preg_match($pattern, $phone))
		return true;
	return false;
}

function echoCSSError($name) {
	if($_SERVER['REQUEST_METHOD'] == 'GET')
		return; //prevents from highlighting when page first loads.
	if($name == 'email' && !validateEmail($_POST['email'])) {
		echo 'has-error';
	}
	if($name == 'name' && !validateName($_POST['name'])) {
		echo 'has-error';
	}
	if($name == 'phone' && !validatePhone($_POST['phone'])) {
		echo 'has-error';
	}
}

if (isset($_POST['name'])) { //form was posted (or link with query string was clicked).
   echo "form posted";
   echo "<pre>";
   print_r($_POST);
   echo "</pre>";
}

?>
<div class='container'>
<h2>Form to work with</h2>
<form name='mainForm' id='mainForm' method='post'>
	<div class="form-group <?php echoCSSError('name');?>">
    <legend>Required Information:</legend>
      <label for="name">Name</label>
      <input name="name" id="name" type="text" class="form-control" 
	placeholder="Enter full name"
	value="<?php echo $_POST['name'];?>"/>
  </div>
  <div class='form-group <?php echo echoCSSError('email');?>'>
      <label for="email">Email</label>
      <input name="email" id="email" type="text" class="form-control" 
	placeholder="example@example.com"
	value="<?php echo $_POST['email'];?>"/>
  </div>
  <div class='form-group <?php echo echoCSSError('phone');?>'>
      <label for="phone">Phone</label>
      <input name="phone" id="phone" type="text" class="form-control" 
	placeholder="(xxx) xxx-xxxx"
	value="<?php echo $_POST['phone'];?>"/>
  </div>
  <div class="form-group">
        <legend>Optional Information:</legend>
      <label for="how">How did you hear about us?</label>
      <input name="how" id="how" type="text" size="30" class="form-control" 
	value="<?php echo $_POST['how'];?>"/>
  </div>
  <input type="submit" value="Submit Form" class="form-control" />
</form>
</div>
</body>
