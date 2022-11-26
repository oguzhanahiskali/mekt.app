<?php
include '../../header-top.php';


if(!empty($_POST['verify']) && $_POST['verify']=='true'){

    $sql = "SELECT * FROM tbl_personel WHERE USERSTATUS = 1 AND DURUM = 1 AND TUR = 1 AND FIRMA_ID = '$user_Firma'";

    $result = $mysqli->query($sql);
    
    $json = [];
    while($row = $result->fetch_assoc()){
        $json[]=[ 'id'=>$row['ID'], 'name'=>$row['ADI'].' '.$row['SOYADI'] ]; 
    }
    echo json_encode($json);
}else{
    echo "bad request!";
}
?>