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
</head>
<body>
	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?= $helper->pladi_home_menu($usuario->getNombre())?>	
			</nav>
		</div>
	</header>
	
	<main id="principal">
		<div id="notificaciones">
			<div class="grupo">
				<div class="caja">
					<h2 class="mis-notificaciones">Mis Notificaciones</h2>
				</div>
			</div>

		<?php if(isset($notificaciones) && (is_object($notificaciones) || is_array($notificaciones))): ?>
		
		<?php 
			if(is_object($notificaciones))
				$notificaciones = array($notificaciones);
		?>

		<?php foreach($notificaciones as $notificacion): ?>
			<div class="grupo notificacion <?= $notificacion->visto == 0 ? 'no-visto' : 'si-visto' ?>" data-id="<?=$notificacion->id_notificacion?>" data-idPregunta="<?=$notificacion->fk_id_pregunta?>">
				<div class="caja">
					<span class="titulo"><?=$notificacion->titulo?></span>
				</div>
				<div class="caja base-80">
					<span class="fecha"><?=$helper->fecha_amigable($notificacion->fecha)?></span>
				</div>
				<div class="caja base-20">
					<span class="visto <?= $notificacion->visto == 0 ? 'icon-cerrar' : 'icon-aceptar' ?> derecha"></span>
				</div>
			</div>
		<?php endforeach; ?>

		<?php else: ?>
			
		<div class="grupo">
			<div class="caja sin__preguntas">
				<h2 class="error">No tienes notificaciones</h2>
			</div>
		</div>

		<?php endif; ?>
		</div>
	</main>
	
	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/home.js"></script>
	<script src="/js/eventos.js"></script>	
</body>
</html> 