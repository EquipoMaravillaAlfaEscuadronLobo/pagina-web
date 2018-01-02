<?php
session_start();
include_once '../app/Conexion.php';
include_once '../repositorios/repositorio_bitacora.php';
$accion =  'El administrador ' . $_SESSION['user']. " "  .' cerró sesión';
Conexion::abrir_conexion();
Repositorio_Bitacora::insertar_bitacora(Conexion::obtener_conexion(), $accion);
echo $accion;

	unset($_SESSION['user']);
	unset($_SESSION['nivel']);
	session_destroy();
        Conexion::cerrar_conexion();
	header("Location: ../index.php");
?>