<?php

include_once("../class/classComentarios.php");
include_once("../config/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$commentary=new Comentario($con);

$ip=$_POST["ip"];
$email=$_POST["email"];
$comentario=$_POST["comentario"];
$rank=$_POST["rank"];
$id_producto=$_POST["id_producto"];
$producto=$_POST["producto"];


if(empty($ip)||empty($email)||empty($rank)){
    header("Location:../index.php?seccion=producto&producto=$producto&error=error_envio_datos"); 
}else{
    $con->exec($commentary->setComentario($email,$ip,$comentario,$rank,$id_producto));
    header("Location:../index.php?seccion=producto&producto=$producto&comentario=enviado");
}