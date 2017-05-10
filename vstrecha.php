<?
session_start();
include "bdconect.php"?>
<?if(!$_SESSION['name']){
    header('Location: vhod.php');
}
?>
<?
$nazvanie=$_POST['nazvanie'];
$datavstrechi=$_POST['datavstrechi'];
$vremya=$_POST['vremya'];
$adres=$_POST['adres'];
$kolvoychastnikov=$_POST['kolvoychastnikov'];
$text_coment=$_POST['text_coment'];
if (isset($nazvanie)&& isset($datavstrechi)&& isset($nazvanie)&& isset($vremya)&& isset($adres)&& isset($kolvoychastnikov)&& isset($text_coment)){
    mysqli_query($link, "INSERT INTO `vstrechi`(`id`, `data`, `time`, `adres`, `game`, `maxychastniki`, `komment`,`ychactniki`) VALUES ('','".$datavstrechi."','".$vremya."','".$adres."','".$nazvanie."','".$kolvoychastnikov."','".$text_coment."',0)");
    header("Location: vstrecha.php");
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Настольные игры</title>
    <link rel="stylesheet" href="stil.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/viebon.js"></script>
    <script src="js/prinych.js"></script>
</head>
<body>
<div id="hover1"></div>
<div id="viebon">
    <form action="vstrecha.php" method="post" class="createivent">
        <span>Создание встречи</span> <br>
        <span>Название игры</span><br>
        <input name="nazvanie" type="text" class="vvood"> <br>
        <span>Дата</span> <br>
        <input name="datavstrechi" type="text" class="vvood" placeholder="Год-Месяц-Число"> <br>
        <span>Время</span><br>
        <input name="vremya" type="text" class="vvood"> <br>
        <span>Адреc</span><br>
        <input name="adres" type="text" class="vvood"> <br>
        <span>Количество участников</span><br>
        <input name="kolvoychastnikov" type="text" class="vvood"> <br>
        <span>Введите коментарий</span><br>
        <textarea name="text_coment" id="comentarii" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Создать">
    </form>

</div>

<div id="main">
    <div id="menu">
        <a href="obmen.php" class="button1">Обмен играми</a>
        <a href="vstrecha.php" class="button1">Встречи</a>
        <a href="accsesyar.php" class="button1">Аксессуары</a>
        <?
        if(isset($_SESSION['name'])){
            echo "<span class=\"user\">".$_SESSION['name']."</span>";
            echo " <a href=\"vihod.php\" class=\"button1\">Выход</a>";
        }
        else {
            echo " <a href=\"reg.php\" class=\"button1\">Регистрация</a>";
            echo " <a href=\"vhod.php\" class=\"button1\">Вход</a>";
        }
        ?>
        <!--        <form action="reg.php">-->
        <!--            <input id="reg" type="submit" value="Регистрация">-->
        <!---->
        <!--        </form>-->
        <!--        <form action="vhod.php">-->
        <!--            <input id="vhod" type="submit" value="Вход">-->
        <!--        </form>-->
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
        <div class="sozdatvstrechy">
            <a href="#" class="create button9">Создать встречу</a>
        </div>


        <?foreach ($vstrecha as $key) :?>

        <div num="<?=$key['id']?>" class="onevstr">
       <span class="nameigra"><?=$key['game']?></span>
       <span class="datavrema"><?=$key['data']." ".$key['time']?></span>
       <span class="mesto"><?=$key['adres']?></span>
           <div class="coment">
               <?=$key['komment']?>
           </div>
            <span class="ych"><?=$key['ychactniki'].'/'.$key['maxychastniki']?></span>
<!--           <button class="ychastie">Принять участие:)</button>-->
           <a href="#" class="prinyat button9" nomer="<?=$key['id']?>">Принять участие</a>
       </div>
        <?endforeach;?>


    </div>

</div>




</body>
</html>