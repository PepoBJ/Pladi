<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;
	use Pladi\Model\UsuarioModel as UM;
	use Pladi\Helpers\Request as HR;
	use Pladi\Helpers\Content as HC;

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
				
				$cuerpo = HC::pregunta_html($pregunta, $helper);

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

		/*		MIS PREGUNTAS - GET 		*/
		
		public function misPreguntas()
		{
			session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario"      => $user,
					"misPreguntas" => true,
					"preguntas"    => PM::getQuestionIdUser($user->getId())
				);
				$this->view('Home', $data);
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/
	}

/*		FIN CLASS CONTROLLER PREGUNTA		*/