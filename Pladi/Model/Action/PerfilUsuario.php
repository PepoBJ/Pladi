<?php namespace Pladi\Model\Action;

	use Pladi\Model\Clase\PerfilUsuario as UserProfile;
	use Pladi\Core\ModeloBase;

	class PerfilUsuario extends ModeloBase
	{
		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = 'perfil_usuario';
			parent::__construct($table);
		}
		
		/*	**	*/
		/*		SAVE 		*/
		
		public function save(UserProfile $user_profile)
		{
			$foto = ($user_profile->getFoto() == NULL) ? "NULL" : "'" . $user_profile->getFoto() . "'";
			$twitter = ($user_profile->getTwitter() == NULL) ? "NULL" : "'" . $user_profile->getTwitter() . "'";
			$facebook = ($user_profile->getFacebook() == NULL) ? "NULL" : "'" . $user_profile->getFacebook() . "'";

			$save = $this->runSql(
				"INSERT INTO `perfil_usuario` (
					`foto`, 
					`twitter`, 
					`facebook`, 
					`fk_id_usuario`) 
				VALUES ( 
					$foto, 
					$twitter, 
					$facebook, 
					'" . $user_profile->getIdUsuario() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update(UserProfile $user_profile)
		{

			$foto = ($user_profile->getFoto() == NULL) ? "NULL" : "'" . $user_profile->getFoto() . "'";
			$twitter = ($user_profile->getTwitter() == NULL) ? "NULL" : "'" . $user_profile->getTwitter() . "'";
			$facebook = ($user_profile->getFacebook() == NULL) ? "NULL" : "'" . $user_profile->getFacebook() . "'";

			$save = $this->runSql(
				"UPDATE `perfil_usuario` 
					SET `foto` = $foto, 
					`twitter` = $twitter, 
					`facebook` = $facebook 
				WHERE `fk_id_usuario` = '" . $user_profile->getIdUsuario() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELETE 		*/
		
		public function delete(UserProfile $user_profile)
		{
			$save = $this->runSql(
				"DELETE FROM `perfil_usuario` 
				WHERE `fk_id_usuario` = '" . $user_profile->getIdUsuario() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/
	}

	/*		FIN CLASS ACTION PERFIL USUARIO		*/