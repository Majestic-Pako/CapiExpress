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
<header>
        <nav>
            <div class = "navi">
                <img src="img/Capi.png" alt="">
            </div>
            <ul>
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="Menu.php">Menú</a></li>
                <li><a href="Historia.php">Sobre nosotros</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>CapiExpress</h1>
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/calidad.png" class="d-block w-100" alt="calidad">
                </div>
                <div class="carousel-item">
                    <img src="img/interior.png" class="d-block w-100" alt="interior">
                </div>
                <div class="carousel-item">
                    <img src="img/local.png" class="d-block w-100" alt="local">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
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
                <a href="#" class="fin-icon">Sobre nosotros</a>
            </li>
        </ul>
        <p class="text">&copy;CapiExpress | Todos los derechos reservados </p>
    </footer>
    <script  type = "module"  src = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js " > </script> 
    <script nomodule  src  = " https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js " > </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>