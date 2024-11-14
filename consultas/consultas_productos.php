<?php

function getProductos(PDO $conexion, $categoria=null)
{

    $productos = [];

    if($categoria){
        $consulta = $conexion->prepare('SELECT * FROM productos WHERE categoria = :categoria');
        $consulta->bindValue(':categoria', $categoria);
        $consulta->execute();
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);    
    }else{
        $consulta = $conexion->query('SELECT * FROM productos');
        $productos = $consulta->fetchAll(PDO::FETCH_ASSOC);    
    }

    return $productos;

    
}