<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;

	class PreguntaController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';

			var_dump(PM::id(1));
		}
		
		/*	**	*/

	}

/*		FIN CLASS CONTROLLER PREGUNTA		*/