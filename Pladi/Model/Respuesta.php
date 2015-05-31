<?php namespace Pladi\Model;

	use Pladi\Core\BaseModel;

	class Respuesta extends BaseModel
	{
		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = "Respuesta";
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		 ID RESPUESTA		*/
		
		private $id_respuesta;
		
		public function setId($id_respuesta = 0)
		{
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
				"INSERT INTO `respuesta` (
					`titulo`,
					`cuerpo`,
					`fecha`,
					`denuncias`,
					`fk_id_pregunta`) 
				VALUES ( 
					'" . $this->getTitulo() . "',
					'" . $this->getCuerpo() . "',
					'" . $this->getFecha() . "',
					'" . $this->getDenuncias() . "',
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
				"UPDATE `respuesta` SET 
					`titulo` = '" . $this->getTitulo() . "' ,
					`cuerpo` = '" . $this->getCuerpo() . "'  ,
					`denuncias` = '" . $this->getDenuncias() . "'    
				WHERE id_respuesta = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete()
		{
			$save = $this->runSql(
				"DELETE FROM `respuesta` 
					WHERE id_respuesta = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/
	}

	/*		FIN CLASS RESPUESTA		*/