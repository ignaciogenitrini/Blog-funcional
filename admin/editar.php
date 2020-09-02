<?php

session_start();

require 'config.php';
require '../functions.php';

validar_session();

$conexion = conexion($db_config);

if (!$conexion) {
    header('Location: ' . RUTA . '/error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo         = limpiarDatos($_POST['titulo']);
    $extracto       = limpiarDatos($_POST['extracto']);
    $texto          = $_POST['texto'];
    $id             = limpiarDatos($_POST['id']);
    $thumb          = $_FILES['thumb'];
    $thumb_guardada = $_POST['thumb-guardada'];

    if (empty($thumb)) {

        $thumb = $thumb_guardada;

    } else {

        $carpeta_destino = '../' . $blog_config['carpeta_img'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['tmp_name'], $carpeta_destino);

        $thumb = $_FILES['thumb']['name'];

        $statement = $conexion->prepare('UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id');

        $statement->execute(array(
            ':titulo'   => $titulo,
            ':extracto' => $extracto,
            ':texto'    => $texto,
            ':thumb'    => $thumb,
            ':id'       => $id,
        ));

        header('Location:' . RUTA . 'admin');
    }
} else {

    $id_articulo = id_articulo($_GET['id']);

    if (empty($id_articulo)) {
        header('Location: ' . RUTA . '/error.php');
    }

    $post = traer_articulo_id($conexion, $id_articulo);

    if (empty($post)) {
        header('Location: ' . RUTA . '/error.php');
    }

    $post = $post[0];
}

require '../views/editar.view.php';
