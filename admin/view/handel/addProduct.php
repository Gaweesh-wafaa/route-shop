<?php

require_once '../../../dbConnection.php';

if(isset($_POST['addProduct'])){

  trim(htmlspecialchars(extract($_POST)));

  $img = $_FILES['img']['name'];

  $image = "../../upload/";
  $file = $image . basename($img);

  $errors = [];
  if(empty($category)){
    $errors[] = 'category is required';
  }
  if(empty($title)){
    $errors[] = 'title is required';
  }
  if(empty($desc)){
    $errors[] = 'description is required';
  }
  if(empty($price)){
    $errors[] = 'price is required';
  }
  if(empty($quantity)){
    $errors[] = 'quantity is required';
  }
  if(empty($img)){
    $errors[] = 'image is required';
  }

  if(empty($errors)){

    if (move_uploaded_file($_FILES['img']['tmp_name'], $file)) {

      $query = "insert into products (`image`, `name`, `description`, `price`, `quantity`, `category_id`) values ('$img', '$title', '$desc', '$price', '$quantity', '$category')";
      $run = mysqli_query($conn,$query);
      if($run){
        header("location: ../addProduct.php");
      }else{
        header("location: ../404.php");
      }
    }else{
      header("location: ../addProduct.php");
    }
  }
}else{
  header("location: ../404.php");
}