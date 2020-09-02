<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/79b2f7e433.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<title>Blog</title>
</head>
<body>

<header>
	<div class="contenedor">
		<div class="logo izquierda">
			<p><a href="<?php echo RUTA; ?>">Mi primer blog</a></p>
		</div>

		<div class="derecha">
			<form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
				<input type="text" name="busqueda" placeholder="Buscar">
				<button type="submit" class="icono fa fa-search"></button>
			</form>


			<nav class="menu">
				<ul>

				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="contacto.php">Contacto<i class="icono fa fa-envelope"></i></a></li>

				</ul>
			</nav>
		</div>
	</div>
</header>