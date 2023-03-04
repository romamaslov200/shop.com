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

    <?

    $data = $_POST;
    if ( isset($data['submit']) )
    {
        $user = R::findOne('users', 'email = ?', array($data['email']));
        if ( $user )
        {
            //логин существует
            if ( password_verify($data['password'], $user->password) )
            {
                //если пароль совпадает, то нужно авторизовать пользователя
                $_SESSION['logged_user'] = $user;
                $msg_good[] = 'Вы успешно зашли';
            }else
            {
                $errors[] = 'Неверно введен пароль!';
            }

        }else
        {
            $errors[] = 'Пользователь с таким логином не найден!';
        }

    }

    ?>
    <div class="wrapper">
        <div class="fullscreen">
            <div class="fullscreen_body_form">
                <div class="content__body">
                    <form method="POST">
                        <div class="form_reg">
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
                            <label class="form_label" for="email">Email</label>
                            <br>
                            <input class="input" name="email" type="text" require>
                            <br>

                            <label class="form_label" for="password">Пароль</label>
                            <br>
                            <input class="input" name="password" type="password" require><br>
                            
                            <input class="btn1" name="submit" type="submit" value="Войти" require>

                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>