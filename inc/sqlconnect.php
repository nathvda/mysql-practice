<?php

require __DIR__ . '/../vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__ . '/')->load();

$server = $_ENV['HOST'];
$username = $_ENV['USER'];
$dbpassword = $_ENV['PASSWORD'];
$dbname = $_ENV['DBNAME'];


try{
    $bdd = new PDO("mysql:host=" . $server . ";dbname=" . $dbname, $username, $dbpassword);
    return $bdd;
} catch (exception $e) {

    die('Erreur = ' .$e -> getMessage());

}