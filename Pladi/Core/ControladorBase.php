<?php namespace Pladi\Core;

    use Pladi\Config\VariablesGlobales;
 

    class ControladorBase
    {

        /*        CONSTRUCTOR         */
        
        public function __construct() 
        {
            
        }
        
        /*    **    */

        /*        MONTAR LA VISTA         */
        
        public function view($vista, $datos)
        {
            foreach ($datos as $id_assoc => $valor) 
            {
                ${$id_assoc} = $valor; 
            }

            $helper = new HelpersView();
            
            require_once '../Pladi/View/' . $vista . 'View.php';
        }       
        
        /*    **    */

        /*        REDIRECCIONAMIENTO DINAMICO         */
        
        public function redirect($controlador = "", $accion = "")
        {
            $controlador = $controlador == "" ? VariablesGlobales::$controlador_defecto : $controlador;
            $accion = $accion == "" ?VariablesGlobales::$accion_defecto : $accion;

            header("Location:index.php?controller=" . $controlador . "&action=" . $accion);
        }
        
        /*    **    */
        
        //Métodos para los controladores

    }
/*        FIN CLASS CONTROLADOR BASE        */