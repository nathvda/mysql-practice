<?php 

require './inc/sqlconnect.php';

$readdb = "SELECT * FROM Météo";


$read = $bdd->query($readdb)->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';
foreach($read as $line => $value){

    echo '<tr>';

    foreach($value as $key => $idk){
    echo '<td>';
    echo $idk;
    echo '</td>';
}
    echo '<td><form id="idk" action="" method="get"><input type="checkbox" name="checkbox" class="deletion" value="'.$value["Ville"].'"></form></td>';
    echo '</tr>';
}
echo '</table>';

if ($_SERVER['REQUEST_METHOD'] == "POST"){

if(isset($_POST['ville']) AND isset($_POST['max']) AND isset($_POST['min'])){
$ville = $_POST['ville'];
$max = $_POST['max'];
$min = $_POST['min'];

$sql = "INSERT INTO Météo (Ville, haut, bas) VALUES ('".$ville."', ".$max.", ".$min.")";

$insert = $bdd->exec($sql);

}
}

function delete_message(){
    echo "We tried";
}


if (isset($_GET['checkbox'])){
$readdb = "DELETE FROM Météo WHERE Ville = '".$_GET['checkbox']."'";
$bdd->exec($readdb);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App Kind Of</title>
    <script src="script.js"></script>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <label for="ville">Ville</label>
    <input name="ville" id="ville" type="text">
    <label for="max">T° Max</label>
    <input name="max" type="number">
    <label for="min">T° Min</label>
    <input name="min" type="number">
    <input type="submit" value="ajouter à la db">
</form>  
</body>
</html>