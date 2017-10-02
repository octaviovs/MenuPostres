<?php 

$valor;
if (!empty($_POST['valor'])) {
var_dump($valor);
     $valor=$_POST['valor']+1;


}else{
$valor=1;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<form action="sumar.php" method="POST">

  <?php 
  echo $valor;
  echo '<input type="hidden" name="valor" value="'.$valor.'">';
  ?>
     <input type="submit" value="Submit">
                            
</form>
</body>
</html>


    
