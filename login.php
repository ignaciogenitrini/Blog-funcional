<?php

session_start();

// Archivo index del admin

require 'admin/config.php';
require 'functions.php';

$conexion = conexion($db_config);

if (!$conexion) {
    header('Location: error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = limpiarDatos($_POST['usuario']);
    $clave   = limpiarDatos($_POST['password']);

    if ($usuario == $admin_config['user'] && $clave == $admin_config['password']) {
        $_SESSION['admin'] = $admin_config['user'];
        header('Location:' . RUTA . '/admin');
    } else {
        echo "Los datos ingresados son incorrectos! ";
    }
}

require 'views/login.view.php';
