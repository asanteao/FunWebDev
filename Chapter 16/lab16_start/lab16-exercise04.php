<html lang="en">
<head>

<!-- Latest compiled and minified Bootstrap Core CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 13-4 | HTML5 Storage</title>
</head>

<body>
<header>
</header>


<?php
   session_start();

function getSurveyQuestion($i){
$questions = array("What is your favorite color?", "In what city were you born?", "Your favorite drink is:");
$form= "
<form action='' method='get' role='form'>
<div class ='form-group'>
  <label for='answer$i'>".$questions[$i]."</label>
  <input type='text' name='answer$i' class='form-control'/>
</div>";
if($i==count($questions)-1){
 $form.="<input type='submit' value='Finish and Post' class='form-control' />";

}
else{
 $form.="<input type='submit' value='Next' class='form-control' />";
}
$form.="</form>";
return $form;
}
?>
 <div class="container theme-showcase" role="main">  
      <div class="jumbotron">

<?php

//initialize the sessin to 0 (1st question) or process answer and increment question in session.
if(!isset($_SESSION['OnQuestion'])){
   $_SESSION['OnQuestion']=0;
}
else{
   //if a form submitted, move on to next question.
   $_SESSION['answer'][]=$_GET['answer'.$_SESSION['OnQuestion']];

   if($_SESSION['OnQuestion']==2){
     //post the from to the server!
     echo "<pre>";
     print_r($_SESSION['answer']);
      echo "</pre>";
   } 

   $_SESSION['OnQuestion']++;

}
if($_SESSION['OnQuestion']<=2){
  echo "<h1>Question #".($_SESSION['OnQuestion']+1)."</h1>";
   echo "<h2>".getSurveyQuestion($_SESSION['OnQuestion'])."</h2>";
}
else{
 echo "<h1>Results</h1>";
}
  
?>
      </div>
 </div>
</body>
</html>
