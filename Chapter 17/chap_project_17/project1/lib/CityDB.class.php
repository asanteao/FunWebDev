<?php
/*
   Handles database access for the City table. 

 */
class CityDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT Cities.GeoNameID, AsciiName, Cities.CountryCodeISO, CountryName FROM Cities INNER JOIN Countries ON Cities.CountryCodeISO = Countries.ISO";
    private static $constraint = ' order by AsciiName';
    
    public function __construct($connection) {
        $this->connect = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE Cities.GeoNameID=? ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();        
    }   
    
    public function getAllWithImages()
    {
        $sql = "SELECT Cities.GeoNameID, AsciiName, Cities.CountryCodeISO FROM Cities INNER JOIN ImageDetails ON Cities.GeoNameID = ImageDetails.CityCode GROUP BY Cities.GeoNameID, Cities.AsciiName, Cities.CountryCodeISO" . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();        
    }     

}

?>
