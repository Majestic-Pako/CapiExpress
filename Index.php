<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Inicio</title>
</head>
<body>
    <?php
        require_once('./layout/header.php');
    ?>
    <main>
        <section class="banner">
            <div class="content-banner">
                <p>Cafe Delicioso</p>
                <h2>100% Natural <br>Cafe Fresco</h2>
                <a href="Menu.php">Mira Nuestro Menu!!!</a>
            </div>
        </section>
          <!-- Sección para las tarjetas -->
         <section class="cards-container">
        <!-- Card 1 -->
        <div class="card">
            <img src="img/cafe100.png" alt="Café 1" class="card-img">
            <h3 class="card-title">Café Clásico</h3>
            <p>Disfruta de nuestro café clásico, 100% arábica, con un sabor suave y equilibrado.</p>
        </div>
        <!-- Card 2 -->
        <div class="card">
            <img src="img/cafeleche.png" alt="Café 2" class="card-img">
            <h3 class="card-title">Café con Leche</h3>
            <p>Un delicioso café con leche que te hará sentirte en casa.</p>
        </div>
        <!-- Card 3 -->
        <div class="card">
            <img src="img/expresso.png" alt="Café 3" class="card-img">
            <h3 class="card-title">Café Expresso</h3>
            <p>La intensidad del café expreso con una capa de crema, ideal para los amantes del café fuerte.</p>
        </div>
    </section>
    </main>
    <?php
        require_once('./layout/footer.php');
    ?>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
