<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\PreguntaModel as PM;

	class PreguntaController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';
			PM::deleteQuestion(2, "titulo test", "este es el cuerpo", "", 5);
			var_dump(PM::all());
		}
		
		/*	**	*/

	}

/*		FIN CLASS CONTROLLER PREGUNTA		*/