<?php
include_once '../plantilla/cabecera.php';
include_once '../plantilla/barraSuperior.php';
include_once '../app/Conexion.php';
Conexion::abrir_conexion();
$conexion= Conexion::obtener_conexion();
$sql="Select * from foto";
$sentencia=$conexion->prepare($sql);
$sentencia->execute();
$resultado = $sentencia->fetchAll();
?>    

<!-- Top Bar -->
<?php include_once '../plantilla/barra_lateral_usuario.php'; ?>
<!-- #Top Bar -->


  <link rel="stylesheet" href="../css/estilos.css"/>
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="user-info">
            <div class="image">
                <!--<img src="images/user.png" width="48" height="48" alt="User" />-->
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                <div class="email"></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></i>
                    <ul class="dropdown-menu pull-right">

                    </ul>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header text-center">MENU</li>
                <li>
                    <a href="historia.php">
                        <i class="material-icons col-green">explore</i>
                        <span>Historia</span>
                    </a>
                </li>
                <li>
                    <a href="galeria.php">
                        <i class="material-icons col-blue">collections</i>
                        <span>Galerias</span>
                    </a>
                </li>
                <li>
                    <a href="noticias.php">
                        <i class="material-icons col-blue-grey">description</i>
                        <span>Noticias</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons col-deep-orange">book</i>
                        <span>Catalogo de libros</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="material-icons col-deep-purple">event</i>
                        <span>Proximos Eventos</span>
                    </a>
                </li>
                <li class="header">Nosotros</li>
                <li>
                    <a href="#">
                        <i class="material-icons col-red">contacts</i>
                        <span>Contactenos</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="material-icons col-amber">mail</i>
                        <span>Sugerencias</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 <a href="#">UES FMP</a>.
            </div>

        </div>
        <!-- #Footer -->
    </aside>\
    <!-- #END# Left Sidebar -->
</section>

  <section class="content">
        
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1>Galeria</h1>
                </div>
            </div>
	<div class="row">
            
            <!--
            
Photos from unsplash.com

Follow me on
Dribbble: https://dribbble.com/supahfunk
Twitter: https://twitter.com/supahfunk
Codepen: https://codepen.io/supah/

-->
<div class="gallery">
   <?php
    foreach($resultado as $fila){
    ?>
  <figure>
      <img src="<?php echo '../galeria/'.$fila['direccion']?>" alt="" class="fotoGaleria"/>
    
  </figure>
    <?php 
    }
    ?>
</div>


<script>
    popup = {
  init: function(){
    $('figure').click(function(){
      popup.open($(this));
    });
    
    $(document).on('click', '.popup img', function(){
      return false;
    }).on('click', '.popup', function(){
      popup.close();
    })
  },
  open: function($figure) {
    $('.gallery').addClass('pop');
    $popup = $('<div class="popup" />').appendTo($('body'));
    $fig = $figure.clone().appendTo($('.popup'));
    $bg = $('<div class="bg" />').appendTo($('.popup'));
    $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
    $shadow = $('<div class="shadow" />').appendTo($fig);
    src = $('img', $fig).attr('src');
    $shadow.css({backgroundImage: 'url(' + src + ')'});
    $bg.css({backgroundImage: 'url(' + src + ')'});
    setTimeout(function(){
      $('.popup').addClass('pop');
    }, 10);
  },
  close: function(){
    $('.gallery, .popup').removeClass('pop');
    setTimeout(function(){
      $('.popup').remove()
    }, 100);
  }
}

popup.init()

</script>
		
	</div>


  
    </section>
  
<?php include_once '../plantilla/pie.php';?>
