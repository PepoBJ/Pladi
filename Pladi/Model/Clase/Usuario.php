<?php namespace Pladi\Model\Clase;
	

	class Usuario 
	{

		/*		CONSTRUCTOR		*/

		public function __construct()
		{

		}
        			

		/*	**	*/

		/*		ID USUARIO 		*/

		private $id_usuario;

		public function setId($id = 0)
		{
			$this->id_usuario = $id > 0 ? $id : 0;
		}
		public function getId()
		{
			return $this->id_usuario;
		}
		
		/*	**	*/

		/*		NOMBRE 		*/

		private $nombre;

		public function setNombre($nombre = "")
		{
			$this->nombre = $nombre != "" ? $nombre : "establecido por defecto";
		}
		public function getNombre()
		{
			return $this->nombre;
		}
		
		/*	**	*/

		/*		 APELLIDO		*/
		
		private $apellido;
		
		public function setApellido($apellido = "")
		{
			$this->apellido = $apellido != "" ? $apellido : "establecido por defecto";
		}
		public function getApellido()
		{
			return $this->apellido;
		}
		
		/*	**	*/

		/*		 EMAIL		*/
		
		private $email;
		
		public function setEmail($email = "")
		{
			$this->email = $email != "" ? $email : "establecido por defecto";
		}
		public function getEmail()
		{
			return $this->email;
		}
		
		/*	**	*/

		/*		 CONTRASEÑA		*/
		
		private $contrasena;
		
		public function setContrasena($contrasena = "")
		{
			$this->contrasena = $contrasena != "" ? $contrasena : "establecido por defecto";
		}
		public function getContrasena()
		{
			return $this->contrasena;
		}
		
		/*	**	*/

		/*		 TIPO		*/
		
		private $tipo;
		
		public function setTipo($tipo = "")
		{
			$this->tipo = ( $tipo == "admin" || $tipo == "normal" ) ? $tipo : "normal";
		}
		public function getTipo()
		{	
			return $this->tipo;
		}
		
		/*	**	*/

		/*		 ESTADO		*/
		
		private $estado;
		
		public function setEstado($estado = "")
		{
			$this->estado = ( $estado == "activo" || $estado == "banneado" ) ? $estado : "banneado";
		}
		public function getEstado()
		{
			return $this->estado;
		}
		
		/*	**	*/

		/*		 PERFIL DE USUARIO		*/

		private $perfilUsuario;
		
		public function setPerfilUsuario(PerfilUsuario $perfilUsuario)
		{
			$this->perfilUsuario = $perfilUsuario != NULL ? $perfilUsuario : NULL;
		}
		public function getPerfilUsuario()
		{
			return $this->perfilUsuario;
		}
		
		/*	**	*/

		
	}
/*		FIN CLASS USUARIO 		*/