<?php

include 'includes/book-config.inc.php';



$bookdb = new BookDB($connection);

$books = $bookdb->getAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chapter 17</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

    <link rel="stylesheet" href="css/styles.css">
    
    
    <script   src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
       
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid" >   

              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--8-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Books</h2>
                </div>
                <div class="mdl-card__supporting-text">
                     <table class="mdl-data-table  mdl-shadow--2dp">
                           <thead>
                            <tr>
                              <th class="mdl-data-table__cell--non-numeric">Cover</th>
                              <th class="mdl-data-table__cell--non-numeric">Title</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                             <?php foreach ($books as $book) { 
                    
                                echo '<tr>';
                                echo '<td class="mdl-data-table__cell--non-numeric"><img src="images/book-images/tinysquare/' . $book['ISBN10'] . '.jpg"></td>';
                                echo '<td class="mdl-data-table__cell--non-numeric">' . $book['Title'] . '</td>';
                                echo '</tr>    ';  
                    
                             } ?>                               
                    
                          </tbody>
                     </table>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--4-col card-lesson mdl-card  mdl-shadow--2dp">
           
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Imprints</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="demo-list-item mdl-list">
                            <li class="mdl-list__item"><a href="browse-books.php">All Imprints</a></li>
                         <?php /* output list of imprints */ ?>   
                         </ul>
                    </div>    
                    
                    <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                      <h2 class="mdl-card__title-text">Subcategories</h2>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <ul class="demo-list-item mdl-list">
                            <li class="mdl-list__item"><a href="browse-books.php">All Subcategories</a></li>
                         <?php /* output list of subcategories */  ?>   
                         </ul>
                    </div>    
                    
                    
              </div>  <!-- / mdl-cell + mdl-card -->   
            </div>  <!-- / mdl-grid -->    

        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>