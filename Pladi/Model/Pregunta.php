<?php namespace Pladi\Model;

	use Pladi\Core\BaseModel;

	class Pregunta extends BaseModel 
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = "pregunta";
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		 ID PREGUNTA		*/
		
		private $id_pregunta;
		
		public function setId($id_pregunta = 0)
		{
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

		/*		 RESPUESTAS		*/
		
		private $respuesta;
		
		public function setRespuestas($respuesta = 0)
		{
			$this->respuesta = $respuesta > 0 ? $respuesta : 0;
		}
		public function getRespuestas()
		{
			return $this->respuesta;
		}
		
		/*	**	*/

		/*		 ULTIMA RESPUESTA		*/
		
		private $ult_respuesta;
		
		public function setUltimaRespuesta($ult_respuesta = "")
		{
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
			$this->fk_id_categoria = $fk_id_categoria > 0 ? $fk_id_categoria : 0;
		}
		public function getIdCategoria()
		{
			return $this->fk_id_categoria;
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save()
		{
			$save = $this->runSql(
				"INSERT INTO `pregunta` (
					`titulo`,
					`cuerpo`,
					`fecha`,
					`respuestas`,
					`ult_respuesta`,
					`fk_id_usuario`,
					`denuncias`,
					`fk_id_categoria`) 
				VALUES ( 
					'" . $this->getTitulo() . "',
					'" . $this->getCuerpo() . "',
					'" . $this->getFecha() . "',
					'" . $this->getRespuestas() . "',
					'" . $this->getUltimaRespuesta() . "',
					'" . $this->getIdUsuario() . "',
					'" . $this->getDenuncias() . "',
					'" . $this->getIdCategoria() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update()
		{
			$save = $this->runSql(
				"UPDATE `pregunta` SET 
					`titulo` = '" . $this->getTitulo() . "' ,
					`cuerpo` = '" . $this->getCuerpo() . "'  ,
					`denuncias` = '" . $this->getDenuncias() . "' ,
					`fk_id_categoria` = '" . $this->getIdCategoria() . "'
				WHERE id_pregunta = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete()
		{
			$save = $this->runSql(
				"DELETE FROM `pregunta` 
					WHERE id_pregunta = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

	}

/*		FIN CLASS PREGUNTA		*/