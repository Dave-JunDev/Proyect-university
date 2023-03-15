<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login Empresas</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/691e44487d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./../css/Login.css">
        <link rel="stylesheet" href="./../css/header.css">
        <link rel="stylesheet" href="./../css/footer.css">
    </head>
    <body>
           <?php include('./header.php') ?>
        <section class="content">
            <div class="cont-img">
                <div class="circle">
                     <img alt="prueba" class="img" src="./../img/Logo/logo_b.png">
                </div>
               
               <div class="text-img">
                    <p>Nuestra plataforma de empleo, te ayudará a acceder a ofertas que se ajusten a tu perfil y así mismo las empresas podrán conocer más de ti y contactarte.</p>
               </div>
               
               <div class="button-false">
                    <button class="btn-false">!BIENVENIDO!</button>
               </div>
               
            </div>
            <div class="conten-login">
                <h3>Ingreso Empresas</h3>
                <form class="login">
                    <input class="form-control mb-3" type="email" placeholder="Email" name="Email">
                    <input class="form-control mb-3" type="password" placeholder="*****" name="Pass">
                    <button class="form-control mt-6 mb-6" type="submit" name="login" id="Ingresar">Ingresar</button>
                    <button type="button" class="btn btn-primary mt-6" data-bs-toggle="modal" data-bs-target="#register" id="Registrar">Registrar</button>
                </form>
            </div>
        </section>

<!-- Modal -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario de registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form  method="post" class="register-Form" action="./../logic/services/regisrarServices.php">
            <input class="form-control mb-3" type="text" placeholder="Nombres" name="Name" required>
            <input class="form-control mb-3" type="text" placeholder="Primer Apellido" name="Papellido" required>
            <input class="form-control mb-3" type="text" placeholder="Segundo Apellido" name="Sapellido">
            
            <input class="form-control mb-3" type="email" placeholder="Email" name="Email" required>
            <input class="form-control mb-3" type="telef" placeholder="telefono" name="Telef" required>
            
            <label>Contraseña: </label>
            <input class="form-control mb-3" type="password" placeholder="*****" name="Pass1" required>
            <label>Confirmar contraseña: </label>
            <input class="form-control mb-3" type="password" placeholder="*****" name="Pass2" required>
            
            <label>Fecha de nacimiento: </label>
            <input class="form-control mb-3" type="date" name="DateNac" required>
            <label>Carrera: </label>
            <input class="form-control mb-3" type="text" placeholder="Carrera" name="Carrera" required>
            
            <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <?php include('./footer.php') ?>

    <?php
        include('./../logic/services/modalError.php');
        $Failed = $_GET['A'];
          
        if($Failed != null){ 
          ModalError('Error en el Login','Usuario o contraseña incorrecta');
        }
        
        $Failed = $_GET['R'];
         
        if($Failed != null){ 
          ModalError('Error al registrar','Por favor valide la informacion ingresada e intente nuevamente');
        }
    ?>
    
    <script src="./../js/controlModal.js"></script>
    </body>
</html>