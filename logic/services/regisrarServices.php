
<?php
    require_once "./../database/connection.php";
    session_start();
    
    if(isset($_POST['registrar'])){
        
        $user = $_POST['Email'];
        $Name = $_POST['Name'];
        $Apellido1 = $_POST['Papellido'];
        $Apellido2 = $_POST['Sapellido'];
        $Telefono = $_POST['Telef'];
        $DateNac = $_POST['DateNac'];
        $pass = $_POST['Pass1'];
        $Carrera = 1;
        $date = date('d-m-y h:i:s');
        
        $query = "INSERT INTO `Usuarios`(`Nombres`, `PApellido`, `SApellido`, `Email`, `password`, `Telef`, `Fecha_nac`, `Fecha_crea`, `id_carrera`, `sn_busca`) VALUES ('$Name','$Apellido1','$Apellido2','$user','$pass','$Telefono','$DateNac','$date','$Carrera','1')";  
        
        $result = mysqli_query($con, $query); 
        
        if($result === TRUE){
            $_SESSION['login_user'] = $user;
            header('Location: ./../../pages/Perfil.php');
        }else{
             header("Location: ./../../pages/Usuarios.php?R=F");;
        }

       
        }
    else
    {
        header("Location: ./../../index.php");
    }
?>