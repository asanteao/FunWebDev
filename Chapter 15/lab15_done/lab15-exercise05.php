<html lang="en">
<head>
<title>Exercise 15.5 - Simple RegEx</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>

<?php

function validateEmail($email) {
   $pattern = '/^[\-0-9a-zA-Z\.\+_]+@[\-0-9a-zA-Z\.\+_]+\.[a-zA-Z\.]{2,5}$/';
   if ( preg_match($pattern, $email) ) {
     return true;
   }
   return false;
}

function echoCssError($name){
   if($name=='email' && !validateEmail($_POST['email'])){
      echo "has-error";
   }
}

if (isset($_POST['name'])) { //form was posted
   echo "form posted";
   echo "<pre>";
   print_r($_POST);
   echo "</pre>";
   if(validateEmail($_POST['email'])){
        echo "email was valid";
   }
   else{
        echo "email was invalid";
   }
}

?>
<div class='container'>
<h2>Form to work with</h2>
<form name='mainForm' id='mainForm' method='post'>
  <div class="form-group <?php echoCssError('name'); ?>">
    <legend>Required Information:</legend>
      <label for="name">Name</label>
      <input name="name" id="name" type="text" class="form-control" value="<?php echo $_POST['name']; ?>"/>
  </div>
  <div class='form-group <?php echoCssError('email'); ?>'>
      <label for="email">Email</label>
      <input name="email" id="email" type="text" class="form-control" value="<?php echo $_POST['email']; ?>" />
  </div>
  <div class='form-group  <?php echoCssError('phone'); ?>'>
      <label for="phone">Phone</label>
      <input name="phone" id="phone" type="text" class="form-control" value="<?php echo $_POST['phone']; ?>"/>
  </div>
  <div class="form-group">
        <legend>Optional Information:</legend>
      <label for="how">How did you hear about us?</label>
      <input name="how" id="how" type="text" class="form-control" value="<?php echo $_POST['how']; ?>"/>
  </div>
  <input type="submit" value="Submit Form" class="form-control" />
</form>
Pattern matches:

 <ul>
  <li>The string starts
  <li>match any of the characters -,0-9, a-z, A-Z, ., + or _ (one or more times)
  <li>match the @ stymbol (once)
  <li>match any of the characters -,0-9, a-z, A-Z, ., + or _ (one or more times)
  <li>match the . symbol 
  <li>match ny of a-z,  A-Z or . (two to five times)
    <li>the string ends
</ul>

</div>

</body>
