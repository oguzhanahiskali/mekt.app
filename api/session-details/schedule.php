<?php
$documentBase = $_SERVER['DOCUMENT_ROOT'];
include $documentBase.'/header-top.php';

$sessionID = $_GET['sessionID'];

$query = $db->query("SELECT * FROM view_sessionDetails_schedule WHERE KART_ID = '$sessionID' AND FIRMA_ID = '$user_Firma'", PDO::FETCH_ASSOC);


$data=array();

if ( $query->rowCount() ){
    foreach ($query as $key => $row) {
        // $hizmetBolgeler = $row['HIZMET_BOLGE'];
        // $hizmetBolgelerFe = explode(',', $hizmetBolgeler);
        $hizmetBolgelerFe = explode(',', $row['HIZMET_BOLGE'] ?? '');

        $UygulamaBolgesi = "";
        
        foreach($hizmetBolgelerFe as $bolge) {
            $QhizmetBolge = "SELECT AREA FROM view_regions_id WHERE ID = '{$bolge}'";
            $QhizmetBolgesi = $db->query($QhizmetBolge, PDO::FETCH_ASSOC);
            if($QhizmetBolgesi->rowCount()){
                foreach($QhizmetBolgesi as $bolgeName){
                    $UygulamaBolgesi .= $bolgeName['AREA']." - ";
                }
            }
        }
        if($UygulamaBolgesi==false){
            $UygulamaBolgesi = "Belirtilmedi";
        }else{
            $UygulamaBolgesi = substr($UygulamaBolgesi,0,-3);
        }
        // $lists = explode(',', $hizmetBolgeler);
        
        $lists = explode(',', $row['HIZMET_BOLGE'] ?? '');
        //print_r($hizmetBolgeler);
        $durum = $row['SEANS_DURUM'];
        $kalangun  = $row['KALANGUN'];
        $kontrolDurum = $row['KONTROL_DURUM'];
        $bul      = "-";
        $degistir = "";
        $kalangunx = str_replace($bul, $degistir, $kalangun);
        $dayStatus = "";
        $gelmeDurumuKntrl= "";
        if($kalangun==0){ $dayStatus = " ~ Bugün";}
        else if($kalangun<0 /*&& $durum!=2*/){ $dayStatus = ' ~ '.$kalangunx. ' gün geçti'; }
        else if($kalangun>0){ $dayStatus = ' ~ '.$kalangunx.' gün kaldı'; }
        
        if($durum==0){ $gelmeDurumu = "<b ";
        if($kalangun<0) $gelmeDurumu .= "style='color:#c2246e'>Gelmedi</b>"; else { $gelmeDurumu .= "style='font-weight:bolder;'>Bekliyor</b>";}
        }else if($durum==1){ $gelmeDurumu = "<b style='color:red'>İptal</b>"; }
        else if($durum==2){ $gelmeDurumu = "<b style='color:#28d094;'>Geldi</b>"; }
        
        if($kontrolDurum==0){ $gelmeDurumuKntrl = "<b ";
        if($kalangun<0) $gelmeDurumuKntrl .= "style='color:#c2246e'>Gelmedi</b>"; else { $gelmeDurumuKntrl .= "style='font-weight:bolder;'>Bekliyor</b>";}
        }else if($kontrolDurum==1){ $gelmeDurumuKntrl = "<b style='color:red'>İptal</b>"; }
        else if($kontrolDurum==2){ $gelmeDurumuKntrl = "<b style='color:#28d094;'>Geldi</b>"; }

        if($row['SEANS_NOT']){  $seansNot = '<i class="fa fa-pencil-square-o" data-html="true" data-toggle="tooltip" data-original-title="<b>Seans Notu:</b> <i>'.$row['SEANS_NOT'].'"></i>'; }
        else{   $seansNot = null; }
        if($row['KONTROL_NOT']){  $kontrolNot = '<i class="fa fa-pencil-square-o" data-html="true" data-toggle="tooltip" data-original-title="<b>Kontrol Notu:</b> <i>'.$row['KONTROL_NOT'].'"></i>'; }
        else{   $kontrolNot = null; }

        $subdata=array();
        $subKontrol=array();
        $subdata[]=$seansNot.' #'.$row['ID'];
        $subdata[]='<p class="text-primary">'.$row['SEANS_ID'].'. SEANS</p>';
        $subdata[]=$row['SEANS_ROOM'];
        $subdata[]=$row['ESTETISYEN_ADI'];
        $subdata[]=$UygulamaBolgesi;
        $subdata[]=$row['SEANS_TARIH'].$dayStatus;
        $subdata[]=$row['SEANS_SAAT'];
        $subdata[]=$row['SEANS_SURE'];
        $subdata[]=$gelmeDurumu;
        $subdata[]='<button type="button" class="btn btn-success round btn-sm seansedit" data-toggle="modal" data-target="#SeansDIV" ids="'.$row['ID'].'">İşlem Yap</button>';
        if(!empty($row['KONTROL_TARIH'])){
            $subKontrol[]=$kontrolNot.' #'.$row['KONTROL_ID'];
            $subKontrol[]='<p class="text-warning">'.$row['SEANS_ID'].'. KNTRL</p>';
            $subKontrol[]=$row['KONTROL_ROOM'];
            $subKontrol[]=$row['ESTETISYEN_ADI'];
            $subKontrol[]=$UygulamaBolgesi;
            $subKontrol[]=$row['KONTROL_TARIH'];
            $subKontrol[]=$row['KONTROL_SAAT'];
            $subKontrol[]=$row['SEANS_SURE'];
            $subKontrol[]=$gelmeDurumuKntrl;
            $subKontrol[]='<button type="button" class="btn btn-success round btn-sm seansedit" data-toggle="modal" data-target="#SeansDIV" ids="'.$row['ID'].'">İşlem Yap</button>';
        }
        
        $data[]=$subdata;
        array_push($data, $subKontrol);
        
        foreach($data as $key=>$value)
        {
            if(is_null($value) || $value == '' || empty($value))
                unset($data[$key]);
        }
        $array = array_values($data);

    }
}else{
    $array= ['status'=>false];
}

$json_data=array("data"=>$array);
echo json_encode($json_data);
?>