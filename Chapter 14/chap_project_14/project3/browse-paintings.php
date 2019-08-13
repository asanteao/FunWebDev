<?php
include_once('Query.inc.php');


function outputPaintings() {
	/*
<li class="item">
            <a class="ui small image" href="detail.php?id=565"><img src="images/art/works/square-medium/131040.jpg"></a>
            <div class="content">
              <a class="header" href="detail.php?id=565">View of St. Markís from the Punta della Dogana</a>
              <div class="meta"><span class="cinema">Canaleto</span></div>        
              <div class="description">
                <p>The View of St. Markís Basin came to Brera in 1828 with the View of the Grand Canal Looking toward the Punta della Dogana from Campo SantíIvo.</p>
              </div>
              <div class="meta">     
                  <strong>$900</strong>        
              </div>        
              <div class="extra">
                <a class="ui icon orange button" href="cart.php?id=565"><i class="add to cart icon"></i></a>
                <a class="ui icon button" href="favorites.php?id=565"><i class="heart icon"></i></a>          
              </div>        
            </div>      
	    </li>*/
	$sql = '';
	if(isset($_GET['artist'])) {
		$artistCond = $_GET['artist'] == 0? 1 : 'ArtistID = '.$_GET['artist'];
		$galleryCond = $_GET['gallery'] == 0? 1: 'GalleryID = '.$_GET['gallery'];
		$shapeCond = $_GET['shape'] == 0? 1: 'ShapeID = '.$_GET['shape'];
		$sql = 'SET @row := 0;
			SELECT * FROM ((SELECT * FROM Paintings WHERE '.$artistCond.' AND '.$galleryCond.' AND '. $shapeCond
			.') PT INNER JOIN (SELECT (@row := @row + 1) AS num, ShapeName FROM Shapes) ST ON PT.ShapeID = ST.num) 
			INNER JOIN Artists ON Artists.ArtistID = PT.ArtistID LIMIT 20';
	} else {
		$sql = 'SET @row := 0;
			SELECT * FROM ((SELECT * FROM Paintings WHERE 1 AND 1 AND 1) PT INNER JOIN (SELECT (@row := @row + 1) 
			AS num, ShapeName FROM Shapes) ST ON PT.ShapeID = ST.num) 
			INNER JOIN Artists ON Artists.ArtistID = PT.ArtistID LIMIT 20';
	}
	$result = DBQuery($sql);
	try {
		$result->nextRowset();
		while($row = $result->fetch()) {
			echo '<li class="item">';
			echo '<a class="ui small image" href="single-painting.php?id='.$row['PaintingID'].'">';
			echo '<img src="images/art/works/square-medium/'.$row['ImageFileName'].'.jpg"></a>';
			echo '<div class="content">';
			echo '<a class="header" href="single-painting.php?id='.$row['PaintingID'].'">'
				.$row['Title'].'</a>';
			echo '<div class="meta"><span class="cinema">'.$row['FirstName'].' '.$row['LastName'].'</span></div>';
			echo '<div class="desciption"><p>'.$row['Excerpt'].'</p></div>';
			echo '<div class="meta">';
			echo '<strong>$'.$row['MSRP'].'</strong></div>';
			echo '<div class="extra">';
			echo '<a class="ui icon orange button" href="cart.php?id='.$row['PaintingID'].'"><i class="add to cart icon"></i></a>';
			echo '<a class="ui icon button" href="favorites.php?id='.$row['PaintingID'].'"><i class="heart icon"></i></a>';
			echo '</div></div></li>';
		}
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

function getMuseums() {
	$sql = 'SELECT GalleryID, GalleryName FROM Galleries';
	$result = DBQuery($sql);
	$museums = [];
	try {
		while($row = $result->fetch()) {
			$museums[$row['GalleryID']] = $row['GalleryName'];
		}
		return $museums;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
}

function getArtists() {
	$sql = 'SELECT ArtistID, FirstName, LastName FROM Artists';
	$result = DBQuery($sql);
	$artists = [];
	try {
		while($row = $result->fetch()) {
			$artists[$row['ArtistID']] = $row['FirstName'].' '.$row['LastName'];
		}
		return $artists;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
}

function getShapes() {
	$sql = 'SELECT ShapeName FROM Shapes';
	$result = DBQuery($sql);
	$shapes = [];
	try {
		$rowNumber = 1;
		while($row = $result->fetch()) {
			$shapes[$rowNumber] = $row['ShapeName'];
			$rowNumber++;
		}
		var_dump($shapes);
		return $shapes;
	} catch (PDOException $e) {
		die($e->getMessage());
	}
	
}

?>
<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
        <script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">
    
</head>
<body >
<?php include_once('header.inc.php'); ?>
    
<main class="ui segment doubling stackable grid container">

    <section class="five wide column">
        <form method="GET" class="ui form">
          <h4 class="ui dividing header">Filters</h4>

          <div class="field">
            <label>Artist</label>
            <select name="artist" class="ui fluid dropdown">
		<?php
		$artists = getArtists();
		echo '<option value="0">Select Artist</option>';
		foreach($artists as $artistID => $artist) {
			echo '<option value="'.$artistID.'">'.$artist.'</option>';
		}
		?>
            </select>
          </div>  
          <div class="field">
            <label>Museum</label>
            <select name="gallery" class="ui fluid dropdown">
		<?php
		$museums = getMuseums();
		echo '<option value="0">Select Museum</option>';
		foreach($museums as $galleryID =>  $museum) {
			echo '<option value="'.$galleryID.'">'.$museum.'</option>';
		}
		?>
            </select>
          </div>   
          <div class="field">
            <label>Shape</label>
            <select name="shape" class="ui fluid dropdown">
		<?php
		$shapes = getShapes();
		echo '<option value="0">Select Shape</option>';
		foreach($shapes as $shapeID => $shape) {
			echo '<option value="'. $shapeID.'">'.$shape.'</option>';
		}
		?>
            </select>
          </div>   

            <button class="small ui orange button" type="submit">
              <i class="filter icon"></i> Filter 
            </button>    

        </form>
    </section>
    

    <section class="eleven wide column">
        <h1 class="ui header">Paintings</h1>
        <ul class="ui divided items" id="paintingsList">
	<?php outputPaintings(); ?>
<!--
          <li class="item">
            <a class="ui small image" href="detail.php?id=565"><img src="images/art/works/square-medium/131040.jpg"></a>
            <div class="content">
              <a class="header" href="detail.php?id=565">View of St. Markís from the Punta della Dogana</a>
              <div class="meta"><span class="cinema">Canaleto</span></div>        
              <div class="description">
                <p>The View of St. Markís Basin came to Brera in 1828 with the View of the Grand Canal Looking toward the Punta della Dogana from Campo SantíIvo.</p>
              </div>
              <div class="meta">     
                  <strong>$900</strong>        
              </div>        
              <div class="extra">
                <a class="ui icon orange button" href="cart.php?id=565"><i class="add to cart icon"></i></a>
                <a class="ui icon button" href="favorites.php?id=565"><i class="heart icon"></i></a>          
              </div>        
            </div>      
          </li>

          <li class="item">
            <a class="ui small image" href="detail.php?id=568"><img src="images/art/works/square-medium/137010.jpg"></a>
            <div class="content">
              <a class="header" href="detail.php?id=568">Abbey among Oak Trees</a>
              <div class="meta"><span class="cinema">Casper David Friedrich</span></div>        
              <div class="description">
                <p>Abbey among Oak Trees is the companion piece to Monk by the Sea. Friedrich showed both paintings in the Berlin Academy Exhibition of 1810.</p>
              </div>
              <div class="meta">     
                  <strong>$900</strong>        
              </div>        
              <div class="extra">
                <a class="ui icon orange button" href="cart.php?id=568"><i class="add to cart icon"></i></a>
                <a class="ui icon button" href="favorites.php?id=568"><i class="heart icon"></i></a>          
              </div>        
            </div>      
          </li>    
-->
        </ul>        
    </section>  
    
</main>    
    
  <footer class="ui black inverted segment">
      <div class="ui container">footer for later</div>
  </footer>
</body>
</html>
