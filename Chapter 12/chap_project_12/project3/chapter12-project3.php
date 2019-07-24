<?php

include 'includes/book-utilities.inc.php';
$file = fopen("data/customers.txt", "r");

$customers = array();
$elements = array();
while($line = fgets($file)) {
	$customer = array();

	$elements = explode(";", $line);
	$customer['firstname'] = $elements[1];
	$customer['lastname'] = $elements[2];
	$customer['email'] = $elements[3];
	$customer['university'] = $elements[4];
	$customer['address'] = $elements[5];
	$customer['city'] = $elements[6];
	$customer['state'] = $elements[7];
	$customer['country'] = $elements[8];
	$customer['zip'] = $elements[9];
	$customer['phone'] = $elements[10];
	$customer['sales'] = explode(",", $elements[11]);
	$id = $elements[0];
	
	$customers[$id] = $customer;
}
fclose($file);

$orders = array();
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$file = fopen("data/orders.txt", "r");
	$elements = array();
	while($line = fgets($file)) {
		$elements = explode(",", $line);
		if($elements[1] == $id) {
			$order = array();
			$order['order id'] = $elements[0];
			$order['customer id'] = $elements[1];
			$order['book isbn'] = $elements[2];
			$order['book title'] = $elements[3];
			$order['book category'] = $elements[4];
			array_push($orders, $order);
		}
	}
	fclose($file);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chapter 12</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.blue_grey-orange.min.css">

    <link rel="stylesheet" href="css/styles.css">
    
    
    <script   src="https://code.jquery.com/jquery-1.7.2.min.js" ></script>
       
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="js/jquery.sparkline.2.1.2.js"></script>
   <script src="js/sparkline.js"></script> 
  
</head>

<body>
    
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
            
    <?php include 'includes/header.inc.php'; ?>
    <?php include 'includes/left-nav.inc.php'; ?>
    
    <main class="mdl-layout__content mdl-color--grey-50">
        <section class="page-content">

            <div class="mdl-grid">

              <!-- mdl-cell + mdl-card -->
              <div class="mdl-cell mdl-cell--7-col card-lesson mdl-card  mdl-shadow--2dp">
                <div class="mdl-card__title mdl-color--orange">
                  <h2 class="mdl-card__title-text">Customers</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <table class="mdl-data-table  mdl-shadow--2dp">
                      <thead>
                        <tr>
                          <th class="mdl-data-table__cell--non-numeric">Name</th>
                          <th class="mdl-data-table__cell--non-numeric">University</th>
                          <th class="mdl-data-table__cell--non-numeric">City</th>
                          <th>Sales</th>
                        </tr>
                      </thead>
			<tbody>
			<?php
				foreach($customers as $id => $cust) {
					echo '<tr>';
					echo '<td><a href="chapter12-project3.php?id='.$id.'">'.$cust['firstname'].' '. $cust['lastname'].'</a></td>';
					echo '<td>'.$cust['university'].'</td>';
					echo '<td>'.$cust['city'].'</td>';
					echo '<td><span class="sparkline">'.join(",", $cust['sales']). '</span></td>';
					echo '</tr>';
				}
			?>
                                              
                      </tbody>
                    </table>
                </div>
              </div>  <!-- / mdl-cell + mdl-card -->
              
              
            <div class="mdl-grid mdl-cell--5-col">
    
		<?php
			if(isset($_GET['id'])) {
				$customer = $customers[$_GET['id']];
				echo '
        			  <!-- mdl-cell + mdl-card -->
                		  <div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
                		  <div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                		  <h2 class="mdl-card__title-text">Customer Details</h2>
                		  </div>
                		  <div class="mdl-card__supporting-text">';
				echo '<h4>'.$customer['firstname'].' '.$customer['lastname'].'</h4>';
				echo $customer['university'].'<br/>';
				echo $customer['address'].'<br/>';
				echo $customer['city'].', '.$customer['country'];
				echo '</div></div>';
			}

			if(isset($_GET['id'])) {
				echo '
					<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
					<div class="mdl-card__title mdl-color--deep-purple mdl-color-text--white">
                     			<h2 class="mdl-card__title-text">Order Details</h2>
                   			</div>
                    			<div class="mdl-card__supporting-text">       
                               		<table class="mdl-data-table  mdl-shadow--2dp">
                              		<thead>
                                	<tr>
                                  	<th class="mdl-data-table__cell--non-numeric">Cover</th>
                                  	<th class="mdl-data-table__cell--non-numeric">ISBN</th>
                                  	<th class="mdl-data-table__cell--non-numeric">Title</th>
                                	</tr>
					</thead>';
				echo '<tbody>';
				if(count($orders) > 0) {
					foreach($orders as $order) {
						echo '<tr>';
						echo '<td><img src="images/tinysquare/'.$order['book isbn'].'.jpg"></td>';
						echo '<td>'.$order['book isbn']. '</td>';
						echo '<td><a href="#">'.$order['book title']. '</a></td>';
						echo '</tr>';
					}
				} else {
					echo '<td>No orders</td><td></td><td></td>';
				}
				echo '</tbody>';
				echo '</table>';
				echo '</div>';
				echo '</div>';
			}
		?>
               </div>   
           
           
            </div>  <!-- / mdl-grid -->    

        </section>
    </main>    
</div>    <!-- / mdl-layout --> 
          
</body>
</html>
