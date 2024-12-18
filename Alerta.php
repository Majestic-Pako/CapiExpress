<?php

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
    <title>Alerta</title>
</head>
<body>
    <main>
        <?php 
            require_once('./layout/header-login.php'); 
        ?>
        <section class="alerta-login">
            <article>
                <h1 class="alerta-titulo"><i class="fas fa-exclamation-circle"></i> Acceso Restringido</h1>
                <p class="alerta-mensaje"><strong>Ups, parece que no tienes permiso para acceder a esta página.</strong></p>
                <p class="alerta-instruccion">Comunícate con el administrador para obtener acceso.</p>
            </article>
            <div class="alerta-con-img"> 
                <img src="img/Capi-Alerta.png" alt="Alerta" class="alerta-img">
            </div>
        </section>
    </main>
        <?php 
            require_once('./layout/footer-login.php'); 
        ?>
</body>
</html>
