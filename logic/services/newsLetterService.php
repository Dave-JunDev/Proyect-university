<?php
    
    require_once "./../database/connection.php";
    
    if(isset($_POST['newsInd'])){
       $email = $_POST['email'];
       $query = "INSERT INTO `newlatter`(`email`) VALUES ('$email')";
       
       $result = mysqli_query($con, $query);
       
       if($result === TRUE){
          header("Location: ./../../../index.php?A=T");
       }
   }
   else if (isset($_POST['newsLatter']))
   {
        $email = $_POST['email'];
        $query = "INSERT INTO `newlatter`(`email`) VALUES ('$email')";
       
        $result = mysqli_query($con, $query);
       
        if($result === true){
           
        }

   }
?>