<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$nombre = $_SESSION["usuario"];
$rol = $_SESSION["rol"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f6f8;
            text-align: center;
            padding-top: 60px;
        }

        .container {
            background: white;
            max-width: 400px;
            margin: auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 10px;
        }

        .button {
            display: block;
            width: 100%;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px;
            margin: 10px 0;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hola, <?php echo $nombre; ?> 👋</h2>

    <?php if ($rol === 'admin'): ?>
        <p>👑 Eres un <strong>administrador</strong>.</p>
        <a class="button" href="#">🧑‍💼 Gestionar Usuarios</a>
        <a class="button" href="#">📊 Ver Reportes</a>
        <a class="button" href="#">⚙️ Configuraciones</a>
        <a class="button" href="logout.php">📕 Cerrar sesión</a>

    <?php else: ?>
        <p>🙋‍♂️ Eres un <strong>usuario normal</strong>.</p>
        <a class="button" href="#">👤 Ver Perfil</a>
        <a class="button" href="logout.php">📕 Cerrar sesión</a>
    <?php endif; ?>
</div>

</body>
</html>
