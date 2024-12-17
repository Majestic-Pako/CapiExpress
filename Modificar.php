<?php
include 'consultas/conexion.php';
session_start();

if (!isset($_SESSION['usuario'])) {
    include('Error.php');
    exit;
}

$rolUsuario = $_SESSION['usuario']['rol'] ?? 'empleado'; 

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    $sql = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->execute();

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

$mensaje = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $rol = $rolUsuario === 'administrador' ? ($_POST['rol'] ?? $datos->rol) : $datos->rol; 

    $errores = [];
    if (empty($nombre)) $errores[] = "El nombre no puede estar vacío.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "El email no es válido.";
    if (empty($errores)) {
        try {
            if (!empty($password)) {
                $sqlUpdate = $conexion->prepare("UPDATE usuarios SET nombre = :nombre, email = :email, password = MD5(:password), rol = :rol WHERE id = :id");
                $sqlUpdate->bindParam(':password', $password);
            } else {
                $sqlUpdate = $conexion->prepare("UPDATE usuarios SET nombre = :nombre, email = :email, rol = :rol WHERE id = :id");
            }
            $sqlUpdate->bindParam(':nombre', $nombre);
            $sqlUpdate->bindParam(':email', $email);
            $sqlUpdate->bindParam(':rol', $rol);
            $sqlUpdate->bindParam(':id', $id, PDO::PARAM_INT);

            if ($sqlUpdate->execute()) {
                $mensaje = '<div class="alert alert-success">Usuario actualizado correctamente.</div>';
                
                $sql->execute();
                $datos = $sql->fetch(PDO::FETCH_OBJ);
            } else {
                $mensaje = '<div class="alert alert-danger">Error al actualizar el usuario.</div>';
            }
        } catch (Exception $e) {
            $mensaje = '<div class="alert alert-danger">Ocurrió un error: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
    } else {
        foreach ($errores as $error) {
            $mensaje .= '<div class="alert alert-danger">' . htmlspecialchars($error) . '</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/1ef2779bde.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main>
    <?php require_once('./layout/header-login.php'); ?>
        <div class="form-crud">
            <h2>Editar Usuario</h2>
            <?php if ($mensaje): ?>
                <div class="mb-3">
                    <?php echo $mensaje; ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($datos->nombre); ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($datos->email); ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" placeholder="Dejar en blanco para mantener la misma contraseña">
                </div>
                <?php if ($rolUsuario === 'administrador'): ?>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select id="rol" name="rol" required>
                            <option value="administrador" <?php echo $datos->rol === 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                            <option value="empleado" <?php echo $datos->rol === 'empleado' ? 'selected' : ''; ?>>Empleado</option>
                        </select>
                    </div>
                <?php endif; ?>
                <button type="submit" name="btnregistrar" value="ok">Guardar cambios</button>
                <a href="Entrada.php" class="btn btn-secondary mt-3">Cancelar</a>
            </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

