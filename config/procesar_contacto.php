<?php

include_once("../class/classContacto.php");
include_once("../config/mysql-login.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$contacto=new Contacto($con);


$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$comentario = $_POST["comentario"];
$comentario = nl2br(htmlentities(trim($comentario)));
$motivo = $_POST["motivo"];
$motivo = implode(",", $motivo);



if(empty($_POST["email"]) || empty($_POST["comentario"]) || empty($_POST["apellido"]) || empty($_POST["telefono"]) || empty($_POST["nombre"])|| empty($_POST["motivo"])):
    header("Location:../index.php?seccion=contacto&estado=no_correcto&mensaje=error_envio");
else:
    exec($contacto->setContacto($nombre,$apellido,$telefono,$email,$comentario,$motivo));
    header("Location:../index.php?seccion=contacto&estado=correcto&mensaje=enviado");  




   
endif;