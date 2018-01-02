<?php
class eventos {
private $id_evento;
private $id_administrador;
private $id_descripcion;
private $dato;

function __construct() {
    
}
function getId_evento() {
    return $this->id_evento;
}

function getId_administrador() {
    return $this->id_administrador;
}

function getId_descripcion() {
    return $this->id_descripcion;
}

function getDato() {
    return $this->dato;
}

function setId_evento($id_evento) {
    $this->id_evento = $id_evento;
}

function setId_administrador($id_administrador) {
    $this->id_administrador = $id_administrador;
}

function setId_descripcion($id_descripcion) {
    $this->id_descripcion = $id_descripcion;
}

function setDato($dato) {
    $this->dato = $dato;
}


}
