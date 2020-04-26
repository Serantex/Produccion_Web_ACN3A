<?php
$alfa=$_POST["filtro"];
$cat=$_POST["cat"];
if(!empty($alfa)){
    header("Location:../index.php?seccion=lista_productos&cat=$cat&filtro=$alfa");
}else{
    header("Location:../index.php?seccion=lista_productos&error=filtro_error"); 
}  