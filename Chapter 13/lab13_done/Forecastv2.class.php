<?php

class Forecast{
      public $date;
      public $high;
      public $low;
      public $description;
      public static $allTimeHigh=0;
      public static $allTimeLow=100;

     function  __construct($d, $h, $l, $desc) {
        $this->date = $d;
	    $this->high = $h;
	    if ($h>self::$allTimeHigh){
		    self::$allTimeHigh=$h;
	    }
      	$this->low = $l;
	    if ($l<self::$allTimeLow){
		    self::$allTimeLow=$l;
	    }      	    
	    $this->description = $desc;
     }

     public function __toString(){
        return  
            '<div class="panel panel-default col-lg-2 col-md-4 col-sm-6">
                <div class="panel-heading">
                <h3 class="panel-title">'.$this->date.'</h3>
                </div>
                <div class="panel-body">
                <table class="table table-hover">
                    <tr><td>High:</td><td>'.$this->high.'</td></tr>
                    <tr><td>Low:</td><td>'.$this->low.'</td></tr>      
                </table>
                </div>
                <div class="panel-footer">'.$this->description.'</div>
        </div>';
     }

}
?>