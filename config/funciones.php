<?php
require_once("config.php");

function mostrar_mensaje($mensaje, $estado, $clase) {

    echo "<div class='alert alert-<?= $clase ?> alert-dismissible fade show' role='alert'>
<strong>" . $estado . "!</strong>". $mensaje."
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    <span class='sr-only'>Close</span>
</button>
</div>";
}

function validar($area){
if(!empty($_GET["nombre"])):
echo '<h1>DATOS ENVIADOS</h1>';

echo '<p><b class=h5>Nombre:</b> ' .$_GET["nombre"] . '</p>';

echo '<p><b class=h5>Apellido: </b>'.$_GET["apellido"]. '</p>';

echo '<p><b class=h5>telefono: </b>'.$_GET["telefono"] . '</p>';

echo '<p><b class=h5>Area Destinada/s: </b></p>';
foreach($area as $area):
echo '<p>'.$area.'</p>';
endforeach;
echo '<p><b class=h5>Email: </b>'.$_GET["email"]. '</p>';

echo '<p><b class=h5>Comentario: </b>' .$_GET["comentario"]. '</p>';

endif;
}



function session_mensaje(){
if(isset($_SESSION["estado"])):
$clase = $_SESSION["estado"] == "error" ? "ligth" : "ligth";

$mensaje = '<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-'. $clase . ' alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2 class=h5>'. $_SESSION["mensaje"] .'</h2>
            </div>
        </div>
    </div>
</div>';

unset($_SESSION["estado"]);

endif;

echo $mensaje ?? "";
}