<?php
$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);

$producto = $_GET["producto"];

$product = new Producto($con);

$com=new Comentario($con);

$nombre_filtrado=mostrar_nombre($producto);
foreach($product->getProducto($nombre_filtrado) as $articulo){
?>

<div class="container seccion fe">
    <div class="row">
        <div class="col-4">
                <div class="row">
                    <img src="img/productos/<?=$producto?>.png" alt="">
                </div>
        </div>
        <div class="col-8">
                <div class="row">
                    <h2 class="fama"><?=$articulo["nombre"]?></h2>
                </div>
                <div>
                    <p><span class="fama">$<?=$articulo["precio"]?></span></p>
                    <p><span class="fama">clasificacion:</span></p>
                    <p class="fama"><?=$articulo["descripcion"]?></p>
                </div>
                <div class="row">

                    <div>
                        <h3 class="fama">Comentarios del Producto</h3>
                        <hr>
                        <?php 
                            foreach($com->getMostrarComentario($articulo["id"]) as $comentario){
                        ?>
                            
                            <p class="fama"><?=$comentario["mail"];?> dijo : <?=$comentario["comentario"];?> CLASIFICO:<STRONG><?=$comentario["clasificacion"];?>★</STRONG> </p>
                           <hr>
                            </div>
                        <?php
                             }
                        ?>
                            <div>
                                <h4 class="fama">ENVIA TU COMENTARIO</h4>
                                    <form action="config/procesar_comentarios.php" method="post">
                                     <div class="form">
                                         <div class="form-row">
                                            <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
                                        </div>
                                        <div class="form-row">
                                             <input type="hidden" name="id_producto" value="<?=$articulo["id"]?>">
                                         </div>
                                         <div class="form-row">
                                             <input type="hidden" name="producto" value="<?=$producto?>">
                                         </div>
                                        <div>
                                            <label for="email" class="fama">Email</label>
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                        <div>
                                            <label for="comentario" class="fama">Comentario</label>
                                             <textarea class="form-control" name="comentario" id="comentario" placeholder="Ingresa tu comentario"></textarea>
                                        </div>
                                        <div>
                                             <label for="comentario" class="fama">Seleccione Clasificacion</label>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rank" id="1" value="1">
                                                <label class="form-check-label fama" for="1">1★</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rank" id="2" value="2">
                                                <label class="form-check-label fama" for="2">2★</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rank" id="3" value="3">
                                                <label class="form-check-label fama" for="3">3★</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rank" id="4" value="4">
                                                <label class="form-check-label fama" for="4">4★</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="rank" id="5" value="5">
                                                <label class="form-check-label fama" for="5">5★</label>
                                             </div>
                                             <div>
                                                <button type="submit" class="btn btn-warning">Enviar</button>
                                             </div>
                                        </div>
                                        </div>
                            </div>
                </div>
        </div>  
    </div>  
</div>
<?php
}
?>