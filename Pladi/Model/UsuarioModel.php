<?php namespace Pladi\Model;
	
	use Pladi\Model\Clase\Usuario as CUsuario;
	use Pladi\Model\Action\Usuario as AUsuario;
	use Pladi\Model\Clase\PerfilUsuario as CPerfilUsuario;
	use Pladi\Model\Action\PerfilUsuario as APerfilUsuario;

	class UsuarioModel 
	{

		/*		CONSTANTE NAMESPACES CLASE USUARIO Y PERFIL 		*/
		
		const USER_NAMESPACE   = 'Pladi\Model\Clase\Usuario';
		const PERFIL_NAMESPACE = 'Pladi\Model\Clase\PerfilUsuario';
		
		/*	**	*/



		/*		CONSTRUCTOR		*/

		public function __construct()
		{

		}
		/*	**	*/

		/*		TODOS LOS USUARIOS 		*/
		
		public static function all()
		{
			$a_user = new AUsuario();
			
			$users  = $a_user->getAll(self::USER_NAMESPACE);

			if (!isset($users)) return null;

			$a_profile = new APerfilUsuario();

			foreach ($users as $index => $user_actual) {
				
				$user_profile = $a_profile->getBy('fk_id_usuario', $user_actual->getId(), self::PERFIL_NAMESPACE)[0];
				
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
			$a_user = new AUsuario();
			$user_actual = $a_user->getById($id, self::USER_NAMESPACE);

			if (!isset($user_actual)) return null;

			$a_profile    = new APerfilUsuario();
			
			$user_profile = $a_profile->getBy('fk_id_usuario', $user_actual->getId(), self::PERFIL_NAMESPACE)[0];

			if ( isset($user_profile))
			{
				$user_actual->setPerfilUsuario($user_profile);
			}

			return $user_actual;
		}
		
		/*	**	*/

		/*		BUSQUEDA DE USUARIOS 		*/
		
		public static function busqueda($campo, $patron)
		{
			$a_user = new AUsuario();
			$users = $a_user->runSql(
							"SELECT * FROM " . $a_user->table() . " WHERE $campo LIKE '%$patron%'",
							self::USER_NAMESPACE);
			
			if (! is_object($users) && ! is_array($users)) return null;

			$a_profile = new APerfilUsuario();

			foreach ($users as $index => $user_actual) {
				
				$user_profile = $a_profile->getBy('fk_id_usuario', $user_actual->getId(), self::PERFIL_NAMESPACE)[0];
				
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
			$a_user = new AUsuario();
			$user_actual = $a_user->getBy("email", $email, self::USER_NAMESPACE)[0];

			if (!isset($user_actual)) return null;

			$a_profile    = new APerfilUsuario();
			
			$user_profile = $a_profile->getBy('fk_id_usuario', $user_actual->getId(), self::PERFIL_NAMESPACE)[0];

			if ( isset($user_profile))
			{
				$user_actual->setPerfilUsuario($user_profile);
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
				@session_start();
				$_SESSION['user']['id']    = $user->getId();
				$_SESSION['user']['email'] = $user->getEmail();
				return true;
			}

			return false;
		}
		
		/*	**	*/

		/*		LOGOUT 		*/
		
		public static function logout()
		{
			@session_start();
			unset($_SESSION['user']);
		}		
		
		/*	**	*/

		/*		SAVE USUARIO 		*/
		
		public static function saveUser($nombre, $apellido, $email, $contrasena, $tipo = "normal", $estado = "activo", $foto = NULL, $twitter = NULL, $facebook = NULL)
		{
			$a_user = new AUsuario();

			$c_user = new CUsuario();
			$c_user->setNombre($nombre);
			$c_user->setApellido($apellido);
			$c_user->setEmail($email);
			$c_user->setContrasena($contrasena);
			$c_user->setTipo($tipo);
			$c_user->setEstado($estado);

			if ($a_user->save($c_user))
			{
				$c_user = static::busquedaPorEmail($email);

				$a_profile = new APerfilUsuario();

				$c_profile = new CPerfilUsuario();
				$c_profile->setFoto($foto);
				$c_profile->setTwitter($twitter);
				$c_profile->setFacebook($facebook);
				$c_profile->setIdUsuario($c_user->getId());
				
				return array(true, $a_profile->save($c_profile));
			}
			return array(false, false);
		}

		/*	**	*/
		

		/*		UPDATE USUARIO 		*/
		
		public static function updateUser($id, $nombre, $apellido, $email, $contrasena, $tipo = "normal", $estado = "activo")
		{
			$a_user = new AUsuario();

			$c_user = new CUsuario();
			$c_user->setNombre($nombre);
			$c_user->setApellido($apellido);
			$c_user->setEmail($email);
			$c_user->setContrasena($contrasena);
			$c_user->setTipo($tipo);
			$c_user->setEstado($estado);
			$c_user->setId($id);

			return $a_user->update($c_user);			
		}
		
		/*	**	*/

		/*		DELTE USUARIO 		*/
		
		public static function deleteUser($id)
		{
			$a_user = new AUsuario();

			$c_user = new CUsuario();
			$c_user->setId($id);

			return $a_user->delete($c_user);			
		}
		
		/*	**	*/

		/*		SAVE USUARIO PROFILE		*/

		public static function saveUserProfile($idUsuario, $foto = NULL, $twitter = NULL, $facebook = NULL)
		{		
			$a_profile = new APerfilUsuario();

			$c_profile = new CPerfilUsuario();	
			$c_profile->setFoto($foto);
			$c_profile->setTwitter($twitter);
			$c_profile->setFacebook($facebook);
			$c_profile->setIdUsuario($idUsuario);
			
			return $a_profile->save($c_profile);
		}
		
		/*	**	*/

		/*		UPDATE USUARIO PROFILE 		*/
		
		public static function updateUserProfile($id, $foto = NULL, $twitter = NULL, $facebook = NULL)
		{			
			$a_profile = new APerfilUsuario();

			$c_profile = new CPerfilUsuario();
			$c_profile->setFoto($foto);
			$c_profile->setTwitter($twitter);
			$c_profile->setFacebook($facebook);
			$c_profile->setIdUsuario($id);
			
			return $a_profile->update($c_profile);
		}
		
		/*	**	*/

		/*		DELETE USUARIO PROFILE 		*/
		
		public static function deleteUserProfile($id)
		{	
			$a_profile = new APerfilUsuario();

			$c_profile = new CPerfilUsuario();
			$c_profile->setIdUsuario($id);
			
			return $a_profile->delete($c_profile);
		}
		
		/*	**	*/

	}

/*		FIN CLASS USUARIO MODELO		*/