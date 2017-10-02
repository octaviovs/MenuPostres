<?php
  $bandera;
  require_once "chef.php";
  session_start();
  $miChef=$_SESSION["Chef"];
  if (!empty($miChef)) {
    if (!empty($_POST)) {
        if ($miChef->ReguistrarEmpleado($_POST)) {
          $bandera=true;
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
          <li><a href="empleados.php">Empleados</a></li>  
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
      <h2>Nuevo Empleado</h2>
      </div>   
    </div>
    <form action="Alta.php" method="POST">
    <div class="row">
      <div class="col-sm-2">
        <div class="form-group">
          <label for="usr">Clave:</label>
          <input type="password" class="form-control" id="usr" name="Clave"  required>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="usr">Nombre:</label>
          <input type="text" class="form-control" id="usr" name="Nombre"  required>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="usr">Cedula:</label>
          <input type="text" class="form-control" id="usr" name="Cedula"  required>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="usr">Fecha:</label>
          <input type="date" class="form-control" id="usr" name="Fecha"  required>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group">
          <label for="usr">Edad:</label>
          <input type="text" class="form-control" id="usr" name="Edad"  required>
        </div>
      </div>
   <div class="col-sm-2">
        <div class="form-group">
          <label for="usr">Rango:</label>
          <input type="text" class="form-control" id="usr" name="Rango"  required>
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
      }else
      {
      echo '<div class="alert alert-success" role="alert">Algo paso</div>';

      }
     ?>
  </div><br>

  <footer class="container-fluid text-center">
    <p>Footer Text</p>
  </footer>

  </body>
  </html>