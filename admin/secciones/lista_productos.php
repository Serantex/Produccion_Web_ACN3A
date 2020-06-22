<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $productos=new Producto($con);
    $cat = new Categoria($con);
    $mar= new Marca($con);

?>
<div class="row mt-5 galeria">
    <form action="acciones/procesar_filtradoP.php" method="post">
        <div class="form-check form-check-inline">
            <div class="form-group">
                <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                <select class="custom-select mr-sm-2" id="cat" name="cat">  
<?php
                    foreach($cat->getTodasCategorias() as $cats){
                        $id_cat=$cats["id_categoria"];
                        $nomb_cat=$cats["nombre"];
?>
                <option value="<?=$id_cat?>"><?=$nomb_cat?></option>
<?php
                    }
?>      
                 </select>
            </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>
        <div class="col-12">
            <a href="index.php?seccion=producto_admi" class="btn btn-primary btn-sm my-3 float-right">Nuevo Producto</a>

            <table class="table table-striped">
                <thead>
                    <tr>    
                        <th>N°</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Categoria</th>
                        <th>SubCategoria</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Destacado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<?php
                    if(!empty($_GET["cat"])){
                    $filtro=$_GET["cat"];
                    }    

                    if(empty($filtro) || $filtro==1){
                        foreach($productos->getProducto_lista()as $product){
                            $id=$product["id"];
                            $nombre=cambiar_nombre($product["nombre"]);
                            $descripcion=$product["descripcion"];
                            $precio=$product["precio"];
                            $categoria=$product["categoria"];
                            $subcat=$product["sub_categoria"];
                            $marc=$product["marca"];

                            if($product["stock"]==1){
                                $stock="si";
                            }else{
                                $stock="no";
                            }

                            if($subcat==null){
                                $sub_cat="sin subcategoria";
                            }
                
                            if($product["destacado"]==1){
                                $destacado="si";
                            }else{
                                $destacado="no";
                            }

                            if($marc==null){
                                $marca="sin marca";
                            }    

?>
                    <tr>
                        <td><?=$id?></td>
                        <td><img width="50" src="../img/productos/<?=$nombre?>.png" alt='<?=$nombre?>'></td>
                        <td><?=utf8_encode($product["nombre"])?></td>
                        <td><?=utf8_encode($descripcion)?></td>
                        <td><?=$precio?>$</td>
<?php
                        foreach($cat->getNombreSubCat($categoria) as $cats){
?>
                        <td><?=$cats["nombre"]?></td>
<?php 
                        } 
                        if($subcat!=null){
                            foreach($cat->getNombreSubCat($subcat) as $scats){
                                $sub_cat=$scats["nombre"];
                            }
                        }
                        ?>
                        <td><?=$sub_cat?></td>
<?php
                         
                        if($marc!=null){
                        foreach($mar->getIdMarcas($marc)as $nombre_m){
                            $marca=$nombre_m["nombre"];
                        }
                    }
?>
                        <td><?=$marca?></td>
<?php
                        
?>
                        <td><?=$stock?></td>
                        <td><?=$destacado?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=producto_admi&producto=<?=$nombre?>" class="btn btn-success btn-sm">Editar</a>
                                <a href="index.php?seccion=comentarios&producto=<?=$id?>" class="btn btn-success btn-sm">Comentarios</a>
                            </div>
                        </td>
                    </tr>
<?php
                        }
                    }else{
                        foreach($productos->getFiltradoCategoria($filtro)as $product){  
                            $id=$product["id"];
                            $nombre=cambiar_nombre($product["nombre"]);
                            $descripcion=$product["descripcion"];
                            $precio=$product["precio"];
                            $categoria=$product["categoria"];
                            $subcat=$product["sub_categoria"];
                            $marc=$product["marca"];
                
                            if($product["stock"]==1){
                                $stock="si";
                            }else{
                                $stock="no";
                            }
                            
                            if($subcat==null){
                                $sub_cat="sin subcategoria";
                            }
                
                            if($product["destacado"]==1){
                                $destacado="si";
                            }else{
                                $destacado="no";
                            }  

                            if($marc==null){
                                $marca="sin marca";
                            }    


?>
                    <tr>
                        <td><?=$id?></td>
                        <td><img width="50" src="../img/productos/<?=$nombre?>.png" alt='<?=$nombre?>'></td>
                        <td><?=utf8_encode($product["nombre"])?></td>
                        <td><?=utf8_encode($descripcion)?></td>
                        <td><?=$precio?>$</td>
<?php
                        foreach($cat->getNombreSubCat($categoria) as $cats){
?>
                        <td><?=$cats["nombre"]?></td>
<?php 
                        }

                        if($subcat!=null){
                            foreach($cat->getNombreSubCat($subcat) as $scats){
                                $sub_cat=$scats["nombre"];
                            }
                        }
?>
                        <td><?=$sub_cat?></td>
<?php
                    if($marc!=null){        
                        foreach($mar->getIdMarcas($marc)as $nombre_m){
                            $marca=$nombre_m["nombre"];
                    }
                }
?>
                        <td><?=$marca?></td>                     
                        <td><?=$stock?></td>
                        <td><?=$destacado?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=producto_admi&producto=<?=$nombre?>" class="btn btn-success btn-sm">Editar</a>
                                <a href="index.php?seccion=comentarios&producto=<?=$id?>" class="btn btn-success btn-sm">Comentarios</a>                            
                            </div>
                        </td>
                    </tr>
<?php
                        }
                    }   
?>


                </tbody>
            </table>
        </div>
</div>