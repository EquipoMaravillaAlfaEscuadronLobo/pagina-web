<?php

class galeria {
private $id_galeria ;
private $id_administrador ;
private $nombre_galeria ;
private $fecha;

function __construct($id_galeria, $id_administrador, $nombre_galeria, $fecha) {
    $this->id_galeria = $id_galeria;
    $this->id_administrador = $id_administrador;
    $this->nombre_galeria = $nombre_galeria;
    $this->fecha = $fecha;
}

function getId_galeria() {
    return $this->id_galeria;
}

function getId_administrador() {
    return $this->id_administrador;
}

function getNombre_galeria() {
    return $this->nombre_galeria;
}

function getFecha() {
    return $this->fecha;
}

function setId_galeria($id_galeria) {
    $this->id_galeria = $id_galeria;
}

function setId_administrador($id_administrador) {
    $this->id_administrador = $id_administrador;
}

function setNombre_galeria($nombre_galeria) {
    $this->nombre_galeria = $nombre_galeria;
}

function setFecha($fecha) {
    $this->fecha = $fecha;
}


}
