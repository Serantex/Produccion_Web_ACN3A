<?php

class Producto
{

    var $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    function getNovedades($novedad = 1)
    {
        $ran = "SELECT * FROM productos WHERE destacado =$novedad AND stock=1 ORDER BY RAND() LIMIT 6";
        return $this->con->query($ran, PDO::FETCH_ASSOC);
    }

    function getProductos($stock = 1)
    {
        $producto = "SELECT * FROM productos WHERE stock=$stock";
        return $this->con->query($producto, PDO::FETCH_ASSOC);
    }

    function getProducto_lista()
    {
        $producto = "SELECT * FROM productos";
        return $this->con->query($producto, PDO::FETCH_ASSOC);
    }

    function getProducto($name)
    {
        $product = "SELECT * FROM productos WHERE nombre='$name' and stock=1";
        return $this->con->query($product, PDO::FETCH_ASSOC);
    }

    function getFiltradoCategorias($cat)
    {
        $filtro = "SELECT * FROM productos WHERE sub_categoria=$cat OR categoria=$cat AND stock=1";
        return $this->con->query($filtro, PDO::FETCH_ASSOC);
    }
    function getFiltradoMarcas($marc)
    {
        $filtro = "SELECT * FROM productos WHERE Marca=$marc AND stock=1";
        return $this->con->query($filtro, PDO::FETCH_ASSOC);
    }

    function getFiltrado($filter, $cat, $marc){
        if (empty($filter)) {
            if ($cat !=1) {
                if ($marc != 1) {
                    $filtro = "SELECT * FROM productos WHERE stock=1 AND marca=$marc AND (sub_categoria=$cat OR categoria=$cat)";
                    return $this->con->query($filtro, PDO::FETCH_ASSOC);
                } else {
                    $filtro = "SELECT * FROM productos WHERE (sub_categoria=$cat OR categoria=$cat) AND stock=1";
                    return $this->con->query($filtro, PDO::FETCH_ASSOC);
                }
            }else{
                if ($marc != 1) {
                    $filtro = "SELECT * FROM productos WHERE marca=$marc AND stock=1";
                    return $this->con->query($filtro, PDO::FETCH_ASSOC);
                } else {
                    $filtro = "SELECT * FROM productos WHERE stock=1";
                    return $this->con->query($filtro, PDO::FETCH_ASSOC);
                }
            }
        }else{
                if($cat!=1){
                    if($marc!=1){
                        switch($filter){
                            case 'NOV':
                                $filtro="SELECT * FROM productos WHERE marca=$marc AND stock=1 AND destacado=1 AND (sub_categoria=$cat OR  categoria=$cat)";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'ZA':
                             $filtro="SELECT * FROM productos WHERE  marca=$marc AND stock=1 AND (sub_categoria=$cat OR  categoria=$cat) ORDER BY nombre DESC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'AZ':
                               $filtro="SELECT * FROM productos WHERE  marca=$marc AND stock=1 AND (sub_categoria=$cat OR  categoria=$cat) ORDER BY nombre ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MIN':
                               $filtro="SELECT * FROM productos WHERE  marca=$marc AND stock=1 AND (sub_categoria=$cat OR  categoria=$cat) ORDER BY precio ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MAX':
                               $filtro="SELECT * FROM productos WHERE marca=$marc AND stock=1 AND (sub_categoria=$cat OR  categoria=$cat) ORDER BY precio DESC";
                               return $this->con->query($filtro, PDO::FETCH_ASSOC);
                               }
                    }else{
                        switch($filter){
                            case 'NOV':
                                $filtro="SELECT * FROM productos WHERE   (sub_categoria=$cat OR  categoria=$cat)  AND stock=1 AND destacado=1";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'ZA':
                             $filtro="SELECT * FROM productos WHERE   (sub_categoria=$cat OR  categoria=$cat)  AND stock=1 ORDER BY nombre DESC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                 break;
                           case 'AZ':
                               $filtro="SELECT * FROM productos WHERE   (sub_categoria=$cat OR  categoria=$cat)  AND stock=1 ORDER BY nombre ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MIN':
                               $filtro="SELECT * FROM productos WHERE   (sub_categoria=$cat OR  categoria=$cat)  AND stock=1 ORDER BY precio ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MAX':
                               $filtro="SELECT * FROM productos WHERE  (sub_categoria=$cat OR  categoria=$cat) AND stock=1 ORDER BY precio DESC";
                               return $this->con->query($filtro, PDO::FETCH_ASSOC);
                               }
                    }
                }else{
                    if($marc!=1){
                        switch($filter){
                            case 'NOV':
                                $filtro="SELECT * FROM productos WHERE  marca=$marc AND stock=1 AND destacado=1";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'ZA':
                             $filtro="SELECT * FROM productos WHERE  marca=$marc AND stock=1 ORDER BY nombre DESC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'AZ':
                               $filtro="SELECT * FROM productos WHERE  marca =$marc AND stock=1 ORDER BY nombre ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MIN':
                               $filtro="SELECT * FROM productos WHERE  marca =$marc AND stock=1 ORDER BY precio ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MAX':
                               $filtro="SELECT * FROM productos WHERE  marca =$marc AND stock=1 ORDER BY precio DESC";
                               return $this->con->query($filtro, PDO::FETCH_ASSOC);
                           }
                    }else{
                        switch($filter){
                            case 'NOV':
                               $filtro="SELECT * FROM productos WHERE stock=1 AND destacado=1";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'ZA':
                               $filtro="SELECT * FROM productos WHERE stock=1 ORDER BY nombre DESC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'AZ':
                               $filtro="SELECT * FROM productos WHERE stock=1 ORDER BY nombre ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;    
                           case 'MIN':
                               $filtro="SELECT * FROM productos WHERE stock=1 ORDER BY precio ASC";
                                return $this->con->query($filtro, PDO::FETCH_ASSOC);
                                break;
                           case 'MAX':
                               $filtro="SELECT * FROM productos WHERE stock=1 ORDER BY precio DESC";
                               return $this->con->query($filtro, PDO::FETCH_ASSOC);
                           }
                    }
                }
            }
}   
        function updateProducto($id,$nombre,$cat,$subcat,$descrip,$precio,$stock,$destacado,$marca){
            $sql="UPDATE productos SET nombre='$nombre', categoria='$cat',sub_categoria=$subcat, descripcion='$descrip', precio='$precio', stock='$stock', destacado='$destacado', marca=$marca WHERE id=$id";
            $sql=$this->con->prepare($sql);
            $sql->execute();
        }

        function getFiltradoCategoria($cat){
            $filtro="SELECT * FROM productos WHERE sub_categoria=$cat OR categoria=$cat";
             return $this->con->query($filtro, PDO::FETCH_ASSOC);
        }
        
        function getProducto_detalle($id){
            $producto="SELECT * FROM productos WHERE id=$id";
            return $this->con->query($producto, PDO::FETCH_ASSOC);
        }
        
        function getProductoEdit($name){
            $product="SELECT * FROM productos WHERE nombre='$name'";
            return $this->con->query($product, PDO::FETCH_ASSOC);
        }

        function setProducto($nombre,$cat,$subcat,$descrip,$precio,$stock,$destacado,$marca){   
            $producto="INSERT INTO productos (nombre,categoria,sub_categoria,marca,descripcion,precio,stock,destacado) VALUES (:nombre,:categoria,:sub_categoria,:marca,:descripcion,:precio,:stock,:destacado)"; 
            $producto = $this->con->prepare($producto);
    
            $producto->bindParam(':nombre',$nombre,PDO::PARAM_STR, 30);
            $producto->bindParam(':categoria',$cat,PDO::PARAM_INT, 20);
            $producto->bindParam(':sub_categoria',$subcat,PDO::PARAM_INT,20);
            $producto->bindParam(':marca',$marca,PDO::PARAM_STR,20);
            $producto->bindParam(':descripcion',$descrip,PDO::PARAM_STR,300); 
            $producto->bindParam(':precio',$precio,PDO::PARAM_STR,30);
            $producto->bindParam(':stock',$stock,PDO::PARAM_INT,1);
            $producto->bindParam(':destacado',$destacado,PDO::PARAM_INT,1);
    
            $producto->execute();
        }
        
        function marCatProducto($id_cat,$id_scat,$id_mar){

            $cat="SELECT * FROM categorias WHERE id_categoria=$id_cat";
            $sqlc=$this->con->prepare($cat);
            $sqlc->execute();
            
            $rowcat = $sqlc->fetch(PDO::FETCH_ASSOC);
            $rowcat["estado"];

            $scat="SELECT * FROM categorias WHERE id_categoria=$id_scat";
            $sqlsc=$this->con->prepare($scat);
            $sqlsc->execute();
            
            $rowscat = $sqlsc->fetch(PDO::FETCH_ASSOC);
            $rowscat["estado"];

            $mar="SELECT * FROM marcas WHERE id_marca=$id_mar";
            $sqlm=$this->con->prepare($mar);
            $sqlm->execute();
            
            $rowmar= $sqlm->fetch(PDO::FETCH_ASSOC);
            $rowmar["estado"];

            if ($rowmar["estado"]==0 || $rowscat["estado"]==0 || $rowcat["estado"]==0) {
                return true;
            }
        }

}
