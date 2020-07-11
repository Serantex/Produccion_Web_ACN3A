<?php

include_once("../class/classComentarios.php");
include_once("../config/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$commentary=new Comentario($con);

$ip=$_POST["ip"];
$email=$_POST["email"];
$comentario=$_POST["comentario"];
$ranking=$_POST["rank"];
$id_producto=$_POST["id_producto"];
$producto=$_POST["producto"];

$isValid = $commentary->validateUpdateComment($id_producto, $ip);

if((empty($ip)||empty($email)||empty($ranking))){
    $_SESSION["estado"]="error";
    $_SESSION["mensaje"]="error en envio vuelve a intentarlo";
    header("Location:../index.php?seccion=producto&producto=$producto&error=error_envio_datos"); 
}elseif(!$isValid){
    header("Location:../index.php?seccion=producto&producto=$producto&error=error_comenta_luego_de_24_hs");
}else{
    exec($commentary->setComentario($email,$ip,$comentario,$ranking,$id_producto));
    header("Location:../index.php?seccion=producto&producto=$producto&comentario=enviado");
}