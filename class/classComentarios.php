<?php
class Comentario{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }

    function getMostrarComentario($id){
        $com="SELECT * FROM comentarios WHERE producto =$id and aprobado=1";
          return $this->con->query($com, PDO::FETCH_ASSOC);
      }

    function getMostrarClasificacion($id){
        $rank="SELECT avg(clasificacion) as $total FROM comentarios WHERE producto =$id";
        return $total;
    } 

    function setComentario($ip,$email,$comentario,$rank,$id_producto){
        $comenta="INSERT INTO comentarios (mail,ip,comentario,clasificacion,producto) VALUES ($email,$ip,$comentario,$rank,$id_producto)"; 
        exec($comenta);
    }

}