<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\CategoriaModel as CM;

	class CategoriaController extends ControladorBase
	{

		/*		INDEX 		*/
		
		public function index()
		{
			echo '<pre>';
			var_dump(CM::all());
		}
		
		/*	**	*/

		public function crear()
		{
			var_dump(CM::saveCategory('programación'));
			var_dump(CM::saveCategory('Java'));
			var_dump(CM::saveCategory('C++'));
			var_dump(CM::saveCategory('Dev-cpp'));
			var_dump(CM::saveCategory('Redes'));
			var_dump(CM::saveCategory('Apache'));
		}

		public function id($id = -1)
		{
			var_dump(CM::id($id));
		}

		public function busqueda()
		{
			var_dump(CM::busqueda('a'));	
		}
	}


	/*		FIN CLASS CONTROLLER CATEGORIA		*/