<?php
$conexion = new mysqli("mysql_db", "root", "rootpass", "sistema_login");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = "Admin";
$email = "admin@gmail.com";
$passwordPlano = "admin123";
$hash = password_hash($passwordPlano, PASSWORD_DEFAULT);
$rol = "admin";

// Si ya existe, solo actualizamos contraseña
$sql = "UPDATE usuarios SET password = '$hash' WHERE email = '$email'";
if ($conexion->query($sql) === TRUE) {
    echo " Contraseña actualizada correctamente.<br>";
    echo "Hash usado: <code>$hash</code>";
} else {
    echo " Error: " . $conexion->error;
}
?>
