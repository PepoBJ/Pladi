<?php namespace Pladi\Model\Clase;
	
	use Pladi\Helpers\Security as SS;

	class Notificacion
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
		}
		
		/*	**	*/

		/*		 ID NOTIFICACION		*/
		
		private $id_notificacion;
		
		public function setId($id_notificacion = 0)
		{
			$id_notificacion = SS::clean_input($id_notificacion);

			$this->id_notificacion = $id_notificacion > 0 ? $id_notificacion : 0;
		}
		public function getId()
		{
			return $this->id_notificacion;
		}
		
		/*	**	*/

		/*		 FECHA		*/
		
		private $fecha;
		
		public function setFecha($fecha = "")
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

		/*		 VISTO		*/
		
		private $visto;
		
		public function setVisto($visto = 0)
		{
			$visto = SS::clean_input($visto);

			$this->visto = $visto == 0 || $visto == 1 ? $visto : 0 ;
		}
		public function getVisto()
		{
			return $this->visto;
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

	/*		FIN CLASS NOTIFICACION		*/