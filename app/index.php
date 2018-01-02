<?php
$titulo1 = "Inicio de Sesion";
include_once('../plantillas/cabecera.php');
?>

<div class="container login">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <div class="panel panel-default ">
                    <div class="panel-heading text-center">
                        <h3>
                            Inicio de Sesión
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" name="login" id="login">
                            <div class="row">
                                <div class="col-md-3"><h4>Usuario:</h4></div>
                                <div class="col-md-9"><input type="text" name="nombre" id="nombre" class="form-control" onkeyup="buscarAdmin()" autofocus/></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><h4>Contraseña:</h4></div>
                                <div class="col-md-9"> 
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input type="password" name="clave" id="clave" class="form-control" onkeyup="activarBoton()" disabled/>
                                        </div>
                                        <div class="col-md-1"><i id="ojo" class="fa fa-eye" aria-hidden="true"></i></div></div>
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
                    </form>
                    <div class="panel-footer">  
                        <a href="recuperacion.php" class="pass">Olvide mi contraseña</a>
                    </div>  
                </div>

                <script>
                    function validar() {
                        var pass = $("input#clave").val();
                        var user = $("input#nombre").val();

                        if (pass != "") {
                            $.post("iniciar.php", {clave: pass, user: user}, function (mensaje) {

                                if (mensaje == "ENCONTRADO") {
                                    swal({
                                        title: "Exito",
                                        text: "Sesion Iniciada Correctamente",
                                        type: "success"},
                                    function () {
                                        location.href = "home.php";
                                    }

                                    );

                                } else {
                                    swal("Oops", "Contraseña Equivocada", "error")
                                    $('input#clave').addClass("invalidado");
                                }
                            });
                        }
                    }

                    function activarBoton() {
                        var pass = $("input#clave").val();
                        if (pass.length > 5) {
                            $('#enviar').removeAttr("disabled");
                        } else {
                            document.getElementById("enviar").disabled = true;
                        }
                    }

                    function buscarAdmin() {
                        var depto = $("input#nombre").val();

                        if (depto != "") {
                            $.post("getUser.php", {user: depto}, function (mensaje) {

                                if (mensaje == "ENCONTRADO") {
                                    $('#clave').removeAttr("disabled");

                                    $('input#nombre').removeClass("invalidado");
                                    $('input#nombre').addClass("validado");
                                } else {
                                    $('input#nombre').addClass("invalidado");
                                }
                            });
                        }
                    }
                    ;
                </script>

                <?php
                include_once('../plantillas/pie_de_pagina.php');
                ?>
                <script>
                    var conteo = 0  //Definimos la Variable

                    $("#ojo").click(function () { //Funcion del Click
                        if (conteo == 0) { //Si la variable es igual a 0
                            conteo = 1; //La cambiamos a 1
                            $('#clave').removeAttr("type", "password"); //Removemos el atributo de Tipo Contraseña
                            $("#clave").prop("type", "text"); //Agregamos el atributo de Tipo Texto(Para que se vea la Contraseña escribida)
                            $("#ojo").removeClass("fa-eye"); //Removemos una clase (la imagen del ojo por defecto)
                            $("#ojo").addClass("fa-eye-slash"); //Agregamos una Nueva Clase (la imagen del ojo nueva)
                        } else { //En caso contrario
                            conteo = 0; //La cambiamos a 0
                            $('#clave').removeAttr("type", "text"); //Removemos el atributo de Tipo Texto
                            $("#clave").prop("type", "password"); //Agregamos el atributo de Tipo Contraseña
                            $("#ojo").removeClass("fa-eye-slash"); //Removemos una clase (la imagen del ojo nueva)
                            $("#ojo").addClass("fa-eye"); //Agregamos una Nueva Clase (la imagen del ojo por defecto)
                        } //Cierre del Else
                    }); //Cierre de la funcion Click

                </script>