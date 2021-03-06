<?php namespace Pladi\Core;
	
	use Pladi\Config\VariablesGlobales;

    class HelpersView
    {
        
        /*		BRINDA EL URL PARA LAS VISTAS 		*/
        
        public function url($controlador = "", $accion = "", $param = "")
        {
            $controlador = $controlador == "" ? VariablesGlobales::$controlador_defecto : $controlador;
            $accion      = $accion == "" ?VariablesGlobales::$accion_defecto : $accion;
            
            $urlString   = VariablesGlobales::$base_url . "/" . $controlador . "/" . $accion . "/" . $param;
            return $urlString;
        }
        
        public function base_url() 
        {
            return VariablesGlobales::$base_url;
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

        /*        PLADI FAVICON         */
        
        public function pladi_favicon()
        {
            $protocol      = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
            $domainName    = $_SERVER['HTTP_HOST'].'/';
            $host_protocol = $protocol.$domainName;

            return '<link rel="shortcut icon" href="' . $host_protocol . 'favicon.ico" />
            <link rel="icon" type="image/png" href="' . $host_protocol . 'img/logo.png" />
            <link rel="shortcut icon" href="' . VariablesGlobales::$base_url . 'favicon.ico" />
            <link rel="icon" type="image/png" href="' . VariablesGlobales::$base_url . 'img/logo.png" />';
        }
        
        /*    **    */
        
        /*        MENU PLADI         */
        
        public function pladi_menu()
        {
            return 
            '<div class="grupo base-tabla">
                <div class="caja logo base-50">
                    <img class="logo__img" src="' . VariablesGlobales::$base_url . '/img/logo.png" alt="logo">
                    <span class="logo__titulo">PlaDi</span>
                </div>
                <div class="caja login base-50 medio">
                    <button class="login__boton derecha">Login</button>
                </div>
            </div>';
        }
        /*      **      */

        /*        HOME MENU PLADI         */
        
        public function pladi_home_menu($usuario)
        {
            return 
            '<div class="grupo base-tabla centrar-contenido">
                <div class="caja logo logo__home base-1-6">
                    <img class="logo__img" src="' . VariablesGlobales::$base_url . '/img/logo.png" alt="logo">
                    <span class="logo__titulo">PlaDi</span>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('usuario', 'profile').'" title="Mi perfil" class="usuario__nombre icon-usuario espacio"><span>'.$usuario.'</span></a>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('pregunta', 'misPreguntas').'" title="Mis preguntas" class="usuario__preguntas icon-tarjeta espacio"><span>Mis Preguntas</span></a>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('notificacion', 'misNotificaciones').'" title="Mis notificaciones" class="usuario__notificaciones icon-fecha espacio"><span>Notificaciones</span></a>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('pregunta', 'buscar').'" title="buscar" class="buscar icon-pin espacio derecha"><span>Buscar</span></a>
                </div>
                <div class="caja logout base-1-6 medio">
                    <button class="logout__boton derecha">Logout</button>
                </div>
            </div>' ;
        }
        
        /*    **    */

        /*        HOME MENU ADMIN PLADI         */
        
        public function pladi_home_menu_admin($usuario)
        {
            return 
            '<div class="grupo base-tabla centrar-contenido">
                <div class="caja logo logo__home base-1-6">
                    <img class="logo__img" src="'. VariablesGlobales::$base_url .'/img/logo.png" alt="logo">
                    <span class="logo__titulo">PlaDi</span>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('usuario', 'profile').'" title="Mi perfil" class="usuario__nombre icon-usuario espacio"><span>'.$usuario.'</span></a>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('usuario', 'lista').'" title="Lista de Usuario" class="usuario__preguntas icon-portafolio espacio"><span>Usuarios</span></a>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('pregunta', 'lista').'" title="Mis notificaciones" class="usuario__notificaciones icon-enlace espacio"><span>Preguntas</span></a>
                </div>
                <div class="caja base-1-6 medio">
                    <a href="'.$this->url('respuesta', 'lista').'" title="buscar" class="buscar icon-enlace espacio derecha"><span>Respuestas</span></a>
                </div>
                <div class="caja logout base-1-6 medio">
                    <button class="logout__boton derecha">Logout</button>
                </div>
            </div>' ;
        }
        
        /*    **    */

        /*        FOOTER PLADI         */
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

        /*        LINKER CSS         */
        
        public function css($css_name)
        {
            return "<link rel='stylesheet' href='" . VariablesGlobales::$base_url . "/css/$css_name.css'>";
        }
        
        /*    **    */
        /*        LINKER JS         */
        
        public function js($js_name)
        {
            return "<script src='" . VariablesGlobales::$base_url . "/js/$js_name.js'></script>";
        }
        
        /*    **    */

        /*        CONVERT FECHA AMIGABLE         */
        
        public function fecha_amigable($fecha)
        {
            $meses = array( 
                1  => 'Enero',
                2  => 'Febrero',
                3  => 'Marzo',
                4  => 'Abril',
                5  => 'Mayo',
                6  => 'Junio',
                7  => 'Julio',
                8  => 'Agosto',
                9  => 'Setiembre',
                10 => 'Octubre',
                11 => 'Noviembre',
                12 => 'Diciembre',
            );
            //intval
            $date_time = explode(" ", $fecha);
            $date      = explode('-', $date_time[0]);
            $time      = explode(':', $date_time[1]);
            
            return $date[2] . ' de ' . $meses[intval($date[1])] . ' del ' . $date[0] . ' ' . $time[0] . ':' . $time[1];
        }
        
        /*    **    */

        //Helpers para las vistas
    }

/*		FIN CLASS HELPERS PARA LA VISTA		*/
