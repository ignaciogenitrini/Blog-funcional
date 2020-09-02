<?php

require 'config.php';
require '../functions.php';

$conexion = conexion($db_config);

if (!$conexion) {
    header('Location:' . RUTA . 'error.php');
}

$id = id_articulo($_GET['id']);

if (!$id) {
    header('Location: ' . RUTA . 'error.php');
}

$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
$statement->execute(array(':id' => $id));

header('Location: ' . RUTA . 'admin');
