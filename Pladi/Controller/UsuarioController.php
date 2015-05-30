<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\UsuarioModel as UM;

	class UsuarioController extends ControladorBase
	{
		public function index()
		{
			//$out = UM::saveUserProfile(6,'Juan.jpg', 'https://twitter.com/Juan', 'https://facebook.com/Juan');
			$out = UM::save('Test', 'test', 'test@gmail.com', '123456', 'normal', 'activo', 'test.jpg', 'https://twitter.com/test', 'https://facebook.com/test');

			die(var_dump($out));
        //Cargamos la vista index y le pasamos valores
	        echo $this->view("Index",array(
	            "allusers"=> UM::all(),
	            "Hola"    =>"Soy Víctor Robles"
	        ));
		}
		public function adios()
		{
			echo 'chau';
		}
	}