<?php
    session_start();
    if(isset($_POST['Exit']))
    {
        $tipo_user = $_SESSION['tipe_u'];
        if($tipo_user === 'U')
        {
            session_destroy();
            header("Location: ./../../pages/Usuarios.php?");
        }
        else{
            session_destroy();
            header("Location: ./../../pages/Empresas.php?");
        }
    }
?>
