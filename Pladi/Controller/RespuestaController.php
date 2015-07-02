<?php namespace Pladi\Controller;
	
	use Pladi\Core\ControladorBase;
	use Pladi\Model\RespuestaModel as RM;
	use Pladi\Helpers\Request as HR;

	class RespuestaController extends ControladorBase 
	{

		public function index()
		{
			echo '<pre>';
			//RM::saveReply("probando", "esta es una respuesta de prueba", "", "", 1);
			var_dump(RM::all());
		}

		public function question($id)
		{
			echo '<pre>';

			var_dump(RM::replysForQuestionId($id));
		}

		public function denunciar()
		{
			session_start();

			if (HR::is_ajax() && isset($_POST['id']) && isset($_SESSION['user'])) 
			{
				$result = RM::denunciarRespuesta($_POST['id']);
				$data = array("exito" => $result );
			    $data = json_encode($data);
			    echo $data;	    
			}
			else
			{
				$this->redirect();
			}
		}
	}

/*		FIN CLASS RESPUESTA CONTROLLER		*/