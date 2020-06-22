<?php
class SignUp{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }

    function setUsuario ($nombre,$apellido,$usuario,$password){   
        $inserta="INSERT INTO usuarios (nombre,apellido,usuario,clave) VALUES (:nombre,:apellido,:usuario,:clave)";  
        $inserta = $this->con->prepare($inserta);

        $inserta->bindParam(':nombre',$nombre,PDO::PARAM_STR, 50);
        $inserta->bindParam(':apellido',$apellido,PDO::PARAM_STR, 50);
        $inserta->bindParam(':usuario',$usuario,PDO::PARAM_STR, 50);
        $inserta->bindParam(':clave',$password,PDO::PARAM_STR, 50);

        $inserta->execute();
        }

    }
