<?php
include_once("config/mysql-login.php");
$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
?>

<h2>LISTA DE PRODUCTOS</h2>
    <div class="row">
          <div class="col-4">
		<?php
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
		  	<?php }}}?>


          </div>
          <div class="col-8">
                <div class="row">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="alfa" id="AZ" value="option1">
  <label class="form-check-label" for="AZ">A>Z</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="alfa" id=<?=$filtro="ZA"?> value="option2">
  <label class="form-check-label" for="ZA">Z>A</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="precio" id="MIN" value="option3">
  <label class="form-check-label" for="MIN">MIN > MAX</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="precio" id="MAX" value="option3">
  <label class="form-check-label" for="MAX">MAX > MIN</label>
</div>
                </div>
                <div >
                


                <div class="row img">
<?php
$carpeta_producto = opendir(PRODUCTOS);
while($producto = readdir($carpeta_producto)):
    if($producto == "." || $producto == "..")
        continue;

 $producto_png = str_replace(".png","",$producto);
 
 $nombre=mostrar_nombre($producto_png);

?>

                      <div class="col-6">
                          <div class="card bg-warning border border-dark" style="width: 18rem;">
                              <img class="listado"src="img/productos/<?= $producto ?>" class="card-img-top" alt="<?= $producto_png ?>">
                               <div class="card-body">
                                <h5 class="card-title"><?= $nombre ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="http://localhost/p_web/index.php?seccion=producto&producto=<?=$producto_png?>" class="btn btn-primary">Go somewhere</a>
                               </div>
                          </div>
                      </div>
                      <?php
        endwhile;
    ?>
                          

                  </div>
                  </div>
                  
    </div>
