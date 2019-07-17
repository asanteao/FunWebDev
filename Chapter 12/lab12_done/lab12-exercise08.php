<?php
/*
  Returns a string containing the markup for our file uploading form
*/  
function getFileUploadForm(){
   return '<form enctype="multipart/form-data" method="post">
             <div class="form-group">
               <label for="file1">Upload a file</label>
               <input type="file" name="file1[]" id="file1" multiple/>
               <p class="help-block" id="errordiv">Browse for a file and post it to the server.</p>
            </div>
            <input type="submit" />
            </form>';
}

/*
  Moves an uploaded file to our destination location
*/  
function moveFile($fileToMove, $destination, $fileType) {
   $validExt = array("jpg", "png");
   $validMime = array("image/jpeg","image/png");
   
   // make an array of two elements, first=filename before extension, second=extension
   $components = explode(".", $destination);
   // retrieve just the end component (i.e., the extension)
   $extension = end($components);
   // check to see if file type is a valid one
   if (in_array($fileType,$validMime) && in_array($extension, $validExt)) {
      echo $destination . ' Uploaded successfully<br/>';
      move_uploaded_file($fileToMove, "UPLOADS/" . $destination) or die("error");
   }
   else
      echo 'Invalid file type=' . $fileType . '  Extension=' . $extension . '<br/>';
}

?>
<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 12-8 Processing file uploads</title>   
   
   <!-- Latest compiled and minified Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
<h1>Using $_FILES and $_POST</h1>
</header>

<div class='container'>
<?php 

// if the form was	posted,	process the upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // check if user uploaded multiple files
   if (is_array($_FILES["file1"]["error"])) {
      $count=0;
      // loop through each uploaded file
      foreach ($_FILES["file1"]["error"]  as $error) {
         if ($error == UPLOAD_ERR_OK) {            
            $clientName = $_FILES["file1"]["name"][$count];
            $serverName = $_FILES["file1"]["tmp_name"][$count];
            $fileType = $_FILES["file1"]["type"][$count];
            moveFile($serverName, $clientName, $fileType);
            $count++;
         }
      }
   }
   else {
      // user only uploaded a single file
      if ($_FILES["file1"]["error"] == UPLOAD_ERR_OK) {
         $clientName = $_FILES["file1"]["name"];
         $serverName = $_FILES["file1"]["tmp_name"];
         $fileType = $_FILES["file1"]["type"];
         moveFile($serverName, $clientName, $fileType);
      }
   }
}
else {
   echo getFileUploadForm();
}

?>
</div>

</body>
</html>
