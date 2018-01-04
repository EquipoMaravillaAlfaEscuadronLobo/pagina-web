<?php
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../app/Conexion.php';
include_once '../modelos/administrador.php';
include_once '../repositorios/repositorio_administrador.php';

if (isset($_REQUEST['nameEnviar'])) {
    $verificacion = $_REQUEST['ActualPass'];
    $pass = $_REQUEST['namePass1'];
    Conexion::abrir_conexion();
    $boolean = repositorio_administrador::actualizar_pass(Conexion::obtener_conexion(), $verificacion, $_SESSION['user'], $pass);
    Conexion::cerrar_conexion();
    if ($boolean) {
    echo '<script>swal({
                    title: "Bien",
                    text: "Tu contraseña a sido actualizada!",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="home.php";
                    
                });</script>';        
    }else{
    echo '<script>swal({
                    title: "Oops",
                    text: "Contraseña incorrecta, Vuelve a intentar!",
                    type: "error",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="cambio_pass.php";
                    
                });</script>';            
    }
    
    
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
            <form action="cambio_pass.php" id="FORMULARIO" autocomplete="off">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header text-center">
                            <h2>Completa el siguiente formulario para actualizar tu contraseña</h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <br>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" name="ActualPass" class="form-control text-center" required="" placeholder="Escribe tu contraseña actual" />
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="namePass1" class="form-control text-center" required="" placeholder="Escribe tu nueva contraseña" />
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="1" name="namePass2" class="form-control no-resize auto-growth text-center"  placeholder="Repite tu nueva contraseña"></textarea>
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