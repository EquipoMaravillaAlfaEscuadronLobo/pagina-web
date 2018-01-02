<?php

class institucion {
private $id_institucion;
private $id_telefono;
private $telefono;
private $facebook;
private $email;
private $histora ;

function getId_institucion() {
    return $this->id_institucion;
}

function getId_telefono() {
    return $this->id_telefono;
}

function getTelefono() {
    return $this->telefono;
}

function getFacebook() {
    return $this->facebook;
}

function getEmail() {
    return $this->email;
}

function getHistora() {
    return $this->histora;
}

function setId_institucion($id_institucion) {
    $this->id_institucion = $id_institucion;
}

function setId_telefono($id_telefono) {
    $this->id_telefono = $id_telefono;
}

function setTelefono($telefono) {
    $this->telefono = $telefono;
}

function setFacebook($facebook) {
    $this->facebook = $facebook;
}

function setEmail($email) {
    $this->email = $email;
}

function setHistora($histora) {
    $this->histora = $histora;
}



}
