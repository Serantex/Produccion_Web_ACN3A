<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classCategorias.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$cat = new Categoria($con);

$nombre=ucwords($_POST["nombre"]);
$cat_padre=$_POST["cat_padre"];



if(empty($nombre)){
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "el nombre es obligatorio";
    
    header("Location:../index.php?seccion=categoria_admi");
}else{
    $cat->setCategoria($nombre,$cat_padre);
    $_SESSION["estado"] = "exito";
    $_SESSION["mensaje"] = "se agrego la categoria con exito";

    header("location:../index.php?seccion=lista_categoriaP");
}