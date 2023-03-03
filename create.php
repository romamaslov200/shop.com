<?php
include "include/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?<?= time()?>">
    <title>Document</title>
</head>
<body>
    <?php
    menu();
    ?>

<?php

$id;
$img = $_POST['img'];
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

                $user = R::findOne('users', 'id = ?', array($_SESSION['logged_user']->id));

function loadAvatar($img, $name, $text, $price_p, $authorid){


  $type = $img['type'];
  $namefile = md5(microtime()).".".substr($type, strlen("image/"));
  $dir = "uploads/product/";
  $uploadsfille = $dir.$namefile;
  if(move_uploaded_file($img['tmp_name'], $uploadsfille)){
    include "include/connect.php";
    if (mysqli_query($mysqli,"INSERT INTO `products` (`id`, `img`, `title`, `text`, `price_p`, `authorid`, `comments_id`) VALUES (NULL, '$uploadsfille', '$name', '$text', '$price_p', '$authorid', '$authorid')")) {
      echo"YES";
      echo '<script>location.replace("http://' . $_SERVER['SERVER_NAME'] . '/index.php");</script>';
    }

    else{
      echo $price_p;
    }
  }
  else{
    echo"Error";
    return false;
  }
  return true;
}

if (isset($data['update'])) {
  $img = $_P['img'];
    loadAvatar($img, $name, $text, $price_p, $authorid);
}

?>

    <div class="wrapper">
        <div class="fullscreen">
            <div class="fullscreen_body_form">
                <div class="content__body">
                    <form method="POST">
                        <div class="form_reg" enctype="multipart/form-data">
                            <?php
                            if(isset($msg_good)){
                                ?>
                                <div>
                                <label class="form_label reg_good" for="reg_good"><?= array_shift($msg_good) ?></label> 
                                </div>
                                <?php
                            }
                            if ( ! empty($errors) )
                            {
                                //выводим ошибки авторизации
                                echo '<label class="form_label reg_notgood">' .array_shift($errors). '</label><br>';
                            }
                            ?>
                            <div class="input__wrapper">
                            <input name="img" type="file" id="input__file" class="input input__file" multiple>
                            <label for="input__file" class="input__file-button">
                                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="svg/1904676-arrow-backup-cloud-hosting-storage-up-upload_122526.svg" alt="Выбрать файл" width="25"></span>
                                <span class="input__file-button-text">Выберите файл</span>
                            </label>
                            </div>

                            <label class="form_label" for="email">Название продукта</label>
                            <br>
                            <input class="input" name="name" type="text" require>
                            <br>

                            <label class="form_label" for="password">Описание продукта</label>
                            <br>
                            <input class="input" name="password" type="password" require><br>
                            
                            <input class="btn1" name="update" type="submit" value="Опубликовать" require>

                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>