<?php 
Class Perfil{

	var $con;
	
    function __construct($con){
		$this->con = $con;
	}

    function getList(){
		$query = "SELECT id_perfil, nombre FROM perfiles";
        return $this->con->query($query); 
	}
	
    function get($id){
	    $query = "SELECT * FROM perfiles WHERE id_perfil=".$id;
		return $this->con->query($query);
	}

	function getPermisos($id){
		$sql = 'SELECT * FROM perfil_permiso  WHERE id_perfil = '.$id;
		return $this->con->query($sql, PDO::FETCH_ASSOC);
	}


	function consulta($id){
		$query = 'SELECT count(1) as cantidad FROM usuario_perfil WHERE id_perfil = '.$id;
		return $this->con->query($query, PDO::FETCH_ASSOC);
	}

    function deletPerfil($id){
			$query = "DELETE FROM `perfiles` WHERE id_perfil=".$id;
			$query = $this->con->prepare($query);
			$query->execute();
	}

	function deletPerfilPermiso($id){
			$query="DELETE FROM perfil_permiso WHERE id_perfil =".$id;
			$query = $this->con->prepare($query);
			$query->execute();
	}
		

    function setPerfil($data,$nombre){
		
            foreach($data as $key => $value){
				
				if(!is_array($value)){
					if($value != null){
						$columns[]=$key;
						$datos[]=$value;
					}
				}
			}

			$sql = "INSERT INTO perfiles (nombre) VALUES (:nombre)";
			$sql = $this->con->prepare($sql);
			$sql->bindParam(':nombre',$nombre,PDO::PARAM_STR, 100);
	
            $sql->execute();
			$id = $this->con->lastInsertId();
			   			
			$sql = '';
			foreach($data as $permiso){
				$sql= 'INSERT INTO perfil_permiso (id_perfil,id_permiso) VALUES (:id_perfil,:id_permiso);';
				$sql= $this->con->prepare($sql);
				$sql->bindParam(':id_perfil',$id,PDO::PARAM_INT,300);
				$sql->bindParam(':id_permiso',$permiso,PDO::PARAM_INT,300);
				$sql->execute();
			}
	} 
	
	

	
    function updatePerfil($id_perm,$id_perf,$nombre){
            $sql = "UPDATE perfiles SET nombre='$nombre' WHERE id_perfil = ".$id_perf;
			$sql= $this->con->prepare($sql);
			$sql->execute();

			$s=$this->deletPerfilPermiso($id_perf);

			$sql="";

			foreach($id_perm as $permiso){
				$sql= 'INSERT INTO perfil_permiso (id_perfil,id_permiso) VALUES (:id_perfil,:id_permiso);';
				$sql= $this->con->prepare($sql);
				$sql->bindParam(':id_perfil',$id_perf,PDO::PARAM_INT,300);
				$sql->bindParam(':id_permiso',$permiso,PDO::PARAM_INT,300);
				$sql->execute();
			}
			 
	} 

	function setPerfilUsuario($id_perf,$id_usuario){

		foreach($id_perf as $perfil){
		$sql="INSERT INTO usuario_perfil (id_perfil,id_usuario) VALUES (:id_perfil,:id_usuario);";
		$sql=$this->con->prepare($sql);
		$sql->bindParam(':id_perfil',$perfil,PDO::PARAM_INT,300);
		$sql->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT,300);
		$sql->execute();
		}

	}

	function deletPerfilUsuario($id){
		$query = "DELETE FROM `usuario_perfil` WHERE id_usuario=".$id;
		$query = $this->con->prepare($query);
		$query->execute();
	}

	function getUsuarioPerfil($id){
		$sql="SELECT * FROM usuario_perfil WHERE id_usuario=".$id;
		return $this->con->query($sql, PDO::FETCH_ASSOC);
	}

	function updatePerfilUsuario($id_perf,$id_user){
		$s=$this->deletPerfilUsuario($id_user);

		foreach($id_perf as $perfil){
			$sql= 'INSERT INTO usuario_perfil (id_perfil,id_usuario) VALUES (:id_perfil,:id_usuario);';
			$sql= $this->con->prepare($sql);
			$sql->bindParam(':id_perfil',$perfil,PDO::PARAM_INT,300);
			$sql->bindParam(':id_usuario',$id_user,PDO::PARAM_INT,300);
			$sql->execute();
		}
		 
} 
	

}
?>