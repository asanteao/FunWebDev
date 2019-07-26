<?php
/*
   Represents a Location on the earth 
 */
class Location {
    private $latitude;
    private $longitude;
    private $city_code;

    public function __construct($lat, $long, $cc) {
        $this->latitude = $lat;
        $this->longitude = $long;
        $this->city_code = $cc;
    }
}
