<?php
/*
   Handles database access for the Country table. 

 */
class CountryDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT ISO,CountryName,Capital,Area,Population,Continent,TopLevelDomain,CurrencyCode,CurrencyName,PhoneCountryCode,Languages,Neighbours,CountryDescription FROM Countries ";
    private static $constraint = ' order by CountryName';
    
    public function __construct($connection) {
        $this->connect = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ISO=? ';
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
        $sql = "SELECT ISO,CountryName,Capital,Area,Population,Continent,TopLevelDomain,CurrencyCode,CurrencyName,PhoneCountryCode,Languages,Neighbours,CountryDescription FROM Countries INNER JOIN ImageDetails ON Countries.ISO = ImageDetails.CountryCodeISO GROUP BY Countries.CountryName, ImageDetails.CountryCodeISO" . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();        
    }     

}

?>