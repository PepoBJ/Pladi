<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\NotificacionModel as NM;

	class NotificacionController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';
			
			var_dump(NM::all());
		}
		
		/*	**	*/

	}

/*		FIN CLASS CONTROLLER NOTIFICACIONES		*/