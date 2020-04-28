<div class="container">  
    <h2 class="fama">NOVEDADES</h2>
    <div class="row img">
<?php

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$nov=new Producto($con);


foreach($nov->getNovedades() as $producto){
  $nombre=cambiar_nombre($producto["nombre"]);
?>
        <div class="col-4">
            <div class="card bg-warning border border-dark" style="width: 18rem;">
                <img src="img/productos/<?=$nombre?>.png" alt=<?=$producto["nombre"]?>>
                <div class="card-body"> 
                   <h5 class="card-title"><?=$producto["nombre"];?></h5>
                   <p class="card-text"><?= $producto["descripcion"] ?></p>
                    <p class="card-text">$<?=$producto["precio"];?></p>
                    <a href="http://localhost/Produccion_Web_ACN3A/index.php?seccion=producto&producto=<?=$nombre?>" class="btn btn-primary">IR AL PRODUCTO</a>
                </div>
            </div>
            </div>
<?php
}
?>
        
    </div>
</div>  