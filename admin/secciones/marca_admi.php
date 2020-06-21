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
                                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la Skin" value="<?= isset($nombre) ? mostrar_nombre($nombre) : ""; ?>">
                                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($nombre) ?>">
                                    </div>
                                    <small>Seleccione categoria padre<br></small>
                                    <div class="form-check form-check-inline">
                                         <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                            <select class="custom-select mr-sm-2" id="marc_padre" name="marc_padre">
<?php
                foreach($marc->getMarcaPadre() as $marcs){
                    $id_marc=$marcs["id_marca"];
                    $nomb_marc=$marcs["nombre"];
?>      
                                                 <option value="<?=$id_marc?>" <?=isset($nombre) ? comp($id_p,$id_marc) : '';?>><?=$nomb_marc?></option>
<?php
                }
?>   
                                             </select>
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