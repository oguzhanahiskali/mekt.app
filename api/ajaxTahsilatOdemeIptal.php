<?php
     include '../header-top.php';

    $tahsilattipi    = $_GET['inp-tahsilat-form-tipi'];
    $tahsilatdurum   = $_GET['inp-tahsilat-form-durum'];
    $ids             = $_GET['taksitid'];
    $kartid          = $_GET['kartid'];

    if($tahsilatdurum==2){
        $query    = $db->prepare(
                                "UPDATE
                                tbl_seans_taksit SET
                                TAHSILAT_DURUM= 0
                                WHERE ID  = $ids AND
                                KART_ID   = $kartid AND
                                FIRMA_ID  = $user_Firma
                                ");
        $update   = $query->execute();
        if($update){ echo "basarili"; }else{ echo "hata"; }
    }
?>