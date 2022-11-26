<?php
include '../header-top.php';

$id = $_GET['varpersonelID'];
$themechoice = $_GET['varthemechoice'];

$update = mysqli_query($link,"UPDATE tbl_personel SET TEMA = '$themechoice' WHERE ID = '$id'");
if ( $update ){
     print "basarili";
}
  ?>