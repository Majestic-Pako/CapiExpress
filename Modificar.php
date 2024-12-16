<?php
include 'consultas/conexion.php';

// Validar que el parámetro `id` exista y sea un número válido
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta preparada para obtener los datos del usuario
    $sql = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

    // Comprobar si se encontró el usuario
    if ($sql->rowCount() > 0) {
        $datos = $sql->fetch(PDO::FETCH_OBJ);
    } else {
        echo '<div class="alert alert-danger">Usuario no encontrado.</div>';
        exit;
    }
} else {
    echo '<div class="alert alert-danger">ID inválido.</div>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<main>
<div class="container-fluid row">
    <form class="col-4 p-3" method="POST">
        <h2 class="text-center text-secondary">Modificar Datos</h2>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= htmlspecialchars($datos->nombre) ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($datos->email) ?>">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= htmlspecialchars($datos->password) ?>">
        </div>
        <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select class="form-select" id="rol" name="rol">
                <option value="administrador" <?= $datos->rol === 'administrador' ? 'selected' : '' ?>>Administrador</option>
                <option value="empleado" <?= $datos->rol === 'empleado' ? 'selected' : '' ?>>Empleado</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Modificar</button>
    </form>
</div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>