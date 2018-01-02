<?php

class repositorio_notificaciones {
    public static function guardar_notificacion($conexion, $notificacion){
        //$notificacion = new notificaciones();
        
           
        if (isset($conexion)) {
            try {
      
                $nombre = $notificacion->getNombre_usuario();
                $sugerencia = $notificacion->getDescripcion();
      
                $sql = "INSERT INTO notificacion (nombre_usuario, estado, descripcion) VALUES ('".$nombre."', 'PENDIENTE', '".$sugerencia."');";

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
}
