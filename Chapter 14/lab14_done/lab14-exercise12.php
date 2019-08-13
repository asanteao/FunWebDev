<?php 

require_once('config.php'); 

/*
 Displays a list of genres
*/
function outputGenres() {
   try {
      $pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
      $sql = 'select GenreId, GenreName, Description from Genres Order By EraID';
      $result = $pdo->query($sql);
      while ($row = $result->fetch()) {
         outputSingleGenre($row);         
      }
      $pdo = null;
   }
   catch (PDOException $e) {
      die( $e->getMessage() );
   }
}

/*
 Displays a single genre
*/
function outputSingleGenre($row) {
   echo '<div class="ui fluid card">';
      echo '<div class="ui fluid image">';
         $img = '<img src="images/art/genres/square-medium/' . $row['GenreId'] .'.jpg">';
         echo constructGenreLink($row['GenreId'], $img);
      echo '</div>';
      echo '<div class="extra">';
         echo '<h4>';
         echo constructGenreLink($row['GenreId'], $row['GenreName']);
         echo '</h4>';
      echo '</div>';
   echo '</div>';
}

/* 
  Constructs a link given the genre id and a label (which could
  be a name or even an image tag
*/
function constructGenreLink($id, $label) {
   $link = '<a href="genre.php?id=' . $id . '">';
   $link .= $label;
   $link .= '</a>';
   return $link;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapter 14</title>
    <link href="semantic/semantic.css" rel="stylesheet"> 
  </head>
<body>
<main class="ui container">
      <div class="ui secondary segment">
         <h1>List of Links</h1>
      </div>
      
      <div class="ui segment">  
         <div class="ui six doubling cards">
            <?php outputGenres(); ?>  
         </div>
      </div>            
</main>




</body>
</html>