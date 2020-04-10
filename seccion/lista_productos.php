<h2>LISTA DE PRODUCTOS</h2>
    <div class="row">


          <div class="col-4">
          <ul>
    <li>
        categoria
        <ul>
            <li>
                subcategoria1
                <ul>
                    <li>subcategoria2</li>
                    <li>subcategoria2</li>
                </ul>
            </li>
            <li>subcategoria1</li>
        </ul>
    </li>
    <li>categoria</li>
</ul>

          </div>
          <div class="col-8">
                <div class="row">
                <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="alfa" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">A>Z</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="alfa" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Z>A</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="precio" id="inlineRadio3" value="option3">
  <label class="form-check-label" for="inlineRadio3">MIN > MAX</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="precio" id="inlineRadio3" value="option3">
  <label class="form-check-label" for="inlineRadio3">MAX > MIN</label>
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
?>


                      <div class="col-6">
                          <div class="card bg-warning border border-dark" style="width: 18rem;">
                              <img src="img/productos/<?= $producto ?>" class="card-img-top" alt="...">
                               <div class="card-body">
                                <h5 class="card-title">Card title</h5>
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
