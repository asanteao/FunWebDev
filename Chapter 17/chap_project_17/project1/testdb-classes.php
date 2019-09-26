<?php

include 'includes/travel-config.inc.php';

?>

<html>
<body>

<?php

try {


    
    $db = new ContinentDB($connection );
    $result = $db->findById('NA');
    echo '<h3>Sample Continent (id=NA)</h3>';
    echo $result['ContinentCode'] . ' ' . $result['ContinentName'];
    
    $result = $db->getAll();
    echo '<h3>All Continents</h3>';    
    foreach ($result as $row) {   
      echo $row['ContinentCode'] . ' ' . $row['ContinentName'] . ', ';      
    }    

  
    
    $db = new CountryDB($connection );
    $result = $db->findById('GR');
    echo '<h3>Sample Continent (id=GR)</h3>';
    echo $result['CountryName'] . ' ' . $result['Capital'];
    
    $result = $db->getAllWithImages();
    echo '<h3>Continents With Images</h3>';    
    foreach ($result as $row) {     
      echo $row['ISO'] . ' ' . $row['CountryName'] . ', ';      
    }       
    
    $db = new CityDB($connection );
    $result = $db->findById('251833');
    echo '<h3>Sample City (GeoNameID=251833)</h3>';
    echo $result['AsciiName'] . ', ' . $result['CountryName'];
    
    $result = $db->getAllWithImages();
    echo '<h3>Cities With Images</h3>';    
    foreach ($result as $row) {     
      echo $row['AsciiName'] . ', ' . $row['CountryCodeISO'] . ', ';      
    }       

    $db = new ImageRatingDB($connection);
    $result = $db->findByID('1');
    echo '<h3>Sample ImageRating (ImageRatingID = 1)</h3>';
    echo 'ImageRatingID: '. $result['ImageRatingID'] .', ImageID: '. $result['ImageID'] . ', Rating: ' . $result['Rating'];
    $result = $db->findAvgRating('2');
    echo '<h3>Sample AverageImageRating (ImageID = 2)</h3>';
    echo 'ImageID: '. $result['ImageID'] .', AvgRating: '. $result['AvgRating'];

    $db = new ImageDB($connection );
    $result = $db->findById(16);
    echo '<h3>Sample Image (id=16)</h3>';
    echo $result['Title'] . ' ' . $result['CityCode'];
    
    $result = $db->getAllByCountry('CA');
    echo '<h3>For Country (CA)</h3>';    
    foreach ($result as $row) {    
      echo $row['ImageID'] . ' ' . $row['Title'] . ', ';      
    }    
    
    $result = $db->getAllByContinent('SA');
    echo '<h3>For Continent (SA)</h3>';    
    foreach ($result as $row) {   
      echo $row['ImageID'] . ' ' . $row['Title'];      
    }       
    
    $result = $db->getAllLikeTitle('Berlin');
    echo '<h3>Like Title (Berlin)</h3>';    
    foreach ($result as $row) {  
      echo $row['ImageID'] . ' ' . $row['Title'] . ', ';      
    }    
    
    $result = $db->getAll();
    echo '<h3>All Images</h3>';    
    foreach ($result as $row) {   
      echo $row['ImageID'] . ' ' . $row['Title'] . ', ';      
    }        
    

}
catch (Exception $e) {
   die( $e->getMessage() );
}

?>
</body>
</html>
