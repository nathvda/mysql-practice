<?php
include './inc/sqlconnect.php';

if (isset($_POST['id'])){
    $id = $_POST['id'];
};

$delete = "DELETE FROM hiking WHERE id = $id";
$bdd->exec($delete);

header('Location: read.php');

?>
