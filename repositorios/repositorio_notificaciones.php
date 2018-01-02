<?php

class repositorio_notificaciones {

    public static function guardar_notificacion($conexion, $notificacion) {
        //$notificacion = new notificaciones();


        if (isset($conexion)) {
            try {

                $nombre = $notificacion->getNombre_usuario();
                $sugerencia = $notificacion->getDescripcion();

                $sql = "INSERT INTO notificacion (nombre_usuario, estado, descripcion) VALUES ('" . $nombre . "', 'PENDIENTE', '" . $sugerencia . "');";

                $sentencia = $conexion->prepare($sql);

                $usuario_insertado = $sentencia->execute();
                echo 'dato guardados';
//                echo '<script>swal({
//                    title: "Exito",
//                    text: "El registro ha sido Guardado!",
//                    type: "success",
//                    confirmButtonText: "ok",
//                    closeOnConfirm: false
//                },
//                function () {
//                    location.href="inicio_usuario.php";
//                    
//                });</script>';
            } catch (PDOException $ex) {
                echo 'dato no guardado';
//                echo '<script>swal({
//                    title: "Advertencia!",
//                    text: "por favor revise los datos e intente nuevamente",
//                    type: "warning",
//                    confirmButtonText: "ok",
//                    closeOnConfirm: false
//                },
//                function () {
//                    location.href="inicio_usuario.php";
//                    
//                });</script>';
                print 'ERROR: ' . $ex->getMessage();
            }
        } else {
            echo 'no hay conexion';
        }
    }

    public static function notificaciones_pendientes($conexion) {
        $lista_notificacion = array();

        if (isset($conexion)) {
            try {
                $sql = "select * from notificacion where (estado = 'PENDIENTE')";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $notificacion = new notificaciones();
                        $notificacion->setId_notificacion($fila['id_notificacion']);
                        $notificacion->setNombre_usuario($fila['nombre_usuario']);
                        $notificacion->setDescripcion($fila['descripcion']);

                        $lista_notificacion[] = $notificacion;
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        }

        return $lista_notificacion;
    }

    public static function actualizar_notificacion($conexion) {
        $notificacion_actualizada = false;
        if (isset($conexion)) {
            try {
                $sql = "UPDATE notificacion SET estado = 'VISTA'";
                $sentencia = $conexion->prepare($sql);
                $notificacion_actualizada = $sentencia->execute();
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString();
            }
        }
        //return $notificacion_actualizada;
    }

}
