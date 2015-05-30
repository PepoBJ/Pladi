<?php namespace Pladi\Model;
	
	use Pladi\Core\ModeloBase;

	class PerfilUsuario extends ModeloBase
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = "perfil_usuario";
        	parent::__construct($table);

		}
		
		/*	**	*/		

		/*		 ID PERFIL USUARIO		*/
		
		private $id_perfil_usuario;
		
		public function setId($id)
		{
			$this->id_perfil_usuario = $id > 0 ? $id : 0;
		}
		public function getId()
		{
			return $this->id_perfil_usuario;
		}
		
		/*	**	*/

		/*		 FOTO		*/
		
		private $foto;
		
		public function setFoto($foto)
		{
			$this->foto = $foto != "" ? $foto : NULL ;
		}
		public function getFoto()
		{
			return $this->foto;
		}
		
		/*	**	*/

		/*		 TWITTER		*/
		
		private $twitter;
		
		public function setTwitter($twitter)
		{
			$this->twitter = $twitter != "" ? $twitter : NULL;
		}
		public function getTwitter()
		{
			return $this->twitter;
		}
		
		/*	**	*/

		/*		 FACEBOOK		*/
		
		private $facebook;
		
		public function setFacebook($facebook)
		{
			$this->facebook = $facebook != "" ? $facebook : NULL;
		}
		public function getFacebook()
		{
			return $this->facebook;
		}
		
		/*	**	*/

		/*		 ID USUARIO		*/
		
		private $fk_id_usuario;
		
		public function setIdUsuario($idUsuario)
		{
			$this->fk_id_usuario = $idUsuario > 0 ? $idUsuario : 0;
		}
		public function getIdUsuario()
		{
			return $this->fk_id_usuario;
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save()
		{
			$save = $this->runSql(
				"INSERT INTO `perfil_usuario` (
					`foto`, 
					`twitter`, 
					`facebook`, 
					`fk_id_usuario`) 
				VALUES ( 
					'" . $this->getFoto() . "', 
					'" . $this->getTwitter() . "', 
					'" . $this->getFacebook() . "', 
					'" . $this->getIdUsuario() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	
	}

/*		FIN CLASS USUARIO PERFIL 		*/