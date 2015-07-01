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

		public function home()
		{
			session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				die('hola bienvenido');
			}
			else
			{
				$this->redirect();
			}
		}
	}