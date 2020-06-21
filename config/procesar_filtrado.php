<?php
$alfa=$_POST["filtro"];
$cat=$_POST["cat"];
$marc=$_POST["marca"];

if(!empty($alfa)){
    header("Location:../index.php?seccion=lista_productos&cat=$cat&filtro=$alfa&marca=$marc");
}else{
    header("Location:../index.php?seccion=lista_productos&error=filtro_error"); 
}  