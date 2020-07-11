<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

    $com=new Comentario($con);
    $productos=new Producto($con);

    if(!empty($_GET["filtro"])){
        $filtro=$_GET["filtro"];
    }

    $pro="";

    if(!empty($_GET["producto"])){
        $pro=$_GET["producto"];
    }

    if( !in_array('com',$_SESSION['permiso']['permisos'])){ 
        header('Location: index.php');
    }

?>

<div class="row mt-5 galeria">
    <div class="filtro">
                <form action="acciones/procesar_filtrado.php" method="post">
                    <div class="form-row">
                        <div class="form-row">
                            <input type="hidden" name="pro" value="<?=$pro?>">
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input lista" type="radio" name="filtro" id="all" value="all">
                            <label class="form-check-label fama" for="NOV">Todos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input lista" type="radio" name="filtro" id="0" value="no">
                            <label class="form-check-label fama" for="AZ">No Activos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="filtro" id="1" value="si">
                            <label class="form-check-label fama" for="ZA">Activos</label>
                    </div>
                        <div>
                            <button type="submit" class="btn btn-warning">Filtrar</button>
                        </div>
                    </div>
                </form>
    </div>

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
    if(empty($pro)){
        if(empty($filtro) || $filtro=="all"){

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
                        <td><img width="50" src="../img/productos/<?=$nom_producto?>.png" alt='pene'><br><?=$product["nombre"]?></td>
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
                            </div>
                        </td>
                    </tr>
<?php
                    }}
        }else{
                    if($filtro=="no"){
                        $filtro=0;
                    }else{
                        $filtro=1;
                    }

                    foreach($com->getMostrarComentariosEstado($filtro) as $comentario){
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
                        <td><img width="50" src="../img/productos/<?=$nom_producto?>.png" alt='pene'><br><?=$product["nombre"]?></td>
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
                            </div>
                        </td>
                    </tr>
<?php
                    }}
            }
    }else{
                if(empty($filtro) || $filtro=="all"){

                    foreach($com->getComentarioProducto($pro) as $comentario){
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
                        <td><img width="50" src="../img/productos/<?=$nom_producto?>.png" alt='pene'><br><?=$product["nombre"]?></td>
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
                            </div>
                        </td>
                    </tr>
<?php
                        }}
                }else{
                            if($filtro=="no"){
                                $filtro=0;
                            }else{
                                $filtro=1;
                            }
        
                            foreach($com->getComentarioProductoEstado($pro,$filtro) as $comentario){
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
                                <td><img width="50" src="../img/productos/<?=$nom_producto?>.png" alt='pene'><br><?=$product["nombre"]?></td>
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
                                    </div>
                                </td>
                            </tr>
<?php
                        }}
                }
    }
?>
                </tbody>
            </table>
        </div>
    </div>