<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$id     = $_GET['ids'];
$gizle  = 0;

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

    $QfLog = $db->query("SELECT * FROM view_musteriler WHERE ID = '{$id}' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);   
    if ( $QfLog ){
        if($QfLog['HIZSAY']==0){

            $query = $db->prepare(
                "UPDATE tbl_musteri_kimlik
                SET DURUM = ?
                WHERE ID = $id
                AND FIRMA_ID = $user_Firma"
            );
            for ($i=0; $i < 3 ; $i++) {
                $tables = $tablesAndWheres['table'][$i];
                $where = $tablesAndWheres['where'][$i];
                serviceStatusHideQuery($tables, $where, $id);
            }
    
            $update = $query->execute(array($gizle));
            if ( $update ){ echo 'basarili'; }else{ echo "hataaa";}

        }else{
            //echo "Müşteriye atanmış hizmet bulunmaktadır. Müşteri silinemez.";
            echo 'hata';
        }
    }
}else{
    echo 'hata2';
}
?>