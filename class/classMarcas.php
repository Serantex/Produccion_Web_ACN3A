<?php 
class Marca{

var $con;


function __construct($con){
    $this->con=$con;
}

    function getTodasMarca(){
        $sql = "SELECT * FROM marcas";
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

   
    function getMarca($idPadre = 0){
         $sql = "SELECT * FROM marcas WHERE id_padre=".$idPadre;
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getMarcas($nombre){
        $sql = "SELECT nombre FROM marcas WHERE nombre=$nombre";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getIdMarcas($id){
        $sql = "SELECT * FROM marcas WHERE id_marca=$id";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function getMarcasAdmi(){
        $sql = "SELECT * FROM marcas WHERE id_padre<=1";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function getNombreMarca($id){
        $sql = "SELECT * FROM marcas WHERE id_marca=$id";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function getMarcaEdit($name){
        $product="SELECT * FROM marcas WHERE nombre='$name'";
        return $this->con->query($product, PDO::FETCH_ASSOC);
    }
    function activar($id){
        $sql="UPDATE  marcas SET estado='1' WHERE id_marca=$id"; 
        $sql = $this->con->prepare($sql);
        $sql->execute();
    }  

    function desactivar($id){
        $sql="UPDATE  marcas SET estado='0' WHERE id_marca=$id";
        $sql = $this->con->prepare($sql);
        $sql->execute();
    }
    
    function updateMarca($id,$nombre,$id_padre){
        $sql="UPDATE marcas SET nombre='$nombre', id_padre='1' WHERE id_marca=$id";
        $sql= $this->con->prepare($sql);
        $sql->execute();
    }
    
    function setMarca($nombre){
        $sql="INSERT INTO marcas (nombre) VALUES (:nombre)";
        $sql = $this->con->prepare($sql);
       
        $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR, 20);
       
        $sql->execute();
    }
}
