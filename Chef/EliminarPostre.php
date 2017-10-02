<?php

require_once "chef.php";

session_start();
$bandera=false;
$arr;
$miChef=$_SESSION["Chef"];
if (!empty($miChef)) {
      
        $arr= $miChef->ListarTipos();
        if(!empty($_POST)){
        $bandera=$miChef->ReguistrarPostre($_POST);
        $miChef->CrearTabla();
        $_POST=null;
        }
    
    
}else{

    header("Location:../index.php ");
}


  echo $miChef->id;
?>
