<?php
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../app/Conexion.php';
include_once '../modelos/administrador.php';
include_once '../repositorios/repositorio_administrador.php';

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
        <div class="alert alert-success text-center">
            <h3>Sugerencias</h3> 
        </div>
        <!-- Textarea -->
        <div class="row clearfix">
            <form action="sugerencias.php" id="FORMULARIO" autocomplete="off">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header text-center">
                            <h2>¿Que es lo que piensas? Dejanos tus sugerencias</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <br>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="nameNombre" class="form-control text-center" required="" placeholder="Escribe tu contraseña actual" />
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="1" name="nameSugerencia" class="form-control no-resize auto-growth text-center" required="" placeholder="Escribe tu nueva contraseña"></textarea>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="1" name="nameSugerencija" class="form-control no-resize auto-growth text-center" required="" placeholder="Repite tu nueva contraseña"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-success waves-effect" name="nameEnviar" value="ok">
                                        <i class="material-icons">save</i>
                                        <span>Actualizar</span>
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