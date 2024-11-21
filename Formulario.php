<?php
require_once('./funciones/validacion.php');
$nombre = test_input($_POST['nombre'] ?? null);
$telefono = test_input($_POST['telefono'] ?? null);
$email = filter_var($_POST['email'] ?? null , FILTER_VALIDATE_EMAIL);

$errores = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($nombre)) {
        $errores [] = "El campo esta vacio o es incorrecto. Debe ingresar su nombre";
    }

    if (empty($telefono)) {
        $errores [] = "El campo esta vacio o es incorrecto. Debe ingresar su telefono";
    }

    if (empty($email)) {
        $errores [] = "El campo esta vacio o es incorrecto. Debe ingresar su correo";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Formulario</title>
</head>
<body>
<header>
    <nav>
            <div class = "navi">
                <img src="img/Capi.png" alt="Capibara">
            </div>
            <ul>
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="Menu.php">Menú</a></li>
                <li><a href="Historia.php">Sobre nosotros</a></li>
                <li><a href="Formulario.png">Unete</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <section class="form-container">
        <h1>Unete a Nuestra Familia</h1>
        <p><strong>Te pediremos que nos deje tu contacto y proximamente te contactaremos!!!</strong></p>
        <?php if(empty($errores) && !empty($email) && !empty($nombre) && !empty($telefono)): ?>
            <p class="text-success fs-5">Envio realizado. Pronto estaremos en contacto.</p>
        <?php endif ?>

        <?php foreach($errores as $error): ?>
        <p class="error-text"> <?php echo $error ?> </p>
        <?php endforeach ?>
        <form action="Formulario.php" method="post">
            <div class="form-group">
                <label for="nombre" class="form-label"> Nombre </label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su Nombre" value="<?php echo $nombre  ?>">
            </div>
            <div class="form-group">
                <label for="email" class="form-label"> Email </label>
                <input type="email" name="email" id="email" class="form-control" placeholder="ej:soyunejemplo@gmail.com" value="<?php echo $email ?>">
            </div>
            <div class="form-group">
                <label for="telefono" class="form-label"> Télefono </label>
                <input type="number" name="telefono" id="telefono" placeholder="ej:1122334455"  class="form-control" value="<?php echo $telefono ?>">
            </div>
            <button type="submit" class="btn-submit">Enviar</button> 
        </form>
    </section>
    </main>
    <footer class="footer">
        <ul class="social-icon">
            <li class="icon-elem">
                <a href="https://github.com/Majestic-Pako/CapiExpress.git" class="icon">
                <ion-icon name="logo-github"></ion-icon>
                </a>
            </li>
            <li class="icon-elem">
                <a href="https://www.instagram.com/escueladavinci/?hl=es" class="icon">
                <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
            <li class="icon-elem">
                <a href="https://youtu.be/BcGAPkjt_IE?si=ziQ-VTYzYdT3wx_R" class="icon">
                <ion-icon name="logo-youtube"></ion-icon>
                </a>
            </li>
        </ul>
        <ul class="fin">
            <li class="fin-elem">
                <a href="index.php" class="fin-icon">Inicio</a>
            </li>
            <li class="fin-elem">
                <a href="Menu.php" class="fin-icon">Menu</a>
            </li>
            <li class="fin-elem">
                <a href="Historia.php" class="fin-icon">Sobre nosotros</a>
            </li>
            <li class="fin-elem">
                <a href="Formulario.png" class="fin-icon">Unete</a>
            </li>
        </ul>
        <p class="text">&copy;CapiExpress | Todos los derechos reservados </p>
    </footer>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
</body>
</html>