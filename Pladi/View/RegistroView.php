<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$helper->pladi_favicon();?>
	<title>Registro - Pladi</title>
	<?= $helper->css('ed-grid')?>
	<?= $helper->css('menu-footer')?>
	<?= $helper->css('registro')?>
	<?= $helper->css('formulario')?>
</head>
<body>
	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?= $helper->pladi_menu() ?>				
			</nav>			
		</div>
	</header>

	<main id="registro">
		<form class="formulario" action="<?= $helper->url('index', 'registro');?>" method="post" name="registro">
			<div class="grupo">
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__titulo">Registro</span>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__error"><?=$error?></span>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input name="nombre" value="<?= $nombre ?>" placeholder="Ingresa tu Nombre" class="formulario__nombre" type="text" required>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input name="apellido" value="<?= $apellido ?>" placeholder="Ingresa tu Apellido" class="formulario__apellido" type="text" required>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input name="email" value="<?= $email ?>" placeholder="Ingresa tu Email" class="formulario__email" type="email" required>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input name="password" title="8 caracteres minimos" placeholder="Ingresa tu Contraseña" class="formulario__password" type="password" maxlength="10" minlength="8" required>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input class="formulario__enviar" type="submit" value="Únete a Pladi">
				</div>
			</div>
		</form>
	</main>

	<!-- scripts-->
	<?= $helper->js('jquery')?>
	<?= $helper->js('variables-globales')?>
	<?= $helper->js('eventos')?>
</body>
</html> 