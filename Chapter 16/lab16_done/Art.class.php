<?php

class Art implements Serializable{
      private	$dateCreated;
      		private	$artist;
      private 	$name;
      function __construct($date, $artist, $name){
      	       $this->dateCreated=$date;
             //$this->artist=$artist;
	       $this->name=$name;
      }
     public function serialize() {
      	    return serialize(
	   	array("date" =>$this->dateCreated,
		//	"artist" => $this->artist,
			"name" => $this->name
   	       	    )   
    	 );
    }
    public function unserialize($data) {
    $data = unserialize($data);
	  $this->dateCreated = $data['date'];
  	$this->artist = $data['artist'];
     	$this->name = $data['name'];
       }

      public function getDate(){return $this->dateCreated;}
      public function getArtist(){return $this->artist;}
      public function getName(){return $this->name;}
      public function __toString(){return "Date:".$this->dateCreated." Name:".$this->name;}
}

class Painting extends Art{
     private $medium;
     function __construct($date, $artist, $name, $med){
   	       parent::__construct($date, $artist,$name);
	       $this->medium = $med;
     }
     public function serialize() {
      	    return serialize(
	   	array("med" => $this->medium,
			"artData" => parent::serialize()
   	       	    )   
    	 );
    }
    public function unserialize($data) {
    $data = unserialize($data);
     	$this->medium = $data['med'];
	parent::unserialize($data['artData']);
       }
     public function getMedium(){return $this->medium;}	
     public function __toString(){return parent::__toString()." Medium: ".$this->medium;}
     public function getPNG(){return "";}
}

class Sculpture extends Painting{
      private $weight;
    	 function __construct($date, $artist, $name, $med,$weight){
               parent::__construct($date, $artist,$name,$med);
               $this->weight = $weight;
	 }
     public function serialize() {
      	    return serialize(
	   	array("weight" =>$this->weight,
			"paintingData" => parent::serialize()
   	       	    )   
    	 );
    }
    public function unserialize($data) {
    $data = unserialize($data);
     	$this->weight = $data['weight'];
	parent::unserialize($data['paintingData']);
       }       
          public function __toString(){return parent::__toString()." Weight:".$this->weight;}
}

?>