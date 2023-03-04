<?php
include "include/functions.php";
require 'db.php';


$id = $_GET['id'];
$products = R::findOne('products', 'id = ?', [$id]);

$data = $_POST;
if ( isset($data['dell']) )
{
    mysqli_query($conn,"DELETE FROM `products` WHERE `products`.`id` = $id");
    header('Location: index');
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
            <div class="fullscreen_body">
                <div class="content__body">
                    <div class="product-viv">
                        <img class="img_product-viv" src="<?= $products['img'] ?>" alt="">
                        <div>
                            <p class="title_product"><?= $products['title'] ?></p>
                            <p class="text_product-viv"><?= $products['text'] ?></p>
                            <button class="btn1" href="">Купить за <?= number_format($products['price_p'] , 0, ',', '.') ?>p</button>
                            <?php
                            if ( $_SESSION['logged_user']['admin_status'] == "1" ) {
                            ?>
                            <br>
                            <br>
                            <form action="" method="post">
                                <button style="background: rgba(79, 219, 98, 0); border: 0;" name="dell">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#D14D4D" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    footer();
    ?>
</body>
</html>