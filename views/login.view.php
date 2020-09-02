<?php require 'header.php';?>

<div class="contenedor">


	<div class="post">
		<article>
			<h2 class="titulo">Iniciar Session</h2>

			<form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

				<input type="text" name="usuario" placeholder="Usuario">
				<input type="password" name="password" placeholder="Contraseña">

				<input type="submit" value="Iniciar session">
			</form>
		</article>
	</div>
</div>

<?php require 'footer.php';?>