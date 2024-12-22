<?php

require_once "../../../dbConnection.php";

if(isset($_POST['addCategory'])){

  $name = $_POST['title'];

  $errors = [];
  if(empty($name)){
    $errors[] = 'title is required';
  }

  if(empty($errors)){
    $query = "insert into categories (`name`) values ('$name')";
    $category = mysqli_query($conn, $query);
    if($category){
      $_SESSION['succes'] = 'category added successfully';
      header('location: ../addCategory.php');
    }else{
      $_SESSION['errors'] = ['try with correct data'];
      header('location: ../addCategory.php');
    }
  }else{
    $_SESSION['errors'] = $errors;
    header('location: ../addCategory.php');
  }


}else{
  header("location: ../404.php");
}