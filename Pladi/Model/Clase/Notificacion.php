<?php namespace Pladi\Model\Clase;

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
			$this->fk_id_pregunta = $fk_id_pregunta > 0 ? $fk_id_pregunta : 0;
		}
		public function getIdPregunta()
		{
			return $this->fk_id_pregunta;
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save()
		{
			$save = $this->runSql(
				"INSERT INTO `notificacion` (
					`fecha`,
					`visto`,
					`fk_id_pregunta`) 
				VALUES ( 
					'" . $this->getFecha() . "',
					'" . $this->getVisto() . "',
					'" . $this->getIdPregunta() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update()
		{
			$save = $this->runSql(
				"UPDATE `notificacion` SET 
					`visto` = '" . $this->getVisto() . "'   
				WHERE id_notificacion = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete()
		{
			$save = $this->runSql(
				"DELETE FROM `notificacion` 
					WHERE id_notificacion = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/
	}

	/*		FIN CLASS NOTIFICACION		*/