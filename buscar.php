<?php

require 'functions.php';
require 'admin/config.php';

$conexion = conexion($db_config);

if (!$conexion) {
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {

    $busqueda = limpiarDatos($_GET['busqueda']);

    $statement = $conexion->prepare("SELECT * FROM articulos WHERE titulo LIKE :busqueda OR texto LIKE :busqueda");
    $statement->execute(array(':busqueda' => "%$busqueda%")); // % sirve para que se realice la busqueda del placeholder dentro de las columnas

    $resultado = $statement->fetchAll();

    if (empty($resultado)) {
        $titulo = "El resultado de la busqueda no fue encontrado : " . $busqueda;
    } else {
        $titulo = "Su busqueda dio los siguientes resultados para : " . $busqueda;
    }
} else {
    header('Location: ' . RUTA . 'index.php');
}

require 'views/buscar.view.php';
