<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;

	class PreguntaController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';

			var_dump(PM::all()[0]);
		}
		
		/*	**	*/

	}

/*		FIN CLASS CONTROLLER PREGUNTA		*/