 <?php 
 include_once("../../config/mysql-login.php");
 include_once("../../config/config.php");
 include_once("../../class/classPerfiles.php");
 include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);	  
$perfiles = new Perfil($con);
      
$id=$_POST["permisos"];
$nombre=$_POST["nombre"];

     if(isset($_POST["nombre"]) && isset($_POST["permisos"])){ 
                 $perfiles->setPerfil($id,$nombre); 

       header("location:../index.php?seccion=perfiles");
     }	

 
       
       
         