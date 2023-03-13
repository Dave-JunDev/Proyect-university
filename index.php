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
      <img src="./img/Banner-home.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./img/Banner-2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
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

    <section class="candidatos">
       
         <h2>Nuestros candidatos</h2>

        
        <div class="cont-cards">
        
            <?php
                $query = "SELECT Nombres, PApellido FROM `Usuarios` WHERE 1 LIMIT 0,3";
                $result = mysqli_query($con, $query);
                
                while($data = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {
                    ?>
                    <div class="card">
                        <div class="card-header bg-transparent border-success">
                            <h5 class="card-title"><?php echo $data['Nombres']," ",$data['PApellido'] ?></h5>
                            </div>
                            <div class="card-body bg-transparent">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        <div class="card-footer bg-transparent">
                            <a href="#" class="btn btn-primary">Ver perfil aqui!</a>
                        </div>
                    </div>
                    <?php
                }
                
            ?>
               
        </div>
        
        

    </section>

        <?php include('footer.php') ?> 
        
        <?php
            include('./../logic/services/modalError.php');
            $Failed = $_GET['A'];
            
            if($Failed != NULL){
               ModalError("Registro exitoso", "Muchas gracias por suscribirte a nuestro newsletter");
            }
          ?>
    </body>
    <script src="./js/controlModal.js"></script>
</html>