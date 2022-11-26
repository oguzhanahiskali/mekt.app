<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$request=$_REQUEST;

//Search
$sql ="SELECT * FROM view_ProductStockUsed WHERE FIRMA_ID='$user_Firma' AND DURUM = 1 AND 1=1";
if(!empty($request['search']['value'])){
    $sql.=" AND (ID Like '".$request['search']['value']."%' ";
    $sql.=" OR PRODUCT Like '".$request['search']['value']."%' ";
    $sql.=" OR SCALE Like '".$request['search']['value']."%' ";
    $sql.=" OR TYPE Like '".$request['search']['value']."%' ";
    $sql.=" OR PRICE Like '".$request['search']['value']."%' )";
}
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);
$totalFilter=$totalData;

$data=array();

while($row=mysqli_fetch_array($query)){
    $type = null;
    if($row['TYPE']==0){$type = 'ml'; }else
    if($row['TYPE']==1){ $type = 'sl'; }else
    if($row['TYPE']==2){ $type = 'lt'; }else
    if($row['TYPE']==3){ $type = 'kg'; }else
    if($row['TYPE']==4){ $type = 'mg'; }else
    if($row['TYPE']==5){ $type = 'Adet'; }
    
    $subdata=array();
    $subdata[]="#".$row['ID'];
    $subdata[]=$row['PRODUCT'];
    $subdata[]=$row['SCALE'].' '.$type;
    $subdata[]=$row['PRICE'].' '.$currency;
    $subdata[]=$row['IN_DT'];
    $subdata[]=$row['STOCK'];
    $subdata[]=$row['USED'];
    $subdata[]=$row['EXPIRY_DT'];
    $subdata[]=$row['UID'];
    $subdata[]=$row['DT'];
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
