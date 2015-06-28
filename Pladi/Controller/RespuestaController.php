<?php namespace Pladi\Controller;
	
	use Pladi\Core\ControladorBase;
	use Pladi\Model\RespuestaModel as RM;

	class RespuestaController extends ControladorBase 
	{

		public function index()
		{
			echo '<pre>';

			var_dump(RM::all());
		}

	}

/*		FIN CLASS RESPUESTA CONTROLLER		*/