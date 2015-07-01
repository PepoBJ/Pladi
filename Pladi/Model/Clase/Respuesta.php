<?php namespace Pladi\Model\Clase;
	
	use Pladi\Helpers\Security as SS;

	class Respuesta
	{
		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
		}
		
		/*	**	*/

		/*		 ID RESPUESTA		*/
		
		private $id_respuesta;
		
		public function setId($id_respuesta = 0)
		{
			$id_respuesta = SS::clean_input($id_respuesta);

			$this->id_respuesta = $id_respuesta > 0 ? $id_respuesta : 0;
		}
		public function getId()
		{
			return $this->id_respuesta;
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

		/*		 FK ID PREGUNTA		*/
		
		private $fk_id_pregunta;
		
		public function setIdPregunta($fk_id_pregunta = 0)
		{
			$fk_id_pregunta = SS::clean_input($fk_id_pregunta);

			$this->fk_id_pregunta = $fk_id_pregunta > 0 ? $fk_id_pregunta : 0;
		}
		public function getIdPregunta()
		{
			return $this->fk_id_pregunta;
		}
		
		/*	**	*/

	}

	/*		FIN CLASS RESPUESTA		*/