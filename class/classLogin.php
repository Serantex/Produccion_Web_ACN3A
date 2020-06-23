<?php
class Login{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }
    
    function validateUsuario ($user, $pass){  
        $query="SELECT usuario, clave FROM usuarios WHERE usuario = '$user'"; 
        $contacta = $this->con->prepare($query);

        $contacta->execute();
        if ($user == $query['usuario'] && $pass == $query['clave']){
            return true;
        }
    }
}