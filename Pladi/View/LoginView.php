<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?=$helper->pladi_favicon();?>
	<title>Login - Pladi</title>
	<link rel="stylesheet" href="/css/ed-grid.css">
	<link rel="stylesheet" href="/css/menu-footer.css">
	<link rel="stylesheet" href="/css/login.css">
	<link rel="stylesheet" href="/css/formulario.css">

</head>
<body>

	<header id="header">
		<div class="container"> 
			<nav id="menu">
				<?= $helper->pladi_menu() ?>				
			</nav>			
		</div>
	</header>

	<main id="login">
		<form class="formulario" action="<?= $helper->url('index', 'login');?>" method="post" name="login">
			<div class="grupo">
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__titulo">Login</span>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<span class="formulario__error"><?=$error?></span>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input name="email" value="<?= $email ?>" placeholder="Ingresa tu Email" class="formulario__email" type="email" required>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input name="password" placeholder="Ingresa tu Contraseña" class="formulario__password" type="password" maxlength="10" minlength="8" required>
				</div>
				<div class="caja tablet-50 web-30 centrar-contenido centro">
					<input class="formulario__enviar" type="submit" value="Entrar a Pladi">
				</div>
				<div class="caja tablet-50 web-30 centro">
					<a class="formulario__registro" href="<?= $helper->url('index', 'registro');?>">Regristro</a>
				</div>
			</div>
		</form>
	</main>
	
	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/eventos.js"></script>
</body>
</html> 