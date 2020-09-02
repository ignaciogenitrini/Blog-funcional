<?php

// Cerrar session

session_start();

session_destroy();

$_SESSION = array();

header('Location: ../');
die();
