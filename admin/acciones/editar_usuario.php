<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classUsuarios.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$user = new Usuario($con);

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$permisos=$_POST["permisos"];

if(empty($usuario)){
    header("Location:../index.php?seccion=lista_usuarios=error&error=user_not_found");
}else{
    $user->editUsuario($id, $nombre, $apellido, $usuario, $permisos);
    header("location:../index.php?seccion=lista_usuarios");
}