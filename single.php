<?php

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($db_config);

if (!$conexion) {
    header('Location: error.php');
}

// Almacena el id ingresado por mediante URL : single.php?id= valor
$id = id_articulo($_GET['id']);

if (empty($id)) {
    header('Location: index.php');
}

// Array que almacena los valores que trae la funcion
$posts = traer_articulo_id($conexion, $id);
if (!$posts) {
    header('Location: index.php');
}

//$traer_articulo = $traer_articulo[0];
require 'views/single.view.php';
