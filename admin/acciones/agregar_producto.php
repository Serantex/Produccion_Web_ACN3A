<?php   
include_once("../../config/config.php");
include_once("../config/funciones.php");


$nombre=$_POST["nombre"];
$precio=$_POST["precio"];
$descrip=$_POST["descrip"];

$cat=$_POST["cat"];
$sub_cat=$_POST["sub_cat"];

$stock=$_POST["stock"];
$novedad=$_POST["novedad"];

$imagen = $_FILES["imagen"];

if($imagen["type"] != "image/png"):
    header("Location:../index.php?seccion=producto_admi");
    die();
endif;

move_uploaded_file($imagen["tmp_name"],PRODUCTOS . "/$nombre.png");