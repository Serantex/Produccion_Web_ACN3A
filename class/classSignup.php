<?php
class SignUp{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }

    function setUsuario ($nombre,$apellido,$usuario,$password){

        $salt= uniqid();   
        $password=$this->encrypt($password,$salt);

        $inserta="INSERT INTO usuarios (nombre,apellido,usuario,clave,salt) VALUES (:nombre,:apellido,:usuario,:clave,:salt)";  
        $inserta = $this->con->prepare($inserta);

        $inserta->bindParam(':nombre',$nombre,PDO::PARAM_STR, 50);
        $inserta->bindParam(':apellido',$apellido,PDO::PARAM_STR, 50);
        $inserta->bindParam(':usuario',$usuario,PDO::PARAM_STR, 50);
        $inserta->bindParam(':clave',$password,PDO::PARAM_STR, 50);
        $inserta->bindParam(':salt',$salt,PDO::PARAM_STR, 50);

        $inserta->execute();
        }

    private function encrypt($password,$salt){
            $password .= $salt;
            return hash('md5',$password);
        }

    }
