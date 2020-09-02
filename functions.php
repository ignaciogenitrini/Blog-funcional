 <?php

/*
 *    Funcion de conexion a la base de datos
 */

function conexion($db_config)
{
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=' . $db_config['db_name'], $db_config['usuario'], $db_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

/*
 *    Funcion para limpiar los datos que ingrese el usuario
 */

function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

/*
 *    Funcion para saber en que num de pagina esta el usuario
 */

function pagina_actual()
{
    return isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
}

/*
 *    Funcion para traer los datos de la BD dependiendo la pagina en la que este el usuario
 */

function traer_post($post_porpag, $conexion)
{
    /*    if(pagina_actual() > 1) {
    (pagina_actual() * $post_porpag) - $post_porpag;
    } else {
    $inicio = 0;
    }
     */

    $inicio   = (pagina_actual() > 1) ? pagina_actual() * $post_porpag - $post_porpag : 0;
    $consulta = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_porpag");
    $consulta->execute();
    return $consulta->fetchAll();
}

function numero_paginas($conexion, $post_porpag)
{
    $sql = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $sql->execute();

    $sql = $sql->fetch()['total'];

    $numero_paginas = ceil($sql / $post_porpag);
    return $numero_paginas;
}

// Funcion que se encarga de sanear y asegurar de que se ingrese un entero como ID
function id_articulo(int $id)
{
    return limpiarDatos($id);
}

// Funcion que trae un articulo dependiendo el ID
function traer_articulo_id($conexion, $id)
{
    $sql = $conexion->prepare("SELECT * FROM articulos WHERE id = :id LIMIT 1");
    $sql->execute(array('id' => $id));
    $resultado = $sql->fetchAll();

    return ($resultado) ? $resultado : false;
}

// Funcion con la cual editamos la fecha en que fue publicado el articulo
function fecha($fecha)
{
    $timestamp = strtotime($fecha);
    $meses     = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Diciembre');

    $dia  = date('d', $timestamp);
    $mes  = date('m', $timestamp) - 1;
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] . " de $year";
    return $fecha;
}

function validar_session()
{
    if (!isset($_SESSION['admin'])) {
        header('Location:' . RUTA);
    }
}

function ValidarIMG()
{
    $check = @getimagesize($_FILES[thumb][tmp_name]);
    if ($check != false) {
        $thumb           = $_FILES['thumb']['tmp_name'];
        $carpeta_destino = '../' . $blog_config['carpeta_img'] . $_FILES['thumb']['name'];

        move_uploaded_file($thumb, $carpeta_destino);
    }
}