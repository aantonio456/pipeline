<?php
$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $conn = mysqli_connect("localhost", "root", "root", "testdb");

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "Login exitoso";
    } else {
        echo "Credenciales incorrectas";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Vulnerable</title>
</head>
<body>
    <h1>Login</h1>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario"><br><br>
        <input type="password" name="clave" placeholder="Contraseña"><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
