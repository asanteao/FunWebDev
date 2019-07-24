<?php

class Vehicle {
   
      private $make;
      private $model;
      private $fuel;
      private $topSpeed;

      function __construct($mk, $md, $f, $spd) {
         $this->make = $mk;
         $this->model = $md;
         $this->fuel = $f;
         $this->topSpeed = $spd;
      }

      public function __toString() {
         return 
            ' <div class="panel panel-default col-lg-3 col-md-4 col-sm-6">
                <div class="panel-heading">
                  <h3 class="panel-title">'.$this->make.'</h3>
                </div>
                <div class="panel-body">
                 <table class="table table-hover">
                  <tr><td>Model:</td><td>'.$this->model.'</td></tr>
                  <tr><td>Fuel:</td><td>'.$this->fuel.'</td></tr>
                  <tr><td>Top Speed:</td><td>'.$this->topSpeed.' Mph</td></tr>
                 </table>
               </div>
            </div>';
      }

}
?>