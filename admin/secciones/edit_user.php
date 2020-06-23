<?php
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password);
$user = new Usuario($con);


if (isset($_GET["user"])) {
    $usuario = $_GET["user"];
    $datos = $user->getByUsername($usuario);
    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $permisos = $datos['permisos'];
    $id = $datos['id_usuario'];
}
?>
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card bg-yellow mt-4 border border-dark fama">
            <div class="card-body">
                <form action="acciones/editar_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del usuario" value="<?= isset($nombre) ? mostrar_nombre($nombre) : ""; ?>">
                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($nombre) ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido del usuario" value="<?= isset($nombre) ? mostrar_nombre($nombre) : ""; ?>">
                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($apellido) ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" value="<?= isset($usuario) ? mostrar_nombre($nombre) : ""; ?>">
                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($usuario) ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Permisos</label>
                        <input type="text" class="form-control" name="permisos" id="permisos" placeholder="Permisos del usuario" value="<?= isset($permisos) ? mostrar_nombre($permisos) : ""; ?>">
                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($nombre) ?>">
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