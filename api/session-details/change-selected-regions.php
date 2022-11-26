<?php
include('../../header-top.php');

$json = [];
$defaultSelected = [];
$arr1 = [];
$arr2 = [];

if(!empty($_POST['CID']) && !empty($_POST['selectedRegionSend'])){

    $cid = $_POST['CID'];
    $selectedRegionSend = $_POST['selectedRegionSend'];
    $changeSelectedRegions = implode(", ",$_POST['selectedRegionSend']);


    $query = $db->query("select HIZMET_BOLGE from tbl_seans_detay where KART_ID = '{$cid}'", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
        foreach( $query as $i => $row ){
            if($row['HIZMET_BOLGE']!=null){
                array_push($arr1,array_map('intval', explode(',', $row['HIZMET_BOLGE'])));
            }
        }
    }
    foreach($arr1 as $key=>$value) {
        $SeanslaraGoreSeciliBolgeler = $value;
        foreach($value as $key=>$values) {
            array_push($arr2, $values);
        }
    }
  
    $new = array_unique($arr2);
    $esitmi = array_map('intval',array_intersect($selectedRegionSend, $new));
    
    if(count(array_diff($new,$esitmi))>0){
        //print_r(array_diff($new,$esitmi));
        $json[]=[
                'status'    => 'failed',
                'reason'    => 'cannot be deleted',
                'because'   => array_diff($new,$esitmi),
                '1'         => $new,
                '2'         => array_map('intval',$esitmi)
                 ];
    }else{
               
        $query = $db->prepare("UPDATE tbl_seans_kart SET BOLGE_ID = '{$changeSelectedRegions}' WHERE ID = $cid");
        $update = $query->execute();
        if ( $update ){
            $json[]=[
                'status'    => 'success'
                 ];
        }else{
            $json[]=[ 'status'    => 'failed' ];
        }
    }

    
    
}else if(!empty($_POST['CID'])) {
    $cid = $_POST['CID'];
    $query = $db->prepare("UPDATE tbl_seans_kart SET BOLGE_ID = '' WHERE ID = $cid");
    $update = $query->execute();
    if ( $update ){
        $json[]=[
            'status'    => 'success'
             ];
    }else{
        $json[]=[ 'status'    => 'failed' ];
    }
}else{
    $json[]=[ 'status'    => 'bad request!' ];
}

echo json_encode($json);

?>