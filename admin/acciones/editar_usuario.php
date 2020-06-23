<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classUsuarios.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$user = new Usuario($con);

$nombre=$_POST["nombre"];
$nombre_actual=$_POST["nombre_actual"];
$apellido=$_POST["apellido"];
$apellido_actual=$_POST["apellido_actual"];
$usuario=$_POST["usuario"];
$usuario_actual=$_POST["usuario_actual"];
$permisos=$_POST["permisos"];
$permiso_actual=$_POST["permiso_actual"];
$id=$_POST["id_usuario"];

if(empty($id)){
    header("Location:../index.php?seccion=lista_usuarios=error&error=user_not_found");
}else if(empty($nombre) || empty($apellido) || empty($usuario) || empty($permisos)){
    $user->editUsuario($id, $nombre_actual, $apellido_actual, $usuario_actual, $permisos_actual);
    header("location:../index.php?seccion=lista_usuarios");    
}else{
    $user->editUsuario($id, $nombre, $apellido, $usuario, $permisos);
    header("location:../index.php?seccion=lista_usuarios");
}*/