<!DOCTYPE html>
<?php
    include_once("config/mysql-login.php");
    include_once("config/config.php");
    include_once("config/arrays.php");
    include_once("config/funciones.php");
    include_once("class/classCategorias.php");
    include_once("class/classProductos.php");
    include_once("class/classComentarios.php");
   $seccion = $_GET["seccion"] ?? "home";

   

?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Kwki-E-Mart</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link href="img/icon.ico" rel="icon" type="image/ico">


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
                    foreach($secciones as $link=>$nombre):
                ?>
                    <li class="nav-item <?= $seccion == $link ? "active" : "" ?>">
                        <a class="nav-link" href="index.php?seccion=<?= $link; ?>"><?= $nombre; ?></a>
                    </li>
                    <?php
                    endforeach;
                ?>

                </ul>
                <ul class="navbar-nav mr-0">
                    <?php
                
            ?>
                    <li class="nav-item">
                    <a href="index.php?seccion=log_in"> Log in </a>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <h1></h1>
        <div class="container fondo">

            <?php
session_mensaje();
if(file_exists("seccion/$seccion.php")):
    require_once("seccion/$seccion.php");
else:
    require_once("seccion/404.php");
            endif;
?>

        </div>
    </main>
    <footer class="pie">
        <div class="row mx-0">
            <div class="col-12 px-0">
                <p class="text-center">KIWK-E-MART</p>
                <?php
                

                ?>
            </div>
        </div>
    </footer>





    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>