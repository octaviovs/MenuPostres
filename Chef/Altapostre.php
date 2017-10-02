
<?php

require_once "chef.php";

session_start();
$bandera=false;
$arr;
$miChef=$_SESSION["Chef"];
if (!empty($miChef)) {
      
        $arr= $miChef->listar("SELECT * FROM TipoPostre");
        if(!empty($_POST)){
        $bandera=$miChef->ReguistrarPostre($_POST);
        $miChef->CrearTabla();
        $miChef->AltaReceta();
        $miChef->AgregarFoto();
    
         header("Location: postres.php ");
        }
    
    
}else{

    header("Location:../index.php ");
}

?>


<!DOCTYPE html>
<html >
<head>
  <title>Bootstrap Example</title>
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
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="menu.php">Inicio</a></li>
     	<li class="active"><a href="postres.php">Postroes</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="salir.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container text-center">    
  <div class="row">
    <div class="col-sm-12"> 
    <h2> Nuevo postre</h2>
    </div>   
  </div>

  <form enctype="multipart/form-data" action="Altapostre.php" method="POST">
  <div class="row">
    <div class="col-sm-3">
      <div class="form-group">
        <label for="usr">Nombre:</label>
        <input type="text" class="form-control" id="usr" name="Nombre"  required>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="form-group">
      <label for="usr">Tipo postre:</label>
      <br>
         <?php
         
         
         
    echo '<select name="Tipo" class="selectpicker">';
      foreach($arr as $item):
      echo "<option value='{$item['Descripcion']}' >".$item['Descripcion'] ."</option> ";
      
      
      endforeach;
        echo "</select> <br>";
         ?>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="form-group">
        <label for="usr">Precio:</label>
        <input type="text" class="form-control" id="usr" name="Precio"  required>
      </div>
    </div>
    
    <div class="col-sm-3">
      <div class="form-group">
        <label for="usr">Escala de calidad (1-10):</label>
        <input type="text" class="form-control" id="usr" name="Ingredientes"  required>
      </div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<textarea class="form-control" rows="3" name="Receta"></textarea>
    	</div>
    	
    	<div class="col-md-4">
    		<input name="uploadedfile" type="file" />
    	</div>
    	
    </div>
    
    
    <div class="row">

    <div class="col-sm-2">
      <div class="form-group">
         <button type="submit" class="btn btn-default">Agregar</button>
      </div>
    </div>
  </div>
  </form>
  <?php 
  	if ($bandera) {
  		echo '<div class="alert alert-success" role="alert">Reguistro exitoso!!!</div>';
  	}
   ?>
</div>
<br>
<footer class="container-fluid text-center">
  <p>Footer Text</p>
  
</footer>
 <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
</body>
</html>
