<?php
include("db.php");
session_start();

if (isset($_SESSION["usuario"])) {
    header("Location: dashboard.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        if (password_verify($password, $usuario["password"])) {
            $_SESSION["usuario"] = $usuario["nombre"];
            header("Location: dashboard.php");
            exit();

        } else {
            echo " Contraseña incorrecta.";
        }
    } else {
        echo " Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit">Iniciar Sesión</button>
        </form>
        <a href="registro.php">¿No tienes cuenta? Regístrate</a>
    </div>
</body>
</html>
