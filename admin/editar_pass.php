<?php
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../app/Conexion.php';
include_once '../modelos/administrador.php';
include_once '../repositorios/repositorio_administrador.php';

if (isset($_REQUEST['nameEnviar'])) {
    $verificacion = $_REQUEST['nameActual'];
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
                    location.href="editar_pass.php";
                    
                });</script>';            
    }
    
    
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
            <form action="editar_pass.php" id="FORMULARIO" autocomplete="off">
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