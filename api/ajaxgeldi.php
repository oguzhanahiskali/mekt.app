<?php
include '../header-top.php';
include '../functions.php';
/*
$arrays = $_GET['hizmetBolgesi'];
print_r(json_encode($arrays));
*/

    $roomSel          = $_GET['odaSecimi'];
    $patientID        = $_GET['select2adisoyadi'];
    $estheticianID    = $_GET['select2estetisyen'];
    $serviceID        = $_GET['select2hizmet'];
    $appAreaArr       = $_GET['hizmetBolgesi'];
    $appArea          = implode(", ",array_values($appAreaArr));
    $numbOfSession    = $_GET['select2seans'];
    $sessionDuration  = $_GET['select2sure'];
    $dayDiff          = $_GET['gunfarki'];
    $price            = $_GET['fiyat'];
    $maturityNumb     = $_GET['taksitsayisi'];
    $paymentType      = $_GET['odemeturu'];
    $paymentReceived  = $_GET['odeme'];
    $sessionStartTime = $_GET['start'];

    $maturityNumb = $maturityNumb-1;

    //ESTETİSYEN id to name
    $Qinttostr = $db->query("SELECT * FROM tbl_personel WHERE ID= '$estheticianID' AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
    $EstheticianName = $Qinttostr['ADI'].' '.$Qinttostr['SOYADI'];

    //HIZMETADI id to name
    $Qinttostr = $db->query("SELECT * FROM tbl_hizmet WHERE ID= '$serviceID' AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
    $serviceName = $Qinttostr['HIZMET_ADI'];

    //SURE id to name
    $Qinttostr = $db->query("SELECT * FROM tbl_hizmet_sure WHERE ID= '$sessionDuration'")->fetch(PDO::FETCH_ASSOC);
    $sessionDurationName = $Qinttostr['ADI'];

    //SEANS id to name
    $Qinttostr = $db->query("SELECT * FROM tbl_hizmet_seans WHERE ID= '$numbOfSession'")->fetch(PDO::FETCH_ASSOC);
    $numbOfSessionName = $Qinttostr['ADI'];


    $today = date('Y-m-d H:i:s');

    //MÜŞTERİ KİMLİK EKLEME
    $durum = 1;
    $query = $db->prepare("INSERT INTO tbl_seans_kart SET
      FIRMA_ID = ?,
      SUBE_ID = ?,
      DURUM = ?,
      MID = ?,
      EST_ID = ?,
      ESTETISYEN_ID = ?,
      HIZMET_ID = ?,
      SEANS_ID = ?,
      SURE_ID = ?,
      FIYAT = ?,
      ODEME = ?,
      TAHSILAT_TIPI = ?,
      UID = ?,
      DT = ?
    ");

    $insert = $query->execute(array(
      $user_Firma,
      $user_Sube,
      $durum,
      $patientID,
      $estheticianID,
      $EstheticianName,
      $serviceName,
      $numbOfSessionName,
      $sessionDurationName,
      $price,
      $paymentReceived,
      $paymentReceivedturu,
      $user_ID,
      $today
    ));

    if ( $insert ){
        $last_id = $db->lastInsertId();
        $kartid = $last_id;
    }else{
      echo "kimlik:error";
    }
//MÜŞTERİ DETAY EKLEME
 
//seanslar

  $seanssayisi = $numbOfSession;
//    echo "Toplam Seans: ".$seanssayisi;
  $seanscut = kelimeden_kes($seanssayisi,1);
//  echo "<br>";
  
//  echo "Seans İntiger: ".$seanscut;
  $kalanodeme = $price - $paymentReceived;
//  echo "<br>";
  
//  echo "Kalan Ödeme: ".$kalanodeme;
    
    $pricetaksit = intval($kalanodeme) / intval($maturityNumb);
//  echo "<br>";
  
//  echo "Fiyatta Taksit: ".$pricetaksit.' = '.$kalanodeme.' / '.$maturityNumb;
///  echo "<br>";


  $date = date("Y-m-d");

  $fark = intval($dayDiff);
  $seans = intval($seanscut)-1;
  $hesapla = intval($fark) * intval($seans);

  $bitis = date('Y-m-d',strtotime("+".$hesapla." days"));
  $seansdurumSifir = 0;

  $durumbir = 1;
          for($sayi = 1; $sayi <= $seanscut; $sayi++)
          {

              while (strtotime($date) <= strtotime($bitis))
              {
                  $query = $db->prepare("INSERT INTO tbl_seans_detay SET
                    FIRMA_ID = ?,
                    SUBE_ID = ?,
                    DURUM = ?,
                    MID = ?,
                    EST_ID = ?,
                    KART_ID = ?,
                    SEANS_ID = ?,
                    SEANS_TARIH = ?,
                    SEANS_SAAT = ?,
                    SEANS_SURE = ?,
                    SEANS_DURUM = ?,
                    UID = ?
                  ");

                  $insert = $query->execute(array(
                    $user_Firma,
                    $user_Sube,
                    $durumbir,
                    $patientID,
                    $estheticianID,
                    $kartid,
                    $sayi,
                    $date,
                    $sessionStartTime,
                    $sessionDurationName,
                    $seansdurumSifir,
                    $user_ID
                  ));
          
                  $date = date ("Y-m-d", strtotime("+".$fark." days", strtotime($date)));
                  $sayi++;
                if ($insert )
                {
                      $last_id = $db->lastInsertId();
                }else{ echo "basarisiz"; }

              }
            }
$taksitID = 1;
$tahsilatDurum = 1;
$taksitidbir = 1;
$tahsilatdurumiki = 2;
$date = date("Y-m-d");
//ilk taksit ekle //
$query = $db->prepare("INSERT INTO tbl_seans_taksit SET
                        FIRMA_ID = ?,
                        SUBE_ID = ?,
                        DURUM = ?,
                        MID = ?,
                        KART_ID = ?,
                        TAKSIT_ID = ?,
                        TAKSIT_TARIHI = ?,
                        TAHSILAT_DURUM = ?,
                        TAHSILAT_TIPI = ?,
                        FIYAT = ?,
                        UID = ?
                  ");

                  $insert = $query->execute(array(
                        $user_Firma,
                        $user_Sube,
                        $tahsilatDurum,
                        $patientID,
                        $kartid,
                        $taksitidbir,
                        $date,
                        $tahsilatdurumiki,
                        $paymentReceivedturu,
                        $paymentReceived,
                        $user_ID
                  ));
          
                if ($insert )
                {
                      $last_id = $db->lastInsertId();
                }
//ilk taksit ekle
$durumsifir = 0;

$vade = 30*($maturityNumb-1);
$bitis = date('Y-m-d',strtotime("+".$vade." days"));
  for($sayiT = 2; $sayiT < $maturityNumb+1; $sayiT++)
            {
              while (strtotime($date) <= strtotime($bitis))
              {
                  $date = date ("Y-m-d", strtotime("+30 days", strtotime($date)));

                      $query1 = $db->prepare("INSERT INTO tbl_seans_taksit SET
                        FIRMA_ID = ?,
                        SUBE_ID = ?,
                        DURUM = ?,
                        KART_ID = ?,
                        TAKSIT_ID = ?,
                        MID = ?,
                        TAKSIT_TARIHI = ?,
                        TAHSILAT_DURUM = ?,
                        TAHSILAT_TIPI = ?,
                        FIYAT = ?,
                        UID = ?
                      ");

                      $insert1 = $query1->execute(array(
                        $user_Firma,
                        $user_Sube,
                        $tahsilatDurum,
                        $kartid,
                        $sayiT,
                        $patientID,
                        $date,
                        $durumsifir,
                        $paymentReceivedturu,
                        $pricetaksit,
                        $user_ID
                      ));

                  $sayiT++;
              }
                  if ($insert1 ){ $last_id = $db->lastInsertId();}else{ echo "basarisiz"; }
            }

  ?>