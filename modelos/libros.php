<?php

class libros {
private $codigo_libros;
private $codigo_editotial;
private $titulo;
private $estado;
private $fecha_publicacion;
private $foto;
private $motivo;

function __construct() {
    
}
function getCodigo_libros() {
    return $this->codigo_libros;
}

function getCodigo_editotial() {
    return $this->codigo_editotial;
}

function getTitulo() {
    return $this->titulo;
}

function getEstado() {
    return $this->estado;
}

function getFecha_publicacion() {
    return $this->fecha_publicacion;
}

function getFoto() {
    return $this->foto;
}

function getMotivo() {
    return $this->motivo;
}

function setCodigo_libros($codigo_libros) {
    $this->codigo_libros = $codigo_libros;
}

function setCodigo_editotial($codigo_editotial) {
    $this->codigo_editotial = $codigo_editotial;
}

function setTitulo($titulo) {
    $this->titulo = $titulo;
}

function setEstado($estado) {
    $this->estado = $estado;
}

function setFecha_publicacion($fecha_publicacion) {
    $this->fecha_publicacion = $fecha_publicacion;
}

function setFoto($foto) {
    $this->foto = $foto;
}

function setMotivo($motivo) {
    $this->motivo = $motivo;
}



}
