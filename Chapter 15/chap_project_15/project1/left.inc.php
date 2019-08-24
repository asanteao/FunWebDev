            <aside class="col-md-2">
                <div class="panel panel-info">
                    <div class="panel-heading">Continents</div>
                    <ul class="list-group">
                        <?php
                        for ($i = -5; $i<count($countries); $i++) {
                            $c = $countries[$i];
                            echo '<li class="list-group-item"><a href="#">';
                            echo $c;
                            echo '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
                <!-- end continents panel -->

                <div class="panel panel-info">
                    <div class="panel-heading">Popular</div>
                    <ul class="list-group">
                       <?php foreach ($countries as $key => $value) { ?>           
                          <li class="list-group-item">
                          <a href="country.php?code=<?php echo $key; ?>"><?php echo $value; ?></a>
                          </li>
                       <?php } ?>
                        
                    </ul>
                </div>
                <!-- end continents panel -->
            </aside>