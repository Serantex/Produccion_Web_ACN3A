 <?php 
    if( !in_array('perf',$_SESSION['permiso']['permisos'])){ 
    header('Location: index.php');
    }
    
    $perfilMenu = 'Perfiles';

	$con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
	$perfil = new Perfil($con); 
    $mierda =new Producto($con);
    
	$query = 'SELECT * FROM permisos';
    $permisos = $con->query($query);

    $accion="agregar_perfil";
    $boton="Agregar";
	
	if(isset($_GET['perf'])){
        
        foreach($perfil->get($_GET['perf']) as $row){
            $nombre=$row["nombre"];
        }
            $perf = $perfil->get($_GET['perf']); 
            $accion="modificar_perfil";
            $boton="Modificar";
	} 
	?>
	  
	  
        
<div class="row justify-content-center newskin">
    <div class="col-12 col-md-6">
            <div class="card bg-yellow mt-4 border border-dark fama">
                <div class="card-body">
                    <form action="acciones/<?=$accion?>.php" method="POST">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" value="<?= isset($nombre) ? mostrar_nombre($nombre) : ""; ?>">
                        </div> 
                         <div class="form-group">
                            <label for="nombre">Permisos</label>
                                <select name="permisos[]" id="permisos" multiple='multiple' >
                                    <?php  foreach($permisos as $permi){?>
                                            <option value=<?=$permi["id_permiso"]?>
                                    <?php 
                                    
                                        if(isset($perf)){
                                                foreach($perfil->getPermisos($_GET['perf']) as $per){
                                                    $id2=$per["id_permiso"];
                                                    compper($permi["id_permiso"], $id2);

                                            }
                                            }
   
                                    ?>
                                    ><?=$permi['nombre']?></option>
                                <?php }?>
                                        </select>
                        </div> 
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?=$boton;?></button>
                        </div> 
                        <input type="hidden" class="form-control" id="id" name="id" placeholder="" value="<?=$_GET['perf']?>">
                    </form>
                </div>
            </div>
    </div>
</div>
