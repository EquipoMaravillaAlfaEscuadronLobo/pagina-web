<?php

class repositorio_administrador {

    public static function obtener_administrador_actual($conexion, $codigo) {
        $administrador = new Administrador();
        //echo 'esta en administradodr actual<br>';
        if (isset($conexion)) {
            //echo 'hay conexion<br>';
            try {
                $sql = "select * from administrador where (nombre = '$codigo')";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $administrador = new Administrador();
                        $administrador->setPass($fila['pass']);
                    }
                }
            } catch (PDOException $exc) {
                print('ERROR' . $exc->getMessage());
            }
        } else {
            //echo 'no hay conexion<br>';
        }
        return $administrador;
    }
    public static function verificar_pass($conexion, $verificacion, $user) {
        $respuesta = false;
        $administrador_actual = self:: obtener_administrador_actual($conexion, $user);

        if (isset($conexion)) {
            try {
             
                if (password_verify($verificacion, $administrador_actual->getPass())) {///esto es para saber si las contrase;a para modificar es correcta
                  $respuesta = true ;  
                } else {
                    $respuesta = false;
                    
                }
            } catch (PDOException $ex) {
                //echo "<script>swal('Ooops!', 'Hubo no se pudo realizar la accion', 'error');</script>";
                 echo '<script>swal({
                    title: "Error!",
                    text: "Por Favor intente más tarde",
                    type: "warning",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="login.php";
                    
                });</script>';

                print 'ERROR: ' . $ex->getMessage();
            }
        } else {
            echo "no hay conexion";
        }
        return $respuesta;
    }
    

}
