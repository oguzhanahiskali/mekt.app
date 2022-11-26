<?php
    include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
    
    $resultArr = array();
    if($staffMission==1){
        $tablesAndWheres =[
            'table' => ['tbl_seans_kart', 'tbl_seans_detay', 'tbl_seans_taksit'],
            'where' => ['ID', 'KART_ID', 'KART_ID']
        ];

        function serviceStatusHideQuery($tbl,$where,$id){
            GLOBAL $db;
            GLOBAL $user_Firma;
            GLOBAL $resultArr;
            $q = "UPDATE ".$tbl." SET DURUM = ? WHERE ".$where."= ? AND FIRMA_ID = '{$user_Firma}'";
            $query        = $db->prepare($q);
            $update       = $query->execute(array(0,$id));
            if ( $update ){ return $resultArr=['code'=> 1000, 'status' => true]; }
            else{          return $resultArr=['code'=> 1001, 'status' => false]; }
        }

        $ids = $_POST['ids'];
        if(!empty($_POST['important'])){
            $important = true;
            if($important==true){
                for ($i=0; $i < 3 ; $i++) {
                    $tables = $tablesAndWheres['table'][$i];
                    $where = $tablesAndWheres['where'][$i];
                    serviceStatusHideQuery($tables, $where, $ids);
                }
            }
        }
    }else{
        $resultArr=['code'=> 9999];
    }
    
    echo json_encode($resultArr);
  ?>