<?php
$hostname = 'localhost';
$database = 'categorias_productos';
$username = 'root';
$password = '';
$port     = '3306';

try {        
    $con = new PDO('mysql:host='.$hostname.';port='.$port.';dbname='.$database, $username, $password);
}
catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage();
    die();
}



?> 