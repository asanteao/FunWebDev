<?php
/*
   Handles database access for the Continent table. 

 */
class ContinentDB {  
    
    private $connect = null;
    
    private static $baseSQL = "SELECT ContinentCode,ContinentName FROM Continents ";
    private static $constraint = ' order by ContinentName';
    
    public function __construct($connection) {
        $this->connect = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ContinentCode=? ';
        $statement = DatabaseHelper::runQuery($this->connect, $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connect, $sql, null);
        return $statement->fetchAll();        
    }    

}

?>