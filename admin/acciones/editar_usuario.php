<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classUsuarios.php");
include_once("../../class/classPerfiles.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$user = new Usuario($con);
$perfil= new Perfil($con);

$nombre=$_POST["nombre"];
$nombre_actual=$_POST["nombre_actual"];
$apellido=$_POST["apellido"];
$apellido_actual=$_POST["apellido_actual"];
$usuario=$_POST["usuario"];
$usuario_actual=$_POST["usuario_actual"];
$id=$_POST["id_usuario"];
$perfiles=$_POST["perfiles"];

if(empty($id)){
    header("Location:../index.php?seccion=lista_usuarios=error&error=user_not_found");
}else if(empty($nombre) || empty($apellido) || empty($usuario) || empty($perfiles)){
    $user->editUsuario($id, $nombre_actual, $apellido_actual, $usuario_actual);
    $perfil->updatePerfilUsuario($perfiles,$id);
    header("location:../index.php?seccion=lista_usuarios");    
}else{
    $user->editUsuario($id, $nombre, $apellido, $usuario);
    $perfil->updatePerfilUsuario($perfiles,$id);
    header("location:../index.php?seccion=lista_usuarios");
}