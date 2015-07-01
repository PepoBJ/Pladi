<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\UsuarioModel as UM;

	class IndexController extends ControladorBase
	{
		public function index()
		{
			$data = array( 'usuarios' => UM::all() );

			$this->view('Index', $data);
		}

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

			if($_POST)
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
		public function logout()
		{
			UM::logout();
			$this->redirect();
		}

		public function registro()
		{
			session_start();

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

			if($_POST)
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
							$this->redirect('index', 'home');
						}	
					}
				}
			}

			$this->view('Registro', $data);
		}

		public function home()
		{
			session_start();
			
			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario" => $user
				);
				$this->view('Home', $data);
			}
			else
			{
				$this->redirect();
			}
		}
	}