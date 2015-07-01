<?php namespace Pladi\Model\Clase;
	
	use Pladi\Helpers\Security as SS;

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
			$id = SS::clean_input($id);

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
			$nombre = SS::clean_input($nombre);

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
			$apellido = SS::clean_input($apellido);

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
			$email = SS::clean_input($email);

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
			$contrasena = SS::clean_input($contrasena);

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
			$tipo = SS::clean_input($tipo);

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
			$estado = SS::clean_input($estado);

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