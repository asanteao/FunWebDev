<?php
/*
   Handles database access for the Books table. 

 */
class BookDB 
{  
    
    private $connection = null;
    
    private static $baseSQL = "SELECT BookID, ISBN10, ISBN13, Title, CopyrightYear, SubcategoryName, Books.SubcategoryID, Books.ImprintID, Imprint, Books.ProductionStatusID, Status, Books.BindingTypeID, BindingType, TrimSize, PageCountsEditorialEst, LatestInstockDate, Description, CoverImage FROM BindingTypes INNER JOIN (Statuses INNER JOIN (Subcategories INNER JOIN (Imprints INNER JOIN Books ON Imprints.ImprintID = Books.ImprintID) ON Subcategories.SubcategoryID = Books.SubcategoryID) ON Statuses.StatusID = Books.ProductionStatusID) ON BindingTypes.BindingTypeID = Books.BindingTypeID ";
    
    // for now limit the number of books returned to just 30
    private static $constraint = ' order by Title LIMIT 30';
    
    public function __construct($connection) {
        $this->connection  = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  ' WHERE BookID=? ' . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($id));
        return $statement->fetch();
    }
    
    public function findByISBN10($isbn)
    {
        $sql = self::$baseSQL .  ' WHERE ISBN10=? ' . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($isbn));
        return $statement->fetch();
    }   
    
    
    public function getAllByStatus($id)
    {
        $sql = self::$baseSQL .  ' WHERE StatusID=? ' . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($id));
        return $statement->fetchAll();
    }      
    
 
    
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, null);
        return $statement->fetchAll();        
    }    

}

?>