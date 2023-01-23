<?php

require './inc/sqlconnect.php';

$readdb = "SELECT * FROM hiking";
$read = $bdd->query($readdb)->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';

foreach( $read as $enregistrement => $value){
    echo '<tr>';

    foreach($value as $key => $val){
    echo '<td>';
    echo $val;
    echo '</td>';
    }
    echo '</tr>';

}

echo '</table>';


?>
