<?php

$mysqli = new mysqli("127.0.0.1", "v2ep_usr", "Mzw?s151F4#3daw1", "db_mektapp");
$mysqli->set_charset("utf8");


$link = new mysqli("127.0.0.1", "v2ep_usr", "Mzw?s151F4#3daw1", "db_mektapp");


if(mysqli_connect_error()) //Eğer hata varsa yazdırıyoruz
{
    echo mysqli_connect_error();
    echo "test";
    //exit; //eğer bağlantıda hata varsa PHP çalışmasını sonlandırıyoruz.
}

$link->set_charset("utf8");

$con=mysqli_connect('127.0.0.1','v2ep_usr','Mzw?s151F4#3daw1','db_mektapp')or die("connection failed".mysqli_errno());
$con->query("SET CHARACTER SET utf8");


$db = new PDO("mysql:host=127.0.0.1;dbname=db_mektapp;charset=utf8", "v2ep_usr", "Mzw?s151F4#3daw1");
?>