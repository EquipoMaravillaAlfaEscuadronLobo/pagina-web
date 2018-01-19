<?php
  session_start();
  include_once '../app/Conexion.php';
  include_once '../repositorios/repositorio_administrador.php';
  include_once '../modelos/administrador.php';
    Conexion::abrir_conexion();
  $admin= repositorio_administrador::obtener_administrador_actual(Conexion::obtener_conexion(), $_SESSION['user']);
 
  

  
    
  if (!empty($_FILES["imagen"]["name"])) {
     
      //echo "Imagenes Guardadas";
      $bandera=true;
      $total=count($_FILES["imagen"]["name"]);
      echo $total;
      for($i=0;$i<$total;$i++){
      insertarFoto(Conexion::obtener_conexion(),$_FILES["imagen"]["name"][$i],$admin->getId_administrador());
      copy($_FILES["imagen"]["tmp_name"][$i], '../galeria/'.$_FILES["imagen"]["name"][$i]);
      }
      echo '<script>';
      echo 'swal("Exito, "Imagenes Guardadas","success")';
      echo '</script>';

  }
      header("Location: nuevaGaleria.php");
  
 

  

  function insertarFoto($conexion,$foto, $id){
     try {
          
         $consulta = "INSERT INTO foto
    (direccion,id_administrador)
    VALUES ('$foto', '$id')";
  $stmt2=$conexion->prepare($consulta);
  $stmt2->execute(); 
        }  catch (PDOException $exc) {
                print 'ERROR' . $exc->getMessage();
            }
  }
?>