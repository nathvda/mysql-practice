<?php
include './inc/sqlconnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];
    $available = $_POST['available'];

$create = "INSERT INTO hiking (name, difficulty,distance, duration, height_difference, available) VALUES (:name,:difficulty,:distance,:duration,:height_difference,:available)";
$to_exec = $bdd->prepare($create);

$to_exec->bindParam(':name', $name);
$to_exec->bindParam(':difficulty', $difficulty);
$to_exec->bindParam(':distance', $distance);
$to_exec->bindParam(':duration', $duration);
$to_exec->bindParam(':height_difference', $height_difference);
$to_exec->bindParam(':available', $available);

$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];
$available = $_POST['available'];
$to_exec->execute();

header('Location: read.php');
}

?>