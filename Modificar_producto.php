<?php

session_start();
include 'consultas/conexion.php';

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

// Obtener los datos de la sesión
$usuarioSesion = $_SESSION['usuario'] ?? null;
$rolSesion = $usuarioSesion['rol'] ?? null;
$idUsuario = $usuarioSesion['id'] ?? null;

// Redirigir automáticamente si el rol es 'empleado'
if ($rolSesion === 'empleado') {
    header("Location: Modificar.php?id=$idUsuario");
    exit();
}

// Verificar si se ha pasado un id de producto
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: Crud_producto.php');
    exit();
}

$idProducto = $_GET['id'];

// Obtener los datos del producto
$sql = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
$sql->bindParam(':id', $idProducto, PDO::PARAM_INT);
$sql->execute();

$producto = $sql->fetch(PDO::FETCH_OBJ);
if (!$producto) {
    header('Location: Crud_producto.php');
    exit();
}

// Procesar el formulario de modificación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnmodificar_producto'])) {
    $nombre = $_POST['nombre'] ?? null;
    $categoria = $_POST['categoria'] ?? null;
    $imagen = $_FILES['imagen'] ?? null;

    $errores = [];
    if (empty($nombre)) $errores[] = "El nombre del producto no puede estar vacío.";
    if (empty($categoria)) $errores[] = "La categoría no puede estar vacía.";

    $imagenRuta = $producto->imagen; // Si no se cambia la imagen, usamos la original

    // Si se ha subido una nueva imagen, procesarla
    if ($imagen && $imagen['error'] === 0) {
        $imagenRuta = 'img/' . basename($imagen['name']);
        if (!move_uploaded_file($imagen['tmp_name'], $imagenRuta)) {
            $errores[] = "Error al subir la imagen.";
        }
    }

    if (empty($errores)) {
        try {
            // Actualizar el producto en la base de datos
            $sqlUpdate = $conexion->prepare("UPDATE productos SET nombre = :nombre, categoria = :categoria, imagen = :imagen WHERE id = :id");
            $sqlUpdate->bindParam(':nombre', $nombre);
            $sqlUpdate->bindParam(':categoria', $categoria);
            $sqlUpdate->bindParam(':imagen', $imagenRuta);
            $sqlUpdate->bindParam(':id', $idProducto, PDO::PARAM_INT);

            if ($sqlUpdate->execute()) {
                echo '<div class="alert alert-success">Producto modificado correctamente.</div>';
            } else {
                echo '<div class="alert alert-danger">Error al modificar el producto.</div>';
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
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/1ef2779bde.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modificacion</title>
</head>
<body>
    <main>
    <?php require_once('./layout/header-login.php'); ?>
    <div class="contenedor-crud">
        <div class="form-crud">
            <h2>Modificar Producto</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto->nombre); ?>" required>
                </div>
                <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" required>
                    <option value="" disabled selected>Seleccione una Categoria</option>
                    <option value="Café">Café</option>
                    <option value="Comida">Comida</option>
                    <option value="Bebidas">Bebidas</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del Producto</label>
                    <input type="file" id="imagen" name="imagen">
                    <p>Imagen actual: <img src="<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->nombre); ?>" style="width: 50px;"></p>
                </div>
                <button type="submit" name="btnmodificar_producto" value="ok">Modificar Producto</button>
            </form>
        </div>
    </div
    </main>
</body>
</html>