<?php
/*
  Returns a string containing the markup for our file uploading form
*/  
function getFileUploadForm(){
   return '<form enctype="multipart/form-data" method="post">
             <div class="form-group">
               <label for="file1">Upload a file</label>
               <input type="file" name="file1" id="file1" />
               <p class="help-block" id="errordiv">Browse for a file and post it to the server.</p>
            </div>
            <input type="submit" />
            </form>';
}
?>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 12-7 Processing file uploads</title>   
   
   <!-- Latest compiled and minified Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
<h1>Using $_FILES and $_POST</h1>
</header>

<div class='container'>
<?php 
//For starters we simply output the form everytime.
echo getFileUploadForm(); 
?>
</div>

</body>
</html>
