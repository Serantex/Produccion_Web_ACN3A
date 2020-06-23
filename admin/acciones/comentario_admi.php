<?php
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classComentarios.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$com=new Comentario($con);

$id=$_POST["id_com"];

foreach($com->ComentarioEdit($id) as $comen){
    $aprobado=$comen["aprobado"];
}


if($aprobado==1){
    $com->desaprobar($id);
}else{
    $com->aprobar($id);
}
$_SESSION["estado"] = "exito";
$_SESSION["mensaje"] = "se modifico el estado con exito";

header("Location:../index.php?seccion=comentarios");

