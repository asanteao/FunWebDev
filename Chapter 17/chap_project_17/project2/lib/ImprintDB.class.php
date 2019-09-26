<?php
/*
   Handles database access for the Imprint table. 

 */
class ImprintDB 
{  
    
    private $connection = null;
    
    private static $baseSQL = "SELECT ImprintID, Imprint FROM Imprints ";
    private static $constraint = ' order by Imprint';
    
    public function __construct($connection) {
        $this->connection = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE ImprintID=? ';
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
