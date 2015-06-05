<?php namespace Pladi\Core;
	
	use Pladi\Config\VariablesGlobales;

    class HelpersView
    {
        
        /*		BRINDA EL URL PARA LAS VISTAS 		*/
        
        public function url($controlador = "", $accion = "")
        {
            $controlador = $controlador == "" ? VariablesGlobales::$controlador_defecto : $controlador;
            $accion = $accion == "" ?VariablesGlobales::$accion_defecto : $accion;

            $urlString = "index.php?controller=" . $controlador . "&action=" . $accion;
            return $urlString;
        }
        
        public function frase() {
          $frases = array (
            "El optimista encuentra una respuesta para cada problema, El pesimista ve un problema en cada respuesta",
            "Este es el humo que despide mi puro, espero tu respuesta si es que no te has quedado mudo",
            "La respuesta más rápida es la acción",
            "Una respuesta blanda, quiebra la ira, una contestación dura excita el furor",
            "¿Qué sucederá? ¿Qué pasará? La respuesta la tiene el tiempo y sólo él te la dará",
            "Que grato es hallar la respuesta apropiada, y aún más cuando es oportuna"
          );
         
          return $frases[rand(0, count($frases)-1)];
        }
        /*	**	*/
        
        //Helpers para las vistas
    }

/*		FIN CLASS HELPERS PARA LA VISTA		*/
