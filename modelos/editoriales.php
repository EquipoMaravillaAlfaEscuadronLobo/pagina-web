<?php
class editoriales {
private $codigo_editorial;
private $nombre;
private $direccion;
private $pais;
private $email;
private $telefono;

function __construct() {
    
}
function getCodigo_editorial() {
    return $this->codigo_editorial;
}

function getNombre() {
    return $this->nombre;
}

function getDireccion() {
    return $this->direccion;
}

function getPais() {
    return $this->pais;
}

function getEmail() {
    return $this->email;
}

function getTelefono() {
    return $this->telefono;
}

function setCodigo_editorial($codigo_editorial) {
    $this->codigo_editorial = $codigo_editorial;
}

function setNombre($nombre) {
    $this->nombre = $nombre;
}

function setDireccion($direccion) {
    $this->direccion = $direccion;
}

function setPais($pais) {
    $this->pais = $pais;
}

function setEmail($email) {
    $this->email = $email;
}

function setTelefono($telefono) {
    $this->telefono = $telefono;
}


}
