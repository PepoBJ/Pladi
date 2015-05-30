<?php namespace Pladi\Model;

	class UsuarioModel 
	{

		/*		CONSTRUCTOR		*/

		public function __construct()
		{

		}
		/*	**	*/

		/*		TODOS LOS USUARIOS 		*/
		
		public static function all()
		{
			$user = new Usuario();
			$users = $user->getAll('Pladi\Model\Usuario');

			if (!isset($users)) return null;

			$profile = new PerfilUsuario();

			foreach ($users as $index => $user_actual) {
				
				$user_profile = $profile->getBy('fk_id_usuario', $user_actual->getId(), 'Pladi\Model\PerfilUsuario')[0];
				
				if ( ! isset($user_profile) ) continue;

				$user_actual->setPerfilUsuario( $user_profile );
				$users [$index] = $user_actual;

			}

			return $users;
		}
		
		/*	**	*/

		/*		USUARIO POR ID 		*/
		
		public static function id($id)
		{
			$user = new Usuario();
			$user_actual = $user->getById($id, 'Pladi\Model\Usuario');

			if (!isset($user_actual)) return null;

			$profile = new PerfilUsuario();

			$user_profile = $profile->getBy('fk_id_usuario', $user_actual->getId(), 'Pladi\Model\PerfilUsuario')[0];

			if ( isset($user_profile))
			{
				$user_actual->setPerfilUsuario($profile->getBy($user_profile));
			}

			return $user_actual;
		}
		
		/*	**	*/

		/*		BUSQUEDA DE USUARIOS 		*/
		
		public static function busqueda($campo, $patron)
		{
			$user = new Usuario();
			$users = $user->runSql(
							"SELECT * FROM " . $user->table() . " WHERE $campo LIKE '%$patron%'",
							'Pladi\Model\Usuario');

			if (!isset($users)) return null;

			$profile = new PerfilUsuario();

			foreach ($users as $index => $user_actual) {
				
				$user_profile = $profile->getBy('fk_id_usuario', $user_actual->getId(), 'Pladi\Model\PerfilUsuario')[0];
				
				if ( ! isset($user_profile) ) continue;

				$user_actual->setPerfilUsuario($user_profile);
				$users [$index] = $user_actual;

			}

			return $users;
		}
		
		/*	**	*/

		/*		BUSQUEDA PRECISA EMAIL 		*/
		
		public static function busquedaPorEmail($email)
		{
			$user = new Usuario();
			$user_actual = $user->getBy("email", $email, 'Pladi\Model\Usuario')[0];

			if (!isset($user_actual)) return null;

			$profile = new PerfilUsuario();

			$user_profile = $profile->getBy('fk_id_usuario', $user_actual->getId(), 'Pladi\Model\PerfilUsuario')[0];

			if ( isset($user_profile))
			{
				$user_actual->setPerfilUsuario($profile->getBy($user_profile));
			}
			
			return $user_actual;
		}
		
		/*	**	*/

		/*		LOGIN 		*/
		
		public static function login($email, $pass)
		{
			$user = static::busquedaPorEmail($email);

			if (!isset($user)) return false;
			
			if ($user->getContrasena() == md5($pass))
			{
				session_start();
				$_SESSION['user']['id'] = $user->getId();
				$_SESSION['user']['email'] = $user->getEmail();
			}

			return false;
		}
		
		/*	**	*/

		/*		LOGOUT 		*/
		
		public static function logout()
		{
			session_start();
			unset($_SESSION['user']);
		}		
		
		/*	**	*/

		/*		SAVE USUARIO 		*/
		
		public static function save($nombre, $apellido, $email, $contrasena, $tipo = "normal", $estado = "activo", $foto = NULL, $twitter = NULL, $facebook = NULL)
		{
			$user = new Usuario();
			$user->setNombre($nombre);
			$user->setApellido($apellido);
			$user->setEmail($email);
			$user->setContrasena($contrasena);
			$user->setTipo($tipo);
			$user->setEstado($estado);

			if ($user->save())
			{
				if ($foto != NULL || $twitter != NULL || $facebook != NULL)
				{
					$user = static::busquedaPorEmail($email);

					$profile = new PerfilUsuario();
					$profile->setFoto($foto);
					$profile->setTwitter($twitter);
					$profile->setFacebook($facebook);
					$profile->setIdUsuario($user->getId());
					
					return array(true, $profile->save());
				}
				return array(true, false);
			}
			return array(false, false);
		}

		public static function saveUserProfile($idUsuario, $foto = NULL, $twitter = NULL, $facebook = NULL)
		{			
			if ($foto != NULL || $twitter != NULL || $facebook != NULL)
			{
				$profile = new PerfilUsuario();
				$profile->setFoto($foto);
				$profile->setTwitter($twitter);
				$profile->setFacebook($facebook);
				$profile->setIdUsuario($idUsuario);
				
				return $profile->save();
			}
		}
		
		/*	**	*/

	}

/*		FIN CLASS USUARIO MODELO		*/