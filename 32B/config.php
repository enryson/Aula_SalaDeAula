<?php

$databaseHost = 'localhost';
$databaseName = 'escola';
$databaseUsername = 'lescola';
$databasePassword = 'lescola';

$mysqli = mysqli_connect($databaseHost, 
$databaseUsername, 
$databasePassword,
$databaseName); 

if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>