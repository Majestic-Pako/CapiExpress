<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=tp;charset=utf8', 'root', '');
}catch(PDOException $e){
    echo 'Ha surgido un error por favor intente más tarde';
    exit;
}