<?php
include_once '../app/Conexion.php';
include_once '../modelos/notificaciones.php';
include_once '../repositorios/repositorio_notificaciones.php';
Conexion::abrir_conexion();
$numero = repositorio_notificaciones::numero_notificaciones(Conexion::obtener_conexion());

echo $numero;
?>

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" class="bars"></a>
            <a class="navbar-brand" href="index.html">Casa de Encuentro Juevenil</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->

                <!-- #END# Call Search -->
                <!-- Notifications -->
                <li>
                    <a href="../admin/notificaciones.php">Notificaciones
                        <i class="material-icons">notifications</i>
                        <span class="label-count"><?php echo $numero; ?></span>
                    </a>

                </li>

                <!-- #END# Notifications -->


            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->