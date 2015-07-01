<?php namespace Pladi\Model\Action;

	use Pladi\Core\ModeloBase;
	use Pladi\Model\Clase\Respuesta as Reply;

	class Respuesta extends ModeloBase 
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = 'respuesta';
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save(Reply $reply)
		{
			$save = $this->runSql(
				"INSERT INTO `respuesta` (
					`titulo`,
					`cuerpo`,
					`fecha`,
					`denuncias`,
					`fk_id_pregunta`) 
				VALUES ( 
					'" . $reply->getTitulo() . "',
					'" . $reply->getCuerpo() . "',
					'" . $reply->getFecha() . "',
					'" . $reply->getDenuncias() . "',
					'" . $reply->getIdPregunta() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update(Reply $reply)
		{
			$save = $this->runSql(
				"UPDATE `respuesta` SET 
					`titulo`           = '" . $reply->getTitulo() . "' ,
					`cuerpo`           = '" . $reply->getCuerpo() . "'  ,
					`denuncias`        = '" . $reply->getDenuncias() . "'    
					WHERE id_respuesta = '" . $reply->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete(Reply $reply)
		{
			$save = $this->deleteById($reply->getId());

			return $save;
		}
		
		/*	**	*/

	}

/*		FIN CLASS ACTION RESPUESTA		*/