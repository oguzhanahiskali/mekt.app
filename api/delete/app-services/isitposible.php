<?php
    include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
    $resultArr = array();
    $serviceCount = [];

    $ids = $_POST['ids'];
    if(!empty($_POST['important'])){
        $important = true;
    }else{
        $query = $db->query("SELECT k.ID, (SELECT CONCAT(ADI, ' ', SOYADI) FROM tbl_musteri_kimlik WHERE ID = k.MID) AS MUSTERI FROM tbl_seans_kart k WHERE HIZMET_ID = '{$ids}'", PDO::FETCH_ASSOC);
        if ( $query->rowCount() ){
            $important = false;
            foreach( $query as $row ){
                $serviceCount[]=[
                    'ID'=> intval($row['ID']),
                    'customer' => $row['MUSTERI']
                ];
            }
            $resultArr=[
                'code'=>1001,
                'status'=> false,
                'because'=> 'these services are used',
                'serviceCounts' => $query->rowCount(),
                'services' => $serviceCount
            ];
        }else{
            $resultArr=['code'=>1000, 'status'=> true];
        }
    }
   
    echo json_encode($resultArr);

  ?>