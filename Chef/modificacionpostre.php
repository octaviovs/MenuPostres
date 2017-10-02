 <?php
require_once "chef.php";
session_start();
$miChef=$_SESSION["Chef"];
if (!empty($miChef)) {
      if(!empty($_POST)){
    	var_dump($_POST);
	$miChef->ModificarIngrediente();

	header("Location:Consultapostre.php");
      
      }else{
          header("Location:postres.php ");
      }


}else{

    header("Location:../index.php ");
}

?>