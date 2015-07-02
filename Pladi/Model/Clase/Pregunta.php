<?php namespace Pladi\Model\Clase;
	
	use Pladi\Helpers\Security as SS;
	use Pladi\Model\Clase\Categoria as Category;
	use Pladi\Model\Clase\Usuario as User;

	class Pregunta 
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
		}
		
		/*	**	*/

		/*		 ID PREGUNTA		*/
		
		private $id_pregunta;
		
		public function setId($id_pregunta = 0)
		{
			$id_pregunta = SS::clean_input($id_pregunta);

			$this->id_pregunta = $id_pregunta > 0 ? $id_pregunta : 0;
		}
		public function getId()
		{
			return $this->id_pregunta;
		}
		
		/*	**	*/

		/*		 TITULO		*/
		
		private $titulo;
		
		public function setTitulo($titulo = "")
		{
			$titulo = SS::clean_input($titulo);

			$this->titulo = $titulo != "" ? $titulo : "Establecido por defecto";
		}
		public function getTitulo()
		{
			return $this->titulo;
		}
		
		/*	**	*/

		/*		 CUERPO		*/
		
		private $cuerpo;
		
		public function setCuerpo($cuerpo = "")
		{
			$cuerpo = SS::clean_input($cuerpo);

			$this->cuerpo = $cuerpo != "" ? $cuerpo : "Establecido por defecto";
		}
		public function getCuerpo()
		{
			return $this->cuerpo;
		}
		
		/*	**	*/

		/*		 FECHA		*/
		
		private $fecha;
		
		public function setFecha($fecha)
		{
			$fecha = SS::clean_input($fecha);

			date_default_timezone_set('America/Lima');
			$date = date('Y-m-d H:i:s');

			$this->fecha = $fecha != "" ? $fecha : $date;
		}
		public function getFecha()
		{
			return $this->fecha;
		}
		
		/*	**	*/

		/*		 RESPUESTAS		*/
		
		private $respuestas;
		
		public function setRespuestas($respuestas = 0)
		{
			$respuestas = SS::clean_input($respuestas);

			$this->respuestas = $respuestas > 0 ? $respuestas : 0;
		}
		public function getRespuestas()
		{
			return $this->respuestas;
		}
		
		/*	**	*/

		/*		 ULTIMA RESPUESTA		*/
		
		private $ult_respuesta;
		
		public function setUltimaRespuesta($ult_respuesta = "")
		{
			$ult_respuesta = SS::clean_input($ult_respuesta);

			$this->ult_respuesta = $ult_respuesta != "" ? $ult_respuesta : NULL;
		}
		public function getUltimaRespuesta()
		{
			return $this->ult_respuesta;
		}
		
		/*	**	*/

		/*		 FK ID USUARIO		*/
		
		private $fk_id_usuario;
		
		public function setIdUsuario($fk_id_usuario = 0)
		{
			$fk_id_usuario = SS::clean_input($fk_id_usuario);

			$this->fk_id_usuario = $fk_id_usuario > 0 ? $fk_id_usuario : 0;
		}
		public function getIdUsuario()
		{
			return $this->fk_id_usuario;
		}
		
		/*	**	*/

		/*		 DENUNCIAS		*/
		
		private $denuncias;
		
		public function setDenuncias($denuncias = 0)
		{
			$denuncias = SS::clean_input($denuncias);

			$this->denuncias = $denuncias > 0 ? $denuncias : 0;
		}
		public function getDenuncias()
		{
			return $this->denuncias;
		}
		
		/*	**	*/

		/*		 FK ID CATEGORIA		*/
		
		private $fk_id_categoria;
		
		public function setIdCategoria($fk_id_categoria = 0)
		{
			$fk_id_categoria = SS::clean_input($fk_id_categoria);

			$this->fk_id_categoria = $fk_id_categoria > 0 ? $fk_id_categoria : 0;
		}
		public function getIdCategoria()
		{
			return $this->fk_id_categoria;
		}
		
		/*	**	*/

		/*		OBJETO CATEGORIA 		*/
		
		private $categoria;
		
		public function setCategoria(Category $categoria = null)
		{
			$this->categoria = is_object($categoria) ? $categoria : null;
		}
		public function getCategoria()
		{
			return $this->categoria;
		}
		
		/*	**	*/

		/*		OBJETO USUARIO 		*/
		
		private $usuario;

		public function setUsuario(User $usuario = null)
		{
			$this->usuario = is_object($usuario) ? $usuario : null;
		}
		public function getUsuario()
		{
			return $this->usuario;
		}

		/*	**	*/

		/*		 OBJETO RESPUESTAS		*/
		
		private $obj_respuestas;
		
		public function setOBJRespuestas($obj_respuestas = NULL)
		{
			$this->obj_respuestas =  is_array($obj_respuestas) ? $obj_respuestas : NULL;
		}
		public function getOBJRespuestas()
		{
			return $this->obj_respuestas;
		}
		
		/*	**	*/

	}

/*		FIN CLASS PREGUNTA		*/