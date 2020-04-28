<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
?>

<h2 class="lista">LISTA DE PRODUCTOS</h2>
    <div class="row">
      <div class="col-4">
        <?php
        if(!empty($_GET["filtro"])){
            $filtro=$_GET["filtro"];
        }

        if(empty($_GET["cat"])){
            $categoria=1;
        }else{
            $categoria=$_GET["cat"];
        }

        $cat = new Categoria($con);

          foreach($cat->getCategorias() as $row){
            ?>
            <a class="lista" href= "index.php?seccion=lista_productos&cat=<?php echo $row['id_categoria']?>"><?php echo $row['nombre']?></a>
              <br>
                <?php
                  foreach($cat->getCategorias($row['id_categoria']) as $row2){
                ?>
                    <a class="lista" href="index.php?seccion=lista_productos&cat=<?php echo $row2['id_categoria']?>">>  <?php echo $row2['nombre']?></a>  
                    <br>
                        <?php 
                          foreach($cat->getCategorias($row2["id_categoria"]) as $row3){ 
                              ?>
                            <a class="lista" href="index.php?seccion=lista_productos&cat=<?php echo $row3['id_categoria']?>">>>   <?php echo $row3['nombre']?></a>

                            <br>       
            <?php 
            }}}  
            ?>

        </div>
          <div class="col-8">
            <form action="config/procesar_filtrado.php" method="post">
                  <div class="form-row">

                      <div class="form-row">
                        <input type="hidden" name="cat" value="<?=$categoria?>">
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input lista" type="radio" name="filtro" id="NOV" value="NOV">
                        <label class="form-check-label fama" for="NOV">NOVEDADES</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input lista" type="radio" name="filtro" id="AZ" value="AZ">
                        <label class="form-check-label fama" for="AZ">A>Z</label>
                      </div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="filtro" id="ZA" value="ZA">
                        <label class="form-check-label fama" for="ZA">Z>A</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="filtro" id="MIN" value="MIN">
                      <label class="form-check-label fama" for="MIN">MIN > MAX</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="filtro" id="MAX" value="MAX">
                      <label class="form-check-label fama" for="MAX">MAX > MIN</label>
                    </div>

                    <div>
                    <button type="submit" class="btn btn-warning">Filtrar</button>
                    </div>
                  </div>
        <div >

<div class="row img">
<?php
    $productos=new Producto($con);
    if(empty($filtro)){
      if(!empty($categoria)&& $categoria!=1){
        foreach($productos->getFiltradoCategorias($categoria) as $producto_filtrado){
          $nombre_filtrado=cambiar_nombre($producto_filtrado["nombre"]);
?>
                    <div class="col-6">
                          <div class="card bg-warning border border-dark" style="width: 18rem;">
                              <img class="listado"src="img/productos/<?= $nombre_filtrado ?>.png" class="card-img-top" alt="<?= $producto_filtrado["nombre"] ?>">
                               <div class="card-body">
                                <h5 class="card-title"><?= $producto_filtrado["nombre"] ?></h5>
                                <p class="card-text"><?= $producto_filtrado["descripcion"] ?></p>
                                <p class="card-text">$<?= $producto_filtrado["precio"] ?></p>
                                <a href="http://localhost/Produccion_Web_ACN3A/index.php?seccion=producto&producto=<?=$nombre_filtrado?>" class="btn btn-primary">IR AL PRODUCTO</a>
                               </div>
                          </div>
                    </div>
<?php
  }
  }else{
      foreach($productos->getProductos()as $product){
            $nombre=cambiar_nombre($product["nombre"]);
?>
                      <div class="col-6">
                          <div class="card bg-warning border border-dark" style="width: 18rem;">
                              <img class="listado"src="img/productos/<?= $nombre ?>.png" class="card-img-top" alt="<?= $product["nombre"] ?>">
                               <div class="card-body">
                                  <h5 class="card-title"><?= $product["nombre"] ?></h5>
                                  <p class="card-text"><?= $product["descripcion"] ?></p>
                                  <p class="card-text">$<?= $product["precio"] ?></p>
                                  <a href="http://localhost/Produccion_Web_ACN3A/index.php?seccion=producto&producto=<?=$nombre?>" class="btn btn-primary">IR AL PRODUCTO</a>
                              </div>
                          </div>
                      </div>

<?php
      }}
      
    }else{

        foreach($productos->getFiltrado($filtro,$categoria) as $productos_filtrado){
          $nombre=cambiar_nombre($productos_filtrado["nombre"]);
?>
                <div class="col-6">
                          <div class="card bg-warning border border-dark" style="width: 18rem;">
                              <img class="listado"src="img/productos/<?= $nombre ?>.png" class="card-img-top" alt="<?= $productos_filtrado["nombre"] ?>">
                               <div class="card-body">
                                  <h5 class="card-title"><?= $productos_filtrado["nombre"] ?></h5>
                                  <p class="card-text">$<?= $productos_filtrado["descripcion"] ?></p>
                                  <p class="card-text">$<?= $productos_filtrado["precio"] ?></p>
                                  <a href="http://localhost/Produccion_Web_ACN3A/index.php?seccion=producto&producto=<?=$nombre?>" class="btn btn-primary">IR AL PRODUCTO</a>
                               </div>
                          </div>
                </div>
          <?php
        }}
    ?>
                          

    </div>
    </div>
    </div>
