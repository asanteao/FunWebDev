<?php

include 'includes/book-config.inc.php';

?>

<html>
<body>

<?php

try {

    
    
    // $db = new AuthorDB($connection);
    // $result = $db->findById(2);
    // echo '<h3>Sample Author (id=2)</h3>';    
    // echo $result['FirstName'] . ' ' . $result['LastName'];    
    
    // $result = $db->getAll();
    // echo '<h3>All Authors</h3>';    
    // foreach ($result as $row) {   
    //   echo $row['FirstName'] . ' ' . $row['LastName'] . ', ';      
    // }
    
    
    $db = new BookDB($connection);
    $result = $db->findById(492);
    echo '<h3>Sample Books (id=492)</h3>';    
    echo $result['ISBN10'] . ' ' . $result['Title'];    
    

    $result = $db->getAllByImprint(4);
    echo '<h3>Books for Imprint (id=4)</h3>';    
    foreach ($result as $row) {   
      echo $row['ISBN10'] . ' ' . $row['Imprint'] . ', ';      
    }   
    
    $result = $db->getAllBySubcategory(27);
    echo '<h3>Books for Subcategory (id=27)</h3>';    
    foreach ($result as $row) {   
      echo $row['ISBN10'] . ' ' . $row['Title'] . ', ';      
    }      
    
    $result = $db->getAll();
    echo '<h3>All Books</h3>';    
    foreach ($result as $row) {   
      echo $row['Title'] . ', ';      
    }   
    
    
    
    $db = new SubCategoryDB($connection);
    $result = $db->findById(27);
    echo '<h3>Sample SubCategory (id=27)</h3>';    
    echo $result['SubcategoryID'] . ' ' . $result['SubcategoryName'];    
    
    $result = $db->getAll();
    echo '<h3>All SubCategories</h3>';    
    foreach ($result as $row) {   
      echo $row['SubcategoryID'] . ' ' . $row['SubcategoryName'] . ', ';      
    }
        
    
    $db = new ImprintDB($connection);
    $result = $db->findById(5);
    echo '<h3>Sample Imprint (id=5)</h3>';    
    echo $result['ImprintID'] . ' ' . $result['Imprint'];    
    
    $result = $db->getAll();
    echo '<h3>All Imprints</h3>';    
    foreach ($result as $row) {   
      echo $row['ImprintID'] . ' ' . $row['Imprint'] . ', ';      
    }    

  
    // $db = new EmployeeDB($connection);
    // $result = $db->findById(2);
    // echo '<h3>Sample Employee (id=2)</h3>';    
    // echo $result['FirstName'] . ' ' . $result['LastName'];    
    
    // $result = $db->getAll();
    // echo '<h3>All Employees</h3>';    
    // foreach ($result as $row) {    
    //   echo $row['FirstName'] . ' ' . $row['LastName'] . ', ';      
    // }
    
    
    // $db = new EmployeeToDoDB($connection);
    // $result = $db->findById(2);
    // echo '<h3>Sample EmployeeToDo (id=2)</h3>';    
    // echo $result['Status'] . ' ' . $result['DateBy'];        
    
    // $result = $db->getAllByEmployee(30);
    // echo '<h3>EmployeeToDo for Employee (30)</h3>';    
    // foreach ($result as $row) {    
    //   echo $row['DateBy'] . ', ';      
    // }
    
    
    
    // $db = new UniversityDB($connection);
    // $result = $db->findById(100654);
    // echo '<h3>Sample University (id=100654)</h3>';    
    // echo $result['UniversityID'] . ' ' . $result['Name'];    
    
    // $result = $db->getAll();
    // echo '<h3>All Universities</h3>';    
    // foreach ($result as $row) {   
    //   echo $row['Name'] . ' ' . $row['City'] . ', ';      
    // }
    
    
 
    

}
catch (Exception $e) {
   die( $e->getMessage() );
}

?>
</body>
</html>