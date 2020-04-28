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

    function validateUpdateComment($id){
        $isValid = false;
        $comentarios = $this->getComentarioLastUpdated($id);
        $ips = array();
        $lastUpdated = array();
        $date = date('Y-m-d');
       
        foreach ($comentarios as $user_ip){
            $ips=  array_push($ips, $user_ip['ip']);
        }

        foreach ($comentarios as $last_updated){
            $lastUpdated=  array_push($lastUpdated, $last_updated['last_updated']);
        }

        foreach ($lastUpdated as $value){
            $timeRange = $date - $value;
            if($timeRange < 24) {
                $isValid = false;
            }
            else {
                $isValid = true;
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