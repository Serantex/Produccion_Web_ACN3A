<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $productos=new Producto($con);
    $cat = new Categoria($con);

?>
<div class="row mt-5 galeria">

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
                        <th>Stock</th>
                        <th>Destacado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                        foreach($productos->getProducto_lista()as $product){
                            $id=$product["id"];
                            $nombre=cambiar_nombre($product["nombre"]);
                            $descripcion=$product["descripcion"];
                            $precio=$product["precio"];
                            $categoria=$product["categoria"];
                            $subcat=$product["sub_categoria"];
                
                            if($product["stock"]==1){
                                $stock="si";
                            }else{
                                $stock="no";
                            }

                            
                            if($subcat==null){
                                $subcat="sin subcategoria";
                            }
                
                            if($product["destacado"]==1){
                                $destacado="si";
                            }else{
                                $destacado="no";
                            }
                            
                ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><img width="50" src="../img/productos/<?=$nombre?>.png" alt='pene'></td>
                        <td><?=$product["nombre"]?></td>
                        <td><?=$descripcion?></td>
                        <td><?=$precio?>$</td>
                        <td><?=$categoria?></td>
                        <td><?=$subcat?></td>
                        <td><?=$stock?></td>
                        <td><?=$destacado?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=producto_admi&producto=<?=$nombre?>" class="btn btn-primary btn-sm">Editar</a>

                                <form action="acciones/borrar_skin.php" method="post">
                                    <input type="hidden" name="id_skin" value="<?= $skin ?>">
                                    <input type="hidden" name="tipo_editar" value="arma">
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>

                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                        }
                  ?>


                </tbody>
            </table>

        </div>

    </div>