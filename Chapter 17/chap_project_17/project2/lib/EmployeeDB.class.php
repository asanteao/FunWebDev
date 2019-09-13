<?php
/*
   Handles database access for the Employees table. 

 */
class EmployeeDB 
{  
    
    private $connection  = null;
    
    private static $baseSQL = "SELECT *EmployeeID, FirstName, LastName, Address, City, Region, Country, Postal, Email FROM Employees ";
    private static $constraint = ' order by LastName';
    
    public function __construct($connection) {
        $this->connection  = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE EmployeeID=? ';
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($id));
        return $statement->fetch();
        
    }
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, null);
        return $statement->fetchAll();        
    }    

}

?>