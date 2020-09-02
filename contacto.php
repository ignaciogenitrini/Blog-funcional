<?php

require 'functions.php';
require 'admin/config.php';

$error   = "";
$enviado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulomensaje = limpiarDatos($_POST['titulo']);
    $correo        = limpiarDatos($_POST['extracto']);
    $texto         = $_POST['texto'];

    if (!empty($titulomensaje)) {
        $titulomensaje = filter_var($titulomensaje, FILTER_SANITIZE_STRING);
    } else {
        $error .= 'Ingresa un titulo valido <br />';
    }

    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $error .= 'Ingresa un email valido <br />';
        }
    } else {
        $error .= "Por favor ingresa un email <br />";
    }

    if (!empty($texto)) {
        $texto = trim($texto);
        $texto = htmlspecialchars($texto);
        $texto = stripslashes($texto);

        $enviar_a          = 'example@yahoo.com';
        $asunto            = 'Prueba de php';
        $mensaje_preparado = "Titulo del mensaje: $titulomensaje";
        $mensaje_preparado .= "Lo envia: $correo";
        $mensaje_preparado .= "Mensaje : $texto";

        // mail($enviar_a,$asunto,$mensaje_preparadoe); Funcion de php para enviar mails

        $enviado = true;

    } else {
        $error .= "Ingresa un texto por favor";
    }

}

require 'views/contacto.view.php';
