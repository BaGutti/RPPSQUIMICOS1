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

require_once "Controlers/tools.php";

$instancia = new tools();
$codigo = $instancia->randomCode();

$admin = ControladorAdministradores::ctrSeleccionarRegistrosAdministradores(null,null);

?>
<div class="row py-5">
	<div class="col-lg-2"></div>
    <div id="blanco" class="col-lg-8">
        <h3>Gestión de adminitradores
        	<spam class="btn btn-danger rounded float-right" data-toggle="modal" data-target="#myModal" data-remote="index.php?paginasAdministradores=RegistrarAdmin">+Añadir admin</spam>
        </h3>
        <hr>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content justify-content-center" id="modal">
				<div class="modal-header">
			        <h1 class="modal-title text-center">Añadir Admin</h1>
		        </div>
				<div class="modal-body text-left">
					<form action="#" method="post" class="needs-validation" novalidate>
						<div class="form-group">
							<label>Identificación<span class="text-danger">*</span></label>
							<input type="number" name="registrarIdentificacionAd" class="form-control rounded-pill" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Nombres y apellidos<span class="text-danger">*</span></label>
							<input type="text" name="registrarNombreAd" class="form-control rounded-pill" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Telefono<span class="text-danger">*</span></label>
							<input type="number" name="registrarTelefonoAd" class="form-control rounded-pill" min="0" max="9999999999" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Correo electronico<span class="text-danger">*</span></label>
							<input type="email" name="registrarCorreoAd" class="form-control rounded-pill" required>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<label>Contraseña<span class="text-danger">*</span></label>
							<input type="password" name="registrarContraseñaAd" class="form-control rounded-pill" required value="<?php echo $codigo?>" readonly>
							<div class="valid-feedback">Valido</div>
                            <div class="invalid-feedback">El campo no puede quedar vacio.</div>
						</div>
						<div class="form-group">
							<input type="hidden" name="registrarEstadoAd" class="form-control rounded-pill" value="Activo">
						</div>
						<div class="form-group">
							<input type="hidden" name="registrarRollAd" class="form-control rounded-pill" value="2">
						</div>
						<?php

						$registro = ControladorAdministradores::ctrRegistroAdministradores();

						if ($registro == "ok") {
							ControladorAdministradores::enviarCorreoAdmin($_POST);
							echo '<script>
				            setTimeout(function(){
                               window.location = "index.php?paginasAdministradores=ConsultarAdmin"
				            },1000)
				            </script>';
						}
						?>
					    <button type="submit" id="btnReg" class="btn btn-primary rounded-pill btn-lg mt-5">Guardar cambios</button>
					    <button type="reset" id="btnReg" class="btn btn-danger rounded-pill btn-lg mt-5">Cancelar</button>
					</form>
			    </div>
			</div>     
		</div>
    </div>
    <div class="col-lg-2"></div>
</div>
<section class="row">
	<aside id="blanco-h" class="col-lg-2"></aside>
	<aside class="col-lg-8" id="form2">
		<?php foreach ($admin as $key => $value):?>
		<div class="col-lg-12">
			<h1><img src="Assets/img/Perfil.jpg" class="img-fluide" width="80" height="80"><?php echo $value["nombreEMPLEADO"]; ?><h1>
			<button type="button" class="btn btn-danger rounded-pill float-right" data-toggle="modal" data-target="#myModal2">Eliminar admin</button>
			    <div class="modal fade" id="myModal2" role="dialog">
				    <div class="modal-dialog modal-sm modal-dialog-centered">
				      <div class="modal-content">
				        <div class="modal-body border border-dark rounded">
				          <form action="#" method="post" class="text-left">
				          	<label>¿Desea eliminar a este empleado?</label>
				          	<form>
				          		<input type ="hidden" value ="<?php echo $value["idEMPLEADO"];?>" name="eliminarAd">
				          		<button class="btn btn-primary rounded-pill btn-block">Si</button>

				          	<?php

				          	$eliminar = new ControladorAdministradores();
				          	$eliminar -> ctrEliminarAdministrador();
				          	
				          	?>	
				          	</form>
				            <button type="button" class="btn btn-danger rounded-pill btn-block my-2" data-dismiss="modal">No</button>
				          </form>
				        </div>
				    </div>
				  </div>
                </div>
            <div class="btn-group-vertical float-right">
                <form method="post">
                    <input type ="hidden" value ="<?php echo $value["idEMPLEADO"];?>" name="activarRegistro">
                    <button class="btn btn-primary rounded-pill">Activar</button>

                    <?php

                    $activar = new ControladorAdministradores();
                    $activar ->ctrActivarRegistroAdministradores();

                    ?>
                </form>
                <form method="post">
                    <input type ="hidden" value ="<?php echo $value["idEMPLEADO"];?>" name="inactivarRegistro">
                    <button class="btn btn-primary my-1 rounded-pill">Inactivar</button>

                    <?php

                    $inactivar = new ControladorAdministradores();
                    $inactivar ->ctrInactivarRegistroAdministradores();

                    ?>
                </form>
            </div>    
			<h2 class="font-weight-bold">Datos Admin:</h2>
			<p><span class="text-danger">Identificacion:</span><?php echo $value["identificacionEMPLEADO"]?></p>
			<p><span class="text-danger">Telefono:</span><?php echo $value["telefonoEMPLEADO"]?><span class="text-danger"> Email:</span><?php echo $value["correoEMPLEADO"]?></p>
			<p><span class="text-danger">Estado:</span><?php echo $value["estadoEMPLEADO"]?></p>
			<hr>
		</div>
		<?php endforeach ?>
	</aside>
</section>
<div class="row">
    <div id="blanco" class="col-lg-12"></div>
</div>