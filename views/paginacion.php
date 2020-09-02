<?php $num_paginas = numero_paginas($conexion, $blog_config['post_porpag'])?>

<section class="paginacion">
	<ul>

		<?php if (pagina_actual() == 1): ?>
		<li><a href="" class="disabled">&laquo;</a></li>
		<?php else: ?>
		<li><a href="index.php?pagina=<?php echo pagina_actual() - 1; ?>">&laquo;</a></li>
		<?php endif?>

		<?php for ($i = 1; $i <= $num_paginas; $i++): ?>

		<?php if (pagina_actual() == $i): ?>
		<li><a href="index.php?pagina=<?php echo $i ?>" class="active"> <?php echo $i ?> </a></li>
		<?php else: ?>
		<li><a href="index.php?pagina= <?php echo $i ?>"><?php echo $i ?></a></li>
		<?php endif?>

		<?php endfor;?>


		<?php if (pagina_actual() == $num_paginas): ?>
		<li><a href="" class="disabled">&raquo;</a></li>
		<?php else: ?>
		<li><a href="index.php?pagina= <?php echo pagina_actual() + 1; ?>"> &raquo;</a></li>
		<?php endif?>


		<!--
		<li><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">&raquo;</a></li>
		-->

	</ul>
</section>
