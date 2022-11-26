<?php
include '../header-top.php';
include '../functions.php';


   	$urunAdi    = $_GET['inp-urun-adi'];
    $olcek      = $_GET['inp-olcek'];
    $olcekTuru  = $_GET['inp-olcek-turu'];
    $fiyat      = $_GET['inp-fiyat'];
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

 if (!empty($urunAdi) AND !empty($olcek) AND !empty($olcekTuru) AND !empty($fiyat)) {


     $durum = 1;

        $query        = $db->prepare("INSERT INTO tbl_products SET
            FIRMA_ID = ?,
            SUBE_ID = ?,
            DURUM = 1,
            PRODUCT = ?,
            SCALE = ?,
            TYPE = ?,
            PRICE = ?,
            UID = ?,
            DT = ?");

        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $urunAdi,
            $olcek,
            $olcekTuru,
            $fiyat,
            $user_ID,
            $bugun
        ));

        $last_id = $db->lastInsertId();
        $QfLog = $db->query("SELECT * FROM tbl_products WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
        $eski = '';
        $yeni = $QfLog;
        //logs saved
        logSQL($user_ID, 'Ürün Ekleme', $eski, $yeni);

        if ( $update ){
            
            print "basarili";
        }



    }else{
      echo "Boş alanlar var.";
    }
  ?>