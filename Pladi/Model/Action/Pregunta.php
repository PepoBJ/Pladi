<?php namespace Pladi\Model\Action;

	use Pladi\Core\ModeloBase;
	use Pladi\Model\Clase\Pregunta as Question;


	class Pregunta extends ModeloBase
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = 'pregunta';
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save(Question $question)
		{
			$ult_respuesta = ($question->getUltimaRespuesta() == NULL) ? "NULL" : "'" . $question->getUltimaRespuesta() . "'";

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
					'" . $question->getTitulo() . "',
					'" . $question->getCuerpo() . "',
					'" . $question->getFecha() . "',
					'" . $question->getRespuestas() . "',
					$ult_respuesta,
					'" . $question->getIdUsuario() . "',
					'" . $question->getDenuncias() . "',
					'" . $question->getIdCategoria() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update(Question $question)
		{
			$save = $this->runSql(
				"UPDATE `pregunta` SET 
					`titulo` = '" . $question->getTitulo() . "' ,
					`cuerpo` = '" . $question->getCuerpo() . "'  ,
					`denuncias` = '" . $question->getDenuncias() . "' ,
					`fk_id_categoria` = '" . $question->getIdCategoria() . "'
				WHERE id_pregunta = '" . $question->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELETE 		*/
		
		public function delete(Question $question)
		{
			$save = $this->deleteById($question->getId());

			return $save;
		}
		
		/*	**	*/

	}

/*		FIN CLASS ACTION PREGUNTA		*/