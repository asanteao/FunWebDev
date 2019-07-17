<html lang="en">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <title>Exercise 12-6 Using the Server array</title>   
   
   <!-- Latest compiled and minified Bootstrap Core CSS -->
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<header>
<h1>Demonstrating $_SERVER usage</h1>
</header>

<pre>
<?php
echo "<h1>Server Side Values</h1>";
echo "SERVER_NAME: ".$_SERVER["SERVER_NAME"] . "<br/>";
echo "SERVER_SOFTWARE: ".$_SERVER["SERVER_SOFTWARE"] . "<br/>";
echo "SERVER_ADDR: ".$_SERVER["SERVER_ADDR"] . "<br/>";

echo "<h1>Headers from the client</h1>";
echo "REMOTE_ADDR: ".$_SERVER["REMOTE_ADDR"] . "<br/>";
echo "HTTP_USER_AGENT: ".$_SERVER['HTTP_USER_AGENT']. "<br/>";
echo "HTTP_REFERER: ".$_SERVER['HTTP_REFERER']. "<br/>";

$browser = get_browser($_SERVER['HTTP_USER_AGENT'], true);
print_r($browser);

?>
</pre>
</body>
</html>
