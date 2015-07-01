<?php namespace Pladi\Model\Clase;
		
	use Pladi\Helpers\Security as SS;

	class Categoria
	{
		/*		CONSTRUCTOR 		*/
		
		public function __construct ()
		{
		}
		
		/*	**	*/

		/*		 ID CATEGORIA		*/
		
		private $id_categoria;
		
		public function setId($id_categoria)
		{
			$id_categoria = SS::clean_input($id_categoria);

			$this->id_categoria = $id_categoria > 0 ? $id_categoria : 0;
		}
		public function getId()
		{
			return $this->id_categoria;
		}
		
		/*	**	*/

		/*		 NOMBRE CATEGORIA		*/
		
		private $nombre;
		
		public function setNombre($nombre = "")
		{
			$nombre = SS::clean_input($nombre);

			$this->nombre = $nombre != "" ? $nombre : "Establecido por defecto";
		}
		public function getNombre()
		{
			return $this->nombre;
		}
		
		/*	**	*/

	}

	/*		FIN CLASS CATEGORIA		*/