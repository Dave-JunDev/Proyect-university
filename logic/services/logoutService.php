<?php

    if(isset($_POST['Exit']))
    {
        if($_SESSION['Tipo_user'] === "U")
        {
            session_destroy();
            header("Location: ./../../pages/Usuarios.php?");
        }
        else{
              header("Location: ./../../pages/Empresas.php?");
        }
        
    }
    
?>