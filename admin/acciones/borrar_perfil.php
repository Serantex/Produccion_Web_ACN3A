<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classPerfiles.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$perfil=new Perfil($con);

if($perfil->consulta($_POST['id_perfil'])>=1){
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"]="perfil en uso";
    header("Location:../index.php?seccion=perfiles");

}else{
    
    $perfil->deletPerfil($_POST['id_perfil']);
    $perfil->deletPerfilPermiso($_POST['id_perfil']);
    $_SESSION["estado"] = "exito";
    $_SESSION["mensaje"]="perfil borrado";
    header("Location:../index.php?seccion=perfiles");
}






        
            