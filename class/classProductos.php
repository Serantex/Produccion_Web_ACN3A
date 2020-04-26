<?php

class Producto{

    var $con;

    function __construct($con){
        $this->con=$con;   
    }
    
        function getNovedades($novedad=1){
          $ran="SELECT * FROM productos WHERE destacado =$novedad AND stock=1 ORDER BY RAND() LIMIT 6" ;
            return $this->con->query($ran, PDO::FETCH_ASSOC);
        }

        function getProductos($stock=1){
            $producto="SELECT * FROM productos WHERE stock=$stock";
            return $this->con->query($producto, PDO::FETCH_ASSOC);
        }

        function getProducto($name){
            $product="SELECT * FROM productos WHERE nombre='$name' and stock=1";
            return $this->con->query($product, PDO::FETCH_ASSOC);
        }
        
        function getFiltradoCategorias($cat){
            $filtro="SELECT * FROM productos WHERE sub_categoria=$cat or categoria = $cat AND stock=1";
            return $this->con->query($filtro, PDO::FETCH_ASSOC);
        }

        function getFiltrado($filter, $cat){
            if($cat=1){
                if(!empty($filter)){
                    switch($filter){
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
            }else{
                if(!empty($filter)){
                    switch($filter){
                case 'ZA':
                  $filtro="SELECT * FROM productos WHERE sub_categoria=$cat or categoria = $cat AND stock=1 ORDER BY nombre DESC";
                   return $this->con->query($filtro, PDO::FETCH_ASSOC);
                     break;
               case 'AZ':
                    $filtro="SELECT * FROM productos WHERE sub_categoria=$cat or categoria = $cat AND stock=1 ORDER BY nombre ASC";
                     return $this->con->query($filtro, PDO::FETCH_ASSOC);
                    break;
                case 'MIN':
                    $filtro="SELECT * FROM productos WHERE sub_categoria=$cat or categoria = $cat AND stock=1 ORDER BY precio ASC";
                     return $this->con->query($filtro, PDO::FETCH_ASSOC);
                    break;
                case 'MAX':
                    $filtro="SELECT * FROM productos WHERE sub_categoria=$cat or categoria = $cat AND stock=1 ORDER BY precio DESC";
                    return $this->con->query($filtro, PDO::FETCH_ASSOC);
                }}
            }
        }

        

        

}
