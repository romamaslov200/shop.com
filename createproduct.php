<?php

$id;
$img = $_FILES['img'];
$name = $_POST['name'];
$text = $_POST['text'];
$price_p = $_POST['price_p'];
$authorid = $_SESSION['logged_user']->id;

//mysqli_query($mysqli,"INSERT INTO `products` (`id`, `img_url`, `title`, `text`, `price_p`, `author`) VALUES (NULL, '$url', '$name', '$text', $price_p, '$author')");

//if (mysqli_query($mysqli,"INSERT INTO `products` (`id`, `img`, `title`, `text`, `price_p`, `authorid`) VALUES (NULL, '$img', '$name', '$text', '$price_p', '$authorid')")) {
//  echo"<h1>Готово</h1>";
//}

//else{
//  echo"<h1>Error</h1>";
//}

                $data = $_POST;


function loadAvatar($img, $name, $text, $price_p, $authorid){


  $type = $img['type'];
  $namefile = md5(microtime()).".".substr($type, strlen("image/"));
  $dir = "uploads/product/";
  $uploadsfille = $dir.$namefile;
  if(move_uploaded_file($img['tmp_name'], $uploadsfille)){
    include "include/connect.php";
    if (mysqli_query($conn,"INSERT INTO `products` (`id`, `img`, `title`, `text`, `price_p`) VALUES (NULL, '$uploadsfille', '$name', '$text', '$price_p')")) {
      echo '<script>location.replace("http://' . $_SERVER['SERVER_NAME'] . '/index.php");</script>';
    }

    else{
        echo '<script>location.replace("http://' . $_SERVER['SERVER_NAME'] . '/index.php");</script>';
    }
  }
  else{
    echo"Error";
    return false;
  }
  return true;
}

if (isset($data['update'])) {
    $img = $_FILES['img'];
    loadAvatar($img, $name, $text, $price_p, $authorid);
}

?>