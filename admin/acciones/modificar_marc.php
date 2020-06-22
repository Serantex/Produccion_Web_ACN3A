<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classMarca.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$marc = new Marca($con);

$nombre=ucwords($_POST["nombre"]);
$marc_padre=$_POST["marc_padre"];
$nombre_actual=$_POST["nombre_actual"];

foreach($cat->getMarcaEdit($nombre_actual)as $marcs){
    $id_marc=$marcs["id_marca"];
}

if(empty($nombre)){
    header("Location:../index.php?seccion=marca_admi");
}else{
    $marc->updateCategoria($id_marc,$nombre,$marc_padre);
    header("location:../index.php?seccion=lista_marca");
}
