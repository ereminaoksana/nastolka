<?
session_start();
include "bdconect.php"?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Настольные игры</title>
    <link rel="stylesheet" href="stil.css">
    <script src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div id="main">
    <div id="menu">
        <a href="obmen.php" class="button1">Обмен играми</a>
        <a href="vstrecha.php" class="button1">Встречи</a>
        <a href="accsesyar.php" class="button1">Аксессуары</a>
        <?
        if(isset($_SESSION['name'])){
            echo "<a href=\"profil.php\"> <span class=\"user\">".$_SESSION['name']."</span></a>";
            echo " <a href=\"vihod.php\" class=\"button1\">Выход</a>";
        }
        else {
            echo " <a href=\"reg.php\" class=\"button1\">Регистрация</a>";
            echo " <a href=\"vhod.php\" class=\"button1\">Вход</a>";
        }
        ?>
    </div>
    <div id="categor">
        <h2>Категории</h2>
        <hr>
        <ul id="spisok_kategori">
            <li><a href="adventure.php">Приключения</a></li>
            <li><a href="karty.php">Карточные</a></li>
            <li><a href="compania.php">Компанейские</a></li>
            <li><a href="fantase.php">Фантастика</a></li>
            <li><a href="horror.php">Хоррор</a></li>

        </ul>
    </div>
    <div id="content">
        <?foreach ($adventure as $key){
            echo "<div class=\"product\">
            <div class=\"img\">";
            echo "<img class=\"avatar\" src=\"img/".$key['avatar']."\" alt=\"\">";
            echo " </div>";
            echo "<span class=\"name\">".$key['name']."</span>";
            echo "<span class=\"price\">".$key['price']."</span>";
            echo "<span class=\"vozrast\">".$key['vosrast']."</span>";
            echo "</div>";
        }?>





    </div>

</div>




</body>
</html>