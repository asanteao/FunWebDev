<?php
include_once('includes/config.php');

function outputImage($row) {
	echo '<li>';
	echo '<a href="detail.php?id='. $row['ImageID']. '" class="image-responsive">';
	echo '<img src="images/square-medium/'. $row['Path']. '" alt="'. $row['Title'] . '">';
	echo '<div class="caption">';
	echo '<div class="blur">'. $row['Title']. '</div>';
	echo '<div class="caption-text">';
	echo '<p>'. $row['Description']. '</p>';
	echo '</div>';
	echo '</div>';	
	echo '</a>';
	echo '</li>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 14</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'includes/header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">
            <form action="chapter14-project2.php" method="get" class="form-horizontal">
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="0">Select Continent</option>
		<?php /* display list of continents */
			try {
				$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
				//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = 'select * from Continents';
				$result = $pdo->query($sql);
				while($row = $result->fetch()) {
					echo '<option value="'. $row['ContinentCode']. '">'.$row['ContinentName'] . '</option>';
				}
				$pdo = null;
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="0">Select Country</option>
		<?php /* display list of countries */ 
		try {
			$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = 'select * from Countries where ISO in (select CountryCodeISO from ImageDetails)';
			$result = $pdo->query($sql);
			while($row = $result->fetch()) {
				echo '<option value="'. $row['ISO']. '">'.$row['CountryName'] . '</option>';
			}
			$pdo = null;
		} catch(PDOException $e) {
			die($e->getMessage());
		}	
		?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>

          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php /* display list of images ... sample below ... replace ???? with field data
           
			   <li>
                  <a href="detail.php?id=????" class="img-responsive">
                          <img src="images/square-medium/????" alt="????">
                          <div class="caption">
                              <div class="blur"></div>
                              <div class="caption-text">
                                  <p>????</p>
                              </div>
                          </div>
                  </a>
			  </li>        
	     */ 
	   try {
		   if(isset($_GET['continent']) && isset($_GET['country']) && isset($_GET['title'])) {
			$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = 'select * from ImageDetails
				WHERE Title LIKE "'. $_GET['title'].
				'" OR CountryCodeISO = "'. $_GET['country'].
				'" OR ContinentCode = "'. $_GET['continent']. '"';
			$result = $pdo->query($sql);
			while($row = $result->fetch()) {
				outputImage($row);   
			}
			$pdo = null;
		   } else {
			$pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = 'select * from ImageDetails';
			$result = $pdo->query($sql);
			while($row = $result->fetch()) {
				outputImage($row);   
			}
			$pdo = null;
		   }
	   } catch(PDOException $e) {
		   die($e->getMessage());
	   }
	?>
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
