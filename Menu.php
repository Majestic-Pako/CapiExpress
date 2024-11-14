<?php
$productos = [
    'cafe' => [
        [
            'nombre' => 'Café con leche',
            'imagen' => 'img/Leche-f.png',
            'categoria' => 'Café'
        ],
        [
            'nombre' => 'Espresso',
            'imagen' => '#',
            'categoria' => 'Café'
        ],
        [
            'nombre' => 'Latte',
            'imagen' => '#',
            'categoria' => 'Café'
        ],
        [
            'nombre' => 'Americano',
            'imagen' => '#',
            'categoria' => 'Café'
        ],
        [
            'nombre' => 'Capuccino',
            'imagen' => '#',
            'categoria' => 'Café'
        ]
    ],
    'comida' => [
        [
            'nombre' => 'Tostadas',
            'imagen' => 'img/Tostada-f.png',
            'categoria' => 'Comida'
        ],
        [
            'nombre' => 'Medialunas',
            'imagen' => '#',
            'categoria' => 'Comida'
        ],
        [
            'nombre' => 'Crossaint',
            'imagen' => '#',
            'categoria' => 'Comida'
        ],
        [
            'nombre' => 'Bagel Sandwich',
            'imagen' => '#',
            'categoria' => 'Comida'
        ]
    ],
    'bebidas' => [
        [
            'nombre' => 'Te',
            'imagen' => '#',
            'categoria' => 'Bebidas'
        ],
        [
            'nombre' => 'Frappuccino',
            'imagen' => '#',
            'categoria' => 'Bebidas'
        ],
        [
            'nombre' => 'Te Helado',
            'imagen' => '#',
            'categoria' => 'Bebidas'
        ],
        [
            'nombre' => 'Frutilla Acai',
            'imagen' => '#',
            'categoria' => 'Bebidas'
        ],
        [
            'nombre' => 'Chocolate Caliente',
            'imagen' => '#',
            'categoria' => 'Bebidas'
        ],
        [
            'nombre' => 'Submarino',
            'imagen' => '#',
            'categoria' => 'Bebidas'
        ]
    ]
];
$productoSeleccionado = isset($_POST['producto']) ? $_POST['producto'] : 'todos';
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
        <form method="post" action="">
            <label for="producto">Elige un producto:</label>
            <select name="producto" id="producto">
                <option value="todos" <?php if ($productoSeleccionado == 'todos') echo 'selected'; ?>>Todos</option>
                <option value="cafe" <?php if ($productoSeleccionado == 'cafe') echo 'selected'; ?>>Café</option>
                <option value="comida" <?php if ($productoSeleccionado == 'comida') echo 'selected'; ?>>Comida</option>
                <option value="bebidas" <?php if ($productoSeleccionado == 'bebidas') echo 'selected'; ?>>Bebidas</option>
            </select>
            <button type="submit">Filtrar</button>
        </form>
        <section class="fondoMenu">
            <?php 
            if ($productoSeleccionado == 'todos' || $productoSeleccionado == 'cafe') : ?>
                <h2>Café</h2>
                <?php foreach ($productos['cafe'] as $producto) : ?>
                    <article>
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <h3><?php echo $producto['nombre']; ?></h3>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($productoSeleccionado == 'todos' || $productoSeleccionado == 'comida') : ?>
                <h2>Comidas</h2>
                <?php foreach ($productos['comida'] as $producto) : ?>
                    <article>
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <h3><?php echo $producto['nombre']; ?></h3>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if ($productoSeleccionado == 'todos' || $productoSeleccionado == 'bebidas') : ?>
                <h2>Bebidas</h2>
                <?php foreach ($productos['bebidas'] as $producto) : ?>
                    <article>
                        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
                        <h3><?php echo $producto['nombre']; ?></h3>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main> 
    <footer>
        <p> CapiExpress </p>
    </footer>
</body>
</html>