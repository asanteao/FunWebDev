<?php
class Forecast {
	private $date;
	private $high;
	private $low;
	private $description;
	public static $allTimeHigh = 0;
	public static $allTimeLow = 100;

	public function __construct($d=0, $h=0, $l=0, $desc=0) {
		$this->date = $d;
		$this->high = $h;
		if ($h > self::$allTimeHigh) {
			self::$allTimeHigh = $h;
		}
		
		$this->low = $l;
		if ($l < self::$allTimeLow) {
			self::$allTimeLow = $l;
		}
		$this->description = $desc;
	}

	public function __toString() {
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

	public function getDate() {
		return $this->date;
	}
	public function setDate($d) {
		$this->date = $d;
	}
	public function getHigh() {
		return $this->high;
	}
	public function setHigh($h) {
		if ($h > self::$allTimeHigh) {
			self::$allTimeHigh = $h;
		}
		$this->high = $h;
	}
	public function getLow() {
		return $this->low;
	}
	public function setLow($l) {
		if ($l < self::$allTimeLow) {
			self::$allTimeLow = $l;
		}
		$this->low = $l;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($d) {
		$this->description = $d;
	}
}
?>
