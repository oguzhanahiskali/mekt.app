<?php
include '../header-top.php';

$ids        = $_GET['hizmetid'];
$urunAdi    = $_GET['inp-edit-hizmet-adi'];
$olcek      = $_GET['quantity'];
$olcekTuru  = $_GET['inp-edit-birim-turu'];
$fiyat      = $_GET['inp-edit-fiyat'];
$bugun      = date('Y-m-d H:i:s');

if($olcekTuru == 0){
    $olcekTuru = 'MiliLitre';
}else if($olcekTuru == 1){
    $olcekTuru = 'SantiLitre';
}else if($olcekTuru == 2){
    $olcekTuru = 'Litre';
}else if($olcekTuru == 3){
    $olcekTuru = 'Kilogram';
}else if ($olcekTuru == 4){
    $olcekTuru = 'Miligram';
}else if ($olcekTuru == 5 ){
    $olcekTuru == 'Adet';
}
    $query = $db->prepare("UPDATE tbl_products SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        PRODUCT = ?,
        SCALE = ?,
        TYPE = ?,
        PRICE = ?,
        UID = ?,
        DT = ?
        WHERE ID = $ids");
    $update = $query->execute(array(
        $user_Firma,
        $user_Sube,
        $urunAdi,
        $olcek,
        $olcekTuru,
        $fiyat,
        $user_ID,
        $bugun
    ));
    if ( $update ){
       print "basarili";
   }


?>