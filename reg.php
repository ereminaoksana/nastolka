<?include "bdconect.php"?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Настольные игры</title>
    <link rel="stylesheet" href="stil.css">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/messege.js"></script>
</head>
<body>
<div id="main">
    <div id="menu">
        <a href="#" class="button1">Обмен играми</a>
        <a href="#" class="button1">Встречи</a>
        <a href="#" class="button1">Аксессуары</a>
        <?
        if(isset($_SESSION['name'])){
            echo $_SESSION['name'];
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
       <div id="registr">
           <form action="reg.php" method="post">
               ФИО <br>
               <input class="dannye" type="text" name="FIO"> <br>
               Логин<br>
               <input class="dannye" type="text" name="login"><br>
               Пароль<br>
               <input class="dannye" type="text" name="pass"><br>
               <input class="send" type="submit" value="Зарегестрироваться">
           </form>



       </div>



    </div>

</div>
<?
$fio= $_POST['FIO'];
$login= $_POST['login'];
$pass= $_POST['pass'];
if (isset($fio) && isset($login) && isset($pass)){
    mysqli_query($link,"INSERT INTO `user`(`id`, `name`, `login`, `password`, `predpochtenie`) VALUES (\"\", '".$fio."','".$login."','".$pass."',\"\")");
}


?>



</body>
</html>