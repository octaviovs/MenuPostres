<?php
$result=false;
session_start();
$_SESSION["Chef"]=$value;
unset($_SESSION["Chef"]);

require_once 'Chef/chef.php';
if (!empty($_POST)) {
$NewChef=new Chef($_POST['usuario'],$_POST['clave']);
if ($NewChef->Validar()) {
        session_start();
        $_SESSION["Chef"]=$NewChef;
        if ($NewChef->Rango=='Chef') {
        header("Location:Chef/menu.php ");
        }
        if ($NewChef->Rango=='Cocinero') {
           header("Location:Cocinero/cocinero.php ");
        }
      }
    
}else{

}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Octavio" content="">
    <title>Inicio de sesion</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      </div>
    </nav>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Pasteleri Octavios</h1>
        <p></p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button" data-toggle="modal" data-target="#login-modal">iniciar</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Usuario chef:</h2>
          <p>usuario:1, clave :123 </p>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>cocinero</h2>
          <p>usuario:2 clave :123</p>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
      <hr>

      <footer>
        <p>&copy; Company 2017</p>
      </footer>
    </div> <!-- /container -->



<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" align="center">
          <img class="img-circle" id="img_logo" src="http://bootsnipp.com/img/logo.jpg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </button>
        </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">              
                    <!-- Begin # Login Form -->
                    <form id="login-form" method="POST" action="index.php">
                    <div class="modal-body">
                <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            </div>
                <input id="login_username" class="form-control" type="text" placeholder="usuario" name="usuario" required>
                <br>
                <input id="login_password" class="form-control" type="password" placeholder="clave"  name="clave" required>
                    <br>
                    <select class="form-control" name="tipoUsuario">
                <option vale=1>Chef</option>
                <option vale=2>Cocinero</option>
              </select>
                  </div>
                <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" vale="inciar">Login</button>
                            </div>
                </div>
                    </form>
                    <!-- End # Login Form -->
                </div>
                <!-- End # DIV Form -->
      </div>
    </div>
</div>
  
  
  
  
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/js/ie10-viewport-bug-workaround.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
