<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$sessionID = $_GET['MID'];
$request=$_REQUEST;

$sql ="SELECT * FROM view_customerViewServices WHERE MID = $sessionID AND FIRMA_ID=$user_Firma AND DURUM = 1";
$query=mysqli_query($con,$sql);
$totalData=mysqli_num_rows($query);
$totalFilter=$totalData;


$query=mysqli_query($con,$sql);

$data=array();

while($row=mysqli_fetch_array($query)){
    $toplamSeans = $row['SEANS'];
    $gelenSeans  = $row['GELEN'];
    $AlinanOdeme = $row['ODEME'].' '.$row['CURRENCY'];
    $kalan = $row['FIYAT'] - $row['ODEME'];
    $colorAlinanOdeme = '';
    if($row['ODEME'] == 0){
        $kalan = $kalan.' '.$row['CURRENCY'];
    }else if($row['ODEME']>0){
        $kalan = $kalan.' '.$row['CURRENCY'];
    }
    
    if($AlinanOdeme==0){
        $AlinanOdeme = "-";
        $colorAlinanOdeme = 'danger';
    }else if($kalan == 0){
        $colorAlinanOdeme = 'success';
        $kalan = '<b class="success">Tamamlandı</b>';
    }else{
        $colorAlinanOdeme = 'warning';

    }

    $color = '';
    if($gelenSeans<$toplamSeans && $gelenSeans>0){
        $color = "warning";
        $gelenSeans = $gelenSeans.' Seans';
    }else if($gelenSeans==$toplamSeans){
        $color = "success";
        $gelenSeans = 'Tamamladı';
    }else if($gelenSeans==0){
        $color = "danger";
        $gelenSeans = 'Gelmedi';
    }
    $sureOld = $row['SURE'];
    $find = 'Dakika';
    $replace = 'Dk.';
    $SureNew = str_replace($find, $replace, $sureOld);
    $subdata=array();
    $subdata[]=$row['ESTETISYEN'];
    $subdata[]= ucwords_tr($row['HIZMET_ADI']);
    $subdata[]='<b>'.$toplamSeans.'</b> / <b class="'.$color.'">'.$gelenSeans.'</b>';
    $subdata[]=$SureNew;
    $subdata[]=$row['FIYAT'].' '.$row['CURRENCY'].' / <b class="'.$colorAlinanOdeme.'">'.$AlinanOdeme.'</b>';
    $subdata[]=$kalan;
    $subdata[]=$row['USER_ID'];
    $subdata[]=$row['DT'];
    $subdata[]='<button type="button" class="btn btn-icon btn-icon rounded-circle btn-success mb-1 waves-effect waves-light" onclick="window.location.href=`session-details.php?CID='.$row['ID'].'`"><i class="feather icon-inbox"></i></button>
                <button type="button" class="btn btn-icon btn-icon rounded-circle btn-danger mb-1 waves-effect waves-light hizmet-sil" ids="'.$row['ID'].'"><i class="feather icon-trash"></i></button>';
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
