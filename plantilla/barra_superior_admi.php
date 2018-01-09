<?php
include_once '../app/Conexion.php';
include_once '../modelos/notificaciones.php';
include_once '../repositorios/repositorio_notificaciones.php';
Conexion::abrir_conexion();
$numero = repositorio_notificaciones::numero_notificaciones(Conexion::obtener_conexion());

echo $numero;
?>
<link href="../css/estilos.css"/>
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" class="bars"></a>
            <marquee><a class="navbar-brand" href="index.html">Casa de Encuentro Juevenil</a></marquee>
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

                <li>
                    <div class="user-info  btn-group user-helper-dropdown" >
                        <div class="image rounded-circle" id="circular" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <img src="../images/user.png" width="48" height="48" alt="User"/>
                        </div>

                        <ul class="dropdown-menu pull-right">
                            <li><a href="#"><i class="material-icons">create</i>Editar password</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="../sesiones/cerrar.php"><i class="material-icons">input</i>Salir</a></li>
                        </ul>
                    </div>
                </li>

                <!-- #END# Notifications -->


            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->