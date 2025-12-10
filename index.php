<?php
$apiKey = "12345-SECRET-KEY";

$mensaje = isset($_GET['msg']) ? $_GET['msg'] : "Bienvenido";

setcookie("session", "admin", time() + 3600);

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['page'])) {
    include($_GET['page'] . ".php");
}

if (isset($_GET['user'])) {
    $conn = mysqli_connect("localhost", "root", "root", "testdb");
    $u = $_GET['user'];
    $sql = "SELECT * FROM usuarios WHERE usuario = '$u'";
    mysqli_query($conn, $sql);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Web Vulnerable SAST</title>
</head>
<body>
    <h1>Sitio Web con Vulnerabilidades</h1>

    <p>Mensaje recibido: <?= $mensaje ?></p>

    <form method="GET">
        <input type="text" name="msg" placeholder="Escribe algo (XSS)">
        <button type="submit">Enviar</button>
    </form>

    <h2>Prueba de File Inclusion</h2>
    <a href="?page=login">Incluir archivo login.php</a><br>
    <a href="?page=../../etc/passwd">Leer /etc/passwd</a>

    <h2>SQL Injection Test</h2>
    <form method="GET">
        <input type="text" name="user" placeholder="Usuario (SQLi)">
        <button type="submit">Consultar</button>
    </form>

    <br><br>
    <a href="login.php">Ir a Login Vulnerable</a>
</body>
</html>
