<?php require 'header.php';?>

<div class="contenedor">
	<h2 class="titulo">Contactate con nosotros!</h2>

	<article>
		<div class="post">

			<form class="formulario" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

				<input type="text" name="titulo" placeholder="Titulo del mensaje" value="<?php if (!$enviado && isset($titulomensaje)) {
    echo $titulomensaje;
}?>">

				<input type="text" name="extracto" placeholder="Escribe tu correo" value="<?php if (!$enviado && isset($correo)) {
    echo $correo;
}?>">
				<textarea name="texto" placeholder="Escribe tu mensaje aqui"><?php if (!$enviado && isset($texto)) {
    echo $texto;
}?></textarea>

				<input type="submit" value="Enviar mensaje">

				<?php if (!empty($error)): ?>
					<p class="alert error"><?php echo $error; ?></p>
				<?php elseif ($enviado): ?>
					<p class="alert succes">Mensaje enviado correctamente</p>
				<?php endif?>

			</form>

		</div>
	</article>
</div>

<?php require 'footer.php';?>