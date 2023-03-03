<?php
include "include/functions.php";
require 'db.php';
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
            <div class="fullscreen_body">
                <div class="content__body">
                    <div class="product-viv">
                    <img class="img_product-viv" src="img/2a50293b87dbea0a14e59b2affc1263b-benzin-preview.png" alt="">
                        <div>
                            <p class="title_product">Рубашка муржская</p>
                            <p class="text_product-viv">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                            <button class="btn1" href="">Купить за 100$</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>