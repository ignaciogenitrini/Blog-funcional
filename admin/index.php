<?php

session_start();

require 'config.php';
require '../functions.php';

// Index del admin

$conexion = conexion($db_config);
if (!$conexion) {
    header('Location: ../error.php');
}

// reutilizacion de funcion para traer articulos
validar_session();

$posts = traer_post($blog_config['post_porpag'], $conexion);

require '../views/admin_index.view.php';
