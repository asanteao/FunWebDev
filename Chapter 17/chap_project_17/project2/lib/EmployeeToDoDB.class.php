<?php
/*
   Handles database access for the Employees table. 

 */
class EmployeeToDoDB 
{  
    
    private $connection = null;
    
    private static $baseSQL = "SELECT ToDoID, EmployeeID, Status, Priority, DateBy, Description FROM EmployeeToDo ";
    private static $constraint = ' order by DateBy ASC';
    
    public function __construct($connection) {
        $this->connection  = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ToDoID=? ';
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($id));
        return $statement->fetch();
    }
    
    public function getAllByEmployee($employeeID)
    {
        $sql = self::$baseSQL .  ' WHERE EmployeeID=? ' . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($employeeID));
        return $statement->fetchAll();
    }    
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection, $sql, null);
        return $statement->fetchAll();        
    }    

}

?>