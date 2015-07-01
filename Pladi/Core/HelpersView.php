<?php namespace Pladi\Core;
	
	use Pladi\Config\VariablesGlobales;

    class HelpersView
    {
        
        /*		BRINDA EL URL PARA LAS VISTAS 		*/
        
        public function url($controlador = "", $accion = "", $param = "")
        {
            $controlador = $controlador == "" ? VariablesGlobales::$controlador_defecto : $controlador;
            $accion = $accion == "" ?VariablesGlobales::$accion_defecto : $accion;

            $urlString = "/" . $controlador . "/" . $accion . "/" . $param;
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
        
        /*        MENU PLADI         */
        
        public function pladi_menu()
        {
            return 
            '<div class="grupo base-tabla">
                <div class="caja logo base-50">
                    <img class="logo__img" src="/img/logo.png" alt="logo">
                    <span class="logo__titulo">PlaDi</span>
                </div>
                <div class="caja login base-50 medio">
                    <button class="login__boton derecha">Login</button>
                </div>
            </div>';
        }
        
        public function pladi_footer()
        {
            return 
            '<div class="grupo centrar-contenido">
                <div class="caja tablet-50 contacto">
                    <a href="#" class="icon-facebook"></a>
                    <a href="#" class="icon-twitter"></a>
                    <a href="#" class="icon-rss"></a>
                </div>
                <div class="caja tablet-50 derechos-autor">
                    <p>Pladi &copy; 2015</p>
                </div>
            </div>';
        }
        /*    **    */
        //Helpers para las vistas
    }

/*		FIN CLASS HELPERS PARA LA VISTA		*/
