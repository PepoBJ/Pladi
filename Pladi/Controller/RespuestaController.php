<?php namespace Pladi\Controller;
	
	use Pladi\Core\ControladorBase;
	use Pladi\Model\RespuestaModel as RM;
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
	}

/*		FIN CLASS RESPUESTA CONTROLLER		*/