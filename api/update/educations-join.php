<?php

include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$myArray = array();
$joinAll = [];
// print_r($_POST);

$joinGroupID = null;
$multipleSirketler = null;
$multipleKisiler = null;
$bugun      = date('Y-m-d H:i:s');

if($_POST['joinGroup']){
  
  $joinGroupID = $_POST['joinGroup'];
  
    $query = $db->query("SELECT * FROM tbl_egitim_grup_join WHERE GRUP_ID = '{$joinGroupID}' AND JOIN_STATUS = 1", PDO::FETCH_ASSOC);
    if ( $query->rowCount() ){
      foreach( $query as $row ){ $joinAll[] = $row['JOIN_ID']; }
    }
    $db->exec("DELETE FROM tbl_egitim_grup_join WHERE GRUP_ID = $joinGroupID");

    if(isset($_POST['multipleKisiler'])){
      $multipleKisiler = $_POST['multipleKisiler'];
      // print_r($multipleKisiler);
    }
    if(isset($_POST['multipleSirketler'])){
      $multipleSirketler = $_POST['multipleSirketler'];
      // print_r($multipleSirketler);
    }

    if($multipleKisiler==null && $multipleSirketler==null){

      $myArray[] = [
        'status'=> true
      ];
    }else{
      if($multipleSirketler!=null && $multipleKisiler==null){

        $myArray[] = [
          'status'=> true,
          'joinGroupID'=> intval($joinGroupID),
          'multipleSirketler'=> $multipleSirketler,
          'multipleKisiler'=> false
        ];
        foreach ($multipleSirketler as $v) {
          $status = null;
          if(in_array($v, $joinAll)){
            $status = 1;
          }else{
            $status = 0;
          }

          $query = $db->prepare("INSERT INTO tbl_egitim_grup_join SET
              GRUP_ID = ?,
              JOIN_TYPE = ?,
              JOIN_ID = ?,
              INVITATION_STATUS = ?,
              JOIN_STATUS = ?,
              STATUS = ?,
              DT = ?");

          $update = $query->execute(array(
              $joinGroupID,
              'sirket',
              $v,
              '1',
              $status,
              '1',
              $bugun
          ));
        }


      }else if($multipleKisiler!=null && $multipleSirketler==null){

        $myArray[] = [
          'status'=> true,
          'joinGroupID'=> intval($joinGroupID),
          'multipleSirketler'=> false,
          'multipleKisiler'=> $multipleKisiler
        ];

        foreach ($multipleKisiler as $v) {

          $status = null;
          if(in_array($v, $joinAll)){
            $status = 1;
          }else{
            $status = 0;
          }

          $query = $db->prepare("INSERT INTO tbl_egitim_grup_join SET
              GRUP_ID = ?,
              JOIN_TYPE = ?,
              JOIN_ID = ?,
              INVITATION_STATUS = ?,
              JOIN_STATUS = ?,
              STATUS = ?,
              DT = ?");

          $update = $query->execute(array(
              $joinGroupID,
              'vatandas',
              $v,
              '1',
              $status,
              '1',
              $bugun
          ));
        }


      }else{
        $myArray[] = [
          'status'=> true,
          'joinGroupID'=> intval($joinGroupID),
          'multipleSirketler'=> $multipleSirketler,
          'multipleKisiler'=> $multipleKisiler
        ];


        foreach ($multipleKisiler as $v) {

          $status = null;
          if(in_array($v, $joinAll)){
            $status = 1;
          }else{
            $status = 0;
          }

          $query = $db->prepare("INSERT INTO tbl_egitim_grup_join SET
              GRUP_ID = ?,
              JOIN_TYPE = ?,
              JOIN_ID = ?,
              INVITATION_STATUS = ?,
              JOIN_STATUS = ?,
              STATUS = ?,
              DT = ?");

          $update = $query->execute(array(
              $joinGroupID,
              'vatandas',
              $v,
              '1',
              $status,
              '1',
              $bugun
          ));
        }

        foreach ($multipleSirketler as $v) {

          $status = null;
          if(in_array($v, $joinAll)){
            $status = 1;
          }else{
            $status = 0;
          }

          $query = $db->prepare("INSERT INTO tbl_egitim_grup_join SET
              GRUP_ID = ?,
              JOIN_TYPE = ?,
              JOIN_ID = ?,
              INVITATION_STATUS = ?,
              JOIN_STATUS = ?,
              STATUS = ?,
              DT = ?");

          $update = $query->execute(array(
              $joinGroupID,
              'sirket',
              $v,
              '1',
              $status,
              '1',
              $bugun
          ));
        }
      }
    }
}


echo json_encode($myArray);
