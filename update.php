<?php 
session_start();


include './controllers/update_controller.php';



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Modifier une randonnée</title>
	<link rel="stylesheet" href="./assets/css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<main>
		<a href="./read.php" class="menu">Liste des données</a>
	<h1>Modifier</h1>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
		<input style="display:none" name="id" value="<?php echo $id ?>"></input>
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo (isset($_GET['name'])) ? htmlspecialchars($_GET['name']) : htmlspecialchars($_SESSION['name']) ?>">
			<div <?php echo (isset($errors['name'])) ? 'class="error"' : ""; ?>><?php echo $errors['name'] ?? '' ?></div>
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
			<div <?php echo (isset($errors['difficulty'])) ? 'class="error"' : ""; ?>><?php echo $errors['difficulty'] ?? "" ?></div>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo (isset($_GET['distance'])) ? htmlspecialchars($_GET['distance']) : htmlspecialchars($_SESSION['distance']) ?>">
			<div <?php echo (isset($errors['distance'])) ? 'class="error"' : ""; ?>><?php echo $errors['distance'] ?? "" ?></div>
			
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?php echo (isset($_GET['duration'])) ? htmlspecialchars($_GET['duration']) : htmlspecialchars($_SESSION['duration']) ?>">
			<div <?php echo (isset($errors['duration'])) ? 'class="error"' : ""; ?>><?php echo $errors['duration'] ?? "" ?></div>
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo (isset($_GET['height_difference'])) ? htmlspecialchars($_GET['height_difference']) : htmlspecialchars($_SESSION['height_difference']) ?>">
			<div <?php echo (isset($errors['height_difference'])) ? 'class="error"' : ""; ?>><?php echo $errors['height_difference'] ?? '' ?></div>
		</div>
		<div>
			<label for="available">Disponible</label>
			<input type="text" name="available" value="<?php echo (isset($_GET['available'])) ? htmlspecialchars($_GET['available']) : htmlspecialchars($_SESSION['available']) ?>">
			<div <?php echo (isset($errors['available'])) ? 'class="error"' : ""; ?>><?php echo $errors['available'] ?? "" ?></div>
		</div>
		<button type="submit" value= "envoyer" name="submit">Envoyer</button>
	</form>
</main>
</body>
</html>
