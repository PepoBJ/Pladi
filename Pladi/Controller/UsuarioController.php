<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\Categoria as UM;

	class UsuarioController extends ControladorBase
	{
		public function index()
		{
			
			/*UM::saveUser('Robert', 'Huaman Caceres', 'Robert@gmail.com', '123456', 'normal', 'activo', 'Robert.jpg', 'https://twitter.com/Robert', 'https://facebook.com/Robert');
			UM::saveUser('Juan', 'Estrada Escalante', 'Juan@gmail.com', '123456', 'normal', 'activo', 'Juan.jpg', 'https://twitter.com/Juan', 'https://facebook.com/Juan');
			UM::saveUser('Elio', 'Bustamante Damte', 'Elio@gmail.com', '123456', 'normal', 'activo', 'Elio.jpg', 'https://twitter.com/Elio', 'https://facebook.com/Elio');
		*/
			

		$ct = new UM();

		$ct->setNombre('Programacion2');
		$ct->setId(1);
		$ct->delete();
		var_dump($ct->getAll());

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

		public function get($id = NULL)
		{
			

			echo '<pre>';
			var_dump(UM::id($id));	
		}
	}