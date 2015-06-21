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
				<div class="caja">
					<img class="centro circulo" src="<?= $usuario->getPerfilUsuario()->getFoto()?>" alt="">
				</div>
				<div class="caja">
					<h1><?= $usuario->getNombre() . " " . $usuario->getApellido();?></h1>
				</div>
			</div>
			<div class="grupo">
				<div class="caja"><?=$usuario->getEmail();?></div>
				<div class="caja"><?=$usuario->getTipo();?></div>
				<div class="caja"><?=$usuario->getEstado();?></div>
				<div class="caja"><?=$usuario->getPerfilUsuario()->getTwitter();?></div>
				<div class="caja"><?=$usuario->getPerfilUsuario()->getFacebook();?></div>
			</div>
		</section>
	</main>

	<footer id="footer">
		<?= $helper->pladi_footer()?>
	</footer>

	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/eventos.js"></script>
</body>
</html>