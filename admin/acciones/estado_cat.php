<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classCategorias.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$cat=new Categoria($con);

$id=$_POST["id_cat"];

foreach($cat->getNombreSubCat($id) as $cate){
    $aprobado=$cate["estado"];
}


if($aprobado==1){
    $cat->desactivar($id);
}else{
    $cat->activar($id);
}
$_SESSION["estado"] = "exito";
$_SESSION["mensaje"] = "se modifico el estado con exito";
header("Location:../index.php?seccion=lista_categoriaP");

