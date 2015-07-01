<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
	
	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/eventos.js"></script>
</body>
</html> 