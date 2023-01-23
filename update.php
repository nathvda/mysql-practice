<?php 
session_start();

if (isset($_GET['id'])){
	$id = $_GET['id'];
	$name = $_GET['name'];
	$difficulty = $_GET['difficulty'];
	$distance = $_GET['distance'];
	$duration = $_GET['duration'];
	$height_difference = $_GET['height_difference'];
	$available = $_GET['available'];


}

include './inc/sqlconnect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

	if (isset($_POST['id']) AND
	 isset($_POST['name']) AND 
	 isset($_POST['difficulty']) AND
	 isset($_POST['distance']) AND
	 isset($_POST['duration']) AND 
	 isset($_POST['height_difference']) AND
	 isset($_POST['available'])){

$newId = $_POST['id'];	
$name = $_POST['name'];
$difficulty = $_POST['difficulty'];
$distance = $_POST['distance'];
$duration = $_POST['duration'];
$height_difference = $_POST['height_difference'];
$available = $_POST['available'];

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

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="./read.php">Liste des données</a>
	<h1>Modifier</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
		<input style="display:none" name="id" value="<?php echo $id ?>"></input>
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty" value="<?php echo $difficulty; ?>">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo $duration; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $height_difference; ?>">
		</div>
		<div>
			<label for="available">Disponible</label>
			<input type="text" name="available" value="<?php echo $available; ?>">
		</div>
		<button type="submit" value= "envoyer" name="button">Envoyer</button>
	</form>
</body>
</html>
