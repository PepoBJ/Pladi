<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\UsuarioModel as UM;
	use Pladi\Model\PreguntaModel as PM;

	class IndexController extends ControladorBase
	{
		
		/*		INDEX 		*/
		
		public function index()
		{
			$data = array( 'usuarios' => UM::all() );

			$this->view('Index', $data);
		}
		
		/*	**	*/

		/*		LOGIN 		*/
		
		public function login()
		{
			session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$this->redirect('index', 'home');
			}

			$data = array(
				"email" => "",
				"error" => ""
			);

			if(!empty($_POST) && isset($_POST))
			{
				if(UM::login($_POST['email'], $_POST['password']))
				{
					$this->redirect('index', 'home');
				}
				else
				{
					$data = array(
						"email" => $_POST['email'],
						"error" => "Inicio de Sesion Incorrecto"
					);
				}
			}

			$this->view('Login', $data);

		}
		
		/*	**	*/

		/*		LOGOUT 		*/
		
		public function logout()
		{
			UM::logout();
			$this->redirect();
		}
		
		/*	**	*/
		
		/*		REGISTRO 		*/
		
		public function registro()
		{
			@session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$this->redirect('index', 'home');
			}

			$data = array(
				"email"    => "",
				"error"    => "",
				"nombre"   => "",
				"apellido" => ""
			);

			if(!empty($_POST) && isset($_POST))
			{
				$data = array(
					"nombre"   => $_POST['nombre'],
					"apellido" => $_POST['apellido'],
					"email"    => $_POST['email'],
					"error"    => "Registro Incorrecto"
				);

				if(UM::busquedaPorEmail($_POST['email']) != NULL) 
				{
					$data["error"] = "El email ya fue registrado";
				}
				elseif (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 10) 
				{
					$data["error"] = "La contraseña tiene longitud erronea [8-10]";
				}
				elseif (! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
				{
					$data["error"] = "El email tiene formato erroneo";
				}
				elseif (strlen($_POST['password']) == 0 || strlen($_POST['nombre']) == 0 || 
						strlen($_POST['email']) == 0 || strlen($_POST['apellido']) == 0 )
				{
					$data["error"] = "Todos los campos son necesarios";
				}
				else 
				{
					$out = UM::saveUser($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password']);

					if ($out[0])
					{
						if(UM::login($_POST['email'], $_POST['password']))
						{
							$this->redirect('usuario', 'profile');
						}	
					}
				}
			}

			$this->view('Registro', $data);
		}
		
		/*	**	*/

		/*		HOME 		*/
		
		public function home()
		{
			session_start();
			
			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario"    => $user,
					"preguntas"  => PM::all()
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