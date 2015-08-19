<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$helper->pladi_favicon();?>
	<title>Pladi - Home</title>
	<link rel="stylesheet" href="/css/ed-grid.css">
	<link rel="stylesheet" href="/css/menu-footer.css">
	<link rel="stylesheet" href="/css/formulario.css">
	<link rel="stylesheet" href="/css/home.css">
	<link rel="stylesheet" href="/css/admin.css">
</head>
<body>
	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?= $helper->pladi_home_menu_admin($usuario->getNombre()); ?>
			</nav>
		</div>
	</header>
	
	<main id="principal">
		
		<?php if(isset($respuestas)): ?>
			<div id="respuestas">			
				<?php foreach($respuestas as $respuesta): ?>
					<article class="respuesta_item limpiar">
					<div class="grupo">
						<div class="caja respuesta__titulo base-90 tablet-80">
							<p><?=$respuesta->getTitulo()?></p>
						</div>
						<div class="caja respuesta__eliminar base-10 tablet-20 derecha-contenido">
							<a class="icon-cerrar espacio eliminar_respuesta" data-id="<?=$respuesta->getId()?>"></a>
						</div>
						<div class="caja respuesta__fecha base-90 tablet-80 izquierda-contenido">							
							<p><?=$helper->fecha_amigable($respuesta->getFecha())?></p>
						</div>
						<div class="caja respuesta__denuncias base-10 tablet-20 derecha-contenido">
							<p>
								<svg class="svg-bolt svg-icon" viewBox="0 0 20 20"><g><polygon points="14,7.4 9,7.4 9,1 4,11.6 9,11.6 9,18"></polygon></g></svg>
								<span><?=$respuesta->getDenuncias()?></span>
							</p>
						</div>
					</div>
					</article>
				<?php endforeach; ?>				
			</div>
		<?php else: ?>
			<div class="grupo">
				<div class="caja sin__preguntas">
					<h2 class="error">No hay Respuestas Denunciadas</h2>
				</div>
			</div>
		<?php endif; ?>


	</main>

	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/eventos.js"></script>	
	<script src="/js/banear.js"></script>	
</body>
</html> 