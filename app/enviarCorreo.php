<?php

include_once './Conexion.php';
include_once '../modelos/Administrador.inc.php';
include_once '../modelos/Recuperar.php';
include_once '../repositorios/repositorio_administrador.inc.php';
include_once '../repositorios/repositorio_recuperacion.inc.php';

$path = $_SERVER['PHP_SELF'];
$file = dirname($path);
//echo $_SERVER['SERVER_NAME'].$file;
$cabeceras = 'From: SICAPL <cumples@example.com>' . "\r\n";
$cabeceras .= "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

Conexion::abrir_conexion();
$admin=Repositorio_administrador::obtener_email(Conexion::obtener_conexion(), $_POST['correo']);
$peticion= RepositorioRecuperacion::obtenerPeticionEmail(Conexion::obtener_conexion(), $admin->getCodigo_administrador());
if($peticion->getCodigo_administrador()!=""){
    echo 'Ya tiene una solicitud pendiente. Por favor revise su correo';
}else{
if($admin->getEmail()!=""){
    
    $userName=$admin->getCodigo_administrador();
    $string_aleatorio= sa(10);
    $url_secreta=hash('sha256',$string_aleatorio.$userName);
    $direccion=$_SERVER['SERVER_NAME'].$file.'/cambiarClave.php?u='.$url_secreta;
    $peticion_generada= RepositorioRecuperacion::registrarPeticion(Conexion::obtener_conexion(), $admin->getCodigo_administrador(), $url_secreta);
    $contenido='Hola '.$admin->getNombre().' '.$admin->getApellido().'<br><br> Se a solicitado cambio de contrase&ntilde;a.<br><br>'
            . 'Para restaurar la contrase&ntilde;a, visita el siguiente enlace<br><br> <a href="'.$direccion.'">Cambiar Contrase&ntilde;a</a>'
            . '<br><br>Si esta peticion fue un error, favor de ignorar este mensaje';
if (mail($_POST['correo'], "Recuperacion de contraseña", $contenido,$cabeceras)) {
    echo "ENCONTRADO";
}else{
    echo "No Enviado";
}

}else{
    echo "No Encontrado";
}
}





function sa($longitud) {
    $caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWKYZ1234567890";
    $numero_caracteres= strlen($caracteres);
    $string_aleatorio='';
    
    for ($i = 0; $i < $numero_caracteres; $i++) {
        $string_aleatorio.=$caracteres[rand(0, $numero_caracteres-1)];
    }
    return $string_aleatorio;
    
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

