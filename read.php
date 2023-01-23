<?php 
session_start();

include './controllers/read_controller.php';


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <a href="./create.php">Add a new track.</a>
    <h1>Liste des randonnées</h1>
    <table>

<?php 

echo '<table>';

foreach( $read as $enregistrement => $value){
    echo '<tr>';


    foreach($value as $key => $val){

    echo '<td>';
    echo '<a href="update.php?id=';
    echo $value['id'];
    echo '&name=';
    echo $value['name'];
    echo '&difficulty=';
    echo $value['difficulty'];
    echo '&distance=';
    echo $value['distance'];
    echo '&duration=';
    echo $value['duration'];
    echo '&height_difference=';
    echo $value['height_difference'];
    echo '&available=';
    echo $value['available'];
    echo '">';
    echo $val;
    echo '</a>';
    echo '</td>';
    }
    echo '<td><form method="post" action="./delete.php"><button type="submit" name="id" value="';
    echo $value['id'];
    echo '">Supprimer</button></form></td>';
    echo '</tr>';
}

echo '</table>';


?>

    </table>
  </body>
</html>
