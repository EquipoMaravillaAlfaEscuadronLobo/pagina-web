<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../plantilla/barra_lateral_usuario.php';
?>    
<style>
    #gallery {
        padding: 10px 0 0 10px;
        background-color: white;
        text-align: center;
        margin: 0 auto;
        border: 2px solid blue;
     }

     IMG.displayed2 {/* para centrar la imagen en el carousel/slider*/
    display: block;
    margin-left: auto;
    margin-right: auto }
</style>d
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h1>Historia</h1>
        </div>

              <!-- foto -->
        <div class="row clearfix">
            <div class="row">
                
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header text-center alert-success">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="../images/fachada1.jpg" align="center" width="500" height="400" alt="Casa De Encuentro juvenil De Verapaz Remodelada" class="displayed2">
    </div>

    <div class="item">
      <img src="../images/fachada3.jpg" width="500" height="400" alt="Casa De Encuentro juvenil De Verapaz Remodelada" class="displayed2">
    </div>

    <div class="item">
      <img src="../images/fachada4.png" width="500" height="400" alt="Casa De Encuentro juvenil De Verapaz Original" class="displayed2">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

                      
                    </div>
                    <div class="body">
                        <div class="text text-center text-primary">
                            <p align="center" style="font-size: 16px">
                                La Casa de Encuentro es un espacio de participación juvenil fue creado por iniciativa de la municipalidad con el
apoyo de la ONG Intervida, cuyo fin de fomentar la participación y desarrollo integral de la juventud y niñez así
mismo como un espacio de prevención a diversas problemáticas que afectaba a la población del municipio, se
apertura el 25 de abril del 2013 obteniendo esta un gran impacto en el municipio de Verapaz donde niños/as
adolescentes y jóvenes público en general desarrollan a diario distintas actividades teniendo en este local un
aproximado de 950 visitas mensuales de habitantes  de las diferentes edades siendo
los más beneficiados el sector estudiantil esto por los materiales con los que cuenta la casa (recurso informático,
bibliográficos ,talleres artísticos y el espacio organizativo).
                            </p>
                            
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- foto -->
       



    </div>
</section>
<?php
include_once '../plantilla/pie.php';
?>