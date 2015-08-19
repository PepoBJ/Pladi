<?php namespace Pladi\Controller;
	
	use Pladi\Core\ControladorBase;
	use Pladi\Model\RespuestaModel as RM;
	use Pladi\Model\UsuarioModel as UM;
	use Pladi\Helpers\Request as HR;
	use Pladi\Helpers\Content as HC;

	class RespuestaController extends ControladorBase 
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
				$result = RM::denunciarRespuesta($_POST['id']);
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

		/*		BANEAR 		*/
		
		public function banear()
		{
			session_start();

			if (HR::is_ajax() && isset($_POST['id_respuesta']) && isset($_SESSION['user'])) 
			{
				$result = RM::deleteReply($_POST['id_respuesta']);
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

		/*		RESPONDER 		*/
		
		public function responder()
		{
			session_start();
			
			if (HR::is_ajax() && isset($_POST['id'])&& isset($_POST['title']) && isset($_POST['body']) && isset($_SESSION['user'])) 
			{
				$data   = array("exito" => RM::saveReply($_POST['title'], $_POST['body'], "", 0, $_POST['id']));
				
				$respuesta = RM::id(1);
				$respuesta->setTitulo($_POST['title']);
				$respuesta->setCuerpo($_POST['body']);
				$respuesta->setFecha("");
				$respuesta->setIdPregunta($_POST['id']);
				$respuesta->setDenuncias(0);

				$helper = new \Pladi\Core\HelpersView();
				
				$cuerpo = HC::respuesta_html($respuesta, $helper);

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

		/*		PREGUNTA LISTA 		*/
		
		public function lista()
		{
			session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$user = UM::id($_SESSION['user']['id']);

				if($user->getTipo() != "admin") $this->redirect();

				$data = array(
					"usuario"  => $user,
					"respuestas" =>RM::allDenied()
				);
				
				$this->view('Respuesta/Lista', $data);
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/
	}

/*		FIN CLASS RESPUESTA CONTROLLER		*/