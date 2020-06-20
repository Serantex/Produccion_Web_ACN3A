<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classCategorias.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$cat = new Categoria($con);

$nombre=ucwords($_POST["nombre"]);
$cat_padre=$_POST["cat_padre"];
$nombre_actual=$_POST["nombre_actual"];

foreach($cat->getCategoriaEdit($nombre_actual)as $cats){
    $id_cate=$cats["id_categoria"];
}

if(empty($nombre)){
    header("Location:../index.php?seccion=categoria_admi");
}else{
    $cat->updateCategoria($id_cate,$nombre,$cat_padre);
    header("location:../index.php?seccion=lista_categoria");
}
