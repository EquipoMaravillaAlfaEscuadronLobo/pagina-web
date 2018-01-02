<?php

class notificaciones {
private $id_notificacion;
private $nombre_usuario;
private $estado;
private $descripcion;

function __construct() {
    
}

function getId_notificacion() {
    return $this->id_notificacion;
}

function getNombre_usuario() {
    return $this->nombre_usuario;
}

function getEstado() {
    return $this->estado;
}

function getDescripcion() {
    return $this->descripcion;
}

function setId_notificacion($id_notificacion) {
    $this->id_notificacion = $id_notificacion;
}

function setNombre_usuario($nombre_usuario) {
    $this->nombre_usuario = $nombre_usuario;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}



}
