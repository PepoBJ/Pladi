<?php namespace Pladi\Model;

	use Pladi\Model\Action\Categoria as ACategoria;
	use Pladi\Model\Clase\Categoria as CCategoria;

	class CategoriaModel
	{

		/*		CONSTANTES NAMESPACE CATEGORIA 		*/
		
		const CATEGORIA_NAMESPACE = 'Pladi\Model\Clase\Categoria';
		
		/*	**	*/

		/*		CONSTRUCTOR 		*/
			
		public function __construct()
		{
			
		}
		
		/*	**	*/

		/*		TODAS LAS CATEGORIAS 		*/
		
		public static function all()
		{
			$a_categoria = new ACategoria();

			$categorias = $a_categoria->getAll(self::CATEGORIA_NAMESPACE);

			if(! isset($categorias)) return null;

			return $categorias;
		}
		
		/*	**	*/

		/*		CATEGORIO POR ID 		*/
		
		public static function id($id)
		{
			$a_categoria = new ACategoria();

			$cateoria = $a_categoria->getById($id, self::CATEGORIA_NAMESPACE);

			if(!isset($cateoria)) return null;

			return $cateoria;

		}
		
		/*	**	*/

		/*		BUSQUEDA DE CATEGORIAS 		*/
		
		public static function busqueda($nombre)
		{
			$a_categoria = new ACategoria();
			$categorias = $a_categoria->runSql(
							"SELECT * FROM " . $a_categoria->table() . " WHERE nombre LIKE '%$nombre%'",
							self::CATEGORIA_NAMESPACE);
			
			if (! is_object($categorias) && ! is_array($categorias)) return null;

			return $categorias;
		}
		
		/*	**	*/

		/*		SAVE CATEGORIA 		*/
		
		public static function saveCategory( $nombre )
		{
			$a_categoria = new ACategoria();
			$c_categoria = new CCategoria();

			$c_categoria->setNombre($nombre);


			return $a_categoria->save($c_categoria);
		}
		
		/*	**	*/

		/*		UPDATE CATEGORIA 		*/
		
		public static function updateCategory($id, $nombre)
		{
			$a_categoria = new ACategoria();

			$c_categoria = new CCategoria();
			$c_categoria->setNombre($nombre);
			$c_categoria->setId($id);

			return $a_categoria->update($c_categoria);
		}
		
		/*	**	*/

		/*		DELETE CATEGORIA 		*/
		
		public static function deleteCategory($id)
		{
			$a_categoria = new ACategoria();

			$c_categoria = new CCategoria();
			$c_categoria->setId($id);

			return $a_categoria->delete($c_categoria);
		}
		
		/*	**	*/

	}

	/*		FIN CLASS CATEGORIA MODEL		*/