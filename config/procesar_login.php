<?php
require_once("../config/config.php");
include_once("../class/classLogin.php");
include_once("../config/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$loggerin=new Login($con);

if(!isset($_POST["usuario"]) || !isset($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El email y el password son obligatorios";

    header("Location: ../index.php?seccion=log_in");
    die();
endif;

$user = $_POST["usuario"];
$pass = $_POST["password"];

$isValid = $loggerin->validateUsuario($user, $pass);
if(!isset($user)||!isset($pass)){
    header("Location:../index.php?seccion=log_in&log_in=error=error_envio_datos"); 
}elseif(!$isValid){
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "Los datos ingresados son incorrectos";

    header("Location:../index.php?seccion=log_in&log_in=error=datos_incorrectos");
    die();
}else{
    $_SESSION["usuario"] = [
        "usuario" => $user,
    ];
    header("Location:../admin/index.php?seccion=lista_productos");
}

