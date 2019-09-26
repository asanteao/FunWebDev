<?php
/*
   Handles database access for the ImageRating table. 

 */
class ImageRatingDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT ImageDetails.ImageID, ImageDetails.Title, ImageDetails.Description, ImageRating.ImageRatingID, ImageRating.Rating FROM ImageDetails INNER JOIN ImageRating ON ImageDetails.ImageID = ImageRating.ImageID ";
    private static $constraint = ' order by ImageDetails.ImageID';
    
    public function __construct($connection) {
        $this->connect = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ImageRating.ImageRatingID=? ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();        
    }   

    public function findAvgRating($imageID) {
	   $sql = 'SELECT ImageID, AVG(Rating) as AvgRating FROM ImageRating WHERE ImageID =? GROUP BY ImageID';
	   $statement = DatabaseHelper::runQuery($this->connect, $sql, array($imageID));
	   return $statement->fetch();
    }

}

?>
