<?php 
class Usuario{

var $con;


function __construct($con){
    $this->con=$con;
}

    function getUsuarios(){
        $usuarios = "SELECT id_usuario, nombre, apellido, usuario FROM usuarios WHERE estado = 1";
        return $this->con->query($usuarios, PDO::FETCH_ASSOC);
    }

    function getByUsername($usuario){
        $sql = "SELECT id_usuario, nombre, apellido, usuario FROM usuarios WHERE usuario='$usuario'";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function deleteUsuario($id){
        $sql="UPDATE usuarios SET estado='0' WHERE id_usuario=$id"; 
        $sql = $this->con->prepare($sql);
        $sql->execute();
    }

    function editUsuario($id, $nombre, $apellido, $usuario){
        $sql="UPDATE usuarios SET nombre = '$nombre', apellido='$apellido', usuario='$usuario' WHERE id_usuario=$id"; 
        $sql = $this->con->prepare($sql);
        $sql->execute();
    }

    

}
