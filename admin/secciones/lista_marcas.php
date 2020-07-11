<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $marc= new Marca($con);

    if( !in_array('amb.mar',$_SESSION['permiso']['permisos'])){ 
        header('Location: index.php');
    }
?>
<div class="row mt-5 galeria">
        <div class="col-12">
           <a href="index.php?seccion=marca_admi" class="btn btn-primary btn-sm my-3 float-right">Nueva Marca</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>ID</th>
                        <th>Habilitado</th>
                        <th>Acciones</th> 
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach($marc->getMarcasAdmi() as $row){
                        $nombre=$row["nombre"];
                        $id=$row["id_marca"];
                        $estado=$row["estado"];

                        if($estado==1){
                            $estado="si";
                        }else{
                            $estado="no";
                        }
                        
?>
                    <tr>
                        <td><?=$nombre?></td>
                        <td><?=$id?></td>
                        <td><?=$estado?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=marca_admi&marc=<?=cambiar_nombre($nombre)?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="acciones/estado_marc.php" method="post">
                                        <input type="hidden" name="id_marc" value="<?=$id?>">
                                        <button  type="submit" class="btn btn-secondary btn-sm">Activar-Desactivar</button>
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