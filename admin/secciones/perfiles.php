<?php
if( !in_array('perf',$_SESSION['permiso']['permisos'])){ 
    header('Location: index.php');
}
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $perfil=new Perfil($con);
?>
<div class="row mt-5 galeria">
        <div class="col-12">
            <a href="index.php?seccion=perfiles_admi" class="btn btn-primary btn-sm my-3 float-right">Permiso Nuevo</a>

            <table class="table table-striped listap">
                <thead>
                    <tr>    
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
<?php
                    foreach($perfil->getList() as $row){
                        $nombre=$row["nombre"];
                        $id=$row["id_perfil"];
?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$nombre?></td>
                        <td>
                            <div class="btn-group">
                                <a href="index.php?seccion=perfiles_admi&perf=<?=$id?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="acciones/borrar_perfil.php" method="post">
                                        <input type="hidden" name="id_perfil" value="<?=$id?>">
                                        <button  type="submit" class="btn btn-secondary btn-sm">Borrar</button>
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