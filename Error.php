<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>ERROR</title>
</head>
<body>
<?php
require_once('./layout/header.php');
?>
    <main class="error-text">
        <h1>Ups!</h1>
        <h2>Tenemos problemas tecnicos<h2>
            <p>Vuelva a intentar mas tarde<p>
        <img src="img/error.png" alt="capibara llorando" height="400" width="400">
    </main>
    <?php
        require_once('./layout/footer.php');
    ?>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
</body>
</html>