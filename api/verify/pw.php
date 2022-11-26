<?php
include '../../header-top.php';

//print_r($_POST);

if(!empty($_POST['verify']) && $_POST['verify']=='true'){

    $AdminID = $_POST['userID'];
    $AdminPW = $_POST['userPW'];
    $cid     = $_POST['cid'];
    $sql = "SELECT * FROM tbl_personel WHERE ID = '$AdminID' AND USERSTATUS = 1 AND DURUM = 1 AND TUR = 1 AND FIRMA_ID = '$user_Firma'";
    $json = [];
    $pwResult = "";
    $query = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
    if ( $query ){
        if (password_verify($AdminPW, $query['PASSWORD'])) {
            $varmi = $db->query("SELECT * FROM tbl_seans_taksit WHERE KART_ID = '$cid'")->fetch(PDO::FETCH_ASSOC);

            if ( $varmi ){
                    $deleteQ = $db->prepare("DELETE FROM tbl_seans_taksit WHERE KART_ID = '$cid'");
                    $delete = $deleteQ->execute();
                    if($delete){ $pwResult = 'Deletion Successful'; }else{ $pwResult = 'Deletion failed'; }
                }else{
                $pwResult = "Taksitlendirme zaten yok.";
            }
            /*
            */

        } else {
            $pwResult = 'Hatalı Şifre';
        }
        $json[]=[ $pwResult ]; 
    }else{
        echo "Errör";
    }

    echo json_encode($json);
}else{
    echo "bad request!";
}
?>