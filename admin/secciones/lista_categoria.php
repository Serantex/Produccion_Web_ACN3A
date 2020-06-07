<?php
$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$cat = new Categoria($con);
?>
<div class="row mt-5 galeria">

        <div class="col-12">

            <a href="index.php?seccion=categoria_admi" class="btn btn-primary btn-sm my-3 float-right">Nueva Categoria</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>ID</th>
                        <th>Categoria Padre</th>
                        <th>acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($cat->getCategoria() as $row){
                        $nombre=$row["nombre"];
                        $id=$row["id_categoria"];
                        $id_padre=$row["id_padre"];
                        
                        foreach($cat->getNombreSubCat($id_padre) as $subcat){
                            $n_subcat=$subcat["nombre"];
                            
                    ?>
                    <tr>
                        <td><?=$nombre?></td>
                        <td><?=$id?></td>
                        <td><?=$n_subcat?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=categoria_admi&cat=<?=cambiar_nombre($nombre)?>" class="btn btn-primary btn-sm">Editar</a>

                                <form action="acciones/borrar_skin.php" method="post">
                                    <input type="hidden" name="id_skin" value="<?= $skin ?>">
                                    <input type="hidden" name="tipo_editar" value="arma">
                                    <button type="submit" class="btn btn-danger btn-sm">Borrar</button>

                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }}
                  ?>


                </tbody>
            </table>

        </div>

    </div>