<?php

require_once "chef.php";
session_start();
$miChef=$_SESSION["Chef"];
if ($miChef->Rango=='Chef') {
    
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

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">D Ana</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="menu.php">Inicio</a></li>
         <li><a href="postres.php">Postres</a></li>  
        <li><a href="empleados.php">Empleados</a></li>  
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


  
<div class="container text-center">    
<br>
<br>
<font face="Bedrock" size="15">Pasteleria</font>
  <br>
  <br>
  <div class="row">
    <div class="col-sm-4  hoverable">
      <img src="../recursos/logo.png" class="img-responsive" style="width:100%" alt="Image" class="hoverable">
      <p>...</p>
    </div>
    
    <div class="col-sm-8">
    <div class="row">
    
    </div>
    
      <div class="well">
       <p>Galeria de pasteles</p>
      </div>
      <div class="well">
       <p>Ver calendario de citas</p>
      </div>
    </div>
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>