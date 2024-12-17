<?php 

session_start();

$usuarioSesion = $_SESSION['usuario'] ?? null; 
$nombreUsuario = $usuarioSesion['nombre'] ?? 'Usuario';

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
    <title>Bienvenido</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/1ef2779bde.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
    <?php 
        require_once('./layout/header-login.php'); 
    ?>
    <section class="entrada">
        <article>
            <h1>Bienvenido al Sistema, <?php echo htmlspecialchars($nombreUsuario); ?>!!!</h1>
            <p>Aca te dejamos una breve explicacion de los accesos rapidos de la barra de navegacion</p>
        </article>
        <div class="contenido-entrada">
            <img src="img/Bienvenidos.png" alt="" class="entrada-img">
        </div>
    </section>
    <section class="contenedor-cardu">
            <div class="cardu">
                <i class="fa-solid fa-house menu-icon" class="icono-cardu"></i>
                <h3>Inicio de Sesion</h3>
            </div>
            <div class="cardu">
                <i class="fa-solid fa-pen menu-icon" class="icono-cardu"></i>
                <h3>Modificar Datos</h3>
            </div>
            <div class="cardu">
                <i class="fa-solid fa-book menu-icon" class="icono-cardu"></i>
                <h3>Ver productos</h3>
            </div>
        </section>
    </main>
    <?php 
        require_once('./layout/footer-login.php'); 
    ?>
</body>
</html>