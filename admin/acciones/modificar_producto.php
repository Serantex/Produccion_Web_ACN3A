<?php   
include_once("../../config/mysql-login.php");
include_once("../../config/config.php");
include_once("../../class/classProductos.php");
include_once("../../config/funciones.php");

$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
$producto=new Producto($con);

$nombre_actual=$_POST["nombre_actual"];
$nombre=ucwords($_POST["nombre"]);
$precio=$_POST["precio"];
$descrip=$_POST["descrip"];
$cat=$_POST["cat"];
$sub_cat=$_POST["sub_cat"];
$marca=$_POST["marca"];

foreach($producto->getProductoEdit($nombre_actual) as $pro){
    $id=$pro["id"];
}

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
$nombre_a=cambiar_nombre($nombre_actual);
$nombre_nuevo=cambiar_nombre($nombre);

if(empty($nombre) || empty($precio) || empty($descrip) || empty($cat) || empty($imagen)){
    $_SESSION["estado"] = "error";
    $_SESSION["mensaje"] = "todos los datos son obligatorios";
    header("Location:../index.php?seccion=producto_admi&producto=$nombre_actual&error=datos");
    die();
}else{
    $producto->updateProducto($id,$nombre,$cat,$sub_cat,$descrip,$precio,$stock,$novedad,$marca);

    if (!empty($_FILES["imagen"]) && $_FILES["imagen"]["size"] > 0):

        if($imagen["type"] != "image/png"):
            $_SESSION["estado"] = "error";
            $_SESSION["mensaje"] = "la imagen debe ser png";
            header("Location:../index.php?seccion=producto_admi&producto=$nombre_actual&error=tipo_img");
            die();
        endif;

        if (file_exists(PRODUCTOS . "/$nombre_a.png")){
            unlink(PRODUCTOS . "/$nombre_a.png");
        }

        move_uploaded_file($_FILES["imagen"]["tmp_name"], PRODUCTOS . "/$nombre_nuevo.png");
        
    endif;
    rename(PRODUCTOS . "/$nombre_a.png", PRODUCTOS . "/$nombre_nuevo.png");
}
$_SESSION["estado"] = "exito";
$_SESSION["mensaje"] = "se modifico el producto con exito";
header("Location:../index.php?seccion=lista_productos&estado=ok&aviso=alta_producto");

