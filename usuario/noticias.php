<?php
include_once '../app/Conexion.php';
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
include_once '../repositorios/repositorio_noticia.php';
Conexion::abrir_conexion();
$listado= repositorio_noticia::lista_noticias(Conexion::obtener_conexion());
?>    

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Seccion de Noticias</h1>
        </div>
        <?php
        foreach ($listado as $fila){
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><img src="favicon.ico"><?php echo $fila['nombre'];?></div>
                    <div class="panel-body"><?php echo $fila['descripcion'];?>
                       
                    </div>
                    <div class="panel-footer" id="<?php echo $fila['id_noticia'];?>">
                      
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