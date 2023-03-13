<?php
    session_start();
    require_once "./../logic/database/connection.php";
    $usuario = $_SESSION['login_user'];
    
    if($usuario == NULL){
        header("Location: ./Usuarios.php?");
    }
    
    $query = "SELECT * FROM `Usuarios` WHERE `Email` = '$usuario'";  
        
    $result = mysqli_query($con, $query); 
        
    $data = mysqli_fetch_assoc($result);
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Login Usuarios</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/691e44487d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./../css/perfil.css">   
        </head>
    <body>
        
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid" id="Nav">
            <a class="navbar-brand">
                <p> Bienvenido <?php echo  $usuario ?></p>
            </a>
            <form method="post" action="./../logic/services/logoutService.php" >
                <button class="btn btn-outline-success" type="submit" name="Exit">Exit</button>
            </form>
        </div>
    </nav>
        
        
    </body>
</html>