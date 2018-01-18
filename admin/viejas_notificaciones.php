<?php
include_once '../app/Conexion.php';
Conexion::abrir_conexion();
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../modelos/notificaciones.php';
include_once '../repositorios/repositorio_notificaciones.php';
$notificaciones_pendientes = repositorio_notificaciones::notificaciones_todas(Conexion::obtener_conexion());
?>    

<section class="content">
    <div class="container-fluid">
        <div class="panel" name="libros">
            <div class="panel-heading text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Notificacion</h3>
                    </div>
                </div>
            </div>
            <div class="panel-body">

                <table padding="20px" class="table table-striped" id="data-table-simple">
                    <thead class="">
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Sugerencia</th>
                    </thead>
                    <tbody>
                        <?php foreach ($notificaciones_pendientes as $lista) { ?>
                            <tr>
                                
                                <td class="text-center"><?php echo $lista->getNombre_usuario(); ?></td>
                                <td class="text-center"><?php echo $lista->getDescripcion(); ?></td>
                          </tr>
                            <?php
                        }
                        //Conexion::cerrar_conexion(); 
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        </div>
</section>


<?php
repositorio_notificaciones::actualizar_notificacion(Conexion::obtener_conexion());
Conexion::cerrar_conexion();
include_once '../plantilla/pie.php';
?>