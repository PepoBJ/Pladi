<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;
	use Pladi\Model\UsuarioModel as UM;

	class IndexController extends ControladorBase
	{
		public function index()
		{
			$data = array( 'usuarios' => UM::all() );

			$this->view('Index', $data);
		}
	}