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
    header("Location: Alerta.php?id=$idUsuario");
    exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Productos</title>
</head>
<body>
    <main>
        <?php 
            require_once('./layout/header-login.php'); 
        ?>
        <section class="mensaje-crud">
            <article class="sub-mens-crud">
                <h1>Bienvenido al Listado de Nuestros Productos!!!</h1>
                <p>Aca almacenamos la informacion de nuestros productos disponibles para el publico si es necesario una modificacion o eliminar uno aca podes hacerlo!</p>
                <p>Se le pide a los Administradores ser cuidados con el listado de productos para evitar complicaciones con el sistema</p>
            </article>
            <div class="img-container">
                <img src="img/Lista.png" alt="Imagen de edición" class="img-mensaje">
            </div>
        </section>
        <div class="contenedor-crud">
            <div class="form-crud">
                <h2>Registro de Producto</h2>
                <?php 
                    include 'controlador/registro_producto.php'; 
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto</label>
                        <input type="text" id="nombre" name="nombre" required>
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
                        <input type="file" id="imagen" name="imagen" required>
                    </div>
                        <button type="submit" name="btnregistrar_producto" value="ok">Registrar Producto</button>
                </form>
            </div>
            <div class="table-container">
                <h2>Lista de Productos</h2>
                <?php 
                    include 'controlador/eliminar_producto.php';
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = $conexion->query("SELECT * FROM productos");
                        while ($datos = $sql->fetch(PDO::FETCH_OBJ)) {
                            echo "<tr>
                                <td>{$datos->id}</td>
                                <td>{$datos->nombre}</td>
                                <td>{$datos->categoria}</td>
                                <td><img src='{$datos->imagen}' alt='{$datos->nombre}' style='width: 50px;'></td>
                                <td>
                                    <a href='Modificar_producto.php?id={$datos->id}' class='btn btn-small btn-warning' title='Editar'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                    </a>
                                    <a href='Producto.php?id={$datos->id}&action=delete' class='btn btn-small btn-danger' title='Eliminar'>
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
        <?php 
            require_once('./layout/footer-login.php'); 
        ?>
</body>
</html>