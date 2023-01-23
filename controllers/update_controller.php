<?php
include './inc/sqlconnect.php';
include './models/validator_class.php';

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$name = $_GET['name'];
	$difficulty = $_GET['difficulty'];
	$distance = $_GET['distance'];
	$duration = $_GET['duration'];
	$height_difference = $_GET['height_difference'];
	$available = $_GET['available'];
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){

if (isset($_POST['submit'])){

    $validation = new Validator($_POST);
    $errors = $validation->validate_form();
}

if (count($errors) == 0){

$update = "UPDATE hiking SET name = :name,
difficulty = :difficulty,
distance = :distance,
duration = :duration,
height_difference = :height_difference,
available = :available 
WHERE id= :newId";
$prep = $bdd->prepare($update);

$prep->bindParam(':name', $name);
$prep->bindParam(':difficulty', $difficulty);
$prep->bindParam(':distance', $distance);
$prep->bindParam(':duration', $duration);
$prep->bindParam(':height_difference', $height_difference);
$prep->bindParam(':available', $available);
$prep->bindParam(':newId', $newId);

$newId = $_POST['id'];	
$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];
$available = $_POST['available'];
$prep->execute();

header('Location: ./read.php');
	}

}

?>