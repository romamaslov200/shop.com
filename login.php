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


    if(isset($_POST['username']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_hash = hash('md5', $password);

        $result1 = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' and `password` = '$password_hash'");
        $user1 = $result1->fetch_assoc(); // Конвертируем в массив


        if(!empty($user1)){
            $fsmg = "Данный логин уже используется!";
        }
        else{
            $gsmg = "Вы успешно вошли!";
        }
    }
    else{
        echo"12312";
    }

    ?>
    <div class="wrapper">
        <div class="fullscreen">
            <div class="fullscreen_body_form">
                <div class="content__body">
                    <form method="POST">
                        <div class="form_reg">
                            <?php
                            
                            if(isset($fsmg)){
                                ?>
                                <div>
                                <label class="form_label reg_good" for="username"><?= $fsmg ?></label> 
                                </div>
                                <?php
                            }

                            if(isset($gsmg)){
                                ?>
                                <div>
                                <label class="form_label" style="color:green;" for="username"><?= $gsmg ?></label> 
                                </div>
                                <?php
                            }

                            ?>
                            <label class="form_label" for="email">Email</label>
                            <br>
                            <input class="input" name="username" type="text" require>
                            <br>

                            <label class="form_label" for="password">Пароль</label>
                            <br>
                            <input class="input" name="password" type="password" require><br>
                            
                            <input class="btn1" name="submit" type="submit" value="Зарегистрироваться" require>

                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>