<?php
$mensaje = isset($_GET['msg']) ? $_GET['msg'] : "Bienvenido";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Web de Prueba</title>
</head>
<body>
    <h1>Web</h1>

    <p>Mensaje recibido: <?= $mensaje ?> </p>

    <form method="GET">
        <input type="text" name="msg" placeholder="Escribe algo">
        <button type="submit">Enviar</button>
    </form>

    <a href="login.php">Ir a Login</a>
</body>
</html>
