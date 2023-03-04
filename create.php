<?php
include "include/functions.php";

if ( !isset ($_SESSION['logged_user']) || $_SESSION['logged_user']['admin_status'] == "0" ) {
    echo '<script>location.replace("http://' . $_SERVER['SERVER_NAME'] . '/index.php");</script>';
}
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

    <div class="wrapper">
        <div class="fullscreen">
            <div class="fullscreen_body_form">
                <div class="content__body">
                    <form action = "createproduct.php" class="form_reg" enctype="multipart/form-data" method="POST">
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
                            <input class="input" name="text" type="password" require><br>

                            <label class="form_label" for="password">Цена продукта</label>
                            <br>
                            <input class="input" name="price_p" type="password" require><br>
                            
                            <input class="btn1" name="update" type="submit" value="Опубликовать" require>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    footer();
    ?>
</body>
</html>