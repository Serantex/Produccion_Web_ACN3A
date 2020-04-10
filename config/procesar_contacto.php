<?php

echo "<pre>";
print_r($_POST);
echo "</pre>";



$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$nick = $_POST["telefono"];
$email = $_POST["email"];
$comentario = $_POST["comentario"];
$comentario = nl2br(htmlentities(trim($comentario)));
$motivo = $_POST["area"];
$motivo = serialize($motivo);



if(empty($_POST["email"]) || empty($_POST["area"]) || empty($_POST["apellido"]) || empty($_POST["telefono"]) || empty($_POST["nombre"])):
    header("Location:../index.php?seccion=contacto&estado=no_correcto&mensaje=error_envio");
else:
    header("Location:../index.php?seccion=contacto&nombre=$nombre&apellido=$apellido&email=$email&motivo=$motivo&telef=$nick&comentario=$comentario&estado=correcto&mensaje=enviado");   
    die();
endif;