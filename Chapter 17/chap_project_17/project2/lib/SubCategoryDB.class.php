<?php
/*
   Handles database access for the Subcategory table. 

 */
class SubCategoryDB 
{  
    
    private $connection = null;
    
    private static $baseSQL = "SELECT SubcategoryID, CategoryID, SubcategoryName FROM Subcategories ";
    private static $constraint = ' order by SubcategoryName';
    
    public function __construct($connection) {
        $this->connection = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE SubcategoryID=? ';
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
