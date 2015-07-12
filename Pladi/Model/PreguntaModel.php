<?php namespace Pladi\Model;

	use Pladi\Model\RespuestaModel as RM;
	use Pladi\Model\CategoriaModel as CM;
	use Pladi\Model\UsuarioModel as UM;
	use Pladi\Model\Action\Pregunta as APregunta;
	use Pladi\Model\Clase\Pregunta as CPregunta;
	use Pladi\Helpers\Security as HS;

	class PreguntaModel 
	{

		/*		CONSTANTE NAMESPACE PREGUNTA 		*/
		
		const PREGUNTA_NAMESPACE = 'Pladi\Model\Clase\Pregunta';
		
		/*	**	*/

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{

		}
		
		/*	**	*/

		/*		TODAS LAS PREGUNTAS 		*/
		
		public static function all()
		{
			$a_pregunta = new APregunta();
			
			$preguntas  = $a_pregunta->getAll(self::PREGUNTA_NAMESPACE);

			if(! isset($preguntas)) return null;

			foreach ($preguntas as $index => $pregunta_actual) {
				$pregunta_actual->setCategoria(CM::id($pregunta_actual->getIdCategoria()));
				$pregunta_actual->setUsuario(UM::id($pregunta_actual->getIdUsuario()));

				$respuestas = RM::replysForQuestionId($pregunta_actual->getId(), RM::RESPUESTA_NAMESPACE);

				if ( ! isset($respuestas) ) continue;

				$pregunta_actual->setOBJRespuestas($respuestas);				
				$preguntas[$index] = $pregunta_actual;

			}

			return $preguntas;
		}
		
		/*	**	*/

		/*		PREGUNTA POR ID 		*/
		
		public static function id($id)
		{
			$a_pregunta = new APregunta();
			
			$pregunta   = $a_pregunta->getById($id, self::PREGUNTA_NAMESPACE);

			if(! isset($pregunta)) return null;

			$pregunta->setCategoria(CM::id($pregunta->getIdCategoria()));
			$pregunta->setUsuario(UM::id($pregunta->getIdUsuario()));

			$respuesta = RM::replysForQuestionId($pregunta->getId(), RM::RESPUESTA_NAMESPACE);
			
			if (isset($respuesta))
			{
				$pregunta->setOBJRespuestas($respuesta);
			}
			else
			{
				$pregunta->setOBJRespuestas(null);
			}

			return $pregunta;
		}
		
		/*	**	*/

		/*		PREGUNTA POR TITULO 		*/
		
		public static function titulo($titulo)
		{
			$a_pregunta = new APregunta();
			
			$pregunta   = $a_pregunta->getBy('titulo', $titulo, self::PREGUNTA_NAMESPACE)[0];
			
			if(! isset($pregunta)) return null;

			$pregunta->setCategoria(CM::id($pregunta->getIdCategoria()));
			$pregunta->setUsuario(UM::id($pregunta->getIdUsuario()));

			$respuesta = RM::replysForQuestionId($pregunta->getId(), RM::RESPUESTA_NAMESPACE);
			
			if (isset($respuesta))
			{
				$pregunta->setOBJRespuestas($respuesta);
			}
			else
			{
				$pregunta->setOBJRespuestas(null);
			}

			return $pregunta;
		}
		
		/*	**	*/

		/*		PREGUNTA POR CATEGORIA 		*/
		
		public static function getQuestionCategory($id_categoria)
		{
			$id_categoria = HS::clean_input($id_categoria);

			$a_pregunta = new APregunta();
			$preguntas = $a_pregunta->runSql(
 					"SELECT * FROM " . $a_pregunta->table() . " WHERE fk_id_categoria = " . $id_categoria,
 					self::PREGUNTA_NAMESPACE
				);
			if (! is_object($preguntas) && ! is_array($preguntas)) return null;

			elseif(is_object($preguntas))
			{
				$preguntas = array ($preguntas);
			}

			foreach ($preguntas as $index => $pregunta_actual) {
				$pregunta_actual->setCategoria(CM::id($pregunta_actual->getIdCategoria()));
				$pregunta_actual->setUsuario(UM::id($pregunta_actual->getIdUsuario()));

				$respuestas = RM::replysForQuestionId($pregunta_actual->getId(), RM::RESPUESTA_NAMESPACE);

				if ( ! isset($respuestas) ) continue;

				$pregunta_actual->setOBJRespuestas($respuestas);				
				$preguntas[$index] = $pregunta_actual;

			}

			return $preguntas;
		}
		
		/*	**	*/

		/*		DENUNCIAR PREGUNTA 		*/
		
		public static function denunciarPregunta($id)
		{
			$pregunta = self::id($id);

			if(! isset($pregunta)) return false;

			return self::updateQuestion($pregunta->getId(), $pregunta->getTitulo(), $pregunta->getCuerpo(), $pregunta->getDenuncias() + 1, $pregunta->getIdCategoria());
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public static function saveQuestion($titulo, $cuerpo, $fecha, $respuestas, $ultima_repuesta, $id_usuario, $denuncias, $id_categoria)
		{
			$a_pregunta = new APregunta();

			$c_pregunta = new CPregunta();
			$c_pregunta->setTitulo($titulo);
			$c_pregunta->setCuerpo($cuerpo);
			$c_pregunta->setFecha($fecha);
			$c_pregunta->setRespuestas($respuestas);
			$c_pregunta->setUltimaRespuesta($ultima_repuesta);
			$c_pregunta->setIdUsuario($id_usuario);
			$c_pregunta->setDenuncias($denuncias);
			$c_pregunta->setIdCategoria($id_categoria);

			return $a_pregunta->save($c_pregunta);
		}
		
		/*	**	*/

		/*		UPDATE 		*/
		
		public static function updateQuestion($id, $titulo, $cuerpo, $denuncias, $id_categoria)
		{
			$a_pregunta = new APregunta();

			$c_pregunta = new CPregunta();
			$c_pregunta->setId($id);
			$c_pregunta->setTitulo($titulo);
			$c_pregunta->setCuerpo($cuerpo);
			$c_pregunta->setDenuncias($denuncias);
			$c_pregunta->setIdCategoria($id_categoria);

			return $a_pregunta->update($c_pregunta);
		}
		
		/*	**	*/

		/*		DELETE 		*/
		
		public static function deleteQuestion($id)
		{
			$a_pregunta = new APregunta();

			$c_pregunta = new CPregunta();
			$c_pregunta->setId($id);

			return $a_pregunta->delete($c_pregunta);
		}
		
		/*	**	*/

	}

/*		FIN CLASS PREGUNTA MODEL		*/