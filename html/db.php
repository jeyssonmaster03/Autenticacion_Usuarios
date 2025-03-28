<?php
$host = 'db';
$user = 'root';
$password = 'rootpass';
$database = 'sistema_login';

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}
?>
