<?
session_start();
include "bdconect.php" ?>
<?
$login = $_POST['loginn'];
$password = $_POST['password'];
if (isset($login) && isset($password)){
    foreach ($users as $key2){
        if($key2['login']==$login && $key2['password']==$password){
            $_SESSION['name']=$key2['name'];
            $_SESSION['id_who']=$key2['id'];
            header("location: index.php");
        }

    }
}
?>
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
        <form action="vhod.php" method="post" class="log">
            Логин <br>
            <input type="text" name="loginn""><br>
            Пароль<br>
            <input type="text" name="password" ><br>
            <input type="submit" value="Войти">
        </form>


    </div>

</div>


</body>
</html>