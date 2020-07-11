<?php
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password);
$user = new Usuario($con);

if( !in_array('add.user',$_SESSION['permiso']['permisos']) && !in_array('mod.user',$_SESSION['permiso']['permisos']) && !in_array('del.user',$_SESSION['permiso']['permisos'])){ 
    header('Location: index.php');
}
?>
<div class="row mt-5 galeria">
    <div class="col-12">
    <?php 
    if(in_array('add.user',$_SESSION['permiso']['permisos'])){
    ?>
        <a href="index.php?seccion=sign_up" class="btn btn-primary btn-sm my-3 float-right">Nuevo Usuario</a>
    <?php
    }
    ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Permisos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                foreach ($user->getUsuarios() as $row) {
                    $id = $row['id_usuario'];
                    $nombre = $row["nombre"];
                    $apellido = $row["apellido"];
                    $usuario = $row["usuario"];
                   

                ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $nombre ?></td>
                        <td><?= $apellido ?></td>
                        <td><?= $usuario ?></td>
                        
                        <td>
                            <div class="btn-group">
                            <?php
                            if(in_array('mod.user',$_SESSION['permiso']['permisos'])){
                            ?>
                                <a href="index.php?seccion=edit_user&user=<?= $usuario ?> " class="btn btn-success btn-sm">Editar</a>
                            <?php
                            }
                            if(in_array('mod.user',$_SESSION['permiso']['permisos'])){
                            ?>
                                <form action="acciones/delete_user.php" method="post">
                                    <input type="hidden" name="id_user" value="<?= $id ?>">
                                    <button type="submit" class="btn btn-secondary btn-sm">delete</button>
                            <?php
                            }
                            ?>
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