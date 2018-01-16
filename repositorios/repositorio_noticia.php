<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of repositorio_noticia
 *
 * @author Miranda
 */
class repositorio_noticia {
    //put your code here
    public static function regitrar($conexion, $noticia){
        $publicada=false;
        if (isset($conexion)){
            try {
                 
                $contenido=$noticia->getDescripcion();
                $admin=$noticia->getId_administrador();
                $estado=$noticia->getEstado();
                
               $sql="insert into noticia(id_administrador, descripcion, estado) values(:admin,:contenido,:estado)";
                $sentencia = $conexion->prepare($sql);
                 $sentencia->bindParam(':admin', $admin, PDO::PARAM_STR);
                 $sentencia->bindParam(':contenido', $contenido, PDO::PARAM_STR);
                 $sentencia->bindParam(':estado', $estado, PDO::PARAM_STR);
                 
                 $publicada=$sentencia->execute();
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
                }
        return $publicada;
    }
    
    public static function lista_noticias($conexion){
        $resultado="";
        if (isset($conexion)){
            try {
                $sql="SELECT
noticia.id_noticia,
noticia.descripcion,
noticia.estado,
administrador.nombre
FROM
noticia
INNER JOIN administrador ON noticia.id_administrador = administrador.id_administrador
order by id_noticia desc";
                
                $resultado = $conexion->query($sql);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
                }
                return $resultado;
    }
}
