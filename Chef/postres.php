<?php

require_once "chef.php";
session_start();
$ListaId;
$arr;
$miChef=$_SESSION["Chef"];
$pila = array();
if (!empty($miChef)) {
   $ar= $miChef->listar("SELECT * FROM TipoPostre");
       $arr=$miChef->listar("SELECT * FROM Postre");

        foreach($arr as $valor)://get the el primero y el ultimo id
        array_push($pila, $valor['pk_postre']);
        endforeach;

      



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
     <li class="active"><a href="Altapostre.php">Nuevo</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container text-center">    
  <div class="row">
  <div class="table-responsive">
    <div class="col-md-12">
    <table class="table table-bordered">
        <tr>
          <th>Id postre</th>
          <th>Nombre</th>
          <th>Tipo postre</th>
          <th>Precio</th>
          <th>Foto</th>
 
          <th>Receta</th>


        </tr>
        <?php
        $x=0;
          $y=1;
         foreach($arr as $item):
            echo "<tr> ";
            echo "<td> ".$item['pk_postre']."</td>";
            echo "<td>".$item['Nombre']."</td>";
            echo "<td>".$item['Tipo']."</td>";
            echo "<td>".$item['Precio']."</td>";  
            
            
             
            echo '<td>';
            
            echo '<img src="../fotos/I'.$y.'.jpg" class="img-responsive img-thumbnail"  alt="Responsive image" width="204" height="136">';
            
            echo '</td>';
              
            echo '<td>';
            echo '<form action="Consultapostre.php"  method="POST">';
        
          //  $datos = serialize($pila);
 
            echo  '<input type="hidden" name="datos" value="'.htmlentities(serialize($pila)).'" />';
            echo '<input type="hidden" name="inicio" value="'.reset($pila).'">';
            echo '<input type="hidden" name="fin" value="'.end($pila).'">';
            
            echo '<input type="hidden" name="pk_postre" value="'.$item['pk_postre'].'">';
            echo '<input type="submit" class="btn btn-success" value="Consulta/Modificacion">';
            echo" </form >";
            echo '</td>';       
         
            
            echo '<td>';
             echo '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalModificar'.$x.'" data-whatever="@mdo">Modificar</button>';

            
            echo '
            
            
            <div class="modal fade" id="ModalModificar'.$x.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Modificar Postre</h4>
                  </div>
                  <div class="modal-body">
                    <form action="mopostre.php" method="POST">
                 
                      <div class="form-group">
                        <label for="recipient-name" class="control-label">Nombre:</label>
                         <input type="hidden" class="form-control" id="recipient-name" name="pk_postre" value="'.$item['pk_postre'].'">
                        <input type="text" class="form-control" id="recipient-name" name="Nombre" value="'.$item['Nombre'].'">
                      </div>
                       <div class="form-group">
                        <label for="message-text" class="control-label">Tipo de postre:</label> ';
                          
                          
                          
                          echo '<select name="Tipo" class="selectpicker">';
      foreach($ar as $ite):
      echo "<option value='{$ite['Descripcion']}' >".$ite['Descripcion'] ."</option> ";
      endforeach;
        echo "</select> <br>";
                       
                     echo '
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="control-label">Precio:</label>
                         <input type="text" class="form-control" id="recipient-name" name="Precio" value="'.$item['Precio'].'">
                      </div>
                       <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Modificacion</button>
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            ';

            
            echo '</td>';



            
            
             echo '<td>';
            echo '<form action="eliminartodo.php"  method="POST">';
            echo '<input type="hidden" name="pk_postre" value="'.$item['pk_postre'].'">';
            echo '<input type="submit" class="btn btn-danger" value="Eliminar">';
            echo" </form >";
            echo '</td>';       
            echo "</tr>";
             $x++;
             $y++;
          endforeach;
        ?>
       
    </table>
     </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>