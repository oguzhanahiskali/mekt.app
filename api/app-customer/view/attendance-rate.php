<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';


if(!empty($_POST['MID'])){

    $mid = $_POST['MID'];
    $sql = "SELECT * FROM view_customerViewServices WHERE MID = '{$mid}' AND FIRMA_ID = '$user_Firma' AND DURUM = 1";

    $result = $mysqli->query($sql);
    
    $json = [];
    
    $TumHizmetToplamSeans = null;
    $TumHizmetGelinenSeans = null;
    $TotalPrice = null;
    $ReceivedPrice = null;
    $CanceledPrice = null;

    while($row = $result->fetch_assoc()){
        $TumHizmetToplamSeans += $row['SEANS'];
        $TumHizmetGelinenSeans += $row['GELEN'];
        $TotalPrice += $row['FIYAT'];
        $ReceivedPrice += $row['ODEME'];
        $CanceledPrice += $row['IPTAL'];
    }
    
    $json['Session']=[
        'Total'      => intval($TumHizmetToplamSeans),
        'Accepted'   => intval($TumHizmetGelinenSeans)
    ]; 
    $json['Payment']=[
        'Received'  => intval($ReceivedPrice),
        'Canceled'  => intval($CanceledPrice),
        'Total'     => intval($TotalPrice),
        'Currency'  => $currency
    ]; 
    echo json_encode($json);
}else{
    echo "bad request!";
}
?>