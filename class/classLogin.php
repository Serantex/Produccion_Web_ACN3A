<?php
class Login{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }
    
    function validateUsuario ($usuario, $password){  
        $user="SELECT usuario, clave FROM usuarios WHERE usuario ='$usuario'"; 
        $contacta = $this->con->prepare($user);

        $contacta->execute();

        $row = $contacta->fetch(PDO::FETCH_ASSOC);
        
        if ($usuario ==$row['usuario'] && $password==$row['clave']){
            return true;
        }
    }
    


}