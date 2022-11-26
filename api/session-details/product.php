<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$sessionID = $_GET['sessionID'];
$request=$_REQUEST;
$col =array(
    0   =>  'ID',
    1   =>  'PRODUCT',
    2   =>  'SCALE',
    3   =>  'TYPE',
    4   =>  'PRICE'
);  //create column like table in database
$type= '';
$sql ="SELECT * FROM view_sessionDetails_product WHERE KART_ID = '$sessionID' AND FIRMA_ID='$user_Firma'";

$query=mysqli_query($con,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql ="SELECT * FROM view_sessionDetails_product WHERE KART_ID = '$sessionID' AND FIRMA_ID='$user_Firma' AND 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (ID Like '".$request['search']['value']."%' ";
    $sql.=" OR PRODUCT Like '".$request['search']['value']."%' ";
    $sql.=" OR SCALE Like '".$request['search']['value']."%' ";
    $sql.=" OR TYPE Like '".$request['search']['value']."%' ";
    $sql.=" OR PRICE Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    
    $type = $row['TYPE'];
    $tahsilattipi = $row['PAYMENT_TYPE'];

    // if($row['TYPE']==0){$type = 'ml'; }else
    // if($row['TYPE']==1){ $type = 'sl'; }else
    // if($row['TYPE']==2){ $type = 'lt'; }else
    // if($row['TYPE']==3){ $type = 'kg'; }else
    // if($row['TYPE']==4){ $type = 'mg'; }else
    // if($row['TYPE']==5){ $type = 'Adet'; }
    $buyStatus = null;
    if($row['BUY_STATUS']==0){
        $buyStatus = '<i class="feather icon-help-circle h4 warning" title="Ödeme Alınmadı"></i>';
    }else if($row['BUY_STATUS']==1){
        $buyStatus = '<i class="feather icon-x-circle h4 danger" title="Ödeme İptal Edildi"></i>';
    }else if($row['BUY_STATUS']==2){
        $buyStatus = '<i class="feather icon-check-circle h4 success" title="Ödeme Alındı"></i>';
    }
    //Tahsilat Tipi
    if($tahsilattipi==1) { $tahsilatTipiResult = "Nakit"; }else
    if($tahsilattipi==2) { $tahsilatTipiResult = "Havale / EFT"; }else
    if($tahsilattipi==3) { $tahsilatTipiResult = "Kredi Kartı"; }else{
        $tahsilatTipiResult = null;
    }

    $subdata=array();
    $subdata[]="#".$row['ID'];
    $subdata[]=$row['PRODUCT'];
    $subdata[]=$row['SCALE'].' '.$type;
    $subdata[]=$tahsilatTipiResult;
    $subdata[]=$row['PRICE'].' '.$row['CURRENCY'];
    $subdata[]=$row['DT'];
    $subdata[]=$buyStatus;
    $subdata[]=$row['PERSONEL'];
    $subdata[]='<button type="button" class="btn btn-success round btn-sm urun-duzenle" data-toggle="modal" data-target="#HizmetDuzenleDIV" ids="'.$row['ID'].'">Düzenle</button>
    <button type="button" class="btn btn-warning round btn-sm urun-sil" ids="'.$row['ID'].'">Sil'.'</button>';
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);

?>
