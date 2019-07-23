            <aside class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Continents</div>
                    <ul class="list-group">
                       
		       <?php   /* you will need to replace this hard-coded list with appropriate PHP */ 
		       foreach($continents as $continent) {
			       echo '<li class="list-group-item"><a href="#">'.$continent.'</a></li>';
		       }
			?>
                    </ul>
                </div>
                <!-- end continents panel -->

                <div class="panel panel-info">
                    <div class="panel-heading">Popular</div>
                    <ul class="list-group">
                      
		       <?php   /* you will need to replace this hard-coded list with appropriate PHP */
		       foreach($countries as $country) {
			       echo '<li class="list-group-item">';
			       echo '<a href="list.php?country=' .$country .'">' .$country .'</a>';
			       echo '</li>';
		       }
			?>
                    </ul>
                </div>
                <!-- end continents panel -->
            </aside>
