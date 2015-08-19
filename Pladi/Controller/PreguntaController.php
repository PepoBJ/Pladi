<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;
	use Pladi\Model\UsuarioModel as UM;
	use Pladi\Model\CategoriaModel as CM;
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

		/*		BANEAR 		*/
		
		public function banear()
		{
			session_start();

			if (HR::is_ajax() && isset($_POST['id_pregunta']) && isset($_SESSION['user'])) 
			{
				$result = PM::deleteQuestion($_POST['id_pregunta']);
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

		/*		PREGUNTAS - REAL TIME 		*/
		
		public function realTime()
		{
			session_start();
			
			if (HR::is_ajax() && isset($_POST['last_id']) && isset($_SESSION['user'])) 
			{
				$preguntas = PM::getQuestionRealTime($_POST['last_id']);

				$data   = array("exito" => count($preguntas) > 0 ? true : false);
				
				$helper = new \Pladi\Core\HelpersView();
				
				if($data['exito'])
				{
					$cuerpo = HC::pregunta_html($preguntas[0], $helper);
					$data['html_data'] = $cuerpo;
				}
				
				$data   = json_encode($data);
			    echo $data;	    
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/

		/*		PREGUNTA ID 		*/
		
		public function get($id)
		{
			session_start();
			$id = intval($id);

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']) && isset($id) && is_int($id))
			{				
				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario"      => $user,
					"categorias"   => CM::all(),
					"preguntas"    => array(PM::id($id)),
					"noRealTime"   => true
				);
				
				$this->view('Home', $data);
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
					"noRealTime"   => true,
					"categorias"   => CM::all(),
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

		/*		BUSCAR PREGUNTA - NOMBRE 		*/
		
		public function buscar()
		{
			session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario"      => $user,
					"misPreguntas" => true,
					"preguntas"    => isset($_POST['buscar']) ? PM::searchQuestion($_POST['buscar']) : null
				);
				
				$this->view('Pregunta/Buscar', $data);
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
					"preguntas" => PM::allDenied()
				);
				
				$this->view('Pregunta/Lista', $data);
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/

	}

/*		FIN CLASS CONTROLLER PREGUNTA		*/