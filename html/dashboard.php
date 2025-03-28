<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Panel de Usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>¡Bienvenido!</h2>
        <p>Hola, <strong><?php echo $_SESSION["usuario"]; ?></strong>. Has iniciado sesión correctamente.</p>

        <a href="logout.php">Cerrar sesión</a>
    </div>
</body>
</html>
