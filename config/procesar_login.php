<?php
require_once("../config/config.php");
require_once("../config/funciones.php");
include_once("../class/classLogin.php");
include_once("../class/classUsuarios.php");
include_once("../config/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$loggerin=new Login($con);
$us=new Usuario($con);

if(empty($_POST["usuario"]) || empty($_POST["password"])):
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "El usuario y el password son obligatorios";

    header("Location: ../index.php?seccion=log_in");
    die();
endif;

$user = $_POST["usuario"];
$password = $_POST["password"];

$isValid = $loggerin->validateUsuario($user, $password);

    if(!$isValid){
        $_SESSION["estado"] = "error";
        $_SESSION["mensaje"] = "Los datos ingresados son incorrectos";

        header("Location:../index.php?seccion=log_in&log_in=error=datos_incorrectos");
        die();
    }else{
        foreach($us->getByUsername($user)as $use){
            $_SESSION["id_usuario"] = [
                "id_usuario" => $use["id_usuario"]
            ];
        }
        $loggerin->permisosUsuario($use["id_usuario"]);
        $_SESSION["usuario"] = [
            "usuario" => $user
        ];
        
}
header("Location:../admin/index.php?seccion=lista_productos");

