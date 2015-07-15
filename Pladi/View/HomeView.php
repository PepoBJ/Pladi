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
		<div id="preguntar">
			<?php if(@$misPreguntas):?>
			<div class="caja">
				<div class="grupo">
					<h2 class="mis-preguntas">Mis Preguntas</h2>
				</div>
			</div>
			<?php endif;?>
			<div class="grupo">
				<div class="caja">
					<p id="error"></p>
				</div>
			</div>
			<div class="grupo">
				<div class="caja base-100">
					<p id="toggle-preguntar">¿Tienes una pregunta?</p>
				</div>
			</div>
			<form onsubmit="return false;" data-id="<?=$usuario->getId()?>" class="formulario__preguntar" method="POST" name="preguntar">
				<div class="grupo">
					<div class="formulario__campo limpiar">
						<div class="caja base-100 tablet-20">
							<span class="formulario__subtitulo">Título:</span>
						</div>
						<div class="caja base-100 tablet-80">
							<input name="titulo" value="" placeholder="Título de tu pregunta" class="formulario__pregunta__titulo" type="text" required autocomplete="off">
						</div>
					</div>
					<div class="formulario__campo limpiar">
						<div class="caja base-100 tablet-20">
							<span class="formulario__subtitulo">Cuerpo:</span>
						</div>
						<div class="caja base-100 tablet-80">
							<textarea name="cuerpo" placeholder="¿Tienes una pregunta?" class="formulario__pregunta__cuerpo" type="text" required></textarea>
						</div>
					</div>
					<div class="formulario__campo limpiar">
						<div class="caja  base-100 tablet-20">
							<span class="formulario__subtitulo">Categoría:</span>
						</div>
						<div class="caja base-100 tablet-80">							
							<select name="categoria" class="formulario__pregunta__categoria" required>							  	
							  	<?php foreach($categorias as $key => $categoria) :?>
									<option value="<?=$categoria->getId()?>"><?=$categoria->getNombre()?></option>
							  	<?php endforeach;?>
							</select> 
						</div>
					</div>
					<div class="caja tablet-50 web-30 centrar-contenido centro limpiar">
						<input class="formulario__enviar base-100 " type="submit" value="Preguntar!">
					</div>

				</div>
			</form>
		</div>
		<div id="preguntas">
			<?php foreach($preguntas as $key => $pregunta):?>
				<div class="grupo">
					<article class="pregunta limpiar" data-id="<?=$pregunta->getId()?>">
						<div class="caja desde-tablet tablet-15">
							<img class="circulo centro tablet-50" src="<?= $pregunta->getUsuario()->getPerfilUsuario()->getFoto(true) != NULL ? $pregunta->getUsuario()->getPerfilUsuario()->getFoto(true) : '/img/users/template.png' ?>" alt="user imagen profile">
						</div>
						<div class="caja tablet-85">
							<header class="pregunta__titulo centrar-contenido">
								<h2><?=$pregunta->getTitulo()?></h2>
							</header>
							<section class="pregunta__cuerpo">
								<div class="pregunta__autor__fecha">
									<a href="<?=$helper->url('usuario','get', $pregunta->getUsuario()->getId())?>" class="pregunta__autor icon-usuario espacio"><?=$pregunta->getUsuario()->getNombre() . ' ' . $pregunta->getUsuario()->getApellido() ?></a>
									<span class="pregunta__fecha derecha"><time><?=$helper->fecha_amigable($pregunta->getFecha())?></time></span>
								</div>
								<div class="pregunta__texto">
									<p><?=$pregunta->getCuerpo()?></p>
								</div>							
							</section>
							<footer class="pregunta__footer">
								<a href="<?=$helper->url('categoria', 'filter', $pregunta->getIdCategoria())?>" class="pregunta__categoria"><?=$pregunta->getCategoria()->getNombre()?></a>
								<a class="pregunta__comentarios toogle__comentario">
									<svg class="svg-bubble svg-icon" viewBox="0 0 20 20">
										<g>
											<path d="M6.6,12.6l-3.1,3.1 l0-10.3c0-0.7,0.5-1.2,1.2-1.2h10.6c0.7,0,1.2,0.5,1.2,1.2v6c0,0.7-0.5,1.2-1.2,1.2H6.6z"></path>
										</g>
										<g>
											<path d="M3.5,11.4v-6c0-0.7,0.5-1.2,1.2-1.2 h10.6c0.7,0,1.2,0.5,1.2,1.2v6c0,0.7-0.5,1.2-1.2,1.2H4.7C4,12.6,3.5,12.1,3.5,11.4z"></path>
											<polygon points=" 6.6,12.6 3.5,15.8 3.5,11.6 "></polygon>
										</g>
									</svg>
									<span><?=$pregunta->getRespuestas()?></span>
								</a>
								<a class="pregunta__denuncias">
									<svg class="svg-bolt svg-icon" viewBox="0 0 20 20"><g><polygon points="14,7.4 9,7.4 9,1 4,11.6 9,11.6 9,18"></polygon></g></svg>
									<span><?=$pregunta->getDenuncias()?></span>
								</a>
								<a class="pregunta__denunciar derecha" data-id="<?=$pregunta->getId()?>">Denunciar</a>
							</footer>
						</div>
						<div class="limpiar"></div>
						<?php if($pregunta->getOBJRespuestas()): ?>
						<aside class="respuestas limpiar">							
							<?php foreach($pregunta->getOBJRespuestas() as $index => $respuesta ):?>
								<div class="respuesta limpiar" data-id="<?=$respuesta->getId()?>">
									<div class="caja respuesta__borde base-95 tablet-75">
										<header class="respuesta__titulo centrar-contenido">
											<h2><?=$respuesta->getTitulo()?></h2>
										</header>
										<section class="respuesta__cuerpo">
											<div class="respuesta__fecha derecha-contenido">
												<span><time><?=$helper->fecha_amigable($respuesta->getFecha())?></time></span>
											</div>
											<div class="respuesta__texto">
												<p><?=$respuesta->getCuerpo()?></p>
											</div>							
										</section>
										<footer class="respuesta__footer">
											<a class="respuesta__denuncias">
												<svg class="svg-bolt svg-icon" viewBox="0 0 20 20"><g><polygon points="14,7.4 9,7.4 9,1 4,11.6 9,11.6 9,18"></polygon></g></svg>
												<span><?=$respuesta->getDenuncias()?></span>
											</a>
											<a class="respuesta__denunciar derecha" data-id="<?=$respuesta->getId()?>">Denunciar</a>
										</footer>
									</div>
								</div>
							<?php endforeach;?>							
						</aside>
						<?php endif;?>
					</article>
				</div>
			<?php endforeach;?>
		</div>
	</main>

	<!-- scripts-->
	<script src="/js/jquery.js"></script>
	<script src="/js/home.js"></script>
	<script src="/js/eventos.js"></script>	
</body>
</html> 