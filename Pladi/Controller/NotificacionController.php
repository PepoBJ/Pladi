<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\NotificacionModel as NM;

	class NotificacionController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';
			
			var_dump(NM::id(2));
		}
		
		/*	**	*/

	}

/*		FIN CLASS CONTROLLER NOTIFICACIONES		*/