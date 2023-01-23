<?php

include './inc/sqlconnect.php';

$readdb = "SELECT * FROM hiking";
$read = $bdd->query($readdb)->fetchAll(PDO::FETCH_ASSOC);

?>
