<?php 
class Usuario{

var $con;


function __construct($con){
    $this->con=$con;
}

    function getUsuarios(){
         $sql = "SELECT * FROM usuarios";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getUsuarioPorNombre($nombre){
        $sql = "SELECT nombre FROM usuarios WHERE nombre=$nombre";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getIdUsuario($username){
        $sql = "SELECT id_usuario FROM usuarios WHERE usuario=$username";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

}
