<?php
$cat=$_POST["cat"];

if(!empty($cat)){
    header("Location:../index.php?seccion=lista_productos&cat=$cat");
}else{
    header("Location:../index.php?seccion=lista_productos&error=filtro_error"); 
}  