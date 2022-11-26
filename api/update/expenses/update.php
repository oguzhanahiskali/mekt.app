<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
    //  print_r($_POST);
     
    if (
        !empty($_POST['intEditTypeOfExpenditure']) ||
        !empty($_POST['editPaidDT']) ||
        !empty($_POST['intEditDescription']) ||
        !empty($_POST['inp-edit-tahsilat-form-tipi']) ||
        !empty($_POST['inp-edit-paymentStatus']) ||
        !empty($_POST['inpEditAddCurrency']) ||
        !empty($_POST['inp-edit-price'])
    ){
        $P_TypeOfExpenditure    = $_POST['intEditTypeOfExpenditure'];
        $P_PaidDT               = $_POST['editPaidDT'];
        $P_Description          = $_POST['intEditDescription'];
        $P_PaidType             = $_POST['inp-edit-tahsilat-form-tipi'];
        $P_PaidStatus           = $_POST['inp-edit-paymentStatus'];
        $P_PaidCurrency         = $_POST['inpEditAddCurrency'];
        $P_Price                = $_POST['inp-edit-price'];
        $ids                    = $_POST['expensesID'];
        $P_Media = null;
        if(isset($_POST['media-ids'][0])){
            $P_Media = $_POST['media-ids'][0];
        }else{
            if($_POST['ExpensesIMG']!='null'){
                $P_Media = $_POST['ExpensesIMG'];
                $find = "/adropzone/upload/"; $change = "";
                $P_Media = str_replace($find, $change, $P_Media);
            }else{ $P_Media = null; } }

        $query = $db->prepare(
            "UPDATE tbl_gider SET
            ADI = ?,
            ACIKLAMA = ?,
            TUTAR = ?,
            TAHSILAT_DURUM = ?,
            TAHSILAT_TIPI = ?,
            CURRENCY = ?,
            FILE = ?,
            UID	= ?,
            DT = ?,
            UDT = NOW()
            WHERE ID = $ids AND
            FIRMA_ID = $user_Firma AND
            SUBE_ID = $user_Sube
            ");

        $update = $query->execute(array(
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
        if ( $update ){ $myArray = [ 'status'=>true]; }

    }else{
      $myArray = [ 'status'=>false, 'code'=> 1012, 'because'=> 'There are empty fields'];
    }

    echo json_encode($myArray);

  ?>