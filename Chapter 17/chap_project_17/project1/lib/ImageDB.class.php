<?php
/*
   Handles database access for the Image Details table. 

 */
 class ImageDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT ImageID,UID,Title,Description,Latitude,Longitude,CityCode,CountryCodeISO,ContinentCode,Path FROM ImageDetails ";
    private static $constraint = ' ORDER BY ImageID';
    
    public function __construct($connection) {
        $this->connect = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ImageID=? ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($id));
        return $statement->fetch();
    }
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();        
    }  
    
    
    public function getAllByCountry($country)
    {
        $sql = self::$baseSQL .  ' WHERE CountryCodeISO=? ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($country));
        return $statement->fetchAll();
    }    
    
    public function getAllByContinent($continent)
    {
        $sql = self::$baseSQL .  ' WHERE ContinentCode=? ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($continent));
        return $statement->fetchAll();
    }      
    
    public function getAllLikeTitle($title)
    {
        $sql = self::$baseSQL .  ' WHERE Title LIKE ? ';
        $filter = '%' . $title . '%';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($filter));
        return $statement->fetchAll();
    }       

}

?>
