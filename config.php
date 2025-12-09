<?php
// Configuración vulnerable
$db_host = "localhost";
$db_user = "root";     // No debe usarse root en producción
$db_pass = "root";     // Contraseña expuesta en el código
$db_name = "testdb";

// Conexión insegura
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
