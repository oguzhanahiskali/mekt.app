<?php

     include '../header-top.php';

     //echo "<pre>";
     //print_r($_GET);
    //get check
    //$tahsilattarih   = date('Y-m-d', strtotime($_GET['inp-tahsilat-tarih']));
    $tahsilattarih = date("Y-m-d");
    $tahsilatfiyat   = $_GET['inp-tahsilat-fiyat'];
    $gerekliTaksitMiktari   = $_GET['inp-gtm'];
    $tahsilattipi    = $_GET['inp-tahsilat-form-tipi'];
    $tahsilatdurum   = $_GET['inp-tahsilat-form-durum'];
    $ids             = $_GET['taksitid'];
    $kartid          = $_GET['kartid'];

    echo "<pre>";
    echo "İşlem yapılan taksit ID: ".$ids."<br>";
    $result = "";

    $QueryduplicateCheck = "SELECT FIYAT FROM tbl_seans_taksit WHERE ID = '{$ids}' AND DURUM = 1";
    $QduplicateCheck = $db->query($QueryduplicateCheck)->fetch(PDO::FETCH_ASSOC);

     if($QduplicateCheck['FIYAT']==$tahsilatfiyat && $tahsilattipi==2){
          echo "basarili x";
          $qq = "UPDATE
                    tbl_seans_taksit SET
                    TAKSIT_TARIHI= '$tahsilattarih',
                    TAHSILAT_DURUM= 2,
                    TAHSILAT_TIPI = $tahsilattipi
                    WHERE ID      = $ids
                    AND KART_ID   = $kartid
                    AND FIRMA_ID  = $user_Firma";
                    echo $qq;
                    $query= $db->prepare($qq);
                    $update = $query->execute();
                    if($update){ echo "basarili"; }else{ echo "hata"; }
     }else{
          $sonrakiTaksit = $_GET['taksitid']+1;
          $QkalanTaksit = $db->query("SELECT SUM(FIYAT) AS KALAN FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' AND DURUM = 1")->fetch(PDO::FETCH_ASSOC);
          $kalanToplam = $QkalanTaksit['KALAN'];
     
          if($tahsilatdurum==2){
               if($tahsilatfiyat>$gerekliTaksitMiktari){ // Fazla Ödeme Yapıldı.
                    //echo "fazla ödeme yapıldı";
                    $QfLog = $db->query("SELECT * FROM tbl_seans_taksit WHERE ID = '{$sonrakiTaksit}'")->fetch(PDO::FETCH_ASSOC);
                    
                    if($tahsilatfiyat==$kalanToplam){
     
                         $query    = $db->prepare("UPDATE
                                                  tbl_seans_taksit SET
                                                  TAKSIT_TARIHI='$tahsilattarih',
                                                  TAHSILAT_DURUM= 2,
                                                  TAHSILAT_TIPI = $tahsilattipi,
                                                  FIYAT = $tahsilatfiyat
                                                  WHERE ID  = $ids AND
                                                  KART_ID   = $kartid AND
                                                  FIRMA_ID  = $user_Firma");
     
                         $update   = $query->execute();
     
                         $QodenmeyenTaksitler = $db->query("SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' AND TAHSILAT_DURUM <> 2", PDO::FETCH_ASSOC);
     
                         $odenmeyenTaksitler  = array();
                         if ( $QodenmeyenTaksitler->rowCount() ){ foreach( $QodenmeyenTaksitler as $row ){ $odenmeyenTaksitler[] = $row['ID']; } }
     
                         foreach ($odenmeyenTaksitler as $key => $value) {
                              $query        = $db->prepare("UPDATE
                              tbl_seans_taksit SET
                              TAHSILAT_DURUM= 2,
                              TAHSILAT_TIPI = $tahsilattipi,
                              FIYAT         = 0
                              WHERE ID      = $value
                              AND KART_ID   = $kartid
                              AND FIRMA_ID  = $user_Firma");
                              
                              $update = $query->execute();
                              if($update){ $result = "basarili"; }else{ echo "hata"; }
                         }
                         
                    }else{
                         echo "burada";
                         $BuTaksitkalanOdeme = $tahsilatfiyat-$gerekliTaksitMiktari;
                         $islemSonuKalan = $kalanToplam - $tahsilatfiyat;
                         
                         $QodenmeyenTaksitler = $db->query("SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' AND TAHSILAT_DURUM <> 2", PDO::FETCH_ASSOC);
                         $odenmeyenTaksitler  = array();
                         $odenmeyenTaksitToplam  = array();
                         if ( $QodenmeyenTaksitler->rowCount() ){
                              foreach( $QodenmeyenTaksitler as $row ){
                                   $odenmeyenTaksitler[] = $row['ID'];
                                   $odenmeyenTaksitToplam[] = $row['FIYAT'];
                              }
                         }
     
                         $kalanToplam = array_sum($odenmeyenTaksitToplam);
                         $ToplamKalanTaksitBol = $islemSonuKalan / (count($odenmeyenTaksitToplam)-1);
                         echo $ToplamKalanTaksitBol;
     
                         $query    = $db->prepare("UPDATE
                         tbl_seans_taksit SET
                         TAKSIT_TARIHI='$tahsilattarih',
                         TAHSILAT_DURUM= 2,
                         TAHSILAT_TIPI = $tahsilattipi,
                         FIYAT = $tahsilatfiyat
                         WHERE ID  = $ids AND
                         KART_ID   = $kartid AND
                         FIRMA_ID  = $user_Firma");
     
                         $update   = $query->execute();
                         
                         foreach ($odenmeyenTaksitler as $key => $value) {
                              if(($key == array_search($ids, $odenmeyenTaksitler)) !== false){
                                   unset($odenmeyenTaksitler[$key]);
                              }
                         }
                         foreach ($odenmeyenTaksitler as $key => $value) {
                              $query        = $db->prepare("UPDATE
                              tbl_seans_taksit SET
                              TAHSILAT_DURUM= 0,
                              TAHSILAT_TIPI = $tahsilattipi,
                              FIYAT         = $ToplamKalanTaksitBol
                              WHERE ID      = $value
                              AND KART_ID   = $kartid
                              AND FIRMA_ID  = $user_Firma");
     
                              $update = $query->execute();
                              if($update){ echo "2basarili"; }else{ echo "hata"; }
                         }
                         
                    }
               }else if($tahsilatfiyat<$gerekliTaksitMiktari){ // Az Ödeme Yapıldı.
                    echo "Az Ödeme Yapıldı.<br>";
                    $BuTaksitkalanOdeme = $gerekliTaksitMiktari-$tahsilatfiyat;
                    $islemSonuKalan = $kalanToplam-$tahsilatfiyat;

                    echo "bu taksit kalan ödeme: ".$BuTaksitkalanOdeme."<br>";
                    echo "Hizmet Toplam Fiyatı: ".$kalanToplam."<br>";
                    echo "Tahsilat Fiyat: ".$tahsilatfiyat."<br>";

                    $QtaksitlastID = "SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' AND TAHSILAT_DURUM <> 2 ORDER BY ID DESC LIMIT 1";
                    //echo $QtaksitlastID;
                    $QueryTaksitLastID = $db->query($QtaksitlastID, PDO::FETCH_ASSOC);
                    if($QueryTaksitLastID->rowCount()){
                         foreach($QueryTaksitLastID as $row){
                              $odenemyenSonTaksit = $row['ID'];
                              $odenmeyenSonTakisitNr = $row['TAKSIT_ID']+1;
                              $odenmeyenSonTaksitFiyat = $row['FIYAT'];
                              $odenmeyeSonTaksitTarihi = $row['TAKSIT_TARIHI'];
                              $odenmeyeSonTaksitMID = $row['MID'];
                         }
                    }
                    $QtaksitlastIDMr = "SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' ORDER BY ID DESC LIMIT 1";
                    $QueryTaksitLastIDmr = $db->query($QtaksitlastIDMr, PDO::FETCH_ASSOC);
                    if($QueryTaksitLastIDmr->rowCount()){
                         foreach($QueryTaksitLastIDmr as $row){
                              $odenemyenSonTaksitMirrorCheck = $row['ID'];
                              $odenmeyeSonTakistt = $row['TAKSIT_ID'];
                         }
                    }
                    /*
                     * Ödeme yapılan taksit son taksit değilse,
                     * ID karşılaştır, son taksitin ID'sini al
                     */
                    echo "<br>".$odenemyenSonTaksit."<br>";
                    echo "<br>".$odenemyenSonTaksitMirrorCheck."<br>";
                    if($odenemyenSonTaksit !== $odenemyenSonTaksitMirrorCheck ){
                         $odenmeyenSonTakisitNr = $odenmeyenSonTakisitNr+1;
                    }else{
                         echo "<br>eşit<br>";
                    }
                    if($ids==$odenemyenSonTaksit){

                         $QkalanTaksit = $db->query("SELECT HIZMET_FIYATI - TOPLAM_ALINAN AS KALAN_ODEME FROM view_PaymentRepair WHERE KART_ID = '{$kartid}'")->fetch(PDO::FETCH_ASSOC);
                         $ToplamKalanBorc = $QkalanTaksit['KALAN_ODEME'];

                         echo "Bu Son taksit olduğu için gerekli ödemeden az olamaz!";
                         echo "Ödenmeyen Son Taksit Ödeme Miktarı: ".$odenmeyenSonTaksitFiyat."<br>";
                         echo "Şuanda Ödenen Ödeme Miktarı: ".$tahsilatfiyat."<br>";
                         $yeniTaksitFiyat = $odenmeyenSonTaksitFiyat - $tahsilatfiyat;

                         $ToplamKalanBorc = $ToplamKalanBorc + $yeniTaksitFiyat;

                         echo "Son taksitten kalan ödenen miktar kalan: ".$ToplamKalanBorc."<br>";
                         //$YeniTakistID = $odenmeyenSonTakisitNr+1;
                         $YeniSonrakiTaksitTarihi = date('Y-m-d', strtotime($odenmeyeSonTaksitTarihi. ' +30 days'));

                         $qqqq = "INSERT INTO tbl_seans_taksit SET
                         FIRMA_ID = $user_Firma,
                         SUBE_ID = $user_Sube,
                         DURUM = '1',
                         MID = $odenmeyeSonTaksitMID,
                         KART_ID = $kartid,
                         TAKSIT_ID = $odenmeyeSonTakistt+1,
                         TAKSIT_TARIHI = '$YeniSonrakiTaksitTarihi',
                         TAHSILAT_DURUM = '0',
                         TAHSILAT_TIPI = $tahsilattipi,
                         FIYAT = $ToplamKalanBorc,
                         UID = $user_ID";
                         echo $qqqq;

                         $query = $db->prepare($qqqq);

                         $insert = $query->execute();
                    
                         if ($insert ){
                              echo "Taksit kaldığı için yeni taksit eklendi.";
                         }else{
                              echo "yeni taksit eklenemedi";
                         }
                    }
                    
                    $QodenmeyenTaksitler = $db->query("SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' AND TAHSILAT_DURUM <> 2", PDO::FETCH_ASSOC);
                    $odenmeyenTaksitler  = array();
                    $odenmeyenTaksitToplam  = array();
                    if ( $QodenmeyenTaksitler->rowCount() ){
                         foreach( $QodenmeyenTaksitler as $row ){
                              $odenmeyenTaksitler[] = $row['ID'];
                              $odenmeyenTaksitToplam[] = $row['FIYAT'];
                              echo "<br>Ödenmeyen Takist ID array'e eklendi: ".$row['ID'];
                              echo "<br>Ödenmeyen Taksit Toplamı Array'e eklendi: ".$row['FIYAT'];
                         }
                    }
                    echo "<br>";
                    print_r($odenmeyenTaksitler);
                    echo "<br>";
                    foreach ($odenmeyenTaksitler as $key => $value) {
                         if(($key == array_search($ids, $odenmeyenTaksitler)) !== false){
                              echo "1<br>";
                              unset($odenmeyenTaksitler[$key]);
                         }
                         if(($key == array_search($ids, $odenmeyenTaksitToplam)) !== false){
                              echo "2<br>";
                              unset($odenmeyenTaksitToplam[$key]);
                         }
                         if(($key == array_search($ids, $odenmeyenTaksitler)) !== false){
                              echo "$key == array_search($ids,"; print_r($odenmeyenTaksitler).") !== false<br>";
                              echo "işlem Sonu Kalan: ".$islemSonuKalan."<br>";
                              echo "Ödenmeyen Toplam Taksit: </br>";
                              print_r($odenmeyenTaksitToplam);
                              echo "<br>";
                              echo 'Count Ödenmeyen Taksit Toplamı: '.count($odenmeyenTaksitToplam)."<br>";
                              $ToplamKalanTaksitBol = $islemSonuKalan / count($odenmeyenTaksitToplam);
                         }else{
                              echo "4";
                              $ToplamKalanTaksitBol = $islemSonuKalan / count($odenmeyenTaksitToplam);
                         }
                    }
     
                    $kalanToplam = array_sum($odenmeyenTaksitToplam);
                    echo "Toplam Kalan:".$kalanToplam."<br>";
                    echo "bölünecek: "; print_r(count($odenmeyenTaksitToplam)-2)."<br>";
                    $ToplamKalanTaksitBol = $kalanToplam / (count($odenmeyenTaksitToplam)-2);
                    $query    = $db->prepare("UPDATE
                                             tbl_seans_taksit SET
                                             TAKSIT_TARIHI='$tahsilattarih',
                                             TAHSILAT_DURUM= 2,
                                             TAHSILAT_TIPI = $tahsilattipi,
                                             FIYAT = $tahsilatfiyat
                                             WHERE ID  = $ids AND
                                             KART_ID   = $kartid AND
                                             FIRMA_ID  = $user_Firma");
                    //$update   = $query->execute();
     
                    foreach ($odenmeyenTaksitler as $key => $value) {
                         echo "<br>xx:".$ToplamKalanTaksitBol."<br>";
                         /*
                         $query        = $db->prepare("UPDATE
                         tbl_seans_taksit SET
                         TAHSILAT_DURUM= 0,
                         TAHSILAT_TIPI = $tahsilattipi,
                         FIYAT         = $ToplamKalanTaksitBol
                         WHERE ID      = $value
                         AND KART_ID   = $kartid
                         AND FIRMA_ID  = $user_Firma");
                         //$update = $query->execute();
                         if($update){ echo "1basarili"; }else{ echo "hata"; }*/
                    }
     
               }else{ // Gerekli ödeme yapıldı.
                    echo "Gerekli ödeme yapıldı.";

                    $qq = "UPDATE
                    tbl_seans_taksit SET
                    TAKSIT_TARIHI= '$tahsilattarih',
                    TAHSILAT_DURUM= 2,
                    TAHSILAT_TIPI = $tahsilattipi
                    WHERE ID      = $ids
                    AND KART_ID   = $kartid
                    AND FIRMA_ID  = $user_Firma";
                    echo $qq;
                    $query= $db->prepare($qq);
                    $update = $query->execute();
                    if($update){ echo "basarili"; }else{ echo "hata"; }
                    
               }
          }else if($tahsilatdurum==1){ // tahsilat iptal
               $query        = $db->prepare("UPDATE tbl_seans_taksit SET
                              TAHSILAT_DURUM= ?,
                              TAHSILAT_TIPI = ?
                              WHERE ID      = $ids
                              AND KART_ID   = $kartid
                              AND FIRMA_ID  = $user_Firma");
                              
                              $update = $query->execute(array(1,$tahsilattipi));
                              if($update){
                                   echo "basarili";
                              }else{
                                   echo "hata";
                              }
          }else if($tahsilatdurum==0){ // tahilsat ödenmedi
               $query        = $db->prepare("UPDATE tbl_seans_taksit SET
                              TAHSILAT_DURUM= ?,
                              TAHSILAT_TIPI = ?
                              WHERE ID      = $ids
                              AND KART_ID   = $kartid
                              AND FIRMA_ID  = $user_Firma");
                              
                              $update = $query->execute(array(0,$tahsilattipi));
                              if($update){
                                   echo "basarili";
                              }else{
                                   echo "hata";
                              }
          }
     
         //Query for Log
         $QfLog = $db->query("SELECT TAKSIT_TARIHI, TAHSILAT_DURUM, TAHSILAT_TIPI FROM tbl_seans_taksit WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
         
         //old value arrays in push
         $old = $QfLog;
     
         //new value control
         $QfLog = $db->query("SELECT TAKSIT_TARIHI, TAHSILAT_DURUM, TAHSILAT_TIPI FROM tbl_seans_taksit WHERE ID = '{$ids}'")->fetch(PDO::FETCH_ASSOC);
     
         //new value arrays in push
         $new = $QfLog;
     
     
         $eski = array_diff_assoc($old, $new); //old and new value diffrents
         $yeni = array_diff_assoc($new, $old); //new and old value diffrents
     
         //logs saved!
         logSQL($user_ID, 'Tahsilat Güncelleme', $eski, $yeni);
     
         //if update successfull: basarili 
         /*
         if ( $update ){
              echo $result;
         }*/
     }

  ?>
