
<?php
$server = "localhost";
$db = "u351594380_PandaWork";
$user = "u351594380_Amdin";
$pass = "R@2ed*l9Ñ";

$con = mysqli_connect($server, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

function excetQuery($con, $query)
{
    $result = mysqli_query($con, $query);

    if ($result === TRUE) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function searchQuery($con, $query)
{
    return mysqli_query($con, $query);
}
?>