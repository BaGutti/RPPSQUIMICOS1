<?php
class ControladorPedidos{

//////////////////////////////////////////////////////////////////////////////
/////////////////-------------------------------------////////////////////////
/////////////////////////Pedidos/////////////////////////////////////////////
////////////////--------------------------------------////////////////////////
//////////////////////////////////////////////////////////////////////////////  

    //Registro Pedidos

    static public function ctrRegistroPedidos($data){
        if(isset($data["registroIdentificacion"])){

            $tabla = "empresa_cliente";

            $datos = array("identificacionEC"=>$data["registroIdentificacion"],
                               "nombreEC"=>$data["registroNombreCom"],
                               "telefonoEC"=>$data["registroTelefono"],
                               "direccionEC"=>$data["registroDireccion"],
                               "nombrecontEC"=>$data["registroNContacto"],
                               "telefonocontEC"=>$data["registroTContacto"],
                               "correocontEC"=>$data["registroEmail"],
                               "idBARRIO_FK"=>$data["registroBarrios"]
                            );
            $respuesta = ModeloPedidos::mdlRegistroPedidos($tabla,$datos);
            return $respuesta;
        }
        
    }

    //Consulta Pedidos

    static public function ctrSeleccionarRegistroPedidos($item,$valor){
        $tabla = "empresa_cliente";
        $respuesta = ModeloPedidos::mdlSeleccionarRegistroPedidos($tabla,$item,$valor);
        return $respuesta;
    }

    //Eliminar Pedidos

    public function ctrEliminarRegistroPedidos(){

        if(isset($_POST["eliminarRegistro"])){

            $tabla = "empresa_cliente";
            $valor = $_POST["eliminarRegistro"];

            $respuesta = ModeloPedidos::mdlEliminarRegistroPedidos($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasCliente=ConsultaCliente";
            },1000)
            </script>';
            }
        }
    }

    //Actualizar Nombre completo del usuario por datos del cliente

    static public function ctrActualizarRegistroNombreComUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "nombrecontEC" => $_POST["actualizarNombreComC"]
                         );

            $respuesta = ModeloPedidos::mdlActualizarNombreComUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar identificacion del usuario por datos del cliente

    static public function ctrActualizarRegistroIdentUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "identificacionEC" => $_POST["actualizarIdentEC"]
                         );

            $respuesta = ModeloPedidos::mdlActualizarIdentUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar correo del usuario por datos del cliente

    static public function ctrActualizarRegistroCorreoUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "correocontEC" => $_POST["actualizarCorreoUs"]
                         );

            $respuesta = ModeloPedidos::mdlActualizarCorreoUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar direccion del usuario por datos del cliente

    static public function ctrActualizarRegistroDireccionUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "direccionEC" => $_POST["actualizarDireccionUs"]
                         );

            $respuesta = ModeloPedidos::mdlActualizarDireccionUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar barrio del usuario por datos del cliente

    static public function ctrActualizarRegistroBarrioUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "idBARRIO_FK" => $_POST["actualizarBarrioUs"]
                         );

            $respuesta = ModeloPedidos::mdlActualizarBarrioUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //Actualizar telefono del usuario por datos del cliente

    static public function ctrActualizarRegistroTelefonoUsuario(){

        if(isset($_POST["actualizarIdU"])){

            $tabla = "empresa_cliente";
            $datos = array("idEC"=>$_POST["actualizarIdU"],
                           "telefonocontEC" => $_POST["actualizarTelefonoUs"]
                         );

            $respuesta = ModeloPedidos::mdlActualizarTelefonoUsuario($tabla,$datos);

            return $respuesta;            
        }
    }

    //INACTIVAR UN CLIENTE
    public function ctrInactivarRegistroPedidos(){

        if(isset($_POST["inactivarRegistro"])){

            $tabla = "usuario";
            $valor = $_POST["inactivarRegistro"];

            $respuesta = ModeloPedidos::mdlInactivarRegistroPedidos($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasCliente=ConsultaCliente";
            },1000)
            </script>';
            }
        }
    }

    //ACTIVAR UN CLIENTE
    public function ctrActivarRegistroPedidos(){

        if(isset($_POST["activarRegistro"])){

            $tabla = "usuario";
            $valor = $_POST["activarRegistro"];

            $respuesta = ModeloPedidos::mdlActivarRegistroPedidos($tabla,$valor);

            if($respuesta == "ok"){
                echo '<script>
            if(window.history.replaceState){

                window.history.replaceState(null,null,window.location.href);
            }
            setTimeout(function(){
                window.location = "index.php?paginasCliente=ConsultaCliente";
            },1000)
            </script>';
            }
        }
    }
    //////////////////////////////////////////////////////////////////////////////
    /////////////////-------------------------------------////////////////////////
    /////////////////////////Roll/////////////////////////////////////////////
    ////////////////--------------------------------------////////////////////////
    //////////////////////////////////////////////////////////////////////////////

    //Consultar roll

    static public function ctrSeleccionarRoll(){
        $tabla = "rol";
        $respuesta = ModeloPedidos::mdlSeleccionarRoll($tabla);
        return $respuesta;
    }

}
