<?php
class Login{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }
    
    function validateUsuario ($usuario, $password){  
        $user="SELECT id_usuario,usuario, clave, salt FROM usuarios WHERE usuario ='$usuario' AND estado=1"; 
        $contacta = $this->con->prepare($user);

        $contacta->execute();

        $row = $contacta->fetch(PDO::FETCH_ASSOC);

        $row["salt"];

        if ($usuario ==$row['usuario'] && ($this->encrypt($password,$row['salt']) == $row['clave'])){
            return true;
        }
        
    }

    private function encrypt($password,$salt){
        $password .= $salt;
        return hash('md5',$password);
    } 

    function permisosUsuario($id){
        $query = "SELECT codigo FROM permisos
                  INNER JOIN perfil_permiso ON (perfil_permiso.id_permiso = permisos.id_permiso)
                  INNER JOIN usuario_perfil ON (usuario_perfil.id_perfil= perfil_permiso.id_perfil)
                  WHERE id_usuario = ".$id;
        $permisos = array();
        foreach($this->con->query($query) as $key => $value){
            $permisos[$key] = $value['codigo'];
        }	
            
        $_SESSION['permiso']=['permisos' => $permisos];
}  

}