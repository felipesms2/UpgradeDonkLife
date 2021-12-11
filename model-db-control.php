<?php

$server = "localhost";
$user = "felipe";
$password = "W3.org@//";
$database = "u369732545_forum";
$connection = mysqli_connect($server, $user, $password, $database);



$dsn = "mysql:dbname=$database;host=$server";
try {
      $pdo = new PDO($dsn, $user, $password);
    } 
catch( PDOException $e) 
{
    echo "Erro " .$e->getMessage();
      exit;
}


