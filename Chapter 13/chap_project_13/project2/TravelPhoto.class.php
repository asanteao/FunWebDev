<?php
/*
   Represents a single travel photo
 */
class TravelPhoto
{  
   static private $photoID = 0;
    
   private $ID;
   private $date;
   private $fileName;
   private $description;
   private $title;
   private $latitude;
   private $longitude;    
    
    
   // constructor is 
   function __construct($filename, $title, $description, $latitude, $longitude) { 
       $this->fileName = $filename;
       $this->title = $title;
       $this->description = $description;
 
       self::$photoID++;
       $this->ID = self::$photoID;
   }    
    
   public function __toString() {
      $tag = '<a href="detail.php?id=' . $this->ID . '" class="img-responsive">';
      $tag .= '<img src="images/square/' . $this->fileName . '" title="' . $this->title . '" alt="' . $this->title . '" >';   
      $tag .= '<div class="caption"><div class="blur"></div><div class="caption-text"><h1>' . $this->title . 
                  '</h1></div></div></a>';
      return $tag;       
   }
   
 
    
   public function path() {
     return $this->fileName;
   }
   


   public function title(){
     return $this->title;
   }



   public function description(){
     return $this->description;
   }

   public function id(){
     return $this->ID;
   }

   public function city(){
     return "";//to be completed ina later exercise.
   }    
    
}

?>