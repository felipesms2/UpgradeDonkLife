<?php

include "./DBPass.php";

$dsn = "mysql:dbname=$database;host=$server";
try {
      $pdo = new PDO($dsn, $user, $password);
    } 
catch( PDOException $e) 
{
    echo "Erro " .$e->getMessage();
      exit;
}


