<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\UsuarioModel as UM;
	use Pladi\Helpers\Request as HR;

	class UsuarioController extends ControladorBase
	{
		/*		INDEX 		*/
		
		public function index()
		{
			$this->redirect();
		}
		
		/*	**	*/

		/*		USUARIOS LISTA 		*/
		
		public function lista()
		{
			session_start();

			if(isset($_SESSION['user']['id']) && isset($_SESSION['user']['email']))
			{
				$user = UM::id($_SESSION['user']['id']);

				if($user->getTipo() != "admin") $this->redirect();

				$data = array(
					"usuario"  => $user,
					"usuarios" => UM::all()
				);
				
				$this->view('Usuario/Lista', $data);
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/

		/*		GET USUARIO [ID] 		*/
		
		public function get($id)
		{
			$usuario = UM::id($id);
			$data = array ( 'usuario' => $usuario );
			
			if(! isset($usuario) || empty($usuario)) $this->view('Errors/404');
			else $this->view('Usuario/Perfil', $data);
		}
		
		/*	**	*/

		/*		PERFIL USUARIO 		*/
		
		public function profile()
		{
			@session_start();
			if(isset($_SESSION['user']))
			{
				$usuario = UM::id($_SESSION['user']['id']);
				
				$data = array ( 
					'exito'            => '',
					'error'            => '',
					'usuario'		   => $usuario,
					'usuario_foto'     => $usuario->getPerfilUsuario()->getFoto(true),
					'usuario_nombre'   => $usuario->getNombre(),
					'usuario_apellido' => $usuario->getApellido(),
					'usuario_email'    => $usuario->getEmail(),
					'usuario_twitter'  => $usuario->getPerfilUsuario()->getTwitter(),
					'usuario_facebook' => $usuario->getPerfilUsuario()->getFacebook()
				);

				$this->view('Usuario/Profile', $data);
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/

		/*		POST PERFIL USUARIO 		*/
		
		public function profileUpdate()
		{
			@session_start();

			if(!empty($_POST) && isset($_POST) && isset($_SESSION['user']))
			{
				$usuario = UM::id($_SESSION['user']['id']);
				
				$data = array ( 
					'exito'            => '',
					'error'            => '',
					'usuario'          => $usuario,
					'usuario_foto'     => $usuario->getPerfilUsuario()->getFoto(true),
					'usuario_nombre'   => $_POST['nombre'],
					'usuario_apellido' =>  $_POST['apellido'],
					'usuario_email'    => $_POST['email'],
					'usuario_twitter'  => $_POST['twitter'],
					'usuario_facebook' =>  $_POST['facebook']
				);

				if(! HR::valid_facebook_username($_POST['facebook']))
				{
					$data["error"] = "Usuario de facebook incorrecto";
				}
				elseif(! HR::valid_twitter_username($_POST['twitter']))
				{
					$data["error"] = "Usuario de Twitter incorrecto";
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
						strlen($_POST['email']) == 0 || strlen($_POST['apellido']) == 0
						|| strlen($_POST['twitter']) == 0 || strlen($_POST['facebook']) == 0 )
				{
					$data["error"] = "Todos los campos son necesarios";
				}
				elseif($_POST['email'] === $usuario->getEmail() && ! UM::login($_POST['email'], $_POST['password']))
				{
					$data['error'] = "La contraseña es incorrecta";
				}
				elseif($_POST['email'] !== $usuario->getEmail() && UM::busquedaPorEmail($_POST['email']) != null)
				{
					$data['error'] = "El email ya fue registrado";
				}
				elseif(!UM::login($usuario->getEmail(), $_POST['password']))
				{
					$data['error'] = "La contraseña es incorrecta";
				}				
				else
				{

					if(UM::updateUser($usuario->getId(), $_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['password'], $usuario->getTipo(), $usuario->getEstado()))
					{
						$foto_bd = $usuario->getPerfilUsuario()->getFoto();

						if($_FILES['foto']["error"] == 0)
						{
							$mTmpFile = $_FILES["foto"]["tmp_name"];
							$mTipo = exif_imagetype($mTmpFile);

							
							$path_destino = getcwd().DIRECTORY_SEPARATOR;
							$type_array   = explode(".", $_FILES['foto']['name']);							
							$name_img     =  $path_destino . 'img/users/' . $_POST['nombre'] . '.' . $type_array[count($type_array) - 1];
							$foto         = $_FILES['foto']['tmp_name'];

							if(($mTipo != IMAGETYPE_JPEG) && ($mTipo != IMAGETYPE_PNG))
							{
								$data['error'] = "El formato de imagen no es correcto";
							}
							elseif(! move_uploaded_file($foto, $name_img))
							{
								$data['error'] = "No se pudo subir el archivo";
							}
							else
							{
								$foto_bd              =  $_POST['nombre'] . '.' . $type_array[count($type_array) - 1];
								$data['usuario_foto'] = "/img/users/" . $foto_bd;
							}
						}

						if(! UM::updateUserProfile($usuario->getId(), $foto_bd, $_POST['twitter'], $_POST['facebook']))
						{
							$data['error'] = "Ocurrio un error en la actualización[User-Profile]";
						}
						$data['exito'] = "Datos actualizados correctamente";
					}
					else
					{
						$data['error'] = "Ocurrio un error en la actualización";
					}
				}

				$this->view('Usuario/Profile', $data);
			}
			else
			{
				$this->redirect();
			}			
		}
		
		/*	**	*/
	}