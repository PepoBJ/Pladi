<?php namespace Pladi\Model;

	use Pladi\Model\RespuestaModel as RM;
	use Pladi\Model\Action\Pregunta as APregunta;
	use Pladi\Model\Clase\Pregunta as CPregunta;

	class PreguntaModel 
	{

		/*		CONSTANTE NAMESPACE PREGUNTA 		*/
		
		const PREGUNTA_CONSTANTE = 'Pladi\Model\Clase\Pregunta';
		
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

			$preguntas = $a_pregunta->getAll(self::PREGUNTA_CONSTANTE);

			if(! isset($preguntas)) return null;

			foreach ($preguntas as $index => $pregunta_actual) {
				
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

			$pregunta = $a_pregunta->getById($id, self::PREGUNTA_CONSTANTE);

			if(! isset($pregunta)) return null;

			return $pregunta;
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