<?php

class Validator{
    public $name;
    public $difficulty;
    public $distance;
    public $duration;
    public $height_difference;
    public $available;

    function __construct($name,$difficulty,$distance,$duration,$height_difference,$available)
    {
    $this->$name = $name; 
    $this->$difficulty = $difficulty;
    $this->$distance = $distance;
    $this->$duration = $duration;
    $this->$height_difference = $height_difference;
    $this->$available = $available; 
    }

    public function validate($name){
        $this->check_name($this->$name);
        echo $this->$name;
        echo "non";
    }

    private function check_name($name){
        trim($name);
        htmlspecialchars($name);
        return $name;
        
    }
}


?>