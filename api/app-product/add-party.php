<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(isset($_POST)){

    $P_PID      = $_POST['inp-product'];
    $P_BARCODE  = $_POST['inp-barcode'];
    $P_CURRENCY = $_POST['inp-currency'];
    $P_PRICE    = $_POST['inp-price'];
    $P_SCALE    = $_POST['inp-scale'];
    $P_TYPE     = $_POST['inp-type'];
    $P_IN_DT    = $_POST['inp-batch-arrival-dt'];
    $P_STOCK    = $_POST['inp-stock'];
    $P_STOCK_ALARM  = $_POST['inp-stock-alarm'];
    $P_EXPIRY_DT    = $_POST['inp-expiration-dt'];
    $bugun          = date('Y-m-d H:i:s');

    $Type = null;
    if($P_TYPE==0){ $Type = 'MiliLitre';}else
    if($P_TYPE==1){ $Type = 'SantiLitre';}else
    if($P_TYPE==2){ $Type = 'Litre';}else
    if($P_TYPE==3){ $Type = 'KiloGram';}else
    if($P_TYPE==4){ $Type = 'MiliGram';}else
    if($P_TYPE==5){ $Type = 'Adet';}

    $query  = $db->prepare("INSERT INTO tbl_product_party SET
        PID = ?,
        FIRMA_ID = ?,
        SUBE_ID = ?,
        STATUS = 1,
        BARCODE = ?,
        CURRENCY = ?,
        PRICE = ?,
        SCALE = ?,
        TYPE = ?,
        IN_DT = ?,
        STOCK = ?,
        STOCK_ALARM = ?,
        EXPIRY_DT = ?,
        UID = ?,
        DT = ?");

    $update = $query->execute(array(
        $P_PID,
        $user_Firma,
        $user_Sube,
        $P_BARCODE,
        $P_CURRENCY,
        $P_PRICE,
        $P_SCALE,
        $Type,
        $P_IN_DT,
        $P_STOCK,
        $P_STOCK_ALARM,
        $P_EXPIRY_DT,
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