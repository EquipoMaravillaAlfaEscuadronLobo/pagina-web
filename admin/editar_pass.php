<?php
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../app/Conexion.php';
include_once '../modelos/notificaciones.php';
include_once '../repositorios/repositorio_notificaciones.php';

if (isset($_REQUEST['nameEnviar'])) {
    
    
  $notficaciones = new notificaciones();
    $notficaciones ->setNombre_usuario($_REQUEST['nameNombre']);
     $notficaciones ->setDescripcion($_REQUEST['nameSugerencia']);
     Conexion::abrir_conexion();
     repositorio_notificaciones::guardar_notificacion(Conexion::obtener_conexion(), $notficaciones);
     Conexion::cerrar_conexion();
     echo '<script>swal({
                    title: "Bien",
                    text: "Tu sugerencia a sido enviada!",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="historia.php";
                    
                });</script>';    
}else {
?>

<section class="content">
    <div class="container-fluid">
        <!-- Google Maps -->
        <div class="alert alert-danger text-center">
            <h3>Cambio de contraseña</h3> 
        </div>
        <!-- Textarea -->
        <div class="row clearfix">
            <form action="sugerencias.php" id="FORMULARIO" autocomplete="off">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line text-center" >
                                            <input  type="password" name="nameActual" class="form-control text-center" required="" placeholder="Escriba tu contraseña actual" />
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line text-center" >
                                            <input type="password" name="namePass1" id="idPass1" class="form-control text-center" required="" placeholder="Escriba la nueva contraseña" />
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line text-center">
                                            <input type="password" name="namePass2" id="idPass2" class="form-control text-center" required="" placeholder="Repite la contraseña" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-red waves-effect" name="nameEnviar" value="ok">
                                        <i class="material-icons">save</i>
                                        <span>Enviar</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- #END# Textarea -->
</div>
</section>
<?php
}
include_once '../plantilla/pie.php';
?>