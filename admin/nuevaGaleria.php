<?php
include_once '../plantilla/cabecera_admi.php';
include_once '../plantilla/barra_superior_admi.php';
include_once '../plantilla/barra_lateral_admi.php';
include_once '../app/Conexion.php';
Conexion::abrir_conexion();
$conexion= Conexion::obtener_conexion();
$sql="Select * from foto";
$sentencia=$conexion->prepare($sql);
$sentencia->execute();
                $resultado = $sentencia->fetchAll();

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
        
            <div class="row">
                <div class="col-md-4 text-right">
                    
                </div>
                <div class="col-md-4 text-Center">
                    <h1>Galeria</h1>
                </div>
                <div class="col-md-4 text-center">
                   <div class="row">
                       <form method="post" action="subirFotos.php" name="galeria" id="galeria" enctype="multipart/form-data">
	
	<label for="imagen">Subir Fotos</label> 
	
	
           
  	<input id="imagen" name="imagen[]" accept="image/*" size="30" type="file" multiple="multiple"  class="form-control"/>
        <input type="submit" value="Guardar"  class="btn btn-success form-control"/>
           </form>
  	</div>
                        
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
      <img src="<?php echo '../galeria/'.$fila['direccion']?>" alt="" />
    
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
</body>
</html>
<?php
include_once '../plantilla/pie.php';
?>