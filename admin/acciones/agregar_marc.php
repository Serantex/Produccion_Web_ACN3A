<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classMarcas.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$marc = new Marca($con);

$nombre=ucwords($_POST["nombre"]);

if(empty($nombre)){
    header("Location:../index.php?seccion=marca_admi");
}else{
    $marc->setMarca($nombre);
    header("location:../index.php?seccion=lista_marcas");
}