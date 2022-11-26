<?php
   include '../header-top.php';
   include '../functions.php';
   echo "<pre>";
       $seansstartdt  = $_GET['start'];
   
       $datetimes = $seansstartdt;
       $date = date('Y-m-d', strtotime($datetimes));
       $seanssaat = date('H:i:s', strtotime($datetimes));
   
       $tckimlik  = $_GET['select2adisoyadi'];
   
       $select2estetisyen= $_GET['select2estetisyen'];
       $select2hizmet    = $_GET['select2hizmet'];
       $seanssayisi     = $_GET['select2seans'];
       $select2sure      = $_GET['select2sure'];
       $fiyat            = $_GET['fiyat'];
       $odeme            = $_GET['odeme'];
       $sempton1         = $_GET['sempton1'];
       $sempton2         = $_GET['sempton2'];
       $sempton3         = $_GET['sempton3'];
       $sempton4         = $_GET['sempton4'];
       $sempton5         = $_GET['sempton5'];
       $sempton6         = $_GET['sempton6'];
       $sempton7         = $_GET['sempton7'];
   
       $gunfarki         = $_GET['gunfarki'];
       $taksitsayisi     = $_GET['taksitsayisi'];
       $odemeturu        = $_GET['odemeturu'];  
   
       $query = $db->query("SELECT COUNT(*) AS COUNT_SEMPTON FROM tbl_sempton")->fetch(PDO::FETCH_ASSOC);
       if ( $query ){
         $semptoncount = $query['COUNT_SEMPTON'];
       }
       $bugun          = date('Y-m-d H:i:s');
   
       // MÜŞTERİ KART EKLEME -- START --
         $durum = 1;
         $query = $db->prepare("INSERT INTO tbl_seans_kart SET
           FIRMA_ID = ?,
           SUBE_ID = ?,
           DURUM = ?,
           MID = ?,
           EST_ID = ?,
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
           $tckimlik,
           $select2estetisyen,
           $select2hizmet,
           $seanssayisi,
           $select2sure,
           $fiyat,
           $odeme,
           $odemeturu,
           $user_ID,
           $bugun
         ));
   
         if ( $insert ){
             $last_id = $db->lastInsertId();
             $kartid = $last_id;
             //Log
             $QfLog = $db->query("SELECT * FROM tbl_seans_kart WHERE ID = '{$kartid}'")->fetch(PDO::FETCH_ASSOC);
             $eski = '';
             $new = $QfLog;
             //logs saved!
             logSQL($user_ID, 'Seans Oluşturma', $eski, $new);
         }else{
           echo "kimlik:error";
         }
       // MÜŞTERİ KART EKLEME -- END --
       
       //MÜŞTERİ DETAY EKLEME -- START --
         $durum = 1;
         if($_GET['sempton1'] == 'on'){
             $semptonvar = "1";
             $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
             $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
             if ( $insert ){ $last_id = $db->lastInsertId();}
             //Log
             $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
             $eski = '';
             $new = $QfLog;
             //logs saved!
             logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
         if($_GET['sempton2'] == 'on'){
             $semptonvar = "2";
             $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
             $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
             if ( $insert ){ $last_id = $db->lastInsertId();}
   
             //Log
             $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
             $eski = '';
             $new = $QfLog;
             //logs saved!
             logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
         if($_GET['sempton3'] == 'on'){
           $semptonvar = "3";
           $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
           $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
           if ( $insert ){ $last_id = $db->lastInsertId();}
   
           //Log
           $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
           $eski = '';
           $new = $QfLog;
           //logs saved!
           logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
         if($_GET['sempton4'] == 'on'){
           $semptonvar = "4";
           $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
           $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
           if ( $insert ){ $last_id = $db->lastInsertId();}
   
           //Log
           $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
           $eski = '';
           $new = $QfLog;
           //logs saved!
           logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
         if($_GET['sempton5'] == 'on'){
           $semptonvar = "5";
           $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
           $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
           if ( $insert ){ $last_id = $db->lastInsertId();}
   
           //Log
           $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
           $eski = '';
           $new = $QfLog;
           //logs saved!
           logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
         if($_GET['sempton6'] == 'on'){
           $semptonvar = "6";
           $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
           $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
           if ( $insert ){ $last_id = $db->lastInsertId();}
   
           //Log
           $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
           $eski = '';
           $new = $QfLog;
           //logs saved!
           logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
         if($_GET['sempton7'] == 'on'){
           $semptonvar = "7";
           $query = $db->prepare("INSERT INTO tbl_musteri_sempton SET FIRMA_ID = ?, SUBE_ID = ?, KART_ID = ?, DURUM = ?, MID = ?, HIZMET_ID = ?, SEMPTON_ID = ?, DT = ? ,USER_ID = ?");
           $insert = $query->execute(array($user_Firma,$user_Sube,$kartid,$durum,$tckimlik,$select2hizmet,$semptonvar,date('Y-m-d H:i:s'),$user_ID));
           if ( $insert ){ $last_id = $db->lastInsertId();}
   
           //Log
           $QfLog = $db->query("SELECT * FROM tbl_musteri_sempton WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
           $eski = '';
           $new = $QfLog;
           //logs saved!
           logSQL($user_ID, 'Sempton Oluşturma', $eski, $new);
         }
       //mMÜŞTERİ DETAY EKLEME -- END --
   
       echo "Toplam Seans: ".$seanssayisi;
       echo "<br>";
       echo 'Toplam Taksit:'.$taksitsayisi;
   
       $seanscut = $seanssayisi;
       echo "<br>";
       //  echo "Seans İntiger: ".$seanscut;
       echo 'fiyat:'.$fiyat;
       echo "<br>";
       echo 'odeme:'.$odeme;
       $kalanodeme = $fiyat - $odeme;
       echo "<br>";
       echo "Kalan Ödeme: ".$kalanodeme;
   
     if($taksitsayisi>1){
       $fiyattaksit = $kalanodeme / number_format($taksitsayisi-1);
       $fiyattaksit = round($fiyattaksit);
       $fiyattaksit = floor($fiyattaksit);
       echo "<br>if e girdiii ".$fiyattaksit;
     }else if ($taksitsayisi==1){
       $fiyattaksit = intval($kalanodeme);
       echo "<br>Else girdi:".$fiyattaksit;
     }
   
     echo "<br>";
     
     $fark = intval($gunfarki);
     $seans = intval($seanscut)-1;
   
     $hesapla = intval($fark) * intval($seans);
   
     $bitis = date('Y-m-d',strtotime($date."+".$hesapla." days"));
   
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
                       $tckimlik,
                       $select2estetisyen,
                       $kartid,
                       $sayi,
                       $date,
                       $seanssaat,
                       $select2sure,
                       $seansdurumSifir,
                       $user_ID
                     ));
             
                     $date = date ("Y-m-d", strtotime("+".$fark." days", strtotime($date)));
                     $sayi++;
                   if ($insert )
                   {
                         $last_id = $db->lastInsertId();
                   }else{ echo "basarisiz"; }
   
                       $counts = $sayi-1;
                       //Log
                       $QfLog = $db->query("SELECT * FROM tbl_seans_detay WHERE ID = '{$last_id}' AND SEANS_ID = '{$counts}'")->fetch(PDO::FETCH_ASSOC);
                       $eski = '';
                       $new = $QfLog;
                       //logs saved!
                       logSQL($user_ID, 'Seanslar Oluşturma', $eski, $new);
   
                 }
               }
   
   $tahsilatDurum = 1;
   $taksitidbir = 1;
   $tahsilatdurumiki = 2;
   $date = date('Y-m-d', strtotime($datetimes));
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
                           $tckimlik,
                           $kartid,
                           $taksitidbir,
                           $date,
                           $tahsilatdurumiki,
                           $odemeturu,
                           $odeme,
                           $kullaniciadi
                     ));
             
                   if ($insert )
                   {
                         $last_id = $db->lastInsertId();
                   }
   
       $QfLog = $db->query("SELECT * FROM tbl_seans_taksit WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);
   
       $eski = '';
       $yeni = $QfLog;
   
       //logs saved!
       logSQL($user_ID, 'Tahsilat Oluşturma', $eski, $yeni);
   
  //ilk taksit ekle
  $durumsifir = 0;
  if($taksitsayisi>2){
    $vade = 30*($taksitsayisi-2);
  }else if($taksitsayisi==2){
    $vade = 30*($taksitsayisi-2);
  }
  $bitis = date('Y-m-d',strtotime(date('Y-m-d', strtotime($datetimes))."+".$vade." days"));
    for($sayiT = 2; $sayiT <= $taksitsayisi; $sayiT++){
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
            $tckimlik,
            $date,
            $durumsifir,
            $odemeturu,
            $fiyattaksit,
            $kullaniciadi
          ));

        $sayiT++;

        $last_id = $db->lastInsertId();

        $QfLog = $db->query("SELECT * FROM tbl_seans_taksit WHERE ID = '{$last_id}'")->fetch(PDO::FETCH_ASSOC);

        //echo "SELECT * FROM tbl_seans_taksit WHERE ID = '{$last_id}'";

        $eski = '';
        $yeni = $QfLog;

        //logs saved!
        logSQL($user_ID, 'Tahsilatlar Oluşturma', $eski, $yeni);

      }
      if ($insert1 ){ $last_id = $db->lastInsertId(); }else{ echo "basarisiz"; }
    
      $QTaksitToplam = $db->query("SELECT SUM(FIYAT) AS TOPLAM FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}'")->fetch(PDO::FETCH_ASSOC);
      
      $QsonTaksitKontrol = $db->query("SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$kartid}' and TAKSIT_ID = '{$taksitsayisi}'")->fetch(PDO::FETCH_ASSOC);
      
      $QTaksitToplam['TOPLAM'];
        if($fiyat!==$QTaksitToplam['TOPLAM']){
          $acik = $QTaksitToplam['TOPLAM']-$fiyat;
          $cikar = $QsonTaksitKontrol['FIYAT']-$acik;
          $QsonTaksitKontrol = $db->query("UPDATE tbl_seans_taksit SET FIYAT = '$cikar' WHERE KART_ID = '{$kartid}' and TAKSIT_ID = '{$taksitsayisi}'")->fetch(PDO::FETCH_ASSOC);
        }
    }
   
     ?>