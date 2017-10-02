<?php
// require_once 'Manager/Conexion.php';
  require_once "Conexion.php";
 class Chef {

   public $pk_chef;
   public $Clave;
   public $Nombre;
   public $Cedula;
   public $Fecha;
   public $Edad;
   public $Rango;
   public $acceso;
   public $id;
   public $tabla;

   
   public  function __construct($usuario,$clave)
   {
   
    $this->pk_chef=$usuario;
    $this->Clave=$clave;
    $this->acceso=false; 
    $this->id=0;
   }
   public function ReguistrarEmpleado($arr){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO Chef(Clave,Nombre,Cedula,Fecha,Edad,Rango) VALUES(:Clave,:Nombre,:Cedula,:Fecha,:Edad,:Rango)');
        $consulta->bindParam(':Clave', $arr['Clave']);
        $consulta->bindParam(':Nombre', $arr['Nombre']);
        $consulta->bindParam(':Cedula', $arr['Cedula']);
        $consulta->bindParam(':Fecha', $arr['Fecha']);
        $consulta->bindParam(':Edad', $arr['Edad']);
        $consulta->bindParam(':Rango', $arr['Rango']);
        $consulta->execute();
        $bandera=true;
      } catch (Exception $e) {
        
      }
      return $bandera;
   }

   public  function Validar(){
       $conexion = new Conexion();
       $consulta = $conexion->prepare('SELECT * FROM Chef WHERE pk_chef = :pk_chef AND clave=:clave');
       $consulta->bindParam(':pk_chef', $this->pk_chef);
       $consulta->bindParam(':clave', $this->Clave);
       $consulta->execute();
       $registro = $consulta->fetch();
       if($registro){
       $this->Nombre=$registro['Nombre'];
       $this->Rango=$registro['Rango'];
          return true;
       }else{
          return false;
       }
    }
    
    public function listar($sql){
       $conexion = new Conexion();
       $consulta = $conexion->prepare($sql);
       $consulta->execute();
       $registros = $consulta->fetchAll();
       return $registros;
    }
    
    
    public function ReguistrarPostre($arr){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO Postre(Nombre,Precio,Tipo) VALUES(:Nombre,:Precio,:Tipo)');
        $consulta->bindParam(':Nombre', $arr['Nombre']);
        $consulta->bindParam(':Precio', $arr['Precio']);
        $consulta->bindParam(':Tipo', $arr['Tipo']);
        $consulta->execute();
        $this->id=$conexion->lastInsertId();
        $bandera=true;
      } catch (Exception $e) {
        
      }
    }
    public function CrearTabla(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $sql="CREATE TABLE R".$this->id."( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,Ingrediente VARCHAR(30) NOT NULL,Cantidad VARCHAR(30) NOT NULL)";
   
        $conexion->exec($sql);
        $bandera=true;
      } catch (Exception $e) {
      }
    }
    
    public function ReguistrarIngrediente(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('INSERT INTO '.$_POST['Tabla'].'(Ingrediente,Cantidad) VALUES(:Ingrediente,:Cantidad)');
        $consulta->bindParam(':Ingrediente', $_POST['IngredienteA']);
        $consulta->bindParam(':Cantidad', $_POST['CantidadA']);
        $consulta->execute();
        $bandera=true;
      } catch (Exception $e) {
        
      }
    }
    
    public function BajaIngrediente(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE  FROM R'.$_POST['tabla'].' WHERE id=:id');
        $consulta->bindParam(':id', $_POST['id']);
        $consulta->execute();
        $bandera=true;
      } catch (Exception $e) {
        
      }
    }
    public function ModificarIngrediente(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE '.$_POST['tabla'].'  SET Ingrediente=:Ingrediente, Cantidad=:Cantidad WHERE id=:id');
       // $consulta->bindParam(':tabla',$_POST['tabla']);
        $consulta->bindParam(':id', $_POST['id']);
        $consulta->bindParam(':Ingrediente', $_POST['Ingrediente']);
        $consulta->bindParam(':Cantidad', $_POST['Cantidad']);
        $consulta->execute();
       $bandera=true;
      } catch (Exception $e) {
        
      }
    }
    public function AltaReceta(){
      error_reporting(E_ALL);
      $pagename = 'A'.$this->id;
      $newFileName = '../recetas/'.$pagename.".txt";
      $newFileContent =$_POST['Receta'];
      try {
       if (file_put_contents($newFileName, $newFileContent) !== false) {
           // echo "File created (" . basename($newFileName) . ")";
        } else {
           // echo "Cannot create file (" . basename($newFileName) . ")";
        }
       } catch (Exception $e) {
        
      }
    }
    public function ModificarPostre(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE Postre  SET Nombre=:Nombre, Precio=:Precio, Tipo=:Tipo WHERE pk_postre=:pk_postre');
        $consulta->bindParam(':Nombre',$_POST['Nombre']);
        $consulta->bindParam(':Precio', $_POST['Precio']);
        $consulta->bindParam(':Tipo', $_POST['Tipo']);
        $consulta->bindParam(':pk_postre', $_POST['pk_postre']);
        $consulta->execute();
       $bandera=true;
      } catch (Exception $e) {
        
      }
    }
    
     public function BajaPostre(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE  FROM Postre WHERE pk_postre=:pk_postre');
        $consulta->bindParam(':pk_postre', $_POST['pk_postre']);
        $consulta->execute();
        $bandera=true;
      } catch (Exception $e) {
        
      }
    }
    public function EliminarTabla(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $sql ="DROP TABLE R".$_POST['pk_postre'];
         $conexion->exec($sql);
        $bandera=true;
        
      } catch (Exception $e) {
        
      }
    }
    
    public function AgregarFoto(){
    
      $bandera=false;
      $target_path = "../fotos/";
      
      $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

      try {

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
	{ 
	///echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
	rename('../fotos/'.basename( $_FILES['uploadedfile']['name']), '../fotos/I'.$this->id.'.jpg');
	} else{
	//echo "Ha ocurrido un error, trate de nuevo!";
	}
        
      } catch (Exception $e) {
        
      }
    }
    public function BajaChef(){
      $bandera=false;
      try {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE  FROM Chef WHERE pk_chef=:pk_chef');
        $consulta->bindParam(':pk_chef', $_POST['pk_chef']);
        $consulta->execute();
        $bandera=true;
      } catch (Exception $e) {
        
      }
    }

    
 }



?>