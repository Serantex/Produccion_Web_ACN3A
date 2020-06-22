<div class="container">
    <div class="col-8 justify-content-center">
        <h1> REGISTRATE </h1>

        <form action="acciones/procesar_signup.php" method="post">
        <div class="form-group">
                <label>Nombre</label>
                <input name="nombre" class="form-control" placeholder="Nombre" id="nombre">
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input name="apellido" class="form-control" placeholder="Apellido" id="apellido">
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <input name="usuario" class="form-control" placeholder="Usuario" id="usuario">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input name="password" type="password" class="form-control" placeholder="Password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>