<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$helper->pladi_favicon();?>
	<title>Registro - Pladi</title>
	<?= $helper->css('ed-grid')?>
	<?= $helper->css('menu-footer')?>
	<?= $helper->css('formulario')?>
	<?= $helper->css('home')?>
	<?= $helper->css('profile')?>
</head>
<body>
	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?php if($usuario->getTipo() == "admin"): ?>
					<?= $helper->pladi_home_menu_admin($usuario->getNombre()); ?>
				<?php else : ?>
					<?= $helper->pladi_home_menu($usuario->getNombre())?>	
				<?php endif; ?>				
			</nav>			
		</div>
	</header>

	<main id="profile">
		<form class="formulario" action="<?= $helper->url('usuario', 'profileUpdate');?>" method="post" name="update_profile" enctype="multipart/form-data">
			<div class="grupo">
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__titulo">Perfil Usuario</span>
				</div>				
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__error"><?=$error?></span>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__exito"><?=$exito?></span>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<img class="formulario__imagen base-30 circulo" src="<?=$usuario_foto?>" alt="User <?=$usuario_nombre?>">
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Nombre:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="nombre" value="<?= $usuario_nombre ?>" placeholder="Ingresa tu Nombre" class="formulario__nombre" type="text" required>
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Apellido:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="apellido" value="<?= $usuario_apellido ?>" placeholder="Ingresa tu Apellido" class="formulario__apellido" type="text" required>
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Email:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="email" value="<?= $usuario_email ?>" placeholder="Ingresa tu Email" class="formulario__email" type="email" required>
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Twitter:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="twitter" value="<?= $usuario_twitter ?>" placeholder="Ingresa tu Twitter" class="formulario__twitter" type="text" required>
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Facebook:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="facebook" value="<?= $usuario_facebook ?>" placeholder="Ingresa tu Facebook" class="formulario__facebook" type="text" required>
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Contraseña:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="password" placeholder="Ingresa tu Contraseña" class="formulario__password" type="password" maxlength="10" minlength="8" required>
					</div>
				</div>
				<div class="formulario__campo">
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<span class="formulario__subtitulo">Foto:</span>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro">
						<input name="foto" placeholder="Ingresa tu Foto" class="formulario__foto" type="file">
					</div>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input class="formulario__enviar" type="submit" value="Guardar Cambios">
				</div>
			</div>
		</form>
	</main>

	<!-- scripts-->
	<?= $helper->js('jquery')?>
	<?= $helper->js('variables-globales')?>
	<?= $helper->js('eventos')?>
	<?= $helper->js('profile')?>
</body>
</html> 