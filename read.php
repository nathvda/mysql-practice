<?php 
session_start();

require './inc/sqlconnect.php';

$readdb = "SELECT * FROM hiking";
$read = $bdd->query($readdb)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>

<?php 

echo '<table>';

foreach( $read as $enregistrement => $value){
    echo '<tr>';


    foreach($value as $key => $val){

      $_SESSION[$key] = $val;
    echo '<td>';
    echo '<a href="update.php?id=';
    echo $value['id'];
    echo '">';
    echo $val;
    echo '</a>';
    echo '</td>';
    }
    echo '</tr>';

}
var_dump($_SESSION);

echo '</table>';


?>

    </table>
  </body>
</html>
