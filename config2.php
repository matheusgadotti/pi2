<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'pi2';

try {
    $conexao = new PDO("mysql:host=$dbHost;dbname=" . $dbName, $dbUsername, $dbPassword);
  //echo "Connected to $dbName at $dbHost successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbName :" . $pe->getMessage());
}

?>