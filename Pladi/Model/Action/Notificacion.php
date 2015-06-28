<?php  namespace Pladi\Model\Action;
	
	use Pladi\Core\ModeloBase;
	use Pladi\Model\Clase\Notificacion as Notify;

	class Notificacion extends ModeloBase 
	{

		/*		CONSTRUCTOR 		*/
		
		public function __construct () 
		{
			$table = 'notificacion';
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save(Notify $notify)
		{
			$save = $this->runSql(
				"INSERT INTO `notificacion` (
					`fecha`,
					`visto`,
					`fk_id_pregunta`) 
				VALUES ( 
					'" . $notify->getFecha() . "',
					'" . $notify->getVisto() . "',
					'" . $notify->getIdPregunta() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update(Notify $notify)
		{
			$save = $this->runSql(
				"UPDATE `notificacion` SET 
					`visto` = '" . $notify->getVisto() . "'   
				WHERE id_notificacion = '" . $notify->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete(Notify $notify)
		{
			$save = $this->deleteById($notify->getId());

			return $save;
		}
		
		/*	**	*/

	} 
	
/*		FIN CLASS ACTION NOTIFICACION		*/