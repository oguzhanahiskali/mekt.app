<?php
include '../header-top.php';
include '../functions.php';

$gideradi     = $_GET['datagideradi'];
$aciklama     = $_GET['dataaciklama'];
$odemeturu    = $_GET['dataodemeturu'];
$fiyat        = $_GET['datafiyat'];
$periyodik    = $_GET['dataperiyodik'];
$periyodikdt  = $_GET['dataperiyodikdt'];
$ids          = $_GET['dataid'];


    //Query for Log
    $QfLog = $db->query("SELECT * FROM tbl_gider WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
    $old = $QfLog;

        $query        = $db->prepare("UPDATE tbl_gider SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        ADI = ?,
        ACIKLAMA = ?,
        TUTAR = ?,
        ODEMETURU = ?,
        PERIYODIK = ?,
        PERIYODIK_DT = ?,
        UID = ?
        WHERE ID      = $ids");
        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $gideradi,
            $aciklama,
            $fiyat,
            $odemeturu,
            $periyodik,
            $periyodikdt,
            $user_ID
        ));
        if ( $update ){
             print "basarili";
        }

        $QfLog = $db->query("SELECT * FROM tbl_gider WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);

        //new value arrays in push
        $new = $QfLog;

        $eski = array_diff_assoc($old, $new); //old and new value diffrents
        $yeni = array_diff_assoc($new, $old); //new and old value diffrents

        //logs saved!
        logSQL($user_ID, 'Gider Güncelleme', $eski, $yeni);
 
  ?>