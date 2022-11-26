<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$json = [];

$id = $_POST['dataEkleID'];

// if($staffMission==1){
  if ($_POST['dataEkleID'] && $_POST['dataEkleSeansNumber'] && $_POST['dataEkleSeansFark'] )
  {

    $query = $db->query('SELECT datediff((SELECT * FROM view_seans_ekle_sontarih),(SELECT * FROM view_seans_ekle_oncekitarih)) AS FARK;')->fetch(PDO::FETCH_ASSOC);
    $seFark = $query['FARK'];

    $query = $db->query("SELECT * FROM tbl_seans_detay WHERE KART_ID = '$id' AND SEANS_ID = (SELECT MAX(SEANS_ID) FROM tbl_seans_detay WHERE KART_ID='$id')")->fetch(PDO::FETCH_ASSOC);
    $seSEANS_FIRMA  = $user_Firma;
    $seSEANS_SUBE   = $user_Sube;
    $seDURUM        = 0;
    $seSEANS_TC     = $_POST['dataEkleKullanici'];;
    $seSEANS_KARTID = $id;
    $seSEANS_DURUM  = 0;
    $seanscut       = $_POST['dataEkleSeansNumber'];
    $seansFark       = $_POST['dataEkleSeansFark'];
    $estID       = $_POST['dataEkleHastaID'];

    if($query){
      $seRESOURCE_IDLast = $query['RESOURCE_ID'];
      $seSEANS_IDLast = $query['SEANS_ID'];
      $seSEANS_TARIH  = $query['SEANS_TARIH'];
      $seSEANS_SAAT   = $query['SEANS_SAAT'];
      $seSEANS_SURE   = $query['SEANS_SURE'];
    }else{
      $seRESOURCE_IDLast = null;
      $seSEANS_IDLast = 0;
      $seSEANS_TARIH  = date('Y-m-d');
      $seSEANS_SAAT   = date('H:i:s');
      $seSEANS_SURE   = null;
    }

    $date = $seSEANS_TARIH;
    $date = explode('-', $date);
    $year = $date[0];
    $month = $date[1];
    $day  = $date[2];

    $fark = intval($seansFark);
    $seans = intval($seanscut)-1;
    $hesapla = intval($fark) * intval($seans);

    $date = date("$year-$month-$day");
    $bitis = date ("Y-m-d", strtotime("+".$hesapla." days", strtotime($date)));

    $islemtarih = date('Y-m-d H:i:s');
    $durumbir = 1;
    for($sayi = 0; $sayi < $seanscut; $sayi++)
    {
      while (strtotime($date) <= strtotime($bitis))
      {
          $date = date ("Y-m-d", strtotime("+".$fark." days", strtotime($date))); // tarihi arttır

          $query = $db->prepare("INSERT INTO tbl_seans_detay SET
              FIRMA_ID = ?,
              SUBE_ID = ?,
              DURUM = ?,
              MID = ?,
              EST_ID = ?,
              KART_ID = ?,
              SEANS_ID = ?,
              RESOURCE_ID = ?,
              SEANS_TARIH = ?,
              SEANS_SAAT = ?,
              SEANS_SURE = ?,
              SEANS_DURUM = ?,
              ISLEM_TARIHI = ?,
              UID = ?
          ");

          $insert = $query->execute(array(
          $seSEANS_FIRMA,
          $seSEANS_SUBE,
          $durumbir,
          $seSEANS_TC,
          $estID,
          $seSEANS_KARTID,
          $seSEANS_IDLast+$sayi+1,
          $seRESOURCE_IDLast,
          $date,
          $seSEANS_SAAT,
          $seSEANS_SURE,
          $seSEANS_DURUM,
          $islemtarih,
          $user_ID
          ));
          $sayi++;


          // if ($insert ){
          //   $last_id = $db->lastInsertId();
          // }else{
          //   echo "basarisiz";
          // }
      }
    }
    if($insert){
      $json=['code'=> 1000, 'status' => true];
    }else{
      $json=['code'=> 1001, 'status' => false];
    }
  }else{
    $json=['code'=> 1012, 'status' => false];
  }
// }else{
//   $json=['code'=> 9999];
// }
echo json_encode($json);
?>