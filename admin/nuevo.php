<?php
session_start();

require 'config.php';
require '../functions.php';

validar_session();

$conexion = conexion($db_config);

if (!$conexion) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

    $titulo   = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto    = $_POST['texto'];

    $check = @getimagesize($_FILES[thumb][tmp_name]);

    if ($check != false) {

        $thumb           = $_FILES['thumb']['tmp_name'];
        $carpeta_destino = '../' . $blog_config['carpeta_img'] . $_FILES['thumb']['name'];
        move_uploaded_file($thumb, $carpeta_destino);

        $statement = $conexion->prepare('INSERT INTO articulos (id, titulo, extracto, texto, thumb) VALUES (null, :titulo, :extracto, :texto, :thumb)');
        $statement->execute(array(
            ':titulo'   => $titulo,
            ':extracto' => $extracto,
            ':texto'    => $texto,
            ':thumb'    => $_FILES['thumb']['name']));

    } else {
        echo "El archivo que intentas subir no es valido";
    }

}

require '../views/nuevo.view.php';
