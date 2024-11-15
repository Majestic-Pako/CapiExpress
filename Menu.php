<?php
$productoSeleccionado = $_GET['producto'] ?? null;

require_once('consultas/conexion.php');
require_once('consultas/consultas_productos.php');

$productos = getProductos($conexion, $productoSeleccionado);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Catálogo</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Menú</a></li>
                <li><a href="#">Sobre nosotros</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Bienvenido a nuestro catálogo</h1>
        <p><strong>Aquí encontrarás nuestros productos para que puedas pedir en la caja</strong></p>
        <img src="img/cap.png" alt="">
        <form method="get" action="">
            <label for="producto">Elige un producto:</label>
            <select name="producto" id="producto">
                <option value="">Todos</option>
                <option value="Café" <?php if ($productoSeleccionado == 'Café') echo 'selected'; ?>>Café</option>
                <option value="Comida" <?php if ($productoSeleccionado == 'Comida') echo 'selected'; ?>>Comida</option>
                <option value="Bebidas" <?php if ($productoSeleccionado == 'Bebidas') echo 'selected'; ?>>Bebidas</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>
        <section class="fondoMenu">
            <?php foreach($productos as $producto): ?>
                <article>
                    <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                    <h3><?php echo $producto['nombre']; ?></h3>
                </article>
            <?php endforeach ?>
        </section>
    </main> 
    <footer>
        <p> CapiExpress </p>
    </footer>
</body>
</html>