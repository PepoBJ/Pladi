<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$helper->pladi_favicon();?>
	<title>No se encontro</title>
	<link rel="stylesheet" href="/css/ed-grid.css">
	<link rel="stylesheet" href="/css/menu-footer.css">
	<link rel="stylesheet" href="/css/formulario.css">
	<link rel="stylesheet" href="/css/http-errors.css">

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
		<div class="grupo">
			<div class="caja centrar-contenido">
				<h1 class="error__titulo">NO SE ENCONTRO LO QUE BUSCABAS</h1>
			</div>
			<div class="caja">
				<img class="base-100 error__imagen" src="/img/404.jpg" alt="Error 404">
			</div>
		</div>
	</main>

	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/eventos.js"></script>	
</body>
</html>