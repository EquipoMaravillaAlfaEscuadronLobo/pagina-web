<?php

class foto {
    private $id_foto;
    private $direccion;
    private $id_galeria;
    
    function __construct() {
        
    }

    
    function getId_foto() {
        return $this->id_foto;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getId_galeria() {
        return $this->id_galeria;
    }

    function setId_foto($id_foto) {
        $this->id_foto = $id_foto;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setId_galeria($id_galeria) {
        $this->id_galeria = $id_galeria;
    }


}
