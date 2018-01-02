<?php


class movimento_autores {
private $codigo_libro;
private $codigo_autor;

function __construct() {
    
}
function getCodigo_libro() {
    return $this->codigo_libro;
}

function getCodigo_autor() {
    return $this->codigo_autor;
}

function setCodigo_libro($codigo_libro) {
    $this->codigo_libro = $codigo_libro;
}

function setCodigo_autor($codigo_autor) {
    $this->codigo_autor = $codigo_autor;
}


}
