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
                       // $administrador = new Administrador();
                        $administrador->setPass($fila['pass']);
                        $administrador->setId_administrador($fila['id_administrador']);
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
 
    public static function actualizar_pass($conexion, $verificacion, $user ,$pass) {
        $respuesta = false;
        $administrador_actual = self:: obtener_administrador_actual($conexion, $user);

        if (isset($conexion)) {
            try {
             
                
                if (password_verify($verificacion, $administrador_actual->getPass())) {///esto es para saber si las contrase;a para modificar es correcta
                  $respuesta = true ; 
                  $sql = 'UPDATE administrador SET pass=:passwor WHERE nombre = :nombre';
                  $sentencia = $conexion->prepare($sql);
                  $sentencia->bindParam(':nombre', $user, PDO::PARAM_STR);
                  $sentencia->bindParam(':passwor', password_hash($pass, PASSWORD_DEFAULT), PDO::PARAM_STR);
                  $sentencia->execute();
                  
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
                    location.href="home.php";
                    
                });</script>';

                print 'ERROR: ' . $ex->getMessage();
            }
        } else {
            echo "no hay conexion";
        }
        return $respuesta;
    }
    

}
