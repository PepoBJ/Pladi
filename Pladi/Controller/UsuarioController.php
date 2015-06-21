<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	use Pladi\Model\UsuarioModel as UM;

	class UsuarioController extends ControladorBase
	{
		public function index()
		{
			echo '<pre>';
			print_r(UM::all());
		}

		public function get($id)
		{
			$data = array ( 'usuario' => UM::id($id));
			$this->view('usuario/perfil', $data);
		}
	}