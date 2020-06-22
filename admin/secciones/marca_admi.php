<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
     $marc = new Marca($con);

    $accion="agregar_marc";
    $boton="Agregar";

    if(isset($_GET["marc"])){
        $nombre=$_GET["marc"];
        $accion="modificar_marc";
        $boton="Modificar";
        
        foreach($marc->getMarcaEdit(mostrar_nombre($nombre))as $marcs){
            $id_p=$marcs["id_padre"];
        }
    }
?>
<div class="row justify-content-center newskin">
    <div class="col-12 col-md-6">
                <div class="card bg-yellow mt-4 border border-dark fama">
                        <div class="card-body">
                                <form action="acciones/<?=$accion?>.php" method="POST">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la Marca" value="<?= isset($nombre) ? mostrar_nombre($nombre) : ""; ?>">
                                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($nombre) ?>">
                                    </div>
                                    

                                    <div class="form-group">
                                        <input type="hidden" name="tipo_editar" id="arma" value="arma" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><?=$boton;?></button>
                                </form>
                        </div>
                </div>
    </div>
</div>