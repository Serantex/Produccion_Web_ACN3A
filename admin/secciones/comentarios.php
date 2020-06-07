<?php
$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$com=new Comentario($con);
$productos=new Producto($con);
?>
<div class="row mt-5 galeria">

        <div class="col-12">
            <table class="table table-striped">

                <thead>

                    <tr>
                        <th>Producto</th>
                        <th>Comentario</th>
                        <th>Clasificacion</th>
                        <th>Fecha</th>
                        <th>Estado Comentario</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                    <?php
                    foreach($com->getMostrarComentarios() as $comentario){

                        $producto=$comentario["producto"];
                        $opinion=$comentario["comentario"];
                        $clasificacion=$comentario["clasificacion"];
                        $fecha=$comentario["last_updated"];
                        $aprobado=$comentario["aprobado"];
                        $id=$comentario["id"];

                        if($aprobado==1){
                            $aprobado="Aprobado";
                        }else{
                            $aprobado="NO esta aprobado";
                        }

                        foreach($productos->getProducto_detalle($producto) as $product){
                            $nom_producto=cambiar_nombre($product["nombre"]);
                            
    
                    ?>
                        <td><img width="50" src="../img/productos/<?=$nom_producto?>.png" alt='pene'><?=$product["nombre"]?></td>
                        <td><?=$opinion?></td>
                        <td><?=$clasificacion?></td>
                        <td><?=$fecha?></td>
                        <td><?=$aprobado?></td>
                        <td>
                            <div class="btn-group">
                            <form action="acciones/comentario_admi.php" method="post">
                                    <input type="hidden" name="id_com" value="<?= $id ?>">
                                    <button type="submit" class="btn btn-primary btn-sm">Aprobar-Desaprobar</button>

                                </form>
                                <form action="acciones/borrar_skin.php" method="post">
                                    <input type="hidden" name="id_com" value="<?= $id ?>">
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