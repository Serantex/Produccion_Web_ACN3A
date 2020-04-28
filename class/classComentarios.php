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
        $total="SELECT avg(clasificacion) FROM comentarios WHERE producto =$id";
        return $total;
    } 

    function getComentarioLastUpdated($id){
        $com="SELECT * FROM comentarios WHERE producto =$id";
        return $this->con->query($com, PDO::FETCH_ASSOC);
    }

    function validateUpdateComment($id, $current_ip){
        $comentarios = $this->getComentarioLastUpdated($id);
        $date = date('Y-m-d');
        $isValid = true;

        foreach ($comentarios as $comentario) {
            $ip = $comentario['ip'];
            $fecha = strtotime($comentario['last_updated']);

            if($fecha != $date && $ip == $current_ip) {
            $isValid = false;
        break;
    }
  }
  return $isValid;
    }

    function setComentario($email,$ip,$comentario,$ranking,$id_producto){   
        $comenta="INSERT INTO comentarios (mail,ip,comentario,clasificacion,producto) VALUES (:email,:ip,:comentario,:ranking,:id_producto)"; 
        $comenta = $this->con->prepare($comenta);

        $comenta->bindParam(':email',$email,PDO::PARAM_STR, 20);
        $comenta->bindParam(':ip',$ip,PDO::PARAM_STR, 20);
        $comenta->bindParam(':comentario',$comentario,PDO::PARAM_STR,300);
        $comenta->bindParam(':ranking',$ranking,PDO::PARAM_INT,11);
        $comenta->bindParam(':id_producto',$id_producto,PDO::PARAM_INT,11);

        $comenta->execute();
        //exec($comenta);
    }

}