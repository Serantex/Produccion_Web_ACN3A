<?php
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
?>

<h2 class="lista">LISTA DE PRODUCTOS</h2>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <?php
          if(!empty($_GET["filtro"])){
              $filtro=$_GET["filtro"];
          }else{
            $filtro="";
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
              }
            }
          }  
        ?>
          <br>  
      <div>
        
<?php
        if(!empty($_GET["filtro"])){
            $filtro=$_GET["filtro"];
        }

        if(empty($_GET["marca"])){
            $marca=1;
        }else{
            $marca=$_GET["marca"];
        }

        $marc = new marca($con);

          foreach($marc->getMarca() as $row){
?>

            <a class="lista" href= "index.php?seccion=lista_productos&marca=<?php echo $row['id_marca']?>&cat=<?php echo $categoria?>"><?php echo $row['nombre']?></a>
              <br>
<?php
                  foreach($marc->getMarca($row['id_marca']) as $row2){
?>
                    <a class="lista" href="index.php?seccion=lista_productos&marca=<?php echo $row2['id_marca']?>&cat=<?php echo $categoria?>">>  <?php echo $row2['nombre']?></a>  
                    <br>
<?php 
                          foreach($marc->getMarca($row2["id_marca"]) as $row3){ 
?>
                            <a class="lista" href="index.php?seccion=lista_productos&marca=<?php echo $row3['id_marca']?>&cat=<?php echo $categoria?>">>>   <?php echo $row3['nombre']?></a>
                            <br>       
          <?php 
                          }
                  }
          }  
            ?>
        </div>
    </div> 
          <div class="col-md-8">
            <form action="config/procesar_filtrado.php" method="post">
                  <div class="form-row">
                    
                      <div class="form-row">
                        <input type="hidden" name="cat" value="<?=$categoria?>">
                        <input type="hidden" name="marca" value="<?=$marca?>">
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
             </form>
          
              

  <div class="row img">
  <?php
      $productos=new Producto($con);
    
          foreach($productos->getFiltrado($filtro,$categoria,$marca) as $producto_filtrado){
            $nombre_filtrado=cambiar_nombre($producto_filtrado["nombre"]);

            $habi=$productos->marCatProducto($producto_filtrado['categoria'],$producto_filtrado['sub_categoria'],$producto_filtrado['marca']);

            if(!$habi){
  ?>
                      <div class="col-lg-6 col-md-12">
                            <div class="card bg-warning border border-dark lis" style="width: 18rem;">
                                <img class="listado"src="img/productos/<?= $nombre_filtrado ?>.png" class="card-img-top" alt="<?= $producto_filtrado["nombre"] ?>">
                                <div class="card-body">
                                      <h5 class="card-title"><?= utf8_encode($producto_filtrado["nombre"]) ?></h5>
                                      <!--<p class="card-text"><?= utf8_encode($producto_filtrado["descripcion"])?></p>-->
                                      <p class="card-text">$<?= $producto_filtrado["precio"] ?></p>
                                      <a href="index.php?seccion=producto&producto=<?=$nombre_filtrado?>" class="btn btn-primary centro">IR AL PRODUCTO</a>
                                </div>
                            </div>
                      </div>
  <?php
    }
  }
  ?>
  </div>
