<?php

class repositorio_eventos {

    public static function regitrar_evento($conexion, $evento) {
//    $evento = new eventos();

        $publicada = false;
        if (isset($conexion)) {
            try {

                $descripcion = $evento->getId_descripcion();
                $admin = $evento->getId_administrador();
                $estado = $evento->getEstado();
                $fecha = $evento->getFecha();
                $tituar = $evento->getTitular();

                echo $admin . '<br>';
                echo $estado . '<br>';
                echo $fecha . '<br>';
                echo $tituar . '<br>';


                $sql = "INSERT INTO eventos ( id_administrador, titular, descripcion_evento, estado, fecha) VALUES ('1', '$tituar', '$descripcion', '1', '$fecha');";
//                echo $sql;
                $sentencia = $conexion->prepare($sql);

                $publicada = $sentencia->execute();
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        return $publicada;
    }

    public static function lista_eventos($conexion) {
        $resultado = "";
        if (isset($conexion)) {
            try {
                $sql = "SELECT *
FROM eventos
WHERE estado = '1'
ORDER BY
eventos.id_evento DESC
 ";

                $resultado = $conexion->query($sql);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        return $resultado;
    }

    public static function eliminar_evento($conexion, $codigo) {
        $notificacion_actualizada = false;
        if (isset($conexion)) {
            try {
                $sql = "UPDATE eventos SET estado = '0' where id_evento = '$codigo'";
                echo 'el sql es ' . $sql;
                $sentencia = $conexion->prepare($sql);
                $notificacion_actualizada = $sentencia->execute();
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
        //return $notificacion_actualizada;
    }
}
