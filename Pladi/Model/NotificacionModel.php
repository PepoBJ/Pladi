<?php namespace Pladi\Model;

	use Pladi\Model\Action\Notificacion as ANotificacion;
	use Pladi\Model\Clase\Notificacion as CNotificacion;

	class NotificacionModel 
	{

		/*		CONSTANTE NAMESPACE NOTIFICACION 		*/
		
		const NOTIFICACION_CONSTANTE = 'Pladi\Model\Clase\Notificacion';
		
		/*	**	*/

		/*		CONSTRUCTOR 		*/
		
		public function __construct ()
		{

		}
		
		/*	**	*/

		/*		TODAS LAS NOTIFICACIONES 		*/
		
		public static function all () 
		{
			$a_notificacion = new ANotificacion();

			$notificaciones = $a_notificacion->getAll(self::NOTIFICACION_CONSTANTE);

			if(! isset($notificaciones)) return null;

			return $notificaciones;
		}
		
		/*	**	*/

		/*		NOTIFICACION POR ID 		*/
		
		public static function id($id)
		{
			$a_notificacion = new ANotificacion();
			
			$notificacion   = $a_notificacion->getById($id, self::NOTIFICACION_CONSTANTE);

			if(! isset($notificacion)) return null;

			return $notificacion;
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public static function saveNotify($fecha, $visto, $id_pregunta)
		{
			$a_notificacion = new ANotificacion();
			$c_notificacion = new CNotificacion();

			$c_notificacion->setFecha($fecha);
			$c_notificacion->setVisto($visto);
			$c_notificacion->setIdPregunta($id_pregunta);

			return $a_notificacion->save($c_notificacion);
		}
		
		/*	**	*/

		/*		UPDATE 		*/
		
		public static function updateNotify($id, $visto)
		{
			$a_notificacion = new ANotificacion();

			$c_notificacion = new CNotificacion();
			$c_notificacion->setId($id);
			$c_notificacion->setVisto($visto);

			return $a_notificacion->update($c_notificacion);
		}
		
		/*	**	*/

		/*		DELETE 		*/
		
		public static function deleteNotify($id)
		{
			$a_notificacion = new ANotificacion();

			$c_notificacion = new CNotificacion();
			$c_notificacion->setId($id);

			return $a_notificacion->delete($c_notificacion);
		}
		
		/*	**	*/

	}

/*		FIN CLASS NOTIFICACION MODEL		*/