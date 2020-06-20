<?php   
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classProductos.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$producto=new Producto($con);

$nombre=ucwords($_POST["nombre"]);
$precio=$_POST["precio"];
$descrip=$_POST["descrip"];

$cat=$_POST["cat"];
$sub_cat=$_POST["sub_cat"];

if(empty($_POST["stock"])){
    $stock=0;
}else{
    $stock=1;
}


if(empty($_POST["novedad"])){
    $novedad=0;
}else{
    $novedad=1;
}

$imagen = $_FILES["imagen"];
$nombre_img=cambiar_nombre($nombre);

if($imagen["type"] != "image/png"):
    header("Location:../index.php?seccion=producto_admi");
    die();
endif;

if(empty($nombre) || empty($precio) || empty($descrip) || empty($cat) || empty($imagen)){
    header("Location:../index.php?seccion=producto_admi&error=datos");
    die();
}else{
    $producto->setProducto($nombre,$cat,$sub_cat,$descrip,$precio,$stock,$novedad);
    move_uploaded_file($imagen["tmp_name"],PRODUCTOS . "/$nombre_img.png");
}

header("Location:../index.php?seccion=lista_productos&estado=ok&aviso=alta_producto");

