<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php'); // Redirigir al inicio de sesión si no está autenticado
    exit();
}

$rolUsuario = $_SESSION['rol'] ?? ''; 
$idUsuario = $_SESSION['id'] ?? ''; 

if ($rolUsuario === 'empleado') {
    header("Location: Modificar.php?id=$idUsuario");
    exit();
}

// Verificar si el usuario quiere cerrar sesión
if (isset($_GET['logout'])) {
    session_destroy(); // Destruir la sesión
    header('Location: login.php'); // Redirigir al login
    exit();
}

// Verificar si el usuario tiene el rol de administrador
$esAdministrador = ($rolUsuario === 'administrador');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/1ef2779bde.js" crossorigin="anonymous"></script>
</head>
<body>
<main>
    <?php
        require_once('./layout/header-login.php');
    ?>
<div class="contenedor-crud">
    <?php if ($esAdministrador): ?>
    <form method="POST" class="form-crud">
        <h2>Registro de Usuario</h2>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="ej: soyunejemplo@gmail.com" required>
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
    <?php else: ?>
    <p>No tienes permisos para registrar usuarios.</p>
    <?php endif; ?>
    <div class="table-container">
        <h2>Tabla de Empleados</h2>
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
                    include 'consultas/conexion.php';
                    include 'controlador/eliminar.php';
                    $sql = $conexion->query("SELECT * FROM usuarios");
                    if (!$sql) {
                        echo "<tr><td colspan='6'>Error en la consulta</td></tr>";
                    } else {
                        while ($datos = $sql->fetch(PDO::FETCH_OBJ)) { ?>
                            <tr>
                                <td><?= $datos->id ?></td>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->email ?></td>
                                <td><?= $datos->password ?></td>
                                <td><?= $datos->rol ?></td>
                                <td>
                                    <?php if ($esAdministrador): ?>
                                    <a href="Modificar.php?id=<?= $datos->id ?>" class="btn btn-edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="Crud.php?id=<?= $datos->id ?>" class="btn btn-delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

</main>
</body>
</html>