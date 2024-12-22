<?php

require_once '../../../dbConnection.php';

if(isset($_POST['signup'])){

  trim(htmlspecialchars(extract($_POST)));
  // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $errors = [];
  if(empty($UserName)){
    $errors[] = 'User Name is required';
  }
  if(empty($email)){
    $errors[] = 'email is required';
  }
  if(empty($password)){
    $errors[] = 'password is required';
  }

  
  if(empty($errors)){
    $query = "insert into users(`username`, `email`, `password`, `phone`, `address`) values('$UserName', '$email', '$password', '$phone', '$address')";

    $result = mysqli_query($conn, $query);
    if($result){
      header("location: ../../../shop.php");
    }else{
      header("location: ../../../signUp.php");
    }
  }else{
    header("location: ../../../signUp.php");
  }
}else{
  header("location: ../404.php");
}