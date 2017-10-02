 <?php
require_once "chef.php";
session_start();
$miChef=$_SESSION["Chef"];
if (!empty($miChef)) {
      if(!empty($_POST)){
    	var_dump($_POST);
    	
	$miChef->BajaPostre();
	$miChef->EliminarTabla();
	$tt="A".$_POST['pk_postre'].".txt";
	array_map('unlink', glob("../recetas/".$tt));
	$tt="I".$_POST['pk_postre'].".jpg";
	array_map('unlink', glob("../fotos/".$tt));
	header("Location:Consultapostre.php");
      
      }else{
          header("Location:postres.php ");
      }


}else{

    header("Location:../index.php ");
}

?>