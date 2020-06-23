<div class="container">
    <div class="col-8 justify-content-center">
        <h1> INICIA SESIÓN </h1>

        <form action="config/procesar_login.php" method="post">
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" placeholder="Enter username" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>