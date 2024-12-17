<?php

session_start();
include 'consultas/conexion.php';

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}

$usuarioSesion = $_SESSION['usuario'] ?? null;
$rolSesion = $usuarioSesion['rol'] ?? null;
$idUsuario = $usuarioSesion['id'] ?? null;

if ($rolSesion === 'empleado') {
    header("Location: Modificar.php?id=$idUsuario");
    exit();
}

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: Crud_producto.php');
    exit();
}

$idProducto = $_GET['id'];

$sql = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
$sql->bindParam(':id', $idProducto, PDO::PARAM_INT);
$sql->execute();

$producto = $sql->fetch(PDO::FETCH_OBJ);
if (!$producto) {
    header('Location: Crud_producto.php');
    exit();
}

$errores = [];
$mensajeExito = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnmodificar_producto'])) {
    $nombre = $_POST['nombre'] ?? null;
    $categoria = $_POST['categoria'] ?? null;
    $imagen = $_FILES['imagen'] ?? null;

    if (empty($nombre)) $errores[] = "El nombre del producto no puede estar vacío.";
    if (empty($categoria)) $errores[] = "La categoría no puede estar vacía.";

    $imagenRuta = $producto->imagen;

    if ($imagen && $imagen['error'] === 0) {
        $imagenRuta = 'img/' . basename($imagen['name']);
        if (!move_uploaded_file($imagen['tmp_name'], $imagenRuta)) {
            $errores[] = "Error al subir la imagen.";
        }
    }

    if (empty($errores)) {
        try {
            $sqlUpdate = $conexion->prepare("UPDATE productos SET nombre = :nombre, categoria = :categoria, imagen = :imagen WHERE id = :id");
            $sqlUpdate->bindParam(':nombre', $nombre);
            $sqlUpdate->bindParam(':categoria', $categoria);
            $sqlUpdate->bindParam(':imagen', $imagenRuta);
            $sqlUpdate->bindParam(':id', $idProducto, PDO::PARAM_INT);
            if ($sqlUpdate->execute()) {
                $mensajeExito = "Producto modificado correctamente.";
            } else {
                $errores[] = "Error al modificar el producto.";
            }
        } catch (Exception $e) {
            $errores[] = "Ocurrió un error: " . htmlspecialchars($e->getMessage());
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
        <?php 
            require_once('./layout/header-login.php'); 
        ?>
    <section class="mensaje-crud">
        <article class="sub-mens-crud">
            <h1>Modificacion de los Productos</h1>
            <p>Si ya no hay Stock del producto o se le necesita hacer alguna modificacion en este apartado se realiza</p>
            <p><strong>Se le recuerda a los administradores que si realizan una falla en el listado pueden ser demandados por la empresa 😊</strong></p>
        </article>
        <div class="img-container">
        <img src="img/Lista.png" alt="Imagen de edición" class="img-mensaje">
        </div>
    </section>
    <div class="contenedor-crud">
        <div class="form-crud">
            <h2>Modificar Producto</h2>
            <form method="POST" enctype="multipart/form-data">
                <!-- Mostrar mensajes de error -->
                <?php if (!empty($errores)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errores as $error): ?>
                    <p><?php echo htmlspecialchars($error); ?></p>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

                <!-- Mostrar mensaje de éxito -->
                <?php if (!empty($mensajeExito)): ?>
                <div class="alert alert-success">
                    <p><?php echo htmlspecialchars($mensajeExito); ?></p>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto->nombre); ?>" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select id="categoria" name="categoria" required>
                        <option value="" disabled>Seleccione una Categoria</option>
                        <option value="Café" <?php if ($producto->categoria === "Café") echo "selected"; ?>>Café</option>
                        <option value="Comida" <?php if ($producto->categoria === "Comida") echo "selected"; ?>>Comida</option>
                        <option value="Bebidas" <?php if ($producto->categoria === "Bebidas") echo "selected"; ?>>Bebidas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen del Producto</label>
                    <input type="file" id="imagen" name="imagen">
                    <p>Imagen actual: <img src="<?php echo htmlspecialchars($producto->imagen); ?>" alt="<?php echo htmlspecialchars($producto->nombre); ?>" style="width: 50px;"></p>
                </div>
                <button type="submit" name="btnmodificar_producto" value="ok">Modificar Producto</button>
            </form>
            <div class="boton-volver">
                <a href="Producto.php" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
    </main>
    <?php 
        require_once('./layout/footer-login.php'); 
    ?>
</body>
</html>
