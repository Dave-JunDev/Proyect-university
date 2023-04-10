
<?php
require_once "./../database/connection.php";
session_start();

if (isset($_POST['loginU'])) {

    $user = $_POST['Email'];
    $pass = $_POST['Pass'];

    $query = "SELECT Id FROM `Usuarios` WHERE `Email` = '$user' and `password` = '$pass'";

    $result = mysqli_query($con, $query);

    $count = mysqli_num_rows($result);


    if ($count == 0) {
        header("Location: ./../../pages/Usuarios.php?A=F");
    } else {
        $_SESSION['login_user'] = $user;
        $_SESSION['tipe_u'] = 'U';
        header("Location: ./../../pages/Perfil.php");
    }
} else if (isset($_POST['loginE'])) {
    $user = $_POST['User'];
    $pass = $_POST['Pass'];

    $query = "SELECT Id FROM `Empresa` WHERE `usuario` = '$user' and `password` = '$pass'";

    $result = mysqli_query($con, $query);

    $count = mysqli_num_rows($result);


    if ($count == 0) {
        header("Location: ./../../pages/Empresas.php?A=F");
    } else {
        $_SESSION['login_user'] = $user;
        $_SESSION['tipe_u'] = 'E';
        header("Location: ./../../pages/Perfil.php");
    }
} else {
    header("Location: ./../../index.php");
}
?>