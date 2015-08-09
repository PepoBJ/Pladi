<?php namespace Pladi\Model;

	use Pladi\Model\Action\Notificacion as ANotificacion;
	use Pladi\Model\Clase\Notificacion as CNotificacion;
	use Pladi\Helpers\Security as HS;


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

		/*		NOTIFICACION REAL TIME 		*/
		
		public static function getNotifyRealTime($id)
		{
			$id = HS::clean_input($id);

			$a_notificacion = new ANotificacion();
			$notificaciones = $a_notificacion->runSql("select count(*) as notifys from notificacion n inner join pregunta p on n.fk_id_pregunta = p.id_pregunta inner join usuario u on u.id_usuario = p.fk_id_usuario and n.visto = 0 and u.id_usuario = " . $id);

			if (! is_object($notificaciones) && ! is_array($notificaciones)) return null;

			return $notificaciones;
		}
		
		/*	**	*/

		/*		PONER EN VISTO LAS NOTIFICACIONES 		*/
		
		public static function notifyCheck($id_user)
		{
			$id_user = HS::clean_input($id_user);
			$a_notificacion = new ANotificacion();
			
			$notificacion   = $a_notificacion->runSql("update notificacion n, pregunta p, usuario u set n.visto = 1 where u.id_usuario = p.fk_id_usuario and u.id_usuario = $id_user", self::NOTIFICACION_CONSTANTE);

			if(! isset($notificacion)) return null;

			return $notificacion;	
		}
		
		/*	**	*/

		/*		NOTIFICACIONES POR USUARIO		*/
		
		public static function notifyUser($id_user)
		{
			$id_user = HS::clean_input($id_user);
			$a_notificacion = new ANotificacion();
			
			$notificacion   = $a_notificacion->runSql("select n.* from notificacion n inner join pregunta p on n.fk_id_pregunta = p.id_pregunta inner join usuario u on u.id_usuario = p.fk_id_usuario and u.id_usuario = $id_user ORDER BY `n`.`visto` ASC, n.fecha DESC", self::NOTIFICACION_CONSTANTE);

			if(! isset($notificacion)) return null;

			return $notificacion;
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