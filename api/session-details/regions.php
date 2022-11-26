<?php
include('../../header-top.php');

$json = [];

if(!empty($_POST['CID'])){

    $cid = $_POST['CID'];

    $sql = "SELECT ID, AREA FROM view_regions_id";
    $result = $mysqli->query($sql);

    $selectedRegions = $db->query("SELECT BOLGE_ID FROM tbl_seans_kart WHERE ID = '{$cid}' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
    if ( $selectedRegions ){
        // $selectedList = $selectedRegions['BOLGE_ID'];
        // $SelectedArr = explode(', ',$selectedList);
        $SelectedArr = explode(',', $selectedRegions['BOLGE_ID'] ?? '');
    }

    while($row = $result->fetch_assoc()){
        $json['allRegions'][]=[
            'id'        => $row['ID'],
            'text'    => $row['AREA']
        ]; 

        if ( $selectedRegions ){
   
            foreach ($SelectedArr as $key => $value) {
                if(intval($row['ID'])==$value){
                    $json['Selected'][]=[
                        'id'   => intval($row['ID']),
                        'text'    => $row['AREA']
                    ];
                }
            }
        }
    }
}else{
   $json['Results'][]=[
      'id'   => 'Bad request!'
  ];
}

echo json_encode($json);

?>