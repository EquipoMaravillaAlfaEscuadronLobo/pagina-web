<?php

session_start();
$codigo = $_POST["user"];
$pass = $_POST["clave"];


include_once 'Conexion.php';
include_once '../modelos/Administrador.inc.php';
include_once '../repositorios/repositorio_administrador.inc.php';
Conexion::abrir_conexion();

$administrador = Repositorio_administrador::obtener_administrador(Conexion::obtener_conexion(), $codigo);

if (isset($administrador) && password_verify($pass, $administrador->getPasword())) {
    $_SESSION['user'] = $administrador->getCodigo_administrador();
    $_SESSION['nivel'] = $administrador->getNivel();
    $_SESSION['seleccionado'] = '';
    $accion = 'El administrador ' . $administrador->getCodigo_administrador(). '('. $administrador->getNombre(). " " .$administrador->getApellido(). ") inició sesión" ;
    Repositorio_administrador::insertar_bitacora(Conexion::obtener_conexion(), $accion);
    
    echo "ENCONTRADO";
} else {
    echo "INEXISTENTE";
}
?>