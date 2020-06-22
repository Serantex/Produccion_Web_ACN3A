<?php
 
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
    $productos=new Producto($con);
    $cat = new Categoria($con);
    $mar = new Marca($con);

    $accion="agregar_producto";
    $boton="Agregar";
    $null=null;

    if(isset($_GET["producto"])){
        $nombre=$_GET["producto"];
        $accion="modificar_producto";
        $boton="Modificar";

        foreach($productos->getProductoEdit(mostrar_nombre($nombre))as $product){
            $precio=$product["precio"];
            $descrip=$product["descripcion"];
            $stock=$product["stock"];
            $novedad=$product["destacado"];
            $cat1=$product["categoria"];
            $sub_cat1=$product["sub_categoria"];
            $p_marca=$product["marca"];
        }
}
?>
<div class="row justify-content-center newskin">
    <div class="col-12 col-md-6">
                <div class="card bg-yellow mt-4 border border-dark fama">
                        <div class="card-body">
                                <form action="acciones/<?=$accion?>.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            placeholder="Nombre del Producto" value="<?= isset($nombre) ? utf8_encode(mostrar_nombre($nombre)) : ""; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Descripcion</label>
                                        <input type="text" class="form-control" name="descrip" id="descrip" placeholder="Descripcion del Producto" value="<?= isset($nombre) ? utf8_encode($descrip) : ""; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre">Precio</label>
                                        <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio del Producto" value="<?= isset($nombre) ? $precio : ""; ?>">
                                        <input type="hidden" name="nombre_actual" value="<?= mostrar_nombre($nombre) ?>">       
                                    </div>
                                
                                    <small>Seleccione categoria del producto<br></small>

                                    <div class="form-check form-check-inline">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                        <select class="custom-select mr-sm-2" id="cat" name="cat">
                                            <option selected>Categorias</option>
<?php
                                            foreach($cat->getCategorias() as $cats){
                                                $id_cat=$cats["id_categoria"];
                                                $nomb_cat=$cats["nombre"];

                                                foreach($cat->getCategorias($id_cat) as $cats){
                                                    $id_cat=$cats["id_categoria"];
                                                    $nomb_cat=$cats["nombre"];    
?>
                                            <option value="<?=$id_cat?>"<?=isset($nombre) ? comp($cat1,$id_cat) : '';?>  ><?=$nomb_cat?></option>
<?php
                                                }
                                            }
?>      
                                        </select>
                                    </div>
                                    <br>
                                    <small>Seleccione subcategoria del producto si es que tiene<br></small>
                                    <div class="form-check form-check-inline">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                        <select class="custom-select mr-sm-2" id="sub_cat" name="sub_cat">
                                            <option selected>SubCategorias</option>
<?php
                                            foreach($cat->getCategoriaHijas() as $scats){
                                                $id_scat=$scats["id_categoria"];
                                                $nomb_scat=$scats["nombre"];
?>
                                            <option value="<?=$id_scat?>" <?=isset($nombre) ? comp($sub_cat1,$id_scat) : '';?>><?=$nomb_scat?></option>
<?php
                                            }
?>
                                            <option value="NULL" <?=isset($nombre) ? vacio($sub_cat1) : '';?> >Ninguno</option>
                                        </select>

                                    </div>
                                    <br>
                                    <small>Seleccione Marca del producto si es que tiene<br></small>
                                    <div class="form-check form-check-inline">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                                        <select class="custom-select mr-sm-2" id="marca" name="marca">
                                            <option selected>Maracas</option>
<?php
                                            foreach($mar->getTodasMarca() as $marca){
                                                $id_marca=$marca["id_marca"];
                                                $nomb_marca=$marca["nombre"];
?>
                                            <option value="<?=$id_marca?>" <?=isset($nombre) ? comp($p_marca,$id_marca) : '';?>><?=$nomb_marca?></option>
<?php
                                            }
?>
                                            <option value="NULL" <?=isset($nombre) ? vacio($p_marca) : '';?> >Ninguno</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="Stock" name="stock" <?=isset($nombre) ? cheked($stock): '';?>>
                                            <label class="custom-control-label" for="Stock">Stock</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="Novedad" name="novedad" <?=isset($nombre) ? cheked($novedad):''?>>
                                            <label class="custom-control-label" for="Novedad">Novedad</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="imagen">Imagen</label>
                                        <input type="file" class="form-control-file" name="imagen" id="imagen" aria-describedby="fileHelpId" accept="image/png">
                                        <small id="fileHelpId" class="form-text text-muted">ingrese una imagen que corresponda a su nombre</small>
<?php
                                    if(isset($nombre)){
?>
                                       <img src="<?= "../img/productos/$nombre.png" ?>" alt="<?= mostrar_nombre($nombre); ?>" width="100">
<?php
                                    }
?>
                                    </div>
                                    <button type="submit" class="btn btn-primary"><?=$boton?></button>
                                </form>
                        </div>
                </div>
    </div>
</div>
