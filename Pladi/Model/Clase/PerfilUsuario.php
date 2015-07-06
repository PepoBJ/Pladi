<?php namespace Pladi\Model\Clase;
	
	use Pladi\Helpers\Security as SS;

	class PerfilUsuario 
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{

		}
		
		/*	**	*/		

		/*		CONSTANTE - PATH - IMG 		*/
		
		const PATH = "/img/users/";
		
		/*	**	*/

		/*		 ID PERFIL USUARIO		*/
		
		private $id_perfil_usuario;
		
		public function setId($id)
		{
			$id = SS::clean_input($id);

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
			$foto = SS::clean_input($foto);

			$this->foto = $foto != "" ? $foto : NULL ;
		}
		public function getFoto($path = false)
		{
			if ($this->foto == NULL) return NULL;
			
			if($path) return self::PATH . $this->foto;

			return $this->foto;
		}
		
		/*	**	*/

		/*		 TWITTER		*/
		
		private $twitter;
		
		public function setTwitter($twitter)
		{
			$twitter = SS::clean_input($twitter);

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
			$facebook = SS::clean_input($facebook);

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
			$idUsuario = SS::clean_input($idUsuario);

			$this->fk_id_usuario = $idUsuario > 0 ? $idUsuario : 0;
		}
		public function getIdUsuario()
		{
			return $this->fk_id_usuario;
		}
		
		/*	**	*/
	}

/*		FIN CLASS USUARIO PERFIL 		*/