<?php
$number = $_GET['n'];

$cep = $_POST['ceptel'];
// $bul      = substr($cep, 0, 2);
// $degistir = '';
// $cep = str_replace($bul, $degistir, $cep);

$msg = $_POST['mesaj'];
$bugun = date('Y-m-d H:i:s');
// $link = new mysqli("127.0.0.1", "v2ep_usr", "Mzw?s151F4#3daw1", "v2ep_db");


if(!empty($cep) AND !empty($msg)){
    $db = new PDO("mysql:host=localhost;dbname=v2ep_db;charset=utf8", "v2ep_usr", "Mzw?s151F4#3daw1");
    $query        = $db->prepare("INSERT INTO tbl_sms_gelen SET
    NO = ?,
    TEL = ?,
    MSG = ?,
    DT = ?");

    $update       = $query->execute(array(
        $number,
        $cep,
        $msg,
        $bugun
    ));
    if ( $update ){
         print "basarili";
    }

}else{
  echo "post yok.";
}
