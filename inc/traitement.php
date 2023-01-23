<?php
require './sqlconnect.php';

$readdb = "DELETE FROM Météo WHERE Ville = '".$_GET['checkbox']."'";
$bdd->exec($readdb);



?>

