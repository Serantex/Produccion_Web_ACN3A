<?php
$accion="agregar_cat";
$boton="Agregar";


if(isset($_GET["cat"])){
    $nombre=$_GET["cat"];
    $accion="modificar_cat";
    $boton="Modificar";
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
                                    </div>
                                    <small>Seleccione categoria padre<br></small>
                                    <div class="form-check form-check-inline">
                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            <option selected>Choose...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
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