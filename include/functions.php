<?php
include "connect.php";

function menu()
{
    ?>
    <div class="menu">
        <li class="menu_li"><a class="menu_text" href="index">Главная</a></li>
        <li class="menu_li"><a class="menu_text" href="">Поиск</a></li>
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

?>