<?php

function conectar()
{
    $user = 'root';
    $pass = "";
    $dsn = "mysql:host=localhost;dbname=loja";
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
}

?>