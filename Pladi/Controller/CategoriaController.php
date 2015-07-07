<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\CategoriaModel as CM;
	use Pladi\Model\PreguntaModel as PM;
	use Pladi\Model\UsuarioModel as UM;

	class CategoriaController extends ControladorBase
	{
		public function index()
		{
			$this->redirect();
		}

		public function filter($id)
		{
			session_start();
			
			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$preguntas = PM::getQuestionCategory($id);

				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario" => $user,
					"preguntas" => $preguntas
				);

				if(! isset($preguntas) || empty($preguntas)) $this->view('Errors/404', $data);
				else $this->view('Home', $data);
			}
			else
			{
				$this->redirect();
			}
		}
	}


	/*		FIN CLASS CONTROLLER CATEGORIA		*/