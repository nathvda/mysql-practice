<?php 
session_start();
include './controllers/create_controller.php';
include './models/validator_class.php';

$name = "youhou";

$info = new Validator($name,$name,$name,$name,$name,$name);

$info->validate($name);

var_dump($info);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="/read.php">Liste des données</a>
	<h1>Ajouter</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="très facile">Très facile</option>
				<option value="facile">Facile</option>
				<option value="moyen">Moyen</option>
				<option value="difficile">Difficile</option>
				<option value="très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Disponible</label>
			<input type="text" name="available" value="">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>
