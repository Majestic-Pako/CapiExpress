<?php
    session_start();

    // Variables en memoria simulando usuarios registrados
    $usuarios_registrados = [
        ['username' => 'admin', 'password' => 'admin123', 'role' => 'admin'],
        ['username' => 'empleado', 'password' => 'empleado123', 'role' => 'employee']
    ];
    
    // Variables para mensajes y errores
    $mensaje = '';
    $error = '';
    
    // Manejo de registro
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $role = $_POST['role'];
    
        // Validar entrada
        if (empty($username) || empty($password) || empty($role)) {
            $error = 'Todos los campos son obligatorios para el registro.';
        } else {
            $usuario_existente = array_filter($usuarios_registrados, fn($u) => $u['username'] === $username);
            if ($usuario_existente) {
                $error = 'El usuario ya existe.';
            } else {
                $usuarios_registrados[] = ['username' => $username, 'password' => $password, 'role' => $role];
                $mensaje = "Registro exitoso para $username. ¡Ahora puedes iniciar sesión!";
            }
        }
    }
    
    // Manejo de inicio de sesión
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if (empty($username) || empty($password)) {
            $error = 'Todos los campos son obligatorios para iniciar sesión.';
        } else {
            
            $usuario = array_filter($usuarios_registrados, fn($u) => $u['username'] === $username && $u['password'] === $password);
            if ($usuario) {
                $usuario = array_values($usuario)[0]; // Obtener el primer usuario encontrado
                $_SESSION['username'] = $usuario['username'];
                $_SESSION['role'] = $usuario['role'];
                $mensaje = "Inicio de sesión exitoso. Bienvenido, {$usuario['username']}!";
            } else {
                $error = 'Credenciales incorrectas.';
            }
        }
    }
    
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        session_destroy();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Login</title>
</head>
<body>
    <main class="fondoLogin">
        <div class="contenedor-login">
            <h1>Autentificacion de usuario</h1>
            <?php if ($mensaje): ?>
        <p style="color: green;"><?php echo $mensaje; ?></p>
    <?php endif; ?>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if (!isset($_SESSION['username'])): ?>
        <!-- Formulario de Registro -->
        <h2>Registro</h2>
        <form method="POST">
            <input type="hidden" name="action" value="register">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <select name="role" required>
                <option value="">Seleccionar rol</option>
                <option value="admin">Administrador</option>
                <option value="employee">Empleado</option>
            </select>
            <button type="submit">Registrar</button>
        </form>
        <h2>Inicio de Sesión</h2>
        <form method="POST">
            <input type="hidden" name="action" value="login">
            <input type="text" name="username" placeholder="Nombre de usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    <?php else: ?>
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
        <p>Rol: <?php echo htmlspecialchars($_SESSION['role']); ?></p>
        <a href="?action=logout">Cerrar sesión</a>
    <?php endif; ?>
        </div>
    </main>
</body>
</html>