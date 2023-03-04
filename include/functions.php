<?php
include "connect.php";

function menu()
{
    ?>
    <div class="menu">
        <li class="menu_li"><a class="menu_text" href="index">Главная</a></li>
        <li class="menu_li"><a class="menu_text" href="search">Поиск</a></li>
        <?php
        if ( $_SESSION['logged_user']['admin_status'] == "1" ) {
            ?>
            <li class="menu_li"><a class="menu_text" href="create">Создать продукт</a></li>
            <?php
        }
        ?>
        <div class="menu_rigt">
           
            <?php
            if ( !isset ($_SESSION['logged_user']) ) {
                ?>
                <li class="menu_li"><a class="menu_text" href="login">Вход</a></li>
                <li class="menu_li"><a class="menu_text" href="reg">Регистрация</a></li>
                <?php
            }

            ?>
            
            <?php
            if ( isset ($_SESSION['logged_user']) ) {
                ?>
                <li class="menu_li"><a class="menu_text" href="logout">Выход</a></li>
                <?php
            }

            ?>
        </div>
    </div>
    <?php
}

function footer(){
    ?>
    <footer class="footer">
            <div class="footer__body">
                <p>Роман Маслов</p>
                <p>romanmaslov200@internet.ru</p>
                <a class="link" href="https://portfolio-roman.ml" target="_blank">portfolio-roman.ml</a>
            </div>
        </footer>
    <?php
}

?>