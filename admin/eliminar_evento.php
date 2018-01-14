<?php
include_once '../app/Conexion.php';
Conexion::abrir_conexion();
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../modelos/eventos.php';
include_once '../repositorios/repositorio_eventos.php';

if (isset($_REQUEST['id'])) {
$id = $_REQUEST['id'];    
repositorio_eventos::eliminar_evento(Conexion::obtener_conexion(), $id);
                echo '<script>swal({
                    title: "Exito",
                    text: "El evento se elimino!",
                    type: "success",
                    confirmButtonText: "ok",
                    closeOnConfirm: false
                },
                function () {
                    location.href="eliminar_evento.php";
                    
                });</script>';



}
else{


$notificaciones_pendientes = repositorio_eventos::lista_eventos(Conexion::obtener_conexion());
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
                    <th class="text-center">Evento</th>
                    <th class="text-center">Fecha Evento</th>
                    <th class="text-center">Eliminar Evento</th>
                    </thead>
                    <tbody>
                        <?php foreach ($notificaciones_pendientes as $lista) { ?>
                            <tr>

                                <td class="text-center"><?php echo $lista['titular']; ?></td>
                                <td class="text-center"><?php echo date_format(date_create($lista['fecha']), 'd-m-Y'); ?></td>
                                <td class="text-center">
                                    <button class="btn btn-danger" onclick="eliminar('<?php echo $lista['id_evento'];?>')">
                                        <i class="Medium material-icons prefix">delete</i> 
                                    </button>
                                </td>
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
<script>
function eliminar(id){
    swal({
  title: "Desea eliminar este evento?",
  text: "presione sí para confirmar!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-success",
  confirmButtonText: "Sí, Eliminar",
  cancelButtonText: "Cancelar",
  closeOnConfirm: false
},
function(){
    location.href="eliminar_evento.php?id="+id;
  
});
}

</script>


<?php
}
include_once '../plantilla/pie.php';
?>