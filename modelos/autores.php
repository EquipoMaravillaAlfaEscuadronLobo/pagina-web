<?php


class autores {
private $codigo_autor;
private $nombre;
private $apellido;
private $nacimiento;
private $biografia;

function __construct() {
    
}
function getCodigo_autor() {
    return $this->codigo_autor;
}

function getNombre() {
    return $this->nombre;
}

function getApellido() {
    return $this->apellido;
}

function getNacimiento() {
    return $this->nacimiento;
}

function getBiografia() {
    return $this->biografia;
}

function setCodigo_autor($codigo_autor) {
    $this->codigo_autor = $codigo_autor;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setApellido($apellido) {
    $this->apellido = $apellido;
}

function setNacimiento($nacimiento) {
    $this->nacimiento = $nacimiento;
}

function setBiografia($biografia) {
    $this->biografia = $biografia;
}



}
