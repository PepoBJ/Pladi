<?php namespace Pladi\Controller;
	
	use Pladi\Core\ControladorBase;
	use Pladi\Model\RespuestaModel as RM;
	use Pladi\Helpers\Request as HR;

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
	}

/*		FIN CLASS RESPUESTA CONTROLLER		*/