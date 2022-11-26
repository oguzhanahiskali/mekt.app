<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
     
    if (
        !empty($_POST['intTypeOfExpenditure']) ||
        !empty($_POST['paidDT']) ||
        !empty($_POST['intDescription']) ||
        !empty($_POST['inp-tahsilat-form-tipi']) ||
        !empty($_POST['inp-paymentStatus']) ||
        !empty($_POST['inpAddCurrency']) ||
        !empty($_POST['inp-add-price'])
    ){
        $P_TypeOfExpenditure    = $_POST['intTypeOfExpenditure'];
        $P_PaidDT               = $_POST['paidDT'];
        $P_Description          = $_POST['intDescription'];
        $P_PaidType             = $_POST['inp-tahsilat-form-tipi'];
        $P_PaidStatus           = $_POST['inp-paymentStatus'];
        $P_PaidCurrency         = $_POST['inpAddCurrency'];
        $P_Price                = $_POST['inp-add-price'];
        if(!empty($_POST['media-ids'][0])){
            $P_Media = $_POST['media-ids'][0];
        }else{
            $P_Media = null;
        }
        $query = $db->prepare(
            "INSERT INTO tbl_gider SET
            FIRMA_ID = ?,
            SUBE_ID = ?,
            ADI = ?,
            ACIKLAMA = ?,
            TUTAR = ?,
            TAHSILAT_DURUM = ?,
            TAHSILAT_TIPI = ?,
            CURRENCY = ?,
            FILE = ?,
            UID	= ?,
            DT = ?,
            UDT = NOW()");

        $update = $query->execute(array(
            $user_Firma,
            $user_Sube,
            $P_TypeOfExpenditure,
            $P_Description,
            $P_Price,
            $P_PaidStatus,
            $P_PaidType,
            $P_PaidCurrency,
            $P_Media,
            $user_ID,
            $P_PaidDT
        ));
        if ( $update ){ print "basarili"; }

    }else{
      echo "Boş alanlar var.";
    }
  ?>