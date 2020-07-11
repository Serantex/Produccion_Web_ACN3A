<?php
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password);
$perfil=new Perfil($con);

if( !in_array('add.user',$_SESSION['permiso']['permisos'])){ 
    header('Location: index.php');
}
?>

<div class="container">
    <div class="col-8 justify-content-center">
        <h1> ALTA USUARIO </h1>

        <form action="acciones/procesar_signup.php" method="post">
        <div class="form-group">
                <label>Nombre</label>
                <input name="nombre" class="form-control" placeholder="Nombre" id="nombre">
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input name="apellido" class="form-control" placeholder="Apellido" id="apellido">
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <input name="usuario" class="form-control" placeholder="Usuario" id="usuario">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" id="password">
            </div>
            <div class="form-group">
                            <label for="nombre">Perfiles</label>
                                <select name="perfiles[]" id="perfiles" multiple='multiple' >
                                    <?php  
                                        foreach($perfil->getList() as $perfi){
                                    ?>
                                            <option value=<?=$perfi["id_perfil"]?>
                                    <?php 
                                        if(isset($perf)){
                                                foreach($perfil->get($_GET['user']) as $per){
                                                    $id2=$per["id_pefil"];
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>