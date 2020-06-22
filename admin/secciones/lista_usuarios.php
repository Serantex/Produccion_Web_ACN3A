<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $marc= new Usuario($con);
?>
<div class="row mt-5 galeria">
        <div class="col-12">
           <a href="index.php?seccion=categoria_admi" class="btn btn-primary btn-sm my-3 float-right">Nueva Marca</a>

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
                    foreach($marc->getUsuarios() as $row){
                        $ID=$row['id_usuario'];
                        $nombre=$row["nombre"];
                        $apellido=$row["apellido"];
                        $usuario=$row["usuario"];
                        $permisos=$row["permiso"];
                     
                       ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$nombre?></td>
                        <td><?=$apellido?></td>
                        <td><?=$usuario?></td>
                        <td><?=$permisos?></td>
                        <td>
                            <!-- <div class="btn-group">
                                <a href="index.php?seccion=edit_user&user=<//edit_user($usuario)?>" class="btn btn-success btn-sm">Editar</a>
                                    <form action="acciones/estado_marc.php" method="post">
                                        <input type="hidden" name="id_marc" value="<$id?>">
                                        <button  type="submit" class="btn btn-secondary btn-sm">//delete_user($usuario)?>delete</button> -->
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