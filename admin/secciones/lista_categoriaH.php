<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $cat = new Categoria($con);
?>
<div class="row mt-5 galeria">
        <div class="col-12">
            <a href="index.php?seccion=lista_categoriaP" class="btn btn-info btn-sm my-3 float-left">Categorias Padres</a>
            <a href="index.php?seccion=categoria_admi" class="btn btn-primary btn-sm my-3 float-right">Nueva Categoria</a>
            
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>ID</th>
                        <th>Categoria Padre</th>
                        <th>Habilitado</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach($cat->getCategoriaHijas() as $row){
                        $nombre=$row["nombre"];
                        $id=$row["id_categoria"];
                        $id_padre=$row["id_padre"];
                        $estado=$row["estado"];

                        if($estado==1){
                            $estado="si";
                        }else{
                            $estado="no";
                        }
                        
                        foreach($cat->getNombreSubCat($id_padre) as $subcat){
                           $cat_padre=$subcat["nombre"];
                           
                        
?>
                    <tr>
                        <td><?=$nombre?></td>
                        <td><?=$id?></td>
                        <td><?=$cat_padre?></td>
                        <td><?=$estado?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=categoria_admi&cat=<?=cambiar_nombre($nombre)?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="acciones/estado_cat.php" method="post">
                                        <input type="hidden" name="id_cat" value="<?=$id?>">
                                        <button  type="submit" class="btn btn-secondary btn-sm">Activar-Desactivar</button>
                                    </form>
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