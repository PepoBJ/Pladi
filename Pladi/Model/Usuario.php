<?php namespace Pladi\Model;
	
	use Pladi\Core\ModeloBase;

	class Usuario extends ModeloBase
	{

		/*		CONSTRUCTOR		*/

		public function __construct()
		{
			$table = "usuario";
        	parent::__construct($table);
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

		/*		SAVE 		*/
		
		public function save()
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
					'" . $this->getNombre() . "', 
					'" . $this->getApellido() . "', 
					'" . $this->getEmail() . "', 
					'" . md5($this->getContrasena()) . "', 
					'" . $this->getTipo() . "', 
					'" . $this->getEstado() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

	}
/*		FIN CLASS USUARIO 		*/