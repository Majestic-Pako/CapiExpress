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
        <div class="subtitulo-index">
            <h2>Algunos de Nuestros beneficios</h2>
        </div>
        <section class="contenedor-cardu">
            <div class="cardu">
                <ion-icon name="star-half-outline" class="icono-cardu"></ion-icon>
                <h3>Servicio Excelente</h3>
            </div>
            <div class="cardu">
                <ion-icon name="wifi-outline" class="icono-cardu"></ion-icon>
                <h3>Wifi Gratis</h3>
            </div>
            <div class="cardu">
                <ion-icon name="paw-outline" class="icono-cardu"></ion-icon>
                <h3>Permitimos Mascotas</h3>
            </div>
        </section>
        <section class="galeria">
				<img
					src="img/Galeria-1.png"
					class="galeria-img-1" 
				/><img
					src="img/Galeria-2.png"
					class="galeria-img-2"
				/><img
					src="img/Horarios.png" 
					class="galeria-img-3"
				/><img
					src="img/Galeria-3.png"
					class="galeria-img-4"
				/><img
					src="img/Galeria-4.png"
					class="galeria-img-5"
				/>
		</section>
    </main>
    <?php
        require_once('./layout/footer.php');
    ?>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
</body>
</html>
