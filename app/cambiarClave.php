<?php
include_once '../modelos/Recuperar.php';
include_once '../repositorios/repositorio_recuperacion.inc.php';
include_once './Conexion.php';
Conexion::abrir_conexion();
    $token= $_REQUEST['u'];
    $peticion= RepositorioRecuperacion::obtenerPeticion(Conexion::obtener_conexion(), $token);
    
    if ($peticion->getUrl_secreta()=="") {
        header("Location: index.php");
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php
$titulo1 = "Inicio de Sesion";
include_once('../plantillas/cabecera.php');
?>

<div class="container login">
    
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default ">
                    <div class="panel-heading text-center">
                        <h3>
                            Cambiar Contrase&ntilde;a
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" name="login" id="login">
                            <input type="hidden" name="codigoAdmin" id="codigoAdmin" value="<?php echo $peticion->getCodigo_administrador();?>"/>
                            <div class="row">
                                <div class="alert alert-info">
                                    <p>
                                        La contrase&ntilde;a debe tener al menos 6 caracteres
                                        
                                    </p>
                                    
                                </div>
                                <div class="col-md-3"><h4>Contrase&ntilde;a Nueva:</h4></div>
                                <div class="col-md-9"><input type="password" name="nombre" id="nombre" class="form-control" onkeyup="buscarAdmin()" autofocus/></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><h4>Repetir Contraseña:</h4></div>
                                <div class="col-md-9"> 
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="password" name="clave" id="clave" class="form-control" onkeyup="activarBoton()"/>
                                        </div>
                                        </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"><button type="button" id="enviar" class="form-control btn btn-primary" onclick="validar()" disabled><span class="fa fa-sign-in" aria-hidden="true"></span> Ingresar</button></div>
                                    <div class="col-md-6"><button type="reset" class="form-control btn btn-danger"><span class="fa fa-times" aria-hidden="true"></span> Cancelar</button></div>


                                </div>
                            </div>

                            <div class="col-md-3">
                            </div>
                        </form>
                    </div>
                    
                    
                </div>

                <script>
                    function validar() {
                        var codigoAdmin = $("input#codigoAdmin").val();
                        var pass = $("input#nombre").val();

                        if (pass != "") {
                            $.post("cambiar.php", {nombre: pass, codigoAdmin: codigoAdmin}, function (mensaje) {

                                if (mensaje == "ENCONTRADO") {
                                    swal({
                                        title: "Exito",
                                        text: "Contraseña actualizada",
                                        type: "success"},
                                    function () {
                                        location.href = "home.php";
                                    }

                                    );

                                } else {
                                    swal("Oops", mensaje, "error")
                                   
                                }
                            });
                        }
                    }

                    function activarBoton() {
                        // document.getElementById("enviar").disabled = true;
                        var pass2 = $("input#clave").val();
                        var pass1 = $("input#nombre").val();
                        if (pass1.length > 5&&pass1==pass2) {
                           document.getElementById("enviar").disabled = false;
                        } else {
                            document.getElementById("enviar").disabled = true;
                        }
                    }

                    
                    
                </script>

                <?php
                include_once('../plantillas/pie_de_pagina.php');
                ?>
                