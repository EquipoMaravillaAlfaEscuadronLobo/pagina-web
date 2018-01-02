<?php

include_once './Conexion.php';
include_once '../repositorios/repositorio_administrador.inc.php';
include_once '../repositorios/repositorio_recuperacion.inc.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Conexion::abrir_conexion();
$CodigoAdmin=$_POST['codigoAdmin'];
$nuevaClave=$_POST['nombre'];
if(Repositorio_administrador::actualizarClave(Conexion::obtener_conexion(), $CodigoAdmin, $nuevaClave)){
    if(RepositorioRecuperacion::eliminarPeticion(Conexion::obtener_conexion(), $CodigoAdmin)){
        echo 'ENCONTRADO';
    }
}else{
    echo "No se pudo actualizar la contrase&ntilde;a";
}



?>
