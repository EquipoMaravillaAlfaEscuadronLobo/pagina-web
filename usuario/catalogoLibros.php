<?php
include_once '../app/ConexionCatalgo.php';
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../repositorios/repositorio_noticia.php';

ConexionCatalogo::abrir_conexion();
$conexion = ConexionCatalogo::obtener_conexion();
$sql = "SELECT
GROUP_CONCAT(DISTINCT autores.nombre,' ',autores.apellido SEPARATOR '<br>') AS autor,
SUBSTR(libros.codigo_libro,1,19) as codigo,
(libros.titulo) as titulo,
libros.fecha_publicacion as fecha,
libros.estado,
libros.foto as foto,
libros.editoriales_codigo as cedit,
editoriales.nombre as editorial,
count(titulo) as cantidad
FROM
libros
INNER JOIN editoriales ON libros.editoriales_codigo = editoriales.codigo_editorial
INNER JOIN movimiento_autores ON movimiento_autores.codigo_libro = libros.codigo_libro
INNER JOIN autores ON movimiento_autores.codigo_autor = autores.codigo_autor
where libros.estado=0
GROUP BY
codigo

";
$sentencia = $conexion->prepare($sql);
$sentencia->execute();
$resultado = $sentencia->fetchAll();
?>    

<section class="content">

    <?php
    $cantidad = 1;
    foreach ($resultado as $fila) {
        if (($cantidad) % 2 == 0) {
            ?>
            
                <div class="col-md-6">
                    <div class="card">
                        <img src="http://<?php echo $_SERVER['SERVER_NAME'] ?>/proyectosequipomaravilla/SICAPL/fotoLibros/<?php echo $fila['foto'] ?>" alt="<?php echo $_SERVER['SERVER_NAME'] ?>/ProyectosEquipoMaravilla/SICAPL/fotoLibros/<?php echo $fila['foto'] ?>" style="width:100%">
                        <div class="container">
                            <h4><b><?php echo $fila['titulo'] ?></b></h4> 
                            <p><b>Autores: </b><?php echo $fila['autor'] ?></p> 
                            <p><b>Editorial: </b><?php echo $fila['editorial'] ?></p> 
                            <p><b>Fecha de Publicacion: </b><?php echo date_format(date_create($fila['fecha']), 'd-m-Y') ?></p> 
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <img src="http://<?php echo $_SERVER['SERVER_NAME'] ?>/proyectosequipomaravilla/SICAPL/fotoLibros/<?php echo $fila['foto'] ?>" alt="<?php echo $_SERVER['SERVER_NAME'] ?>/ProyectosEquipoMaravilla/SICAPL/fotoLibros/<?php echo $fila['foto'] ?>" style="width:100%">
                    <div class="container">
                        <h4><b><?php echo $fila['titulo'] ?></b></h4> 
                        <p><b>Autores: </b><?php echo $fila['autor'] ?></p> 
                        <p><b>Editorial: </b><?php echo $fila['editorial'] ?></p> 
                        <p><b>Fecha de Publicacion: </b><?php echo date_format(date_create($fila['fecha']), 'd-m-Y') ?></p> 
                    </div>
                </div>
            </div>
        <?php
    }
    $cantidad++;
}
?>


</section>
<?php
include_once '../plantilla/pie.php';
?>

