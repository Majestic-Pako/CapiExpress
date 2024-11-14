<?php
// Verificar si el usuario ha enviado una selección
$productoSeleccionado = isset($_POST['producto']) ? $_POST['producto'] : 'todos';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <!-- Formulario de los productos -->
        <form method="post" action="">
            <label for="producto">Elige un producto:</label>
            <select name="producto" id="producto">
                <option value="todos" <?php if ($productoSeleccionado == 'todos') echo 'selected'; ?>>Todos</option>
                <option value="cafe" <?php if ($productoSeleccionado == 'cafe') echo 'selected'; ?>>Café</option>
                <option value="tostada" <?php if ($productoSeleccionado == 'comida') echo 'selected'; ?>>Comida</option>
                <option value="tostada" <?php if ($productoSeleccionado == 'bebidas') echo 'selected'; ?>>Bebidas</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>

        <!-- Muestra el contenido según la selección -->
        <section>
            <?php if ($productoSeleccionado == 'todos' || $productoSeleccionado == 'cafe') : ?>
                <h2>Cafe</h2>
                <article>
                    <img src="img/Leche-f.png" alt="Café con leche">
                    <h3>Café con leche</h3>
                </article> 
                <article>
                    <img src="#" alt="">
                    <h3>Espresso</h3>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Latte</h3>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Americano</h3>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Capuccino</h3>
                </article>
            <?php endif; ?>

            <?php if ($productoSeleccionado == 'todos' || $productoSeleccionado == 'tostada') : ?>
                <h2>Comidas</h2>
                <article>
                    <img src="img/Tostada-f.png" alt="Tostadas">
                    <h2>Tostadas</h2>
                </article> 
                <article>
                    <img src="#" alt="">
                    <h3>Medialunas</h3>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Crossaint</h3>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Bagel Sandwich</h3>
                </article>
            <?php endif; ?>

            <?php if ($productoSeleccionado == 'todos' || $productoSeleccionado == 'bebidas') : ?>
                <article>
                    <img src="#" alt="Bebidas">
                    <h2>Te</h2>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Frappuccino</h3>
                </article>
                <article>
                    <img src="#" alt="">
                    <h3>Te Helado</h3>
                </article>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>