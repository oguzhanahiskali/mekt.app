<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
if(isset($_POST)){

    $P_ID      = $_POST['inp-edit-product-id'];
    $P_BARCODE  = $_POST['inp-edit-barcode'];
    $P_CURRENCY = $_POST['inp-edit-currency'];
    $P_PRICE    = $_POST['inp-edit-price'];
    $P_SCALE    = $_POST['inp-edit-scale'];
    $P_TYPE     = $_POST['inp-edit-type'];
    $P_IN_DT    = $_POST['inp-edit-batch-arrival-dt'];
    $P_STOCK    = $_POST['inp-edit-stock'];
    $P_STOCK_ALARM  = $_POST['inp-edit-stock-alarm'];
    $P_EXPIRY_DT    = $_POST['inp-edit-expiration-dt'];
    $bugun          = date('Y-m-d H:i:s');

    $Type = null;
    if($P_TYPE==0){ $Type = 'MiliLitre';}else
    if($P_TYPE==1){ $Type = 'SantiLitre';}else
    if($P_TYPE==2){ $Type = 'Litre';}else
    if($P_TYPE==3){ $Type = 'KiloGram';}else
    if($P_TYPE==4){ $Type = 'MiliGram';}else
    if($P_TYPE==5){ $Type = 'Adet';}

    $query  = $db->prepare("UPDATE tbl_product_party SET
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
        DT = ?
        WHERE
            ID = ? AND
            FIRMA_ID = ? AND
            SUBE_ID = ?");

    $update = $query->execute(array(
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
        $bugun,
        $P_ID,
        $user_Firma,
        $user_Sube
    ));

    if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
    else{           $json=['code'=> 1001, 'status' => false]; }

}else{
    $json=['code'=> 1012, 'status' => false];
}

echo json_encode($json);
?>


