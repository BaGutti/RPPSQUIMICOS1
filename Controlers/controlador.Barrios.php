<?php

class ControladorBarrios
{
	//////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Barrios/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    ////////////////////////////////////////////////////////////////////////////// 

    //Seleccionar barrios

    static public function ctrSeleccionarBarrios(){
        $tabla = "barrio";
        $respuesta = ModeloBarrios::mdlSeleccionarBarrios($tabla);
        return $respuesta;
    }
}