<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;
	use Pladi\Helpers\Request as HR;

	class PreguntaController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';

			var_dump(PM::id(1));
		}
		
		/*	**	*/

		public function denunciar()
		{
			session_start();

			if (HR::is_ajax() && isset($_POST['id']) && isset($_SESSION['user'])) 
			{
				$result = PM::denunciarPregunta($_POST['id']);
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

/*		FIN CLASS CONTROLLER PREGUNTA		*/