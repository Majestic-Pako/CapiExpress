<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnregistrar_producto'])) {
    $nombre = $_POST['nombre'] ?? null;
    $categoria = $_POST['categoria'] ?? null;
    $imagen = $_FILES['imagen'] ?? null;

    $errores = [];
    if (empty($nombre)) $errores[] = "El nombre no puede estar vacío.";
    if (empty($categoria)) $errores[] = "Debe seleccionar una categoría.";
    if (empty($imagen['name'])) $errores[] = "Debe subir una imagen.";

    $imagenRuta = null;
    if ($imagen && $imagen['error'] === 0) {
        $imagenRuta = 'img/' . basename($imagen['name']);
        if (!move_uploaded_file($imagen['tmp_name'], $imagenRuta)) {
            $errores[] = "Error al subir la imagen.";
        }
    }

    if (empty($errores)) {
        try {
            $sql = $conexion->prepare("INSERT INTO productos (nombre, categoria, imagen) VALUES (:nombre, :categoria, :imagen)");
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':categoria', $categoria);
            $sql->bindParam(':imagen', $imagenRuta);

            if ($sql->execute()) {
                echo '<div class="alert alert-success">Producto registrado correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger">Error al registrar el producto.</div>';
            }
        } catch (Exception $e) {
            echo '<div class="alert alert-danger">Ocurrió un error: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    } else {
        foreach ($errores as $error) {
            echo '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
        }
    }
}
?>

