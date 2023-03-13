<?php

    if(isset($_POST['Exit']))
    {
        session_destroy();
        header("Location: ./../../pages/Usuarios.php?");
    }
    
?>