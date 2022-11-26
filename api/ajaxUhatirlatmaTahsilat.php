<?php
include '../header-top.php';
include '../functions.php';

    //get check
    $tahsilattarih   = date('Y-m-d', strtotime($_GET['inp-tahsilat-tarih']));
    $tahsilatfiyat   = $_GET['inp-tahsilat-fiyat'];
    $tahsilattipi    = $_GET['inp-tahsilat-form-tipi'];
    $tahsilatdurum   = $_GET['inp-tahsilat-form-durum'];
    $ids             = $_GET['taksitid'];

    //Query for Log
    $QfLog = $db->query("SELECT TAKSIT_TARIHI, TAHSILAT_DURUM, ODEMETURU FROM tbl_hatirlatma_taksit WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
    
    //old value arrays in push
    $old = $QfLog;

    //update
    $query        = $db->prepare("UPDATE tbl_hatirlatma_taksit SET
    TAKSIT_TARIHI = ?,
    TAHSILAT_DURUM= ?,
    ODEMETURU = ?
    WHERE ID      = $ids");
    $update       = $query->execute(array(
         $tahsilattarih,
         $tahsilatdurum,
         $tahsilattipi
    ));

    //new value control
    $QfLog = $db->query("SELECT TAKSIT_TARIHI, TAHSILAT_DURUM, ODEMETURU FROM tbl_hatirlatma_taksit WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);

    //new value arrays in push
    $new = $QfLog;


    $eski = array_diff_assoc($old, $new); //old and new value diffrents
    $yeni = array_diff_assoc($new, $old); //new and old value diffrents

    //logs saved!
    logSQL($user_ID, 'Tahsilat Güncelleme', $eski, $yeni);

    //if update successfull: basarili 
    if ( $update ){
         print "basarili";
    }

  ?>