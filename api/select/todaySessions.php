<?php
$documentBase = $_SERVER['DOCUMENT_ROOT'];
include $documentBase.'/header-top.php';

$query = $db->query("SELECT * FROM view_todaySessions WHERE FIRMA_ID = '$user_Firma' AND (DATE(START) = CURDATE() OR DATE(KONTROL_START) = CURDATE()) ORDER BY START", PDO::FETCH_ASSOC);


$data=array();
$UygulamaBolgesi=false;

if ( $query->rowCount() ){
    $dateNow = date('Y-m-d H:i:s');
    $dateToday = date('Y-m-d');

    foreach ($query as $key => $row) {
        $timestampStart = strtotime($row['START']);
        $dates = date("Y-m-d", $timestampStart);
        $dateTime = date("H:i:s", $timestampStart);
        $eventDT = $row['START'];
        $eventKontrolDT = $row['KONTROL_START'].' '.$row['KONTROL_SAAT'];

        if($row['HIZMET_BOLGE']){
            $hizmetBolgeler = $row['HIZMET_BOLGE'];
            $hizmetBolgelerFe = explode(',', $hizmetBolgeler);
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
            $lists = explode(',', $hizmetBolgeler);
            //print_r($hizmetBolgeler);
        }

        if($UygulamaBolgesi==false){
            $UygulamaBolgesi = "Belirtilmedi";
        }else{
            $UygulamaBolgesi = substr($UygulamaBolgesi,0,-3);
        }
        $durum = $row['SEANS_DURUM'];
        
        if($dateNow<$eventDT){
            $eventStatus = "Bekliyor";
        }else{
            $eventStatus = "Gelmedi";
        }
        if($dateNow<$eventKontrolDT){
            $eventKontrolStatus = "Bekliyor";
        }else{
            $eventKontrolStatus = "Gelmedi";
        }
        // $kalangun  = $row['KALANGUN'];
        // $kontrolDurum = $row['KONTROL_DURUM'];
        // $bul      = "-";
        // $degistir = "";
        // $kalangunx = str_replace($bul, $degistir, $kalangun);
        // $dayStatus = "";
        // $gelmeDurumuKntrl= "";
        // if($kalangun==0){ $dayStatus = " ~ Bugün";}
        // else if($kalangun<0 /*&& $durum!=2*/){ $dayStatus = ' ~ '.$kalangunx. ' gün geçti'; }
        // else if($kalangun>0){ $dayStatus = ' ~ '.$kalangunx.' gün kaldı'; }
        
        if($row['SEANS_DURUM']==0){ if($eventStatus == "Gelmedi"){ echo ""; }else{ echo "text-warning"; } }elseif($row['SEANS_DURUM']==1){ echo "text-danger"; }elseif($row['SEANS_DURUM']==2){ echo "text-success"; } print" mr-50'></i>";
        if($row['SEANS_DURUM']==0){ echo $eventStatus; }elseif($row['SEANS_DURUM']==1){ echo "İptal"; }      elseif($row['SEANS_DURUM']==2){ echo "Geldi"; }
        if($row['KONTROL_DURUM']==0){ if($eventKontrolStatus == "Gelmedi"){ echo ""; }else{ echo "text-warning"; }  }elseif($row['KONTROL_DURUM']==1){ echo "text-danger"; }elseif($row['KONTROL_DURUM']==2){ echo "text-success"; } print" mr-50'></i>";
        if($row['KONTROL_DURUM']==0){ echo $eventKontrolStatus;}elseif($row['KONTROL_DURUM']==1){ echo "İptal"; }      elseif($row['KONTROL_DURUM']==2){ echo "Geldi"; }

        // if($kontrolDurum==0){ $gelmeDurumuKntrl = "<b ";
        // if($kalangun<0) $gelmeDurumuKntrl .= "style='color:#c2246e'>Gelmedi</b>"; else { $gelmeDurumuKntrl .= "style='font-weight:bolder;'>Bekliyor</b>";}
        // }else if($kontrolDurum==1){ $gelmeDurumuKntrl = "<b style='color:red'>İptal</b>"; }
        // else if($kontrolDurum==2){ $gelmeDurumuKntrl = "<b style='color:#28d094;'>Geldi</b>"; }

        // if($row['SEANS_NOT']){  $seansNot = '<i class="fa fa-pencil-square-o" data-html="true" data-toggle="tooltip" data-original-title="<b>Seans Notu:</b> <i>'.$row['SEANS_NOT'].'"></i>'; }
        // else{   $seansNot = null; }
        // if($row['KONTROL_NOT']){  $kontrolNot = '<i class="fa fa-pencil-square-o" data-html="true" data-toggle="tooltip" data-original-title="<b>Kontrol Notu:</b> <i>'.$row['KONTROL_NOT'].'"></i>'; }
        // else{   $kontrolNot = null; }
        if(isset($row['KNTRL_SAAT'])){
            $kontrolSaat = $row['KNTRL_SAAT'];
        }else{
            $kontrolSaat = null;
        }
        $subdata=array();
        $subKontrol=array();
        $subdata[]='#'.$row['ID'];
        $subdata[]="<i class='fa fa-circle font-small-3 ".$eventStatus;
        $subdata[]='SEANS';
        $subdata[]=$UygulamaBolgesi;
        $subdata[]=$row['EST_NAME'];
        $subdata[]=$row['RESOURCE_NAME'];
        $subdata[]=$row['CUSTOMER'];
        $subdata[]=$row['START_SAAT'];
        $subdata[]=$row['SEANS_SURE'];
        print '
        <td>
            <span>'.$row['TOPLAM_SEANS'].' / '.$row['TAMAMLANAN'].' </span>
            <div class="progress progress-bar-success mt-1 mb-0" style="margin:0px 0px 15px 0px!important;">
                <div class="progress-bar" role="progressbar" style="width: '. $row['TAMAMLANAN'] / ($row['TOPLAM_SEANS'] / 100).'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </td>';
        $subdata[]='<td><button type="button" class="btn btn-success round btn-sm"';?> onclick="window.location.href='session-details.php?CID=<?php print $row['KART_ID']; ?>'"><?php print "GİT".'</button></td>';
        if(!empty($row['KONTROL_START'])){
            $subKontrol[]='#'.$row['ID'];
            $subKontrol[]=$eventKontrolStatus;
            $subKontrol[]='KNTRL';
            $subKontrol[]=$UygulamaBolgesi;
            $subKontrol[]=$row['EST_NAME'];
            $subKontrol[]=$row['KNTRL_ROOM'];
            $subKontrol[]=$row['CUSTOMER'];
            $subKontrol[]=$kontrolSaat;
            $subKontrol[]=$row['SEANS_SURE'];
            $subKontrol[]='
            <td>
                <span>'.$row['TOPLAM_SEANS'].' / '.$row['TAMAMLANAN'].' </span>
                <div class="progress progress-bar-success mt-1 mb-0" style="margin:0px 0px 15px 0px!important;">
                    <div class="progress-bar" role="progressbar" style="width: '. $row['TAMAMLANAN'] / ($row['TOPLAM_SEANS'] / 100).'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </td>';
            $subKontrol[]='<td><button type="button" class="btn btn-success round btn-sm"';?> onclick="window.location.href='session-details.php?CID=<?php print $row['KART_ID']; ?>'"><?php print "GİT".'</button></td>';

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
}

$json_data=array("data"=>$array);
echo json_encode($json_data);
?>