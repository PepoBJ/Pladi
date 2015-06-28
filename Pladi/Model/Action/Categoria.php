<?php namespace Pladi\Model\Action;

	use Pladi\Model\Clase\Categoria as Category;
	use Pladi\Core\ModeloBase;

	class Categoria extends ModeloBase
	{
		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{
			$table = 'categoria';
			parent::__construct($table);
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public function save(Category $category)
		{
			$save = $this->runSql(
				"INSERT INTO `categoria` (
					`nombre`) 
				VALUES ( 
					'" . $category->getNombre() . "'
				);"
			);

			return $save;
		}
		
		/*	**	*/	

		/*		UPDATE 		*/
		
		public function update(Category $category)
		{
			$save = $this->runSql(
				"UPDATE `categoria` SET 
					`nombre` = '" . $category->getNombre() . "'  
				WHERE id_categoria = '" . $category->getId() . "' ;"
			);

			return $save;
		}
		
		/*	**	*/

		/*		DELTE 		*/
		
		public function delete(Category $category)
		{
			$save = $this->deleteById($category->getId());
			
			return $save;
		}
		
		/*	**	*/
	}

	/*		FIN CLASS ACTION CATEGORIA		*/