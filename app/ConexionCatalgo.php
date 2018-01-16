<?php

class ConexionCatalogo {

    private static $conexion;

    public static function abrir_conexion() {
        if (!isset(self::$conexion)) {
            try {
                include 'configcatalago.inc.php';
                self::$conexion = new PDO("mysql:host=$nombre_servidor2; dbname=$nombre_base_datos2", $nombre_usuario2, $password2);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conexion->exec("SET CHARACTER SET utf8");
                //print 'conexion abierta';
                //echo '<br>';
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage() . "<br>";
                die();
            }
        }
    }

    public static function cerrar_conexion() {
        if (isset(self::$conexion)) {
            self::$conexion = null;
            //print 'conexion cerrada';
        }
    }

    public static function obtener_conexion(){
        return self::$conexion;
    }

    public static function obtener_numero_usuarios($conexio) {
        $total_usuarios = null;
        if (isset($conexio)) {
            try {
                $sql = 'select count (*) as total from usuario';
                $sentencia = $conexio->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                $total_usuarios = $resultado['total'];
            } catch (PDOException $ex) {
                print 'ERROR: ' . $ex->getMessage() . "<br>";
                die();
            }
        }
        return $total_usuarios;
    }

}

?>