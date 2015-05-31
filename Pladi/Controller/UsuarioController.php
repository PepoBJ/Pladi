<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\UsuarioModel as UM;

	class UsuarioController extends ControladorBase
	{
		public function index()
		{
			
			/*UM::saveUser('Robert', 'Huaman Caceres', 'Robert@gmail.com', '123456', 'normal', 'activo', 'Robert.jpg', 'https://twitter.com/Robert', 'https://facebook.com/Robert');
			UM::saveUser('Juan', 'Estrada Escalante', 'Juan@gmail.com', '123456', 'normal', 'activo', 'Juan.jpg', 'https://twitter.com/Juan', 'https://facebook.com/Juan');
			UM::saveUser('Elio', 'Bustamante Damte', 'Elio@gmail.com', '123456', 'normal', 'activo', 'Elio.jpg', 'https://twitter.com/Elio', 'https://facebook.com/Elio');
		*/
			echo '<pre>';
			var_dump(UM::login('Robert@gmail.com', '12345'));
		//UM::deleteUser(2);
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

		public function get($id)
		{
			echo '<pre>';
			var_dump(UM::id($id));	
		}
	}