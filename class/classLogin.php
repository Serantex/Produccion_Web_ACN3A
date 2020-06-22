<?php
class Login{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }
    
    function validateUsuario ($usuario, $password){  
        $user="SELECT usuario, clave FROM usuarios WHERE usuario = $usuario"; 
        $contacta = $this->con->prepare($user);

        $contacta->execute();
        
        if ($usuario = $user['usuario'] && $password == $user['clave']){
            return true;
        }
    }
    


}