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

// Logout (cerrar sesión)
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
    <title>Crud</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/1ef2779bde.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<main>
    <?php 
        require_once('./layout/header-login.php'); 
    ?>
    <div class="contenedor-crud">
        <h2>Registro de Usuario</h2>
        <?php 
            include 'controlador/registro.php';
        ?>
        <form method="POST" class="form-crud">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="rol" required>
                    <option value="" disabled selected>Seleccione un Rol</option>
                    <option value="administrador">Administrador</option>
                    <option value="empleado">Empleado</option>
                </select>
            </div>
            <button type="submit" name="btnregistrar" value="ok">Registrar</button>
        </form>
        <div class="table-container">
            <h2>Tabla de Empleados</h2>
            <?php 
                include 'controlador/eliminar.php';
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = $conexion->query("SELECT * FROM usuarios");
                    while ($datos = $sql->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr>
                                <td>{$datos->id}</td>
                                <td>{$datos->nombre}</td>
                                <td>{$datos->email}</td>
                                <td>{$datos->password}</td>
                                <td>{$datos->rol}</td>
                                <td>
                                    <a href='Modificar.php?id={$datos->id}' class='btn btn-small  btn-warning' title='Editar'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                    </a>
                                    <a href='Crud.php?id={$datos->id}&action=delete' class='btn btn-small btn-danger' title='Eliminar'>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


