<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classUsuarios.php");
include_once("../../class/classPerfiles.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$user = new Usuario($con);
$perfil=new Perfil($con);

$id=$_POST["id_user"];

if(empty($id)){
    header("Location:../index.php?seccion=lista_usuarios=error&error=user_not_found");
}else{
    $user->deleteUsuario($id);
    $perfil->deletPerfilUsuario($id);
    header("location:../index.php?seccion=lista_usuarios");
}