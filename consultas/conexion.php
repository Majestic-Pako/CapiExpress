<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=tp;charset=utf8', 'root', '');
}catch(PDOException $e){
    include('Error.php');
    exit;
}