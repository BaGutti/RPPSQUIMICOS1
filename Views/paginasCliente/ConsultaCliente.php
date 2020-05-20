<?php

if(!isset($_SESSION["validarIngreso"])){
    
    echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
    return;  
}else{
    if($_SESSION["validarIngreso"] != "ok"){
        echo '<script> window.location = "?paginasUsuario=InicioSesion";</script>';
        return;
    }
}
$clientes = ControladorClientes::ctrSeleccionarRegistroClientes(null,null);

?>

<div class="row py-5">
    <input class="form-control mb-4 col-lg-6 border border-danger rounded-pill" id="tableSearch" type="text" placeholder="Busca aqui el cliente registrado que quieras" onclick="search()"><i class="fas fa-search"></i>
    <table class="col-lg-12 table table-striped table-hover table-lg table-responsive-lg">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>IDENTIFICACION DEL CLIENTE</th>
                <th>NOMBRE O EMPRESA DEL CLIENTE</th>
                <th>TELEFONO DEL CLIENTE</th>
                <th>DIRECCION DEL CLIENTE</th>
                <th>BARRIO DEL CLIENTE</th>
                <th>NOMBRE DE CONTACTO DEL CLIENTE</th>
                <th>TELEFONO DE CONTACTO DEL CLIENTE</th>
                <th>CORREO DE CONTACTO DEL CLIENTE</th>
                <th>ESTADO DEL CLIENTE</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="myTable">

        <?php foreach ($clientes as $key => $value):?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value["identificacionEC"]; ?></td>
                <td><?php echo $value["nombreEC"]; ?></td>
                <td><?php echo $value["telefonoEC"]; ?></td>
                <td><?php echo $value["direccionEC"]; ?></td>
                <td><?php echo $value["nombreBarrio"]; ?></td>
                <td><?php echo $value["nombrecontEC"]; ?></td>
                <td><?php echo $value["telefonocontEC"]; ?></td>
                <td><?php echo $value["correocontEC"]; ?></td>
                <td><?php echo $value["estadoUSUARIO"]; ?></td>
                <td>

                    <div class="btn-group">
                        <form method="post">
                            <input type ="hidden" value ="<?php echo $value["idEC"];?>" name="eliminarRegistro">
                        <button class="btn btn-danger mx-1">Eliminar</button>

                        <?php

                        $eliminar = new ControladorClientes();
                        $eliminar ->ctrEliminarRegistroClientes();

                        ?>
                        </form>
                        <div class="btn-group-vertical">
                            <form method="post">
                                <input type ="hidden" value ="<?php echo $value["idUSUARIO"];?>" name="activarRegistro">
                            <button class="btn btn-primary" id="habilitar">Activar</button>

                            <?php

                            $activar = new ControladorClientes();
                            $activar ->ctrActivarRegistroClientes();

                            ?>
                            </form>
                            <form method="post">
                                <input type ="hidden" value ="<?php echo $value["idUSUARIO"];?>" name="inactivarRegistro">
                            <button class="btn btn-primary my-1" id="deshabilitar">Inactivar</button>

                            <?php

                            $inactivar = new ControladorClientes();
                            $inactivar ->ctrInactivarRegistroClientes();

                            ?>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>        
        </tbody>
    </table>
</div>