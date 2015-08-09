<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\NotificacionModel as NM;
	use Pladi\Helpers\Request as HR;
	use Pladi\Model\UsuarioModel as UM;

	class NotificacionController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			$this->redirect();
		}
		
		/*	**	*/

		/*		NOTIFICACION REAL TIME 		*/
		
		public function realTime()
		{
			session_start();
			
			if (HR::is_ajax() && isset($_SESSION['user'])) 
			{
				$notificacion = NM::getNotifyRealTime($_SESSION['user']['id']);

				$data   = array("exito" => $notificacion->notifys > 0 ? true : false);
				
				$helper = new \Pladi\Core\HelpersView();
				
				if($data['exito'])
				{
					$data['notifys'] = $notificacion->notifys;
				}
				
				$data   = json_encode($data);
			    echo $data;	    
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/

		/*		MIS NOTIFICACIONES 		*/
		
		public function misNotificaciones()
		{
			session_start();
			
			if (isset($_SESSION['user'])) 
			{
				$user = UM::id($_SESSION['user']['id']);

				$data = array(
					"usuario"    => $user,
					"notificaciones" => NM::notifyUser($_SESSION['user']['id'])
				);
				NM::notifyCheck($_SESSION['user']['id']);
				$this->view('Notificacion/MisNotificaciones', $data);
			}
			else
			{
				$this->redirect();
			}
		}
		
		/*	**	*/
	}

/*		FIN CLASS CONTROLLER NOTIFICACIONES		*/