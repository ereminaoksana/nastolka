<?php
session_start();

$host="localhost";
$user="root";
$pass="";
$bdname="nastolki";
$link=mysqli_connect($host,$user,$pass,$bdname);
$nastolki=mysqli_query($link,"select * from igry");
$adventure=mysqli_query($link,"SELECT * FROM `igry` WHERE genre=\"2\";");
$compania=mysqli_query($link,"SELECT * FROM `igry` WHERE genre=\"6\";");
$karty=mysqli_query($link,"SELECT * FROM `igry` WHERE genre=\"5\";");
$fantase=mysqli_query($link,"SELECT * FROM `igry` WHERE genre=\"7\";");
$horror=mysqli_query($link,"SELECT * FROM `igry` WHERE genre=\"8\";");

$users=mysqli_query($link,"select * from `user`");
$vstrecha=mysqli_query($link,"select * from `vstrechi`  ORDER BY `data`");


