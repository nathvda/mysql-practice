<?php
session_start();

session_destroy();

    header('Location: ./read.php');
    exit();

?>
