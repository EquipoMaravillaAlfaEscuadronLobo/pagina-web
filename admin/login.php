<?php
include_once '../plantilla/cabecera_login.php';
if (isset($_REQUEST['nameEnviar'])) {
    include_once '../app/Conexion.php';
    include_once '../modelos/administrador.php';
    include_once '../repositorios/repositorio_administrador.php';

    $usuario = $_REQUEST['nameUsuario'];
    $pass = $_REQUEST['namePass'];
    Conexion::abrir_conexion();
    if (repositorio_administrador::verificar_pass(Conexion::obtener_conexion(), $pass, $usuario)) {
        
        session_start();
        $_SESSION['user'] = $usuario;
        echo '<script>swal({
                    title: "Exito",
                     text: "Sesión iniciada correctamente",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="home.php";
                    
                });</script>';
    } else {
        
        echo '<script>swal({
                    title: "Exito",
                     text: "Datos incorrectos",
                    type: "error",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="login.php";
                    
                });</script>';
    }
} else {
    ?>


        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);"><b>Casa de Encuentro Juevenil Verapaz, San Vicente</b></a>
                <small>© 2018 UES FMP.</small>
            </div>
            <div class="card">
                <div class="body">
                    <form id="FORMULARIO" method="get" name="" autocomplete="off">
                        <div class="msg">Inicia tu sesión para continuar</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="nameUsuario" placeholder="Usuario" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="namePass" placeholder="Cotraseña" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">

                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit" name="nameEnviar" value="ok">Entrar</button>
                            </div>
                        </div>
                        <div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">

                            </div>
                            <div class="col-xs-6 align-right">
                                <a href="#">Olvidaste tu Contraseña?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
    }
    include_once '../plantilla/pie_login.php';
    ?>