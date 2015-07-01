<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Pefil de <?= $usuario->getNombre()?></title>
	<link rel="stylesheet" href="/css/ed-grid.css">
	<link rel="stylesheet" href="/css/menu-footer.css">
	<link rel="stylesheet" href="/css/perfil-usuario.css">
</head>
<body>
	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?= $helper->pladi_menu() ?>				
			</nav>			
		</div>
	</header>

	<main id="main">
		<section id="perfil">
			<div class="grupo">
				<div class="perfil__imagen caja tablet-50 web-30">
					<img class="movil-40 tablet-70 centro circulo" src="<?= $usuario->getPerfilUsuario()->getFoto() != NULL ? $usuario->getPerfilUsuario()->getFoto() : '/img/users/template.png'?>" alt="">
				</div>
				<div class="perfil__informacion caja tablet-50 web-70">					
					<div class="grupo no-padding">
						<div class="informacion__url caja centrar-contenido">
							<a href="<?= $helper->url('usuario', 'get', $usuario->getId());?>">
								@<?= $usuario->getNombre() ?>
							</a>
						</div>
						<div class="informacion__nombre caja">
							<a href="#" class="icon-usuario espacio"><?= $usuario->getNombre() . " " . $usuario->getApellido();?></a>
						</div>
						<div class="imformacion__email caja">
							<a href="#" class="icon-correo espacio"><?=$usuario->getEmail();?></a>
						</div>
						<div class="informacion__twitter caja">
							<a href="<?=$usuario->getPerfilUsuario()->getTwitter();?>" class="icon-twitter espacio">Twitter/<?= $usuario->getNombre()?></a>
						</div>
						<div class="informacion__facebook caja">
							<a href="<?=$usuario->getPerfilUsuario()->getFacebook();?>" class="icon-facebook espacio">Facebook/<?= $usuario->getNombre()?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/eventos.js"></script>
</body>
</html>