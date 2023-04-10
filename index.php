<?php
require_once './logic/database/connection.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/691e44487d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
</head>

<body>
    <?php include('./header.php') ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/Banner/Banner_1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1 style="">Panda Work</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./img/Banner/Banner_2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Panda Work</h1>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="info">
        <div class="ejm-cand">
            <div class="space">
                <h1>Bienvenido a <br> <span class="panda">Panda Work</span></h1>
                <p>
                    Nuestra plataforma te ayudará a ponerte en contacto con los mejores profesionales del país.

                    Con esta plataforma podrás buscar personal de acuerdo a tus necesidades y también conocer
                    más acerca de ellos.
                    Si eres candidato podras encontrar las mejores ofertas y empresas del país.
                </p>
            </div>
            <div id="card">
                <div class="card-img">
                    <img src="./img/persona1.jpg" alt="img-persona">
                </div>
                <div class="card-name">
                    <h5 class="">MARCO BUITRAGO</h5>
                </div>
                <div class="card-text">
                    <p>Amante de la moda y la creación, con un largo camino en diferentes casas de diseño como casa azul, fashion me, entre otros.</p>
                </div>
                <div class="card-btns">
                    <button class="btn-moreInfo">Conocer más sobre Marco</button>
                    <button class="btn-job">Ver perfil aqui!</button>
                </div>
            </div>
            <div id="card">
                <div class="card-img">
                    <img src="./img/persona2.jpg" alt="img-persona">
                </div>
                <div class="card-name">
                    <h5 class="">ANA TORRES</h5>
                </div>
                <div class="card-text">
                    <p>Amante de la moda y la creación, con un largo camino en diferentes casas de diseño como casa azul, fashion me, entre otros.</p>
                </div>
                <div class="card-btns">
                    <button class="btn-moreInfo">Conocer más sobre Ana</button>
                    <button class="btn-job">Ver perfil aqui!</button>
                </div>
            </div>
        </div>

        <div class="metricas">
            <div class="card-metric">
                <img src="./img/Ipersonas.png">
                <h4>
                    <p><span>+ de 5.520</span><br>
                        personas contratadas
                    </p>
                </h4>
            </div>

            <div class="card-metric">
                <img src="./img/Iempleos.png">
                <h4>
                    <p><span>+ de 2.000</span><br>
                        empleos disponibles
                    </p>
                </h4>
            </div>

            <div class="card-metric">
                <img src="./img/Icompany.png">
                <h4>
                    <p><span>+ de 30</span><br>
                        empresas contratando
                    </p>
                </h4>
            </div>

        </div>

    </section>

    <?php include('footer.php') ?>

    <?php
    include('./../logic/services/modalError.php');
    $Failed = $_GET['A'];

    if ($Failed != NULL) {
        ModalError("Registro exitoso", "Muchas gracias por suscribirte a nuestro newsletter");
    }
    ?>
</body>
<script src="./js/controlModal.js"></script>

</html>