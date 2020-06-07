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
        $sql = "SELECT * FROM categorias";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getNombreSubCat($id){
        $sql = "SELECT nombre FROM categorias WHERE id_categoria=$id";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

}


