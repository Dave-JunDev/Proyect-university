
<?php
    require_once "./../database/connection.php";
    session_start();
    
    if(isset($_POST['login'])){
        
        $user = $_POST['Email'];
        $pass = $_POST['Pass'];
        
        $query = "SELECT Id FROM `Usuarios` WHERE `Email` = '$user' and `password` = '$pass'";  
        
        $result = mysqli_query($con, $query); 
        
        $count = mysqli_num_rows($result);

        echo $count;
    
        if($count == 0){
            header("Location: ./../../pages/Usuarios.php?A=F");
        }
        else
        {
            $_SESSION['login_user'] = $user;
            header("Location: ./../../pages/Perfil.php");
        }
         
    }
    else
    {
        header("Location: ./../../index.php");
    }
?>