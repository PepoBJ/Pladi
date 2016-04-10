<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$helper->pladi_favicon();?>
	<title>Pladi - Home</title>
	<?= $helper->css('ed-grid')?>
	<?= $helper->css('menu-footer')?>
	<?= $helper->css('formulario')?>
	<?= $helper->css('home')?>
	<?= $helper->css('admin')?>
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
		
		<?php if(isset($usuarios)): ?>
			<div id="usuarios">			
				<?php foreach($usuarios as $usuario): ?>
					<article class="usuario limpiar">
					<div class="grupo base-tabla">
						<div class="caja desde-tablet tablet-15 web-20">
							<img id="<?=$usuario->getId();?>" class="usuario__imagen circulo medio" src="<?= $usuario->getPerfilUsuario()->getFoto(true) != NULL ? $usuario->getPerfilUsuario()->getFoto(true) : $helper->base_url().'/img/users/template.png' ?>" alt="user <?=$usuario->getNombre()?>">
						</div>
						<div class="caja movil-50 tablet-45 web-60 medio">
							<p><a href="#" class="icon-usuario espacio"><?= $usuario->getNombre() . " " . $usuario->getApellido();?></a></p>
							<p><a href="#" class="icon-correo espacio"><?=$usuario->getEmail();?></a></p>
						</div>
						<div class="caja movil-50 tablet-40 web-20 medio">
							<p><a target="_blank" href="https://www.twitter.com/<?=$usuario->getPerfilUsuario()->getTwitter();?>" class="icon-twitter espacio">Twitter/<?= $usuario->getNombre()?></a></p>
							<p><a target="_blank" href="https://www.facebook.com/<?=$usuario->getPerfilUsuario()->getFacebook();?>" class="icon-facebook espacio">Facebook/<?= $usuario->getNombre()?></a></p>
						</div>
					</div>
					</article>
				<?php endforeach; ?>				
			</div>
		<?php else: ?>
			<div class="grupo">
				<div class="caja sin__preguntas">
					<h2 class="error">No hay usuarios</h2>
				</div>
			</div>
		<?php endif; ?>


	</main>

	<!-- scripts-->
	<?= $helper->js('jquery')?>
	<?= $helper->js('variables-globales')?>
	<?= $helper->js('eventos')?>
</body>
</html> 