<?php

require_once '../../../dbConnection.php';

if(isset($_POST['login'])){

  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1){
    $user = mysqli_fetch_assoc($result);
    if($user['password'] == $password){
      if($user['status'] == 'user'){
        header("location: ../../../shop.php");
      }elseif($user['status'] == 'admin'){
        header("location: ../layout.php");
      }
    }else{
      header("location: ../../..login.php");
    }
  }else{
    header("location: ../404.php");
  }
}else{
  header("location: ../404.php");
}