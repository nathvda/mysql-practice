<?php

class Validator{

    private $params;
    private $errors = [];
    private static $fields = ['name','difficulty','distance','duration','height_difference','available'];

    public function __construct($post_params)
    {
        $this->params = $post_params;
    }

    public function validate_form(){
        foreach(self::$fields as $field){
            if (!array_key_exists($field, $this->params)){
                trigger_error("$field is not present in data");
                return;
            }
            
        }

        $this->validate_name();
        $this->validate_difficulty();
        $this->validate_distance();
        $this->validate_duration();
        $this->validate_height_difference();
        $this->validate_available();

        return $this->errors;

    }

    private function validate_name(){

        $val = trim($this->params['name']);
        $val = htmlspecialchars($val);

        if(empty($val)){
            $this->add_error ('name', 'name cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-ZÀ-ù0-9]{6,30}$/', $val)){
            $this->add_error ('name', 'name must be 6 to 30 characters and alphanumeric');
        } else { 
            $_SESSION['name'] = $val;
        }
        }

    }

    private function validate_difficulty(){
        $val = trim($this->params['difficulty']);

        if(empty($val)){
            $this->add_error ('difficulty', 'difficulty cannot be empty');
        } else {
            if ($val !== "très facile" AND
                $val !== "facile" AND
                $val !== "moyen" AND
                $val !== "difficile" AND
                $val !== "très difficile"){
        
            $this->add_error ('difficulty', 'difficulty must be chosen');
        }  else { 

                $_SESSION['difficulty'] = $val;

            }
        }

    }

    private function validate_distance(){
        $val = trim($this->params['distance']);
        $val = htmlspecialchars($val);

        if(empty($val)){
            $this->add_error ('distance', 'distance cannot be empty');
        } else {
            if (!preg_match('/^[0-9]{1,}$/', $val)){
            $this->add_error ('distance', 'distance must be a number');

            } else { 
                $_SESSION['distance'] = $val;
            }
        } 

    }

    private function validate_duration(){
        $val = trim($this->params['duration']);
        $val = htmlspecialchars($val);

        if(empty($val)){
            $this->add_error ('duration', 'duration cannot be empty');
        } else {
            if (!preg_match('/^\d{2}:\d{2}$/', $val)){
            $this->add_error ('duration', 'duration must be in format "00:00" ');

        } else {
            $_SESSION['duration'] = $val;
        }
    }
}

    private function validate_height_difference(){

        $val = trim($this->params['height_difference']);
        $val = htmlspecialchars($val);

        if(empty($val)){
            $this->add_error ('height_difference', 'height_difference cannot be empty');
        } else {
            if (!preg_match('/^\d{1,4}$/', $val)){
            $this->add_error ('height_difference', 'height_difference must be a number');

        } else {
            $_SESSION['height_difference'] = $val;
        }
    }
}

    private function validate_available(){

            $val = trim($this->params['available']);
            $val = htmlspecialchars($val);
    
            if(empty($val)){
                $this->add_error ('available', 'available cannot be empty');
            } else {
                if ($val !== "yes" AND $val !== "no"){
                $this->add_error ('available', 'available must be yes or no');
            } else { 
                $_SESSION['available'] = $val;
            }
            }
    

    }

    private function add_error($key, $value){
        $this->errors[$key] = $value;
    }


}

?>