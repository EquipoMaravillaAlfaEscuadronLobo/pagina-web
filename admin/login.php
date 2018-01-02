<?php
if (isset( $_REQUEST['nameEnviar'])) {
   include_once '../app/Conexion.php';
   include_once '../modelos/administrador.php';
   include_once '../repositorios/repositorio_administrador.php';
   
   $usuario = $_REQUEST['nameUsuario'];
   $pass = $_REQUEST['namePass'];
   Conexion::abrir_conexion();
   if (repositorio_administrador::verificar_pass(Conexion::obtener_conexion(), $pass, $usuario)) {
       echo 'si es la contrasenia';
       session_start();
       $_SESSION['user'] = $usuario;
   }
   else{
       echo 'no es conio';
   }
   
   
}else{
?>


﻿<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Casa de Encuentro Juvenil, Verapaz San Vicente</title>

        <!-- Favicon-->
        <link rel="icon" href="../favicon.ico" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="../css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../css/themes/all-themes.css" rel="stylesheet" />
        
         <script type="text/javascript" src="../js/jquery.min.js"></script>
    </head>
    <body class="login-page">

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Casa de Encuentro Juevenil Verapaz, San Vicente</b></a>
            <small>© 2018 UES FMP.</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="FORMULARIO" method="get" name="">
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
include_once '../plantilla/pie.php';
?>