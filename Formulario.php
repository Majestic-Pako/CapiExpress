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
    <?php
        require_once('./layout/header.php');
    ?>
    <main>
    <section class="form-container">
        <h1>Unete a Nuestra Familia</h1>
        <p><strong>Te pediremos que nos deje tu contacto y proximamente te contactaremos!!!</strong></p>
        <?php if(empty($errores) && !empty($email) && !empty($nombre) && !empty($telefono)): ?>
            <p class="text-success fs-5">Datos Aceptados. Pronto estaremos en contacto. 💖</p>
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
    <?php
        require_once('./layout/footer.php');
    ?>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
</body>
</html>