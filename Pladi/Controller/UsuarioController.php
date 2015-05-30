<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\UsuarioModel as UM;

	class UsuarioController extends ControladorBase
	{
		public function index()
		{
			
			/*UM::save('Robert', 'Huaman Caceres', 'Robert@gmail.com', '123456', 'normal', 'activo', 'Robert.jpg', 'https://twitter.com/Robert', 'https://facebook.com/Robert');
			UM::save('Juan', 'Estrada Escalante', 'Juan@gmail.com', '123456', 'normal', 'activo', 'Juan.jpg', 'https://twitter.com/Juan', 'https://facebook.com/Juan');
			UM::save('Elio', 'Bustamante Damte', 'Elio@gmail.com', '123456', 'normal', 'activo', 'Elio.jpg', 'https://twitter.com/Elio', 'https://facebook.com/Elio');
		*/

		UM::deleteUserProfile(2);
        //Cargamos la vista index y le pasamos valores
	        /*$this->view("Index",array(
	            "allusers"=> UM::all(),
	            "Hola"    =>"Soy Víctor Robles"
	        ));*/
		}
		public function all()
		{
			echo '<pre>';
			var_dump(UM::all());
		}
	}