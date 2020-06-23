<?php

include_once("../../class/classSignup.php");
include_once("../../config/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$signerUp=new SignUp($con);

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$usuario=$_POST["usuario"];
$password=$_POST["password"];


if(empty($usuario)||empty($password)||empty($nombre)||empty($apellido)){
    header("Location:../index.php?seccion=sign_up&error=error_envio_datos"); 

}else{
   exec($signerUp->setUsuario($nombre,$apellido,$usuario,$password));
    header("Location:../../index.php?seccion=log_in&registro=usuario_registrado_con_exito");
}