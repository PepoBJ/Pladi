<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;
	use Pladi\Helpers\Request as HR;

	class PreguntaController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			$this->redirect();
		}
		
		/*	**	*/

		/*		DENUNCIAR 		*/
		
		public function denunciar()
		{
			session_start();

			if (HR::is_ajax() && isset($_POST['id']) && isset($_SESSION['user'])) 
			{
				$result = PM::denunciarPregunta($_POST['id']);
				$data   = array("exito" => $result );
				$data   = json_encode($data);
			    echo $data;	    
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/
		
		/*		PREGUNTAR 		*/
		
		public function preguntar()
		{
			session_start();
			
			if (HR::is_ajax() && isset($_POST['id']) && isset($_POST['id_category']) && isset($_POST['title']) && isset($_POST['body']) && isset($_SESSION['user'])) 
			{
				$data   = array("exito" => PM::saveQuestion($_POST['title'], $_POST['body'], "", 0, "", $_POST['id'], 0, $_POST['id_category']));
				$pregunta = PM::titulo($_POST['title']);

				$helper = new \Pladi\Core\HelpersView();

				$foto = $pregunta->getUsuario()->getPerfilUsuario()->getFoto(true) != NULL ? $pregunta->getUsuario()->getPerfilUsuario()->getFoto(true) : '/img/users/template.png' ;
				
				$cuerpo = '<div class="grupo">
					<article class="pregunta limpiar" data-id="'. $pregunta->getId() .'">
						<div class="caja desde-tablet tablet-15">
							<img class="circulo centro tablet-50" src="'.  $foto  .'" alt="user imagen profile">
						</div>
						<div class="caja tablet-85">
							<header class="pregunta__titulo centrar-contenido">
								<h2>'. $pregunta->getTitulo() .'</h2>
							</header>
							<section class="pregunta__cuerpo">
								<div class="pregunta__autor__fecha">
									<a href="'. $helper->url('usuario','get', $pregunta->getUsuario()->getId()) .'" class="pregunta__autor icon-usuario espacio">'. $pregunta->getUsuario()->getNombre() . ' ' . $pregunta->getUsuario()->getApellido()  .'</a>
									<span class="pregunta__fecha derecha"><time>'. $helper->fecha_amigable($pregunta->getFecha()) .'</time></span>
								</div>
								<div class="pregunta__texto">
									<p>'. $pregunta->getCuerpo() .'</p>
								</div>							
							</section>
							<footer class="pregunta__footer">
								<a href="'. $helper->url('categoria', 'filter', $pregunta->getIdCategoria()) .'" class="pregunta__categoria">'. $pregunta->getCategoria()->getNombre() .'</a>
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
									<span>'. $pregunta->getRespuestas() .'</span>
								</a>
								<a class="pregunta__denuncias">
									<svg class="svg-bolt svg-icon" viewBox="0 0 20 20"><g><polygon points="14,7.4 9,7.4 9,1 4,11.6 9,11.6 9,18"></polygon></g></svg>
									<span>'. $pregunta->getDenuncias() .'</span>
								</a>
								<a class="pregunta__denunciar derecha" data-id="'. $pregunta->getId() .'">Denunciar</a>
							</footer>
						</div>
						<div class="limpiar"></div>
					</article>
				</div>';

				$data['html_data'] = $cuerpo;
				$data   = json_encode($data);
			    echo $data;	    
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/
	}

/*		FIN CLASS CONTROLLER PREGUNTA		*/