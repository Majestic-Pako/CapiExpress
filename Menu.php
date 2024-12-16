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
<?php
require_once('./layout/header.php');
?>
    <main>
    <h1 class="extra1">Explora Nuestro Menú</h1>
    <p class="extra2">Descubre una variedad de opciones deliciosas diseñadas para satisfacer todos los gustos. Desde aromáticos cafés y refrescantes bebidas, 
                                hasta platillos irresistibles, tenemos algo especial para ti. ¡Explora y encuentra tu próximo favorito!</p>
        <section class="info-section">
            <h2>¿Por qué elegirnos?</h2>
            <ul class="info-list">
                <li>🌟 Productos de la más alta calidad.</li>
                <li>🚀 Servicio veloz en las entregas</li>
                <li>💰 Los mejores precios de la zona</li>
            </ul>
        </section>
        <figure id="portMenu">
        <img src="img/cap.png" alt="">
        </figure>
        <form method="get" action="" class="producto-form">
            <label for="producto" class="form-label">Elige un producto:</label>
            <div class="select-container">
                <select name="producto" id="producto" class="form-select">
                    <option value="">Todos</option>
                    <option value="Café" <?php if ($productoSeleccionado == 'Café') echo 'selected'; ?>>Café</option>
                    <option value="Comida" <?php if ($productoSeleccionado == 'Comida') echo 'selected'; ?>>Comida</option>
                    <option value="Bebidas" <?php if ($productoSeleccionado == 'Bebidas') echo 'selected'; ?>>Bebidas</option>
                </select>
                <button type="submit" class="form-button">Filtrar</button>
            </div>
        </form>
        <section class="fondoMenu">
        <?php foreach ($productos as $producto): ?>
                <?php 
                $rutaImagen = $producto['imagen'] === '#' ? 'img/placeholder.png' : $producto['imagen']; 
                ?>
                <article class="card">
                    <img src="<?php echo $rutaImagen; ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" class="card-img">
                    <h3 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                </article>
            <?php endforeach; ?>
        </section>
    </main> 
    <?php
        require_once('./layout/footer.php');
    ?>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
</body>
</html>