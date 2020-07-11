<?php
include_once("../../config/config.php");
include_once("../../config/funciones.php");
$producto=$_POST["pro"];
$filtro=$_POST["filtro"];

if(empty($producto)){
    if(!empty($filtro)){
        header("Location:../index.php?seccion=comentarios&filtro=$filtro");
    }else{
        $_SESSION["mensaje"]="vuelve a intentarlo";
        $_SESSION["estado"]="error"
        header("Location:../index.php?seccion=comentarios"); 
    } 
}else{
    if(!empty($filtro)){
        header("Location:../index.php?seccion=comentarios&filtro=$filtro&producto=$producto");
    }else{
        $_SESSION["mensaje"]="vuelve a intentarlo";
        $_SESSION["estado"]="error"
        header("Location:../index.php?seccion=comentarios"); 
    } 
} 