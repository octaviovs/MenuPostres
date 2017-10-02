<?php 

require_once "chef.php";

$arr;
$llenos=false;
session_start();
$miChef=$_SESSION["Chef"];
if (!empty($miChef)) {
     $arr=$miChef->listar("select * from Chef");
     if(!empty($arr)){
    	$llenos=true;
    	if(!empty($_POST['Eliminar'])){
    	$miChef->BajaChef();
    	 header("Location:empleados.php ");
    	}
    	if(!empty($_POST['Modificar'])){
    	
    	 header("Location:empleados.php ");
    	}
    	
    	
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
        <li class="active"><a href="menu.php">Inicio</a></li>
      
        <li><a href="Alta.php">Nuevo empleado</a></li>  
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-12"> 
    <h2>Lista de pacientes</h2>
    
    <?php 
      if($llenos=true){
      echo '<div class="alert alert-success" role="alert">Listado con exito</div>';
      }else{
      echo '<div class="alert alert-warning" role="alert">Sin datos</div>'; 
      
      }
    ?>
      <table class="table">
        <tr>
          <th>Clave Empledado</th>
          <th>Clave</th>
          <th>Nombre</th>
          <th>Cedula</th>
          <th>Fecha Ingreso</th>
          <th>Edad</th>
          <th>Puesto</th>
        
          <th>Modificar</th>
          <th>Eliminar</th>
        </tr>
        <?php
        foreach($arr as $item):
      
            echo "<tr> ";
            echo "<td> ".$item['pk_chef']."</td>";
            echo "<td>".$item['Clave']."</td>";
            echo "<td>".$item['Nombre']."</td>";
            echo "<td>".$item['Cedula']."</td>";
            echo "<td>".$item['Fecha']."</td>";
            echo "<td>".$item['Edad']."</td>";
            echo "<td>".$item['Rango']."</td>";



     

 	    echo '<td>';
            echo '<form action="modificarpaciente1.php"  method="POST">';
            echo '<input type="hidden" name="pk_paciente" value="'.$item['pk_chef'].'">';
            echo '<input type="submit" class="btn btn-warning" value="Modificar">';
            echo" </form >";
            echo '</td>';



            echo '<td>';
            echo '<form action="empleados.php"  method="POST">';
            echo '<input type="hidden" name="pk_chef" value="'.$item['pk_chef'].'">';
            echo '<input type="hidden" name="Eliminar" value="Eliminar">';
            echo '<input type="submit" class="btn btn-danger" value="Eliminar">';
            echo" </form >";
            echo '</td>';


            echo "</tr>";
          endforeach;
        ?>
       
    </table>

    </div>   
  </div>
</div><br>
<br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>