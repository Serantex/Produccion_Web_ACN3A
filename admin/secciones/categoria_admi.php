<?php
$con = new PDO('mysql:host=' . $hostname . ';port=' . $port . ';dbname=' . $database, $username, $password);
$cat = new Categoria($con);

$accion = "agregar_cat";
$boton = "Agregar";

if (isset($_GET["cat"])) {
    $nombre = $_GET["cat"];
    $accion = "modificar_cat";
    $boton = "Modificar";

    foreach ($cat->getCategoriaEdit(mostrar_nombre($nombre)) as $cats) {
        $id_p = $cats["id_padre"];
    }
}
?>
<div class="row justify-content-center newskin">
    <div class="col-12 col-md-6">
        <div class="card bg-yellow mt-4 border border-dark fama">
            <div class="card-body">
                <form action="acciones/<?= $accion ?>.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la Skin" value="<?= isset($nombre) ? mostrar_nombre($nombre) : ""; ?>">
                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($nombre) ?>">
                    </div>
                    <small>Seleccione categoria padre<br></small>
                    <div class="form-check form-check-inline">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select class="custom-select mr-sm-2" id="cat_padre" name="cat_padre">
                            <?php
                            foreach ($cat->getCategoriaPadre() as $cats) {
                                $id_cat = $cats["id_categoria"];
                                $nomb_cat = $cats["nombre"];
                            ?>
                                <option value="<?= $id_cat ?>" <?= isset($nombre) ? comp($id_p, $id_cat) : ''; ?>><?= $nomb_cat ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipo_editar" id="arma" value="arma" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary"><?= $boton; ?></button>
                </form>
            </div>
        </div>
    </div>
</div>