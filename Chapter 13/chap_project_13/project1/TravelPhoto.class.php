<?php
/*
   Represents a single travel photo
 */
class TravelPhoto
{
    private $date;
    private $fileName;
    private $description;
    private $title;
    private $latitude;
    private $longitude;
    private $ID;
    private static $photoID = 1;

    function __construct($fileName, $title, $description, $latitude, $longitude)
    {
        $this->fileName = $fileName;
        $this->title = $title;
        $this->description = $description;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->ID = self::$photoID;
        self::$photoID++;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($d)
    {
        $this->date = $d;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function setFileName($f)
    {
        $this->fileName = $f;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($desc)
    {
        $this->description = $desc;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($lat)
    {
        $this->latitude = $lat;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($long)
    {
        $this->longitude = $long;
    }

    public function getID()
    {
        return $this->ID;
    }

    public function __toString()
    {
        return '<img src="'.$this->getFileName().'" alt="'.$this->getTitle().'">';

    }

    public function getCountry() {
        $geolocation = $this->latitude . ',' . $this->longitude;
        $request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$geolocation.'&sensor=false';
        $fileContents = file_get_contents($request);
        //$json_decoded = json_decode($fileContents);
        return $fileContents;
    }
}
?>