<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../app/Conexion.php';
include_once '../modelos/notificaciones.php';
include_once '../repositorios/repositorio_notificaciones.php';

if ($_REQUEST['nameEnviar']) {
    
    echo 'se esta enviado';
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
        <div class="alert alert-warning text-center">
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
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="nameNombre" class="form-control text-center" required="" placeholder="Escribe tu nombre" />
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="1" name="nameSugerencia" class="form-control no-resize auto-growth text-center" required="" placeholder="Escribe tu Sugerencia :)"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-orange waves-effect" name="nameEnviar" value="ok">
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