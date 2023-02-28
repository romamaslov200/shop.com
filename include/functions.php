<?php
include "connect.php";

function menu()
{
    ?>
    <div class="menu">
        <li class="menu_li"><a class="menu_text" href="index">Главная</a></li>
        <li class="menu_li"><a class="menu_text" href="">Поиск</a></li>
        <div class="menu_rigt">
            <li class="menu_li"><a class="menu_text" href="">Вход</a></li>
            <li class="menu_li"><a class="menu_text" href="">Регистрация</a></li>
        </div>
    </div>
    <?php
}

?>