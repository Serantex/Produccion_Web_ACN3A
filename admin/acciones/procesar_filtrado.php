<?php
$producto=$_POST["pro"];
$filtro=$_POST["filtro"];

if(empty($producto)){
    if(!empty($filtro)){
        header("Location:../index.php?seccion=comentarios&filtro=$filtro");
    }else{
        header("Location:../index.php?seccion=comentarios&error=filtro_error"); 
    } 
}else{
    if(!empty($filtro)){
        header("Location:../index.php?seccion=comentarios&filtro=$filtro&producto=$producto");
    }else{
        header("Location:../index.php?seccion=comentarios&error=filtro_error"); 
    } 
} 