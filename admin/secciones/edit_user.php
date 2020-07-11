<?php
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password);
$user = new Usuario($con);
$perfil=new Perfil($con);

if( !in_array('mod.user',$_SESSION['permiso']['permisos'])){ 
    header('Location: index.php');
}

if (isset($_GET["user"])) {
    $usuario = $_GET["user"];  
}
foreach ($user->getByUsername($usuario) as $row) {
    $id = $row['id_usuario'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
}
?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card bg-yellow mt-4 border border-dark fama">
            <div class="card-body">
                <form action="acciones/editar_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="<?= isset($nombre) ? $nombre : "" ; ?>">
                        <input type="hidden" name="nombre_actual" value="<?= $nombre ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="<?= isset($apellido) ? $apellido : "" ?>">
                        <input type="hidden" name="apellido_actual" value="<?= $apellido?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="<?= isset($usuario) ? $usuario : "" ?>">
                        <input type="hidden" name="usuario_actual" value="<?= $usuario ?>">
                    </div>
                    <div class="form-group">
                            <label for="nombre">Perfiles</label>
                                <select name="perfiles[]" id="perfiles" multiple='multiple' >
                                    <?php  
                                        foreach($perfil->getList() as $perfi){
                                    ?>
                                            <option value=<?=$perfi["id_perfil"]?>
                                    <?php 
                                        if(isset($_GET["user"])){
                                                foreach($perfil->getUsuarioPerfil($id) as $per){
                                                    $id2=$per["id_perfil"];
                                                    compper($perfi["id_perfil"], $id2);
                                                }
                                        }
                                    ?>
                                    ><?=$perfi['nombre']?></option>
                                    <?php
                                         }
                                    ?>
                                </select>
            </div> 
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?=$id?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary"> Guardar </button>
                </form>
            </div>
        </div>
    </div>
</div>