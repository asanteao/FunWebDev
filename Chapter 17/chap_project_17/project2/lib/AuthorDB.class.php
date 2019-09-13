<?php
/*
   Handles database access for the Authors table. 

 */
class AuthorDB 
{  
    
    private $connection = null;
    
    private static $baseSQL = "SELECT FirstName,LastName,Institution FROM Authors ";
    private static $constraint = ' order by LastName';
    
    public function __construct($connection) {
        $this->connection = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE AuthorID=? ';
        $statement = DatabaseHelper::runQuery($this->connection, $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        return $statement->fetchAll();        
    }    

}

?>