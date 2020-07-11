<?php 
 include_once("../../config/mysql-login.php");
 include_once("../../config/config.php");
 include_once("../../class/classPerfiles.php");
 include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);	  
$perfiles = new Perfil($con);
      
$id=$_POST["permisos"];
$nombre=$_POST["nombre"];
$id_a=$_POST["id"];

     if(isset($_POST["nombre"]) && isset($_POST["permisos"])){ 
        $perfiles->updatePerfil($id,$id_a,$nombre); 

        $_SESSION["estado"] = "exito";
        $_SESSION["mensaje"]="perfil modificado";

       header("location:../index.php?seccion=perfiles");
     }else{
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"]="datos en modificar";

       header("location:../index.php?seccion=perfiles");
     }
