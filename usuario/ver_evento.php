<?php
include_once '../app/Conexion.php';
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../modelos/eventos.php';
include_once '../repositorios/repositorio_eventos.php';
Conexion::abrir_conexion();
$listado= repositorio_eventos::lista_eventos(Conexion::obtener_conexion());
?>    

<section class="content">
    <div class="container-fluid">
        <div class="block-header text-Center">
            <h1 class="text-Center">Próximos Eventos</h1>
        </div>
        <?php
        foreach ($listado as $fila){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b><?php echo $fila['titular'];?></b></div>
                    <div class="panel-body">
                        <div class="contenido">
                        <?php echo $fila['descripcion_evento'];?>
                        </div>
                    </div>
                    <div class="panel-footer" id="<?php echo $fila['fecha'];?>"><?php echo 'Fecha de Evento: '. date_format(date_create($fila['fecha']), 'd-m-Y');?>
                        <div class="fb-like" data-href="http://localhost/pagina-web/usuario/noticias.php#<?php echo $fila['id_noticia'];?>" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        <div class="fb-comments" data-href="http://localhost/pagina-web/usuario/noticias.php#<?php echo $fila['id_noticia'];?>" data-width="900" style="width: 100% !important;" data-numposts="5"></div>
                    </div>
                </div>
            </div>
            
        </div>
        <?php
        }
        ?>

        



    </div>
</section>
<?php

include_once '../plantilla/pie.php';
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.11&appId=170203666791466';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>