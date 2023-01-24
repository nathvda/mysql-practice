<?php
require './inc/sqlconnect.php';

class Login_Validator{

    private $params;
    private $errors = [];
    private static $fields = ['username', 'password'];

    public function __construct($login_params){
        $this->params = $login_params;
    }

    public function validate_login(){
        foreach (self::$fields as $field){
            if (!array_key_exists($field, $this->params)){
                trigger_error("$field does not exist in data");
                return;
            }
        }

        $this->validate_userName();
        $this->validate_password();
        $this->check_password();

        return $this->errors;
    }

    private function validate_userName(){
        $val = trim($this->params['username']);
        $val = stripslashes($val);
        $val = htmlspecialchars(($val));

        if(empty($val)){
            $this->add_error('username', 'username cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z0-9]{3,}$/',$val)){
                $this->add_error('username', 'username must be at least 8 chars and alphanumeric');
            } else {
                $this->params['username'] = $val;
            }
        }
    }

    private function validate_password(){
        $val = trim($this->params['password']);
        $val = stripslashes($val);
        $val = htmlspecialchars(($val));

        if(empty($val)){
            $this->add_error('password', 'password cannot be empty');
        } else {
            if (!preg_match('/^[a-zA-Z0-9)(]{8,}$/',$val)){
                $this->add_error('password', 'password must be at least 8 chars and alphanumeric');
            } else {
                $this->params['password'] = $val;
            }
        }

    }

    private function check_password(){

        try { $bdd = new PDO("mysql:host=localhost;dbname=test", "root", '');
            return $bdd;

        } catch (exception $e) {
        
        die('Erreur = ' .$e -> getMessage());

        }

        $val = $this->params['username'];
        $sql = "SELECT * FROM user WHERE username=$val"; 
        $infos = $bdd->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if($infos[0]['password'] !== $this->params['password']){

            $this->add_error('password', 'wrong password');

        } else { 
            $_SESSION['username'] = $this->params['password'];
        }

    }

    private function add_error($key,$value){

        $this->errors[$key] = $value;

    }

}


?>