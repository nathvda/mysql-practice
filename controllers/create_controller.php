<?php
include './inc/sqlconnect.php';
require './models/validator_form.php';

$succeed = false;

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if (isset($_POST['submit'])){

        $validation = new Validator($_POST);
        $errors = $validation->validate_form();
    }

if (count($errors) == 0){

$create = "INSERT INTO hiking (name, difficulty,distance, duration, height_difference, available) VALUES (:name,:difficulty,:distance,:duration,:height_difference,:available)";
$to_exec = $bdd->prepare($create);

$to_exec->bindParam(':name', $name);
$to_exec->bindParam(':difficulty', $difficulty);
$to_exec->bindParam(':distance', $distance);
$to_exec->bindParam(':duration', $duration);
$to_exec->bindParam(':height_difference', $height_difference);
$to_exec->bindParam(':available', $available);

$name = $_SESSION['name'];
$difficulty = $_SESSION['difficulty'];
$distance = $_SESSION['distance'];
$duration = $_SESSION['duration'];
$height_difference = $_SESSION['height_difference'];
$available = $_SESSION['available'];
$to_exec->execute();

echo "form properly sent";
$succeed = true;

$_SESSION = [];

} else {
    echo "failed to send form";
}
}

?>