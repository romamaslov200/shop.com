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
                    <?php
                    if(isset($_POST['submit']))

                    {
                    
                        $err = array();
                    
                    
                        # проверям логин
                    
                        if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
                    
                        {
                    
                            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
                    
                        }
                    
                        
                    
                        if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
                    
                        {
                    
                            $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
                    
                        }
                    
                        
                    
                        # проверяем, не сущестует ли пользователя с таким именем
                    
                        $query = mysql_query($conn, "SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");
                    
                        if(mysql_result($query, 0) > 0)
                    
                        {
                    
                            $err[] = "Пользователь с таким логином уже существует в базе данных";
                    
                        }
                    
                        
                    
                        # Если нет ошибок, то добавляем в БД нового пользователя
                    
                        if(count($err) == 0)
                    
                        {
                    
                            
                            $login = $_POST['login'];
                    
                            
                    
                            # Убераем лишние пробелы и делаем двойное шифрование
                    
                            $password = md5(md5(trim($_POST['password'])));
                    
                            
                    
                            mysql_query("INSERT INTO users SET user_login='".$login."', user_password='".$password."'");
                    
                            header("Location: login.php"); exit();
                    
                        }
                    
                        else
                    
                        {
                    
                            print "<b>При регистрации произошли следующие ошибки:</b><br>";
                    
                            foreach($err AS $error)
                    
                            {
                    
                                print $error."<br>";
                    
                            }
                    
                        }
                    
                    }
                    
                    ?>
                    
                    
                    
                    
                    <form method="POST">
                    
                    Логин <input name="login" type="text"><br>
                    
                    Пароль <input name="password" type="password"><br>
                    
                    <input name="submit" type="submit" value="Зарегистрироваться">
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>