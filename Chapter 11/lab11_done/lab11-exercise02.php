<html>
<head>
<title>Exercise 8-2</title>
</head>
<body>
<h1>Regular HTML section (outside &lt;?php ... ?&gt; tags)</h1>
<p>You can type regular HTML here and it will show up</p>
<p>The following line looks like PHP but it is ignored by PHP because it doesn't appear within &lt;?php ... ?&gt; tags: <br/><br/>
<code>
echo "This page was generated: " . date("M dS, Y");
</code>
<h1>PHP section (inside &lt;?php ... ?&gt; tags)</h1>
<?php
	//this is a php comment IN tags (will not appear)
	echo "This was output using PHP";
	echo "<br>"; //notice we must echo tags in php.

   //Step 2
   $date = date("M dS, Y");   
   echo "This page was generated: " . $date . "<hr/>";
   
   //Step 7
   echo "This page was generated: " . date("l, F dS , Y H:i:s") . "<hr/>";
   
   //Step 9   
   $remaining = 365 - date("z") + 1;
   echo "There are ". $remaining . " days left in the year";


?>
</body>
</html>