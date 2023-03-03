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
	$data = $_POST;

	function captcha_show(){
		$questions = array(
			1 => 'Столица России',
			2 => 'Столица США',
			3 => '2 + 3',
			4 => '15 + 14',
			5 => '45 - 10',
			6 => '33 - 3'
		);
		$num = mt_rand( 1, count($questions) );
		$_SESSION['captcha'] = $num;
		echo $questions[$num];
	}

	//если кликнули на button
	if ( isset($data['submit']) )
	{
    // проверка формы на пустоту полей
		$errors = array();
		if ( trim($data['username']) == '' )
		{
			$errors[] = 'Введите Имя и Фамилию';
		}

		if ( trim($data['email']) == '' )
		{
			$errors[] = 'Введите Email';
		}

		if ( $data['password'] == '' )
		{
			$errors[] = 'Введите пароль';
		}

		//проверка на существование одинакового логина
		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким логином уже существует!';
		}

    //проверка на существование одинакового email
		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'Пользователь с таким Email уже существует!';
		}


		if ( empty($errors) )
		{
			//ошибок нет, теперь регистрируем
			$user = R::dispense('users');
			$user->username = $data['username'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT); //пароль нельзя хранить в открытом виде, мы его шифруем при помощи функции password_hash для php > 5.6
			$user->password_old = $data['password'];
			$user->avatar = "novavatar.jpg";
			R::store($user);
            $msg_good[] = 'Вы успешно зарегистрированы!';
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
                            <label class="form_label" for="username">Имя Фамилия</label>
                            <br>
                            <input class="input" name="username" type="text" require>
                            <br>

                            <label class="form_label" for="password">Пароль</label>
                            <br>
                            <input class="input" name="password" type="password" require><br>

                            <label class="form_label" for="email">Email</label>
                            <br>
                            <input class="input" name="email" type="email" require><br>
                            
                            <input class="btn1" name="submit" type="submit" value="Зарегистрироваться" require>

                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>