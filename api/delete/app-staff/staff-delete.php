<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$id     = $_GET['ids'];
$gizle  = 0;


    $QfLog = $db->query("SELECT * FROM tbl_personel WHERE ID = '{$id}' AND FIRMA_ID = $user_Firma")->fetch(PDO::FETCH_ASSOC);   
    if ( $QfLog ){
        $query = $db->prepare(
            "UPDATE tbl_personel
            SET DURUM = ?
            WHERE ID = $id
            AND FIRMA_ID = $user_Firma"
        );
        $update = $query->execute(array($gizle));
        if ( $update ){
            $arrResult['result']=true;
        }else{
            $arrResult['result']=false;
        }
    }else{
        $arrResult['result']=[
            'status'=> false,
            'because'=> 'wrong request sent'
        ];
    }

    echo json_encode($arrResult);

?>