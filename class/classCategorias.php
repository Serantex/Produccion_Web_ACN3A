<?php 
class Categoria{

var $con;

function __construct($con){
    $this->con=$con;
}

    function getCategorias($idPadre = 0){
         $sql = "SELECT * FROM categorias WHERE id_padre=".$idPadre;
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getCategoria(){
        $sql = "SELECT * FROM categorias WHERE id_categoria!=24";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getNombreSubCat($id){
        $sql = "SELECT * FROM categorias WHERE id_categoria=$id";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getCategoriaEdit($name){
        $product="SELECT * FROM categorias WHERE nombre='$name'";
        return $this->con->query($product, PDO::FETCH_ASSOC);
    }

    function getCategoriaHijas(){
        $sql = "SELECT * FROM categorias WHERE id_padre>1";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getCategoriaPadre(){
        $sql = "SELECT * FROM categorias WHERE id_padre<=1 and id_categoria!=24";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function setCategoria($nombre,$idPadre){
        $sql="INSERT INTO categorias (nombre,id_padre) VALUES (:nombre,:id_padre)";
        $sql = $this->con->prepare($sql);

        $sql->bindParam(':nombre',$nombre,PDO::PARAM_STR, 20);
        $sql->bindParam(':id_padre',$idPadre,PDO::PARAM_INT, 20);

        $sql->execute();
    }

    function activar($id){
        $sql="UPDATE  categorias SET estado='1' WHERE id_categoria=$id"; 
        $sql = $this->con->prepare($sql);
        $sql->execute();
    }  

    function desactivar($id){
        $sql="UPDATE  categorias SET estado='0' WHERE id_categoria=$id";
        $sql = $this->con->prepare($sql);
        $sql->execute();
    }

    function updateCategoria($id,$nombre,$id_padre){
        $sql="UPDATE categorias SET nombre='$nombre', id_padre='$id_padre' WHERE id_categoria=$id";
        $sql= $this->con->prepare($sql);
        $sql->execute();
    }

    function getTodasCategorias(){
        $sql="SELECT * FROM categorias";
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

}


