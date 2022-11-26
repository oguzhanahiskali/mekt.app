<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

    $kart_id    = $_POST['kartID'];
    $urunAdi    = $_POST['inp-urun-adi'];
    $olcek      = $_POST['inp-product-scale'];
    $olcekTuru  = $_POST['inp-product-type'];
    $urunTahsilatDurum = $_POST['inp-urun-tahsilat-durum'];
    $fiyat      = $_POST['inp-fiyat'];
    $currency   = $_POST['inp-currency'];
    $paymentType= $_POST['inp-urun-tahsilat-form-tipi'];
    $bugun      = date('Y-m-d H:i:s');

    if (!empty($urunAdi) AND !empty($olcek) AND !empty($olcekTuru) AND !empty($fiyat)) {

        $durum = 1;

        $query        = $db->prepare("INSERT INTO tbl_seans_kart_urun SET
            FIRMA_ID = ?,
            SUBE_ID = ?,
            DURUM = 1,
            KART_ID = ?,
            PRODUCT = ?,
            SCALE = ?,
            TYPE = ?,
            PRICE = ?,
            CURRENCY = ?,
            BUY_STATUS = ?,
            PAYMENT_TYPE = ?,
            UID = ?,
            DT = ?");

        $update       = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $kart_id,
            $urunAdi,
            $olcek,
            $olcekTuru,
            $fiyat,
            $currency,
            $urunTahsilatDurum,
            $paymentType,
            $user_ID,
            $bugun
        ));

        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }

    }else{
        $json=['code'=> 1012, 'status' => false];
    }

    echo json_encode($json);

  ?>