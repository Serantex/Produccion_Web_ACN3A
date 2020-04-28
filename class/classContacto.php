<?php
class Contacto{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }

    function setContacto ($nombre,$apellido,$telefono,$email,$comentario,$motivo){   
        $contacta="INSERT INTO contactos (nombre,apellido,telefono,email,comentario,motivo) VALUES (:nombre,:apellido,:telefono,:email,:comentario,:motivo)"; 
        $contacta = $this->con->prepare($contacta);

        $contacta->bindParam(':nombre',$nombre,PDO::PARAM_STR, 100);
        $contacta->bindParam(':apellido',$apellido,PDO::PARAM_STR, 100);
        $contacta->bindParam(':telefono',$telefono,PDO::PARAM_INT,300);
        $contacta->bindParam(':email',$email,PDO::PARAM_STR,100);
        $contacta->bindParam(':comentario',$comentario,PDO::PARAM_STR,100);
        $contacta->bindParam(':motivo',$motivo,PDO::PARAM_STR,100);

        $contacta->execute();
        }

    }

