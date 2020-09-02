
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/79b2f7e433.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
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
				<li><a href="#">Contacto<i class="icono fa fa-envelope"></i></a></li>

				</ul>
			</nav>
		</div>
	</div>
</header>

<div class="contenedor">

	<div class="post">
		<article>
			<h2 class="titulo">Editar post</h2>

			<form class="formulario" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">


				<input type="hidden" name="id" value=" <?php echo $post['id']; ?>">
				<input type="text" name="titulo" value=" <?php echo $post['titulo']; ?>">
				<input type="text" name="extracto" value=" <?php echo $post['extracto']; ?>">
				<textarea name="texto"><?php echo $post['texto']; ?></textarea>
				<input type="file" name="thumb">
				<input type="hidden" name="thumb-guardada" value=" <?php echo $post['thumb']; ?>">

				<input type="submit" value="Subir post">
			    <a href="index.php" class="btn">Volver atras</a>

			</form>

		</article>
	</div>

</div>

<?php require '../views/footer.php';?>