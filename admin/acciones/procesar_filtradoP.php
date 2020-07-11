<?php
include_once("../../config/config.php");
include_once("../../config/funciones.php");
$cat=$_POST["cat"];

if(!empty($cat)){
    header("Location:../index.php?seccion=lista_productos&cat=$cat");
}else{
    $_SESSION["mensaje"]="vuelve a intentarlo";
    $_SESSION["estado"]="error"
    header("Location:../index.php?seccion=lista_productos"); 
}  