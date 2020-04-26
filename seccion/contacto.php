
<div class="container seccion">
    <div class="row">

        <?php
        
if(!empty($_GET["estado"])):
    
    $clase = $_GET["estado"] == "correcto" ? "ligth" : "ligth";
    $estado = $_GET["estado"] == "correcto" ? "MUCHAS GRACIAS 😁": "UPS 😫";

    if($_GET["mensaje"] == "error_envio"):
        $mensaje = "Revisa que hayas completado todos los datos requeridos y minimo se debe tener una <b>CASILLA</b> marcada";
    else:
        $mensaje = "Tu comentario ah sido enviado exitosamente";
    endif;
    mostrar_mensaje($mensaje, $estado, $clase);

endif;
?>
    </div>

    <div class="row">
        <div class="col">
            <?php
            if(!empty($_GET["motivo"])):
            $motivos= unserialize($_GET["motivo"]);
            validar($motivos);
            endif;
?>
        </div>
    </div>

</div>
<div class="row">
    <img class="img-fluid img" src="img/baners/contacto.jpg" alt="contacto" height="200" width="1080">
</div>
<form action="config/procesar_contacto.php" method="post">
    <div class="form-row">
        <div class="col-sl-12 col-md-6">
            <label for="nombre" class="fama">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre">
        </div>
        <div class="col-sl-12 col-md-6">
            <label for="apellido" class="fama">Apellido</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
        </div>
        <div class="col-sl-12 col-md-6">
            <label for="apellido" class="fama">Telefono</label>
            <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
        </div>
    </div>
    <div class="form-row">
        <div class="col-sl-12 col-md-6">
            <label for="email" class="fama">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                placeholder="Email">
        </div>
    </div>
    <div>

        <label class="fama" for="comentario">Comentario</label>
        <textarea class="form-control" name="comentario" id="comentario" placeholder="Ingresa tu comentario"></textarea>
        <br>
        <p><span class="fama">AREA DESTINADA</span></p>
        <div class="invalid-feedback">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="motivo[]" id="Noticias" value="noticias" checked>
            <label class="form-check-label fama" for="info">RRHH</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="motivo[]" id="Equipos" value="equipos">
            <label class="form-check-label fama" for="equipo">VENTAS</label>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="motivo[]" id="Jugadores" value="jugadores">
            <label class="form-check-label fama" for="jugador">ATENCION AL CLIENTE</label>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>

