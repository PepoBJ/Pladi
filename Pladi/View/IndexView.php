<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Pladi</title>
	<link rel="stylesheet" href="/css/ed-grid.css">
	<link rel="stylesheet" href="/css/index.css">
	<link rel="stylesheet" href="/css/menu-footer.css">
</head>
<body>
	
	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?= $helper->pladi_menu() ?>				
			</nav>
			<section id="banner">			
				<div class="grupo centrar-contenido">
					<div class="caja banner__descripcion">
						<span><?= $helper->frase() ?></span>
					</div>
					<div class="caja banner__boton">
						<button>Comienza Ahora</button>
					</div>
				</div>	
			</section>
		</div>
	</header>

	<main id="main">
		<section id="usuarios">
			<div class="grupo">
				<div class="caja">
					<h1 class="usuarios__titulo">Nuestra comunidad</h1>
				</div>
			</div>
			<div class="grupo">

				<?php for ($i = 0 ; $i < count($usuarios) && $i < 20 ; $i ++ ): ?>

					<div class="caja centrar-contenido base-50 movil-1-3 tablet-1-6 web-1-8">
						<img id="<?=$usuarios[$i]->getId();?>" class="usuario__imagen" src="<?= $usuarios[$i]->getPerfilUsuario()->getFoto()?>" alt="user template">
						<p class="usuario__nombre"><?=$usuarios[$i]->getNombre();?></p>
					</div>

				<?php endfor; ?>
				
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
	