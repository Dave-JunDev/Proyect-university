
<?php
    require_once "./../database/connection.php";
    session_start();
    
    if(isset($_POST['registrarU'])){
        
        $user = $_POST['Email'];
        $Name = $_POST['Name'];
        $Apellido1 = $_POST['Papellido'];
        $Apellido2 = $_POST['Sapellido'];
        $Telefono = $_POST['Telef'];
        $DateNac = $_POST['DateNac'];
        $pass = $_POST['Pass1'];
        $Carrera = $_POST['carrera'];
        $date = date('d-m-y h:i:s');

        
        $query = "INSERT INTO `Usuarios`(`Nombres`, `PApellido`, `SApellido`, `Email`, `password`, `Telef`, `Fecha_nac`, `Fecha_crea`, `id_carrera`, `sn_busca`) VALUES ('$Name','$Apellido1','$Apellido2','$user','$pass','$Telefono','$DateNac','$date','$Carrera','1')";  
        
        $result = mysqli_query($con, $query); 
        
        if($result === TRUE){
            $_SESSION['login_user'] = $user;
            $_SESSION['Tipo_user'] = "U";
            
            header('Location: ./../../pages/Perfil.php');
        }else{
             header("Location: ./../../pages/Usuarios.php?R=F");;
        }

       
    }
    else if(isset($_POST['registrarE']))
    {
        
        $user = $_POST['user'];
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Telefono = $_POST['Telef'];
        $pass = $_POST['Pass1'];
        $sector = $_POST['sector'];
        $date = date('d-m-y h:i:s');
        
        $query = "INSERT INTO `Empresa`(`Nombre`, `usuario`, `email_contact`, `Fecha_crea`, `Telef`, `sector`, `password`, `sn_habilitado`) VALUES ('$Name','$user','$Email','$date','$Telefono','$sector','$pass',1)";
        
        
        $result = mysqli_query($con, $query); 
        
        if($result === TRUE){
            $_SESSION['login_user'] = $user;
            $_SESSION['Tipo_user'] = "E";
            
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