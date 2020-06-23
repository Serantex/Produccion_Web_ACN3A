<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classUsuarios.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$user = new Usuario($con);

$id=$_POST["id_user"];

if(empty($id)){
    header("Location:../index.php?seccion=lista_usuarios=error&error=user_not_found");
}else{
    $user->deleteUsuario($id);
    header("location:../index.php?seccion=lista_usuarios");
}