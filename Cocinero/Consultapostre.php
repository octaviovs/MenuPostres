<?php

require_once "../Chef/chef.php";
session_start();
$tabla;
$arr;

$lista=array();//lista que registra los id de los postres
$aux=array();//copia de lista
$miChef=$_SESSION["Chef"];
if (!empty($miChef)) {
      if(!empty($_POST)){
      $arr=$miChef->listar("SELECT * FROM R".$_POST['pk_postre']);
        
  $lista=unserialize($_POST['datos']);
   
        $aux=$lista;
       
      
      }else{
          header("Location:postres.php ");
      }


}else{

    header("Location:../index.php ");
}

?>




<!DOCTYPE html>
<html >
<head>
  <title>Chef-System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    

  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Pasteles Octavios</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="cocinero.php">Inicio</a></li> 
        <li><a href="postres.php">Postres</a></li> 
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container text-center">    
<br>
<h2>Lista de ingrediente</h2>
<div class="row"> 
<div class="col-md-1">
<?php 
 echo '<img src="../fotos/I'.$_POST['pk_postre'].'.jpg" class="img-responsive img-thumbnail"  alt="Responsive image" width="204" height="136">';
           
?>
 </div>
</div>
<br>
  <div class="row">
    <div class="col-md-12">
    <div class="table-responsive">
    <table class="table table-bordered">
        <tr>
          <th>Id postre</th>
          <th>Ingrediente</th>
          <th>Cantidaa</th>
       

        </tr>
        <?php
        $x=0;
         foreach($arr as $item):
            echo "<tr> ";
            echo "<td> ".$item['id']."</td>";
            echo "<td>".$item['Ingrediente']."</td>";
            echo "<td>".$item['Cantidad']."</td>";
            

               
            
            
            
                 
            echo "</tr>";
             $x++;
          endforeach;
        ?>
       
    </table>
    </div>
     </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <h3>Receta</h3>
      <br>
     <?php echo '<a class="btn btn-primary"    href="../recetas/A'.$_POST['pk_postre'].'.txt" role="button">Ver</a>'; ?>
    
    </div>
    <div class="col-md-4">
     
   
    </div>
    
    <div class="col-md-4">
      <h3>Siguiente receta</h3>
      <br>
      <?php 
            echo '<form action="Consultapostre.php"  method="POST">';
    $band=True;
    
     foreach($lista as $val)://get the el primero y el ultimo id
     if($val>$_POST['pk_postre']){
     $Nuevo=$val;
     $band=False;
     break;
     }
     else{
    $Nuevo=0;
     }
     
     if($band){
     $Nuevo=reset($aux);
     }
        endforeach;
   
            echo '<input type="hidden" name="datos" value="'.htmlentities(serialize($aux)).'">';
            echo '<input type="hidden" name="pk_postre" value="'.$Nuevo.'">';
            echo '<input type="submit" class="btn btn-primary" value="Siguiente">';
            echo" </form >";
      ?>
     <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalAgregarIngrediente" data-whatever="@mdo">Siguiente</button> 
    </div>
    
    
  </div>

</div><br>


<div class="modal fade" id="ModalAgregarIngrediente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Agregar ingrediente nuevo</h4>
      </div>
      <div class="modal-body">
        <form action="altaingrediente.php" method="POST">
     
          <div class="form-group">
            <label for="recipient-name" class="control-label">Ingrediente:</label>
           <?php echo '<input type="hidden" class="form-control" id="recipient-name" name="Tabla" value="R'.$_POST['pk_postre'].'">'; ?>
            <input type="text" class="form-control" id="recipient-name" name="IngredienteA" value="">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Cantidad:</label>
             <input type="text" class="form-control" id="recipient-name" name="CantidadA" value="">
          </div>
           <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>


</script>
</body>
</html>