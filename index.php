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
    <div class="wrapper">
        <div class="list_product">
        <?php
            $sql = "SELECT * FROM `products` ORDER BY id DESC";
            $res = $conn -> query($sql);
            while ($resProducts = $res -> fetch_assoc()) {
            ?>

                <div class="product">
                    <img class="img_product" src="<?= $resProducts['img'] ?>" alt="">
                    <div href="wedas">
                        <a href="product?id=<?= $resProducts['id'] ?>" class="title_product"><?= $resProducts['title'] ?></a>
                        <br>
                        <a class="price"><?= number_format($resProducts['price_p'] , 0, ',', '.') ?>p</a>
                        <p class="text_product"><?= $resProducts['text'] ?></p>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>
    
    <div class="top">
        <div id="topNubex">
            <svg width="100" height="100" viewBox="0 0 200 200" fill="#1B1B1B" xmlns="http://www.w3.org/2000/svg">
                <g style="mix-blend-mode:luminosity">
                <circle cx="100" cy="100" r="96.5" stroke="white" stroke-width="7"/>
                </g>
                <path d="M101.061 63.9393C100.475 63.3536 99.5251 63.3536 98.9393 63.9393L89.3934 73.4853C88.8076 74.0711 88.8076 75.0208 89.3934 75.6066C89.9792 76.1924 90.9289 76.1924 91.5147 75.6066L100 67.1213L108.485 75.6066C109.071 76.1924 110.021 76.1924 110.607 75.6066C111.192 75.0208 111.192 74.0711 110.607 73.4853L101.061 63.9393ZM101.5 135V65H98.5V135H101.5Z" fill="white"/>
            </svg>              
        </div>
    </div>
    <?php
    footer();
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/js.js"></script>
</body>
</html>