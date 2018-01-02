<?php


class noticias {
private $id_noticias;
private $id_administrador;
private $descripcion;
private $estado;

function __construct() {
    
}

function getId_noticias() {
    return $this->id_noticias;
}

function getId_administrador() {
    return $this->id_administrador;
}

function getDescripcion() {
    return $this->descripcion;
}

function getEstado() {
    return $this->estado;
}

function setId_noticias($id_noticias) {
    $this->id_noticias = $id_noticias;
}

function setId_administrador($id_administrador) {
    $this->id_administrador = $id_administrador;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

function setEstado($estado) {
    $this->estado = $estado;
}


}
