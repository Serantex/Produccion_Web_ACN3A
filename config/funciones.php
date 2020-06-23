<?php
require_once("config.php");

function mostrar_mensaje($mensaje, $estado, $clase)
{

    echo "<div class='alert alert-<?= $clase ?> alert-dismissible fade show' role='alert'>
<strong>" . $estado . "!</strong>" . $mensaje . "
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    <span class='sr-only'>Close</span>
</button>
</div>";
}

function validar($area)
{
    if (!empty($_GET["nombre"])) :
        echo '<h1>DATOS ENVIADOS</h1>';

        echo '<p><b class=h5>Nombre:</b> ' . $_GET["nombre"] . '</p>';

        echo '<p><b class=h5>Apellido: </b>' . $_GET["apellido"] . '</p>';

        echo '<p><b class=h5>telefono: </b>' . $_GET["telefono"] . '</p>';

        echo '<p><b class=h5>Area Destinada/s: </b></p>';
        foreach ($area as $area) :
            echo '<p>' . $area . '</p>';
        endforeach;
        echo '<p><b class=h5>Email: </b>' . $_GET["email"] . '</p>';

        echo '<p><b class=h5>Comentario: </b>' . $_GET["comentario"] . '</p>';

    endif;
}



function session_mensaje()
{
    if (isset($_SESSION["estado"])) :
        $clase = $_SESSION["estado"] == "error" ? "danger" : "success";

        $mensaje = '<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-' . $clase . ' alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h2 class=h5>' . $_SESSION["mensaje"] . '</h2>
            </div>
        </div>
    </div>
</div>';

        unset($_SESSION["estado"]);

    endif;

    echo $mensaje ?? "";
}

function mostrar_nombre($nombre)
{

    $nombre_1 = str_ireplace("_", " ", $nombre);

    $nombre_2 = ucwords($nombre_1);

    return $nombre_2;
}
function mostrar_id($id_marca)
{

    $marca_1 = str_ireplace("_", " ", $id_marca);

    $marca_2 = ucwords($marca_1);

    return $marca_2;
}

function categorias($get)
{
    header("products.php?seccion=lista_productos&cat=$get");
}

function marcas($get)
{
    header("products.php?seccion=lista_productos&marc=$get");
}

function cambiar_nombre($nombre)
{

    $nombre_1 = str_ireplace(" ", "_", $nombre);

    return $nombre_1;
}

function cheked($chek)
{
    if ($chek == 1) {
        return "checked";
    }
}
function comp($nombre, $nombre2)
{
    if ($nombre == $nombre2) {
        return "selected";
    }
}
    
    function vacio($dato){
        if(empty($dato)){
            return "selected";
        }
    }

    function logueado(){
        return isset($_SESSION["usuario"]);
    }

function edit_user($user)
{
}
