<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // No valida tipos de archivo = vulnerabilidad
    $archivo = $_FILES['archivo'];
    $nombre = $archivo['name'];
    $ruta_temp = $archivo['tmp_name'];

    // Carpeta insegura
    $destino = "uploads/" . $nombre;

    // Crear carpeta si no existe
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true); // Permisos demasiado abiertos
    }

    if (move_uploaded_file($ruta_temp, $destino)) {
        echo "Archivo subido correctamente a: $destino";
    } else {
        echo "Error al subir archivo.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Subida Vulnerable</title>
</head>
<body>

<h2>Subir archivo</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="archivo"><br><br>
    <button type="submit">Subir</button>
</form>

</body>
</html>
