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
        
        /*	**	*/
        
        //Helpers para las vistas
    }

/*		FIN CLASS HELPERS PARA LA VISTA		*/
