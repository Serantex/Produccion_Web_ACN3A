<?php
include_once("../../class/classUsuarios.php");
include_once("../../class/classSignup.php");
include_once("../../class/classPerfiles.php");
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$signerUp=new SignUp($con);
$usu=new Usuario($con);
$perfil=new Perfil($con);

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$password=$_POST["password"];
$perfiles=$_POST["perfiles"];

if(empty($usuario)||empty($password)||empty($nombre)||empty($apellido)){
    header("Location:../index.php?seccion=sign_up&error=error_envio_datos"); 
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Todos los datos son obligatorios";
}else{
    foreach($usu->getByUsername($usuario)as $user){
        $u=$user["usuario"];
    }

    if(!empty($u)){
    header("Location:../index.php?seccion=sign_up"); 
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "el usuario ya existe";
    }else{
   exec($signerUp->setUsuario($nombre,$apellido,$usuario,$password));
   foreach($usu->getByUsername($usuario) as $us){
       $id_usuario=$us["id_usuario"];
   } 
   exec($perfil->setPerfilUsuario($perfiles,$id_usuario));
    header("Location:../../index.php?seccion=log_in&registro=usuario_registrado_con_exito");
    $_SESSION["estado"] = "exito";
    $_SESSION["mensaje"] = "el registro se completo con exito";
}}