<?php
   include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
   $json = [];

        $olcek          = $_GET['inp-edit-product-scale'];
        $birimTuru      = $_GET['inp-edit-product-type'];
        $fiyat          = $_GET['inp-edit-urun-fiyat'];
        $BuyStatus      = $_GET['inp-edit-urun-tahsilat-durum'];
        $paymentType    = $_GET['inp-edit-urun-tahsilat-tipi'];
        $ids            = $_GET['hizmetid'];
        $kartid         = $_GET['kartid'];
        $durum = 1;


if(empty($_GET['inp-edit-urun-adi'])){
        $query        = $db->prepare("UPDATE tbl_seans_kart_urun SET
        KART_ID = ?,
        PRICE = ?,
        BUY_STATUS = ?,
        PAYMENT_TYPE = ?,
        UID = ?
        WHERE ID      = $ids
        AND FIRMA_ID  = $user_Firma");
        $update       = $query->execute(array(
            $kartid,
            $fiyat,
            $BuyStatus,
            $paymentType,
            $user_ID
        ));
        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }


}else if(!empty($ids)){
        $urun           = $_GET['inp-edit-urun-adi'];
        $query        = $db->prepare("UPDATE tbl_seans_kart_urun SET
        PRODUCT = ?,
        KART_ID = ?,
        SCALE = ?,
        TYPE = ?,
        PRICE = ?,
        BUY_STATUS = ?,
        PAYMENT_TYPE = ?,
        UID = ?
        WHERE ID      = $ids
        AND FIRMA_ID  = $user_Firma");
        $update       = $query->execute(array(
        $urun,
            $kartid,
            $olcek,
            $birimTuru,
            $fiyat,
            $BuyStatus,
            $paymentType,
            $user_ID
        ));
        if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
        else{           $json=['code'=> 1001, 'status' => false]; }

}else{
        $json=['code'=> 1012, 'status' => false];
    }

    echo json_encode($json);

?>