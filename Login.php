<?php
require_once('./funciones/validacion.php');
$conexion = new mysqli("localhost", "root", "", "tp");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$login_email = test_input($_POST['login_email'] ?? null);
$login_password = test_input($_POST['login_password'] ?? null);

$registro_nombre = test_input($_POST['registro_nombre'] ?? null);
$registro_email = filter_var($_POST['registro_email'] ?? null, FILTER_VALIDATE_EMAIL);
$registro_password = test_input($_POST['registro_password'] ?? null);
$registro_aceptado = isset($_POST['registro_aceptado']);

$errores_login = [];
$errores_registro = [];
$formulario_activo = 'login'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_type = $_POST['form_type'] ?? null;
    if ($form_type === 'login') {
        if (empty($login_email)) {
            $errores_login[] = "Debe ingresar su correo electrónico.";
        } elseif (!filter_var($login_email, FILTER_VALIDATE_EMAIL)) {
            $errores_login[] = "El correo electrónico no es válido.";
        }
        if (empty($login_password)) {
            $errores_login[] = "Debe ingresar su contraseña.";
        }
        if (empty($errores_login)) {
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ? AND password = MD5(?)");
            $stmt->bind_param("ss", $login_email, $login_password);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows === 1) {
                session_start();
                $usuario = $resultado->fetch_assoc();
                $_SESSION['usuario'] = [
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'email' => $usuario['email'],
                    'rol' => $usuario['rol'],
                ];
                header("Location: Entrada.php"); // Aca va la pagina cuando inicia Sesion Exitosamente
                exit;
            } else {
                $errores_login[] = "Correo o contraseña incorrectos.";
            }
            $stmt->close();
        }
    }
    if ($form_type === 'registro') {
        if (empty($registro_nombre)) {
            $errores_registro[] = "Debe ingresar su nombre.";
        }
        if (empty($registro_email)) {
            $errores_registro[] = "Debe ingresar su correo electrónico.";
        } elseif (!$registro_email) {
            $errores_registro[] = "El correo electrónico no es válido.";
        }
        if (empty($registro_password)) {
            $errores_registro[] = "Debe ingresar una contraseña.";
        }
        if (!$registro_aceptado) {
            $errores_registro[] = "Debe aceptar los Términos y Condiciones.";
        }
        if (empty($errores_registro)) {
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol) VALUES (?, ?, MD5(?), 'empleado')");
            $stmt->bind_param("sss", $registro_nombre, $registro_email, $registro_password);
            
            if ($stmt->execute()) {
                echo "Registro exitoso. Ahora puede iniciar sesión.";
            } else {
                $errores_registro[] = "Error al registrar usuario. Es posible que el correo ya esté en uso.";
            }
            $stmt->close();
        }
    }
    if ($form_type === 'registro' && !empty($errores_registro)) {
        $formulario_activo = 'registro';
    } elseif ($form_type === 'login' && !empty($errores_login)) {
        $formulario_activo = 'login';
    }
}
$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.5.0/remixicon.min.css">
    <title>Login</title>
</head>
<body>
    <header>
        <nav>
        <div class = "navi">
                <a href="Index.php"><img src="img/Capi.png" alt=""></a>
            </div>
        </nav>
    </header>
    <main class="fondoLogin">
        <section class="contenedor">
            <div class="con-imagen">
                <img src="img/portada-login.png" alt="Capibara con Computadora">
            </div>
            <div class="contenedor-form-login <?php echo $formulario_activo === 'login' ? '' : 'inactive'; ?>">
                <h1 class="titulo">Iniciar sesion</h1>
                <p class="subtitulo">Bienvenido a nuestra comunidad</p>
                <?php if (!empty($errores_login)): ?>
                    <div class="mensaje-error-contenedor">
                    <?php foreach ($errores_login as $error): ?>
                        <p class="mensaje-error"><?php echo $error; ?></p>
                    <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST" class="form-ingreso">
                <input type="hidden" name="form_type" value="login">
                    <div class="input-box">
                    <i class="ri-mail-fill"></i>
                    <input type="email" name="login_email" placeholder="ejemplo@gmail.com">
                    </div>
                    <div class="input-box">
                    <i class="ri-lock-password-fill"></i>
                    <input type="password" name="login_password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btm">Acceder</button>
                    <div class="link-text">
                        <p>¿No tienes una cuenta?</p>
                        <a href="#" id="linkTextLogin">Registrate</a>
                    </div>
                </form>
            </div>
            <div class="contenerdor-form-registro <?php echo $formulario_activo === 'registro' ? '' : 'inactive'; ?>">
                <h1 class="titulo">Registrate</h1>
                <p class="subtitulo">Estas a punto de unirte a nuestra familia!!!</p>
                <?php if (!empty($errores_registro)): ?>
                    <div class="mensaje-error-contenedor">
                <?php foreach ($errores_registro as $error): ?>
                    <p class="mensaje-error"><?php echo htmlspecialchars($error); ?></p>
                <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="POST" class="form-ingreso">
                <input type="hidden" name="form_type" value="registro">
                    <div class="input-box">
                    <i class="ri-user-add-fill"></i>
                    <input type="text" name="registro_nombre" placeholder="Nombre">
                    </div>
                    <div class="input-box">
                    <i class="ri-mail-add-fill"></i>
                    <input type="email" name="registro_email" placeholder="ejemplo@gmail.com">
                    </div>
                    <div class="input-box">
                    <i class="ri-key-fill"></i>
                    <input type="password" name="registro_password" placeholder="Contraseña">
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="registro_aceptado" id="cbregistro">
                        <label for="cbregistro">Acepto los Terminos y Condiciones</label>
                    </div>
                    <button type="submit" class="btm">Crear la Cuenta</button>
                    <div class="link-text">
                        <p>¿Ya tienes una cuenta?</p>
                        <a href="#" id="linkTextRegistro">Iniciar sesion</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="js/index.js"></script>
</body>
</html>