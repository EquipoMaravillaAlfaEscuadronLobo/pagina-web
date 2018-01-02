<?php
$titulo1 = "Recuperar Contraseña";
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
                            Recuperar Contraseña
                            
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" name="login" id="login">
                            <div class="row">
                                <div class="alert alert-info">
                                    <p>
                                        Escriba la direccion de correo electronico con la que se registro
                                        y le enviaremos un email con el que podra restablecer su contraseña.
                                        <br>
                                        (Si el email no aparece, revise la bandeja de spam)
                                        
                                    </p>
                                    
                                </div>
                                <div class="col-md-3"><h4>Correo:</h4></div>
                                <div class="col-md-9"><input type="email" name="correo" id="correo" class="form-control"   autofocus onkeyup="validarEmail(this.value)"/></div>
                            </div>
                            
                                <div class="row">
                                    <div class="col-md-6"><button type="button" id="enviar" class="form-control btn btn-primary" onclick="validar()" disabled><span class="fa fa-sign-in" aria-hidden="true"></span> Enviar</button></div>
                                    <div class="col-md-6"><button type="reset" class="form-control btn btn-danger"><span class="fa fa-times" aria-hidden="true"></span> Cancelar</button></div>
                                </div>
                            
                       </form>
                    </div>
                    
                     
                </div>

                <script>
                    function validar() {
                        
                        var correo = $("input#correo").val();

                        if (correo != "") {
                            $.post("enviarCorreo.php", {correo: correo}, function (mensaje) {

                                if (mensaje == "ENCONTRADO") {
                                    swal({
                                        title: "Exito",
                                        text: "Correo Enviado",
                                        type: "success"},
                                    function () {
                                        document.getElementById("correo").value="";
                                        location.href="index.php"
                                    }

                                    );

                                } else {
                                    swal("Oops", mensaje, "error")
                                    //$('input#correo').addClass("invalidado");
                                }
                            });
                        }
                    }
                    
                    function validarEmail(valor) {
  if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(valor)){
    $('input#correo').removeClass("invalidado");
    $('input#correo').addClass("validado");
     $('#enviar').removeAttr("disabled");
  } else {
    $('#enviar').addAttr("disabled", "disabled");
    $('input#correo').addClass("invalidado"); 
    $('input#correo').removeClass("validado");
  }
}

                    
                    
                    
                </script>

                <?php
                include_once('../plantillas/pie_de_pagina.php');
                ?>
                

