<?php namespace Pladi\Model;
	
	use Pladi\Model\Action\Respuesta as ARespuesta;
	use Pladi\Model\Clase\Respuesta as CRespuesta;

	class RespuestaModel 
	{

		/*		CONSTANTE NAMESPACE RESPUESTA 		*/
		
		const RESPUESTA_NAMESPACE = 'Pladi\Model\Clase\Respuesta';
		
		/*	**	*/

		/*		CONSTRUCTOR 		*/
		
		public function __construct()
		{

		}	
		
		/*	**	*/

		/*		TODAS LAS RESPUESTAS 		*/
		
		public static function all()
		{
			$a_respuesta = new ARespuesta();
			
			$respuestas  = $a_respuesta->getAll(self::RESPUESTA_NAMESPACE);

			if(! isset($respuestas)) return null;

			return $respuestas;
		}
		
		/*	**	*/

		/*		ALL QUESTION FOR DENIED 		*/
		
		public static function allDenied()
		{
			$a_respuesta = new ARespuesta();
			$respuestas = $a_respuesta->runSql("SELECT * FROM respuesta WHERE denuncias > 0 ORDER BY denuncias DESC", self::RESPUESTA_NAMESPACE);
			
			if (! is_object($respuestas) && ! is_array($respuestas)) return null;
			if(! isset($respuestas)) return null;

			elseif(is_object($respuestas))
			{
				$respuestas = array ($respuestas);
			}

			return $respuestas;
		}
				
		
		/*	**	*/

		/*		RESPUESTA POR ID 		*/
		
		public static function id($id)
		{
			$a_respuesta = new ARespuesta();
			
			$respuesta   = $a_respuesta->getById($id, self::RESPUESTA_NAMESPACE);

			if(! isset($respuesta)) return null;

			return $respuesta;
		}
		
		/*	**	*/

		/*		DENUNCIAR RESPUESTA 		*/
		
		public static function denunciarRespuesta($id)
		{
			$respuesta = self::id($id);

			if(! isset($respuesta)) return false;

			return self::updateReply($respuesta->getId(), $respuesta->getTitulo(), $respuesta->getCuerpo(), $respuesta->getDenuncias() + 1);
		}
		
		/*	**	*/

		/*		RESPUESTA DE UNA SOLA PREGUNTA 		*/
		
		public static function replysForQuestionId($id_question)
		{
			$a_respuesta = new ARespuesta();
			
			$respuestas  = $a_respuesta->getBy('fk_id_pregunta', $id_question, self::RESPUESTA_NAMESPACE);

			if(! isset($respuestas)) return null;

			return $respuestas;
		}
		
		/*	**	*/

		/*		SAVE 		*/
		
		public static function saveReply($titulo, $cuerpo, $fecha, $denuncias, $id_pregunta)
		{
			$a_respuesta = new ARespuesta();

			$c_respuesta = new CRespuesta();
			$c_respuesta->setTitulo($titulo);
			$c_respuesta->setCuerpo($cuerpo);
			$c_respuesta->setFecha($fecha);
			$c_respuesta->setDenuncias($denuncias);
			$c_respuesta->setIdPregunta($id_pregunta);

			return $a_respuesta->save($c_respuesta);
		}
		
		/*	**	*/

		/*		UPDATE 		*/
		
		public static function updateReply($id, $titulo, $cuerpo, $denuncias)
		{
			$a_respuesta = new ARespuesta();

			$c_respuesta = new CRespuesta();
			$c_respuesta->setId($id);
			$c_respuesta->setTitulo($titulo);
			$c_respuesta->setCuerpo($cuerpo);
			$c_respuesta->setDenuncias($denuncias);

			return $a_respuesta->update($c_respuesta);
		}
		
		/*	**	*/

		/*		DELETE 		*/
		
		public static function deleteReply($id)
		{
			$a_respuesta = new ARespuesta();

			$c_respuesta = new CRespuesta();
			$c_respuesta->setId($id);

			return $a_respuesta->delete($c_respuesta);
		}
		
		/*	**	*/

	}

/*		FIN CLASS RESPUESTA MODEL		*/