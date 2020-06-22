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

    function getMarcas($idPadre = 0){
         $sql = "SELECT * FROM marcas WHERE id_padre=".$idPadre;
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getMarca($nombre){
        $sql = "SELECT nombre FROM marcas WHERE nombre=$nombre";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getIdMarcas($id){
        $sql = "SELECT * FROM marcas WHERE id_marca=$id";
         return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

}
