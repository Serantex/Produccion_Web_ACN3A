<!DOCTYPE html>
<?php
    include_once("../config/mysql-login.php");
    include_once("../config/config.php");
    include_once("../config/arrays.php");
    include_once("../config/funciones.php");
    include_once("../class/classCategorias.php");
    include_once("../class/classProductos.php");
    include_once("../class/classMarcas.php");
    include_once("../class/classComentarios.php");
    include_once("../class/classSignUp.php");
    include_once("../class/classUsuarios.php");
    $seccion = $_GET["seccion"] ?? "lista_productos";
   
   

?>
<html lang="es">

<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=ISO-8859-1>
    <title>Kwki-E-Mart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="../img/icon.ico" rel="icon" type="image/ico">


</head>

<body>

    <header class="abajo">
        <nav class="navbar bg-primary navbar-expand-md navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="navbar-nav mr-auto">
<?php
                    foreach($secciones_admin as $link=>$nombre_h):
?>
                    <li class="nav-item <?= $seccion == $link ? "active" : "" ?>">
                        <a class="nav-link" href="index.php?seccion=<?= $link; ?>"><?= $nombre_h; ?></a>
                    </li>
<?php
                    endforeach;
?>
                </ul>
                <ul class="navbar-nav mr-0">
                    <li class="nav-item">
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h1></h1>
        <div class="container fondo">
<?php
            session_mensaje();
            if(file_exists("secciones/$seccion.php")):
                require_once("secciones/$seccion.php");
            else:
                require_once("../seccion/404.php");
            endif;
?>
        </div>
    </main>
    <footer class="pie">
        <div class="row mx-0">
            <div class="col-12 px-0">
                <p class="text-center">KIWK-E-MART</p>
            </div>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>