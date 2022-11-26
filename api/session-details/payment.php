<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$sessionID = $_GET['sessionID'];
$request=$_REQUEST;
$col =array(
    0   =>  'ID',
    1   =>  'TAKSIT_TARIHI',
    2   =>  'TAHSILAT_DURUM',
    3   =>  'TAHSILAT_TIPI',
    4   =>  'FIYAT'
);  //create column like table in database


$paymentServiceQ = "SELECT * FROM view_paymentServices WHERE ID = '{$sessionID}' AND FIRMA_ID = '{$user_Firma}' ORDER BY MID";
$paymentSummaryR = $db->query($paymentServiceQ, PDO::FETCH_ASSOC);
if ( $paymentSummaryR->rowCount() ){
    foreach( $paymentSummaryR as $row ){
        $ServicePayment = Yuvarla($row['FIYAT']);
        $ServiceReceived = Yuvarla($row['ALINAN']);
        $ServiceRemainingDebt = $ServicePayment-$ServiceReceived;
    }
}

$sql ="SELECT * FROM view_sessionDetails_payment where KART_ID = '$sessionID' AND FIRMA_ID='$user_Firma'";
$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM view_sessionDetails_payment WHERE KART_ID = '$sessionID' and 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (ID Like '".$request['search']['value']."%' ";
    $sql.=" OR TAKSIT_TARIHI Like '".$request['search']['value']."%' ";
    $sql.=" OR TAHSILAT_DURUM Like '".$request['search']['value']."%' ";
    $sql.=" OR TAHSILAT_TIPI Like '".$request['search']['value']."%' ";
    $sql.=" OR FIYAT Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

$alinmayanlar = null;
$bekleyenTaksit = [];

while($row=mysqli_fetch_array($query)){
    $tahsilattipi = $row['TAHSILAT_TIPI'];
    $tahsilatdurumu = $row['TAHSILAT_DURUM'];
    $kalangun  = $row['KALANGUN'];
    $bul      = "-";
    $degistir = "";
    $kalangunx = str_replace($bul, $degistir, $kalangun);
    
    //Tahsilat Tarihi
    if($kalangun==0){ $kalangunResult = "Bugün";}
    else if($kalangun<0){ $kalangunResult = ' ~ '.$kalangunx.' gün geçti'; }
    else if($kalangun>0){ $kalangunResult = ' ~ '.$kalangunx.' gün kaldı'; }

    //Tahsilat Durumu
    $smsSend = null;
    if($tahsilatdurumu==0){
        $odemeResult = '<i class="feather icon-help-circle h4 warning" title="Ödeme Alınmadı"></i>';
        $alinmayanlar +=$row['FIYAT'];
        array_push($bekleyenTaksit,$row['ID']);
        $smsSend = ' <button type="button" class="btn bg-gradient-danger round btn-sm smsSend" data-toggle="modal" ids="'.$row['ID'].'">SMS Gönder</button>';
    }elseif($tahsilatdurumu==1) {
        $odemeResult = '<i class="feather icon-x-circle h4 danger" title="Ödeme İptal Edildi"></i>';
        $alinmayanlar +=$row['FIYAT'];
        array_push($bekleyenTaksit,$row['ID']);
    }else if($tahsilatdurumu==2) {
        $odemeResult = '<i class="feather icon-check-circle h4 success" title="Ödeme Alındı"></i>';
    }

    //Tahsilat Tipi
    if($tahsilattipi==1) { $tahsilatTipiResult = "Nakit"; }else
    if($tahsilattipi==2) { $tahsilatTipiResult = "Havale / EFT"; }else
    if($tahsilattipi==3) { $tahsilatTipiResult = "Kredi Kartı"; }

    $subdata=array();
    $subdata[]="#".$row['ID'];
    $subdata[]=$row['TAKSIT_ID'].'. Taksit';
    $subdata[]=$row['TAKSIT_TARIHI'].' '.$kalangunResult;
    $subdata[]=$tahsilatTipiResult;
    $subdata[]=$row['FIYAT'].' '.$row['CURRENCY'];
    $subdata[]=$odemeResult;
    $subdata[]=$row['PERSONEL'];
    $subdata[]='<button type="button" class="btn bg-gradient-success round btn-sm taksitedit" data-toggle="modal" data-target="#TahsilatDIV" ids="'.$row['ID'].'">İşlem Yap</button>'.$smsSend;
    $data[]=$subdata;
}
$bekleyenTaksitCount = count($bekleyenTaksit);
if($ServiceRemainingDebt!=$alinmayanlar){
    $taksitYapilandir = $ServiceRemainingDebt / $bekleyenTaksitCount;
    
    foreach ($bekleyenTaksit as $value) {
        
        $qq = "UPDATE
                tbl_seans_taksit SET
                FIYAT = $taksitYapilandir,
                UID = $user_ID
                WHERE ID      = $value
                AND KART_ID   = $sessionID
                AND FIRMA_ID  = $user_Firma";

        $query= $db->prepare($qq);
        $update = $query->execute();

    }
}
$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
    // 'toplamKalan'       =>  $ServiceRemainingDebt,
    // 'toplamKalan2'      =>  $alinmayanlar,
    // 'bekleyenTaksitIDs' =>  $bekleyenTaksit,
    // 'bekleyenTaksitCount' => $bekleyenTaksitCount,
    // 'yeniTaksitlendirme' => $taksitYapilandir
);

echo json_encode($json_data);

?>
