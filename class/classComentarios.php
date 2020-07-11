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
        $com="SELECT AVG(clasificacion) AS 'clasificacion' FROM comentarios WHERE producto = $id and aprobado=1";
        $stmt = $this->con->prepare($com);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $clasificacion = $row['clasificacion'];
        return $clasificacion;
    } 

    function getComentarioProducto($id){
        $com="SELECT * FROM comentarios WHERE producto =$id";
        return $this->con->query($com, PDO::FETCH_ASSOC);
    }

    function getComentariosProductos($id,$ip){
        $com="SELECT * FROM comentarios WHERE id=(SELECT MAX(id) FROM comentarios) AND producto =$id AND ip='$ip'";
        return $this->con->query($com, PDO::FETCH_ASSOC);
    }

    function validateUpdateComment($id, $current_ip){
        $comentarios = $this->getComentariosProductos($id,$current_ip);
        $date = strtotime(date('Y-m-d'));
        $isValid = true;

        foreach ($comentarios as $comentario) {
            $ip = $comentario['ip'];
            $fecha = strtotime($comentario['last_updated']);
            $timeRange = $date - $fecha;

            if($timeRange < 86400) {
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
    }

    function getMostrarComentarios(){
        $com="SELECT * FROM comentarios";
          return $this->con->query($com, PDO::FETCH_ASSOC);
    }

    function ComentarioEdit($id){
        $com="SELECT * FROM comentarios where id=$id";
          return $this->con->query($com, PDO::FETCH_ASSOC);
    }

    function aprobar($id){
        $comenta="UPDATE  comentarios SET aprobado='1' WHERE id=$id"; 
        $comenta = $this->con->prepare($comenta);
        $comenta->execute();
    }  

    function desaprobar($id){
        $comenta="UPDATE  comentarios SET aprobado='0' WHERE id=$id";
        $comenta = $this->con->prepare($comenta);
        $comenta->execute();
    }

    function getMostrarComentariosEstado($filtro){
        $com="SELECT * FROM comentarios WHERE aprobado=$filtro";
          return $this->con->query($com, PDO::FETCH_ASSOC);
    }

    function getComentarioProductoEstado($id,$filtro){
        $com="SELECT * FROM comentarios WHERE producto =$id AND aprobado=$filtro";
        return $this->con->query($com, PDO::FETCH_ASSOC);
    }
    
}