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
        <div class="fullscreen">
            <div class="fullscreen_body">
                <div class="content__body">
                    <!-- Это форма авторизации: -->
	<form action='index.php' method='POST'>
		<input name='login'>
		<input name='password' type='password'>
		<input name='remember' type='checkbox' value='1'>
		<input type='submit' value='Отправить'>
	</form>
<!-- Конец формы авторизации. -->
                </div>
            </div>
        </div>
    </div>
</body>
</html>