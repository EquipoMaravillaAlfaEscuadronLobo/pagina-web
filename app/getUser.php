<?php

	$codigo=$_POST["user"];

	include_once 'Conexion.php';
	include_once '../modelos/Administrador.inc.php';
	include_once '../repositorios/repositorio_administrador.inc.php';
	 Conexion::abrir_conexion();


	 $administrador=Repositorio_administrador::obtener_administrador(Conexion::obtener_conexion(), $codigo);
	 if (isset($administrador)&&($administrador->getCodigo_administrador()!=""||$administrador->getEmail()!="")) {
	 	echo "ENCONTRADO";
	 }
	 else{
	 	echo "INEXISTENTE";
	 }




?>