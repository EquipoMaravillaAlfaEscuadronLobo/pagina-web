<?php

class administrador {
 private $id_administrador ;
 private $nombre;
 private $pass;

 function __construct() {
     
 }

 function getId_administrador() {
     return $this->id_administrador;
 }

 function getNombre() {
     return $this->nombre;
 }

 function getPass() {
     return $this->pass;
 }

 function setId_administrador($id_administrador) {
     $this->id_administrador = $id_administrador;
 }

 function setNombre($nombre) {
     $this->nombre = $nombre;
 }

 function setPass($pass) {
     $this->pass = $pass;
 }


}
