<?php
    require_once "./../database/connection.php";
    session_start();

    $usuario = $_SESSION['login_user'];
    $tipo_user = $_SESSION['tipe_u'];

    if($usuario == NULL){
        header("Location: ./Usuarios.php?");
    }

    if(isset($_POST['GuardarInfUser']))
    {
        $name = $_POST['nombre'];
        $edad = $_POST['edad'];
        $residencia = $_POST['residencia'];
        $telef = $_POST['telef'];
        $email = $_POST['email'];
        $tipo_job = $_POST['tipo_job'];
        $tipo_jornada = $_POST['tipo_jornada'];
        $tipo_traslado = $_POST['tipo_traslado'];
        $descp_personal = $_POST['descp_personal'];
        $carrera = $_POST['carrera'];
        $descp_formacion = $_POST['descp_formacion'];
        $decp_exp = $_POST['decp_exp'];

        $error = "";

        $sections = explode(" ", $name);


        $query = "UPDATE `Usuarios` SET `Email`='$email',`Telef`='$telef',`id_carrera`='$carrera' WHERE `email` = '$usuario'";

        $result = excetQuery($con, $query);
         
        if($result === FALSE){
            $error = $error + " No se puedo actualizar la informacion personal";
        }

        $searchId = "SELECT Id FROM `Usuarios` WHERE Email = '$usuario'";
        $resultSearch = searchQuery($con, $searchId);
        $info = mysqli_fetch_assoc($resultSearch);
        $id_usuario = $info['Id'];


        $query = "SELECT additional_info_user.ID, Usuarios.Id FROM `additional_info_user` INNER JOIN `Usuarios` On additional_info_user.id_usuario = Usuarios.ID WHERE Usuarios.Email  =  '$usuario'";

        $fila = searchQuery($con, $query);
        $info = mysqli_fetch_assoc($fila);

        if($info['ID'] != NULL)
        {
            $id = $info['ID'];
            $update = "UPDATE `additional_info_user` SET `tipo_trabajo`='$tipo_job',`tipo_jornada`='$tipo_jornada',`traslado`='$tipo_traslado',`lugar_residencia`='$residencia',`descp`='$descp_personal' WHERE `ID` = '$id'";
            $updateExp = "UPDATE `exp_usuario` SET `descp`='$decp_exp',`descp_academica`='$descp_formacion' WHERE `id_usuario` = '$id_usuario'";
            $result = excetQuery($con, $update);
            $resultExp = excetQuery($con, $updateExp);

            if(!$result){
                $error = $error + " No se pudo guardar la informacion de trabajo";
            }

            if(!$resultExp){
                $error = $error + " No se pudo guardar la informacion de experiencia y formacion";
            }

        }
        else
        {
            $insert = "INSERT INTO `additional_info_user`(`tipo_trabajo`, `tipo_jornada`, `traslado`, `lugar_residencia`, `descp`, `id_usuario`) VALUES ('$tipo_job','$tipo_jornada','$tipo_traslado','$residencia','$descp_personal','$id_usuario')";
            $isnertExp = "INSERT INTO `exp_usuario`(`descp`, `descp_academica`,`id_usuario`) VALUES ('$decp_exp', '$descp_formacion' ,'$id_usuario')";
            $result = excetQuery($con, $insert);
            $resultExp = excetQuery($con, $isnertExp);

            if(!$result){
                $error = $error + " No se pudo guardar la informacion de trabajo";
            }

            if(!$resultExp){
                $error = $error + " No se pudo guardar la informacion de experiencia y formacion";
            }
        }
        
        
        if($error === "" ){
            header('Location: ./../../pages/Perfil.php?E=T');
        }
        else
        {
            header('Location: ./../../pages/Perfil.php?E='.$error.'');
        }
        
    }
    else if(isset($_POST['Eliminar_u']))
    {
        $searchId = "SELECT `Id` FROM `Usuarios` WHERE Email = '$usuario'";
        $resultSearch = searchQuery($con, $searchId);
        $id_usuario = $resultSearch['Id'];

        $deleteU = "DELETE FROM `Usuarios` WHERE Id = $id_usuario";
        $deleteExp = "DELETE FROM `exp_usuario` WHERE id_usuario = $id_usuario";
        $deleteInfo = "DELETE FROM `additional_info_user` WHERE id_usuario = $id_usuario";

        $result = excetQuery($con, $deleteU);
        $resultExp = excetQuery($con, $deleteExp);
        $resultInf = excetQuery($con, $deleteInfo);
        
        header('Location: ./../../pages/Perfil.php?D=T');
    }




?>

