<?php
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
?>    

<!DOCTYPE>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Viewer.js</title>

        <link rel="stylesheet" href="../css/estilos.css"/>

    </head>
    <body>
        <section class="content">
            <form action="" name="noticia" id="noticia" method="post">
                <input type="hidden" name="bandera" id="bandera">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <span style="font-weight: bold">Titular del Evento</span>
                        <input type="text" placeholder="" name="titular" class="form-control text-center">
                    </div>
                    <div class="col-md-6 text-center">
                        <span style="font-weight: bold">Fecha del Evento</span>
                        <input type="date" placeholder="" name="fecha" class="form-control text-center">
                    </div>
                    <div class="col-md-12">
                        <textarea name="entrada" id="entrada" cols="30" rows="10"></textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="button" onclick="validar()" value="" class="btn btn-success">Publicar</button>
                    </div>
                </div>


            </form>


        </section>
    </body>
</html>
<?php
include_once '../plantilla/pie.php';
?>
<script>
    function validar() {

        document.getElementById('bandera').value = "ok"
        document.noticia.submit();

    }
    window.onload = function () {
        editor = CKEDITOR.replace("entrada");
        CKFinder.setupCKEditor(editor, "../js/ckeditor");
    }
</script>

<?php
if (isset($_REQUEST['bandera'])) {
    include_once '../app/Conexion.php';
    include_once '../modelos/eventos.php';
    include_once '../modelos/administrador.php';
    include_once '../repositorios/repositorio_eventos.php';
    include_once '../repositorios/repositorio_administrador.php';
    Conexion::abrir_conexion();
    $texto = $_REQUEST['entrada'];
    $admin = $_SESSION['user'];
    $titular = $_REQUEST['titular'];
    $fecha = $_REQUEST['fecha'];
    $estado = 1;
    $idadmin = repositorio_administrador::obtener_administrador_actual(Conexion::obtener_conexion(), $admin);
    $evento = new eventos();
    $evento->setId_descripcion($texto);
    $evento->setEstado($estado);
    $evento->setId_administrador($idadmin->getId_administrador());
    $evento->setTitular($titular);
    $evento->setFecha($fecha);

    $resultado = repositorio_eventos::regitrar_evento(Conexion::obtener_conexion(), $evento);
    if ($resultado) {
        echo '<script>';
        echo 'swal("Exito","Nuevo Evento publicado","success"); location.href="home.php"';
        
        echo '</script>';
    } else {
        echo '<script>';
        echo 'swal("Error","' . $resultado . '","error")';
        echo '</script>';
    }
}
?>


