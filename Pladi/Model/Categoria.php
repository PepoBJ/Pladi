<?php namespace Pladi\Model;

	use Pladi\Core\ModeloBase;

	class Categoria extends ModeloBase
	{
		/*		CONSTRUCTOR 		*/
		
		public function __construct ()
		{
			$table = 'categoria';
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		 ID CATEGORIA		*/
		
		private $id_categoria;
		
		public function setId($id_categoria)
		{
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
			$this->nombre = $nombre != "" ? $nombre : "Establecido por defecto";
		}
		public function getNombre()
		{
			return $this->nombre;
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save()
		{
			$save = $this->runSql(
				"INSERT INTO `categoria` (
					`nombre`) 
				VALUES ( 
					'" . $this->getNombre() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update()
		{
			$save = $this->runSql(
				"UPDATE `categoria` SET 
					`nombre` = '" . $this->getNombre() . "'  
				WHERE id_categoria = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete()
		{
			$save = $this->runSql(
				"DELETE FROM `categoria` 
					WHERE id_categoria = '" . $this->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/
	}

	/*		FIN CLASS CATEGORIA		*/