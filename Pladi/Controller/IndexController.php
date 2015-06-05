<?php namespace Pladi\Controller;

	use Pladi\Core\ControladorBase;

	class IndexController extends ControladorBase
	{
		public function index()
		{
			$this->view('Index');
		}
	}