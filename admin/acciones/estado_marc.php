<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classMarca.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$marc=new Marca($con);

$id=$_POST["id_marc"];

foreach($marc->getNombreMarca($id) as $marc){
    $aprobado=$marc["estado"];
}


if($aprobado==1){
    $marc->desactivar($id);
}else{
    $marc->activar($id);
}

header("Location:../index.php?seccion=lista_marca");
