<?php
include('../../header-top.php');

$json = [];

if(!empty($_POST['CID'])){

    $cid = $_POST['CID'];


    $query = $db->query("SELECT ID, HIZMET_BOLGE FROM tbl_seans_detay WHERE KART_ID = '{$cid}' AND FIRMA_ID = '$user_Firma'", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
        foreach( $query as $row ){
            $selectedList = $row['HIZMET_BOLGE'];
            $SelectedArr = explode(', ',$selectedList);

            $json['session'][]=[
                'id'        => intval($row['ID']),
                'selected'    => $SelectedArr
            ]; 
        }
    }

    echo json_encode($json);
}else{
    echo "bad request!";
}
?>