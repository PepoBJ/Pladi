<?php namespace Pladi\Model\Action;

	use Pladi\Model\Clase\Usuario as User;
	use Pladi\Core\ModeloBase;

	class Usuario extends ModeloBase
	{
		/*		CONSTRUCTO 		*/
		
		public function __construct()
		{
			$table = 'usuario';
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save(User $user)
		{
			$save = $this->runSql(
				"INSERT INTO `usuario` (
					`nombre`, 
					`apellido`, 
					`email`, 
					`contrasena`,
					`tipo`, 
					`estado`) 
				VALUES ( 
					'" . $user->getNombre() . "', 
					'" . $user->getApellido() . "', 
					'" . $user->getEmail() . "', 
					'" . md5($user->getContrasena()) . "', 
					'" . $user->getTipo() . "', 
					'" . $user->getEstado() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update(User $user)
		{
			$save = $this->runSql(
				"UPDATE `usuario` SET 
					`nombre` = '" . $user->getNombre() . "', 
					`apellido` = '" . $user->getApellido() . "', 
					`email` = '" . $user->getEmail() . "', 
					`contrasena` ='" . md5($user->getContrasena()) . "',
					`tipo` = '" . $user->getTipo() . "', 
					`estado` = '" . $user->getEstado() . "' 
				WHERE id_usuario = '" . $user->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete(User $user)
		{
			$save = $this->deleteById($user->getId());

			return $save;
		}
		
		/*	**	*/
	}

	/*		FIN CLASS ACTIO USUARIO		*/