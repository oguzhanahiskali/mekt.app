<?php

ob_start();
/*
error_reporting(E_ALL);
ini_set("display_errors", 1);
*/
include '../conf.php';
include '../functions.php';
require_once "../mail/PHPMailerAutoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.yandex.com';
$mail->Port = 587;
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet ="utf-8";
$mail->Username = "noreply@estetikpanel.com"; 
$mail->Password = "4h15k4l1";
$mail->SetFrom("noreply@estetikpanel.com", "Esetik Panel"); // Mail attigimizda yazacak isim
$mail->AddAddress("oguzhan@ahiskali.org"); // Maili gonderecegimiz kisi/ alici
$mail->Subject = "Yeni Firma Kaydı"; // Konu basligi


if($_GET['salon-adi']){
    $inpSalonAdi = $_GET['salon-adi'];
}if($_GET['salon-sahibi']){
    $inpSalonSahibi = $_GET['salon-sahibi'];
}

if(!$_GET['telefon']){
    $telefon = "0000000000";
}else{
    $telefon = $_GET['telefon'];
}

$bul = " "; $degistir = "";
$telefon = str_replace($bul, $degistir, $telefon);
$bul = "-";
$telefon = str_replace($bul, $degistir, $telefon);
$bul = "(";
$telefon = str_replace($bul, $degistir, $telefon);
$bul = ")";
$telefon = str_replace($bul, $degistir, $telefon);

// echo "<pre>";
// echo $inpSalonAdi;
// echo "<pre>";
// echo $inpSalonSahibi;
// echo "<pre>";
// echo $telefon;
// echo "<pre>";

$dizi = explode (" ",$inpSalonSahibi);
$soyisim = end($dizi);
$array_without_strawberries = array_diff($dizi, array($soyisim));

$isimArr =  $array_without_strawberries[0]." ";
$isimArr .= $array_without_strawberries[1]." ";
$isimArr .= $array_without_strawberries[2]." ";
$isimArr .= $array_without_strawberries[3]." ";
$isimArr .= $array_without_strawberries[4]." ";
$isimArr .= $array_without_strawberries[5]." ";


$isim = rtrim($isimArr);

$query = $db->query("SELECT * from tbl_personel where CEP = '{$telefon}'")->fetch(PDO::FETCH_ASSOC);
$kisiKayitliMi = $query['ID'];
if($kisiKayitliMi){
    header("Location:https://www.estetikpanel.com/login.php?sahip=$inpSalonSahibi&durum=alreadyUsed");
}else{
    // echo "kullanılabilir. Olumlu";

    //son firma_id +1
    $query = $db->query("SELECT MAX(FIRMA_ID) as SON_FIRMA FROM tbl_firma")->fetch(PDO::FETCH_ASSOC);
    $lastFirmaID = $query['SON_FIRMA']+1;

    $durum      = 1;
    $sube       = 1;
    $sifir      = 0;
    $gorevi     = 1;
    $userstatus = 1;
    $statikDT   = "2000-01-01";

    $smsUN      = '8508404578';
    $smsPW      = 'LHQPFA';
    $smsHeader  = '08508404578';

    $durumFirmaEkleme       = 0;
    $durumKullaniciEkleme   = 0;
    $durumYetkiEkleme       = 0;

    $Qfirma        = $db->prepare("INSERT INTO tbl_firma SET FIRMA_ID = ?, SUBE_ID = ?, FIRMA_ADI = ?, TCREQ = ?, NVI = ?, CURRENCY = 'TRY', CUR_SYMBL = 'TRY', DURUM = ? ");
    $Ufirma       = $Qfirma->execute(array( $lastFirmaID, $sube, $inpSalonAdi, $sifir, $sifir, $durum )) or die(print_r($db->errorInfo(), true));
    if ( $Ufirma ){ $durumFirmaEkleme = 1; }else{ $durumFirmaEkleme = 0;}

    $PwGenerate = "0123456789";
    $PwGenerate = str_shuffle($PwGenerate);
    $PwGenerate = substr($PwGenerate, 0, 6);
    $durumSMS = 0;

    $pw = PASSWORD_hash($PwGenerate, PASSWORD_DEFAULT);
  
    $Qpersonel  = $db->prepare("INSERT INTO tbl_personel SET DURUM = ?, FIRMA_ID = ?, SUBE_ID = ?, TUR = ?, USERSTATUS = ?, DIL = ?, USERNAME = ?, PASSWORD = ?, TC = ?, ADI = ?, SOYADI = ?, DOGUMT = ?, CEP = ?, EPOSTA = ?, ADRES = ?, SIGORTASICIL = ?, ISEGIRISDT = ?, UID = ? ");
    $Upersonel  = $Qpersonel->execute(array( $durum, $lastFirmaID, $sube, $gorevi, $userstatus, 'tr', $telefon, $pw, $sifir, $isim, $soyisim, $statikDT, $telefon, $sifir, $sifir, $sifir, $statikDT, $sifir ));

    if ( $Upersonel ){ $durumKullaniciEkleme = 1; }else{ $durumKullaniciEkleme = 0; }

    $QpersonelYetki  = $db->prepare("INSERT INTO tbl_yetkiler SET TC = ?, PROFIL_ISLM = ?, RAND_TAKV = ?, TAKV_SAAT_EKL = ?, ODME_TAKV = ?, ESTE_TAKV = ?, ESTE_KEND_GORS = ?, MUSTR_LIST = ?, MUSTR_EKL = ?, MUSTR_HZMT_EKL = ?, MUSTR_HZMT_SEANS_LST = ?, MUSTR_HZMT_SEANS_ISLM = ?, MUSTR_HZMT_TKST_LST = ?, MUSTR_HZMT_TKST_ISLM = ?, ODME_SYF = ?, HRCMLR_LST = ?, HRCMLR_ISLM = ?, HZMT_LST = ?, HZMT_ISLM = ?, HZMT_TNM_ISLM = ?, YKLSN_RAND = ?, YPN_SON_HRCMLR = ?, ALCK_HTRLT = ?, SON_6AY_GLR_GRFK = ?, PRYDK_HRCM_GRFK = ?, ESTE_SYS = ?, MSTR_SYS = ?, AYLK_GLR = ?, AYLK_GDR = ?");
    $UpersonelYetki  = $QpersonelYetki->execute(array($telefon, '1', '1', '1', '1', '1', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'));

    if ( $UpersonelYetki ){ $durumYetkiEkleme = 1; }else{ $durumYetkiEkleme = 0; }


    $QhizmetEkle  = $db->prepare("INSERT INTO tbl_hizmet SET FIRMA_ID = ?, SUBE_ID = ?, DURUM = ?, HIZMET_ADI = ?, HIZMET_SURE = ?, HIZMET_SEANS = ?, HIZMET_FIYAT = ?, UID = ?, DT = ?, UPD_UID = ?, UPD_DT = ?");
    $UhizmetEkle  = $QpersonelYetki->execute(array($lastFirmaID, 1, 1, 'Lazer Epilasyon', '60 Dakika', '8 Seans', '400', 0, '2020-01-01 01:01:01', NULL, NULL));

    if($UhizmetEkle){
        echo "Hizmetler Eklendi.";
    }

    $gsmNr='90'.$telefon;
    $msg  ='Merhaba '.$isim.',\n';
    $msg .='EstetikPanel Salon kaydiniz basariyla olusturulmustur!\n';
    $msg .='Kullanici Adi: '.$telefon.'\n';
    $msg .='Sifre: '.$PwGenerate.'\n';
    $msg .='www.estetikpanel.com adresinden giris yaparak salonunuzu yonetmeye baslayabilirsiniz.';
    $msg .='\nB021';

    $mail->Body = '<html><body>';
    $mail->Body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $mail->Body .= "<tr style='background: #eee;'><td><strong>Adı:</strong> </td><td>" . $isim . "</td></tr>";
    $mail->Body .= "<tr><td><strong>Kullanıcı Adı:</strong> </td><td>" . $telefon . "</td></tr>";
    $mail->Body .= "<tr><td><strong>Şifre:</strong> </td><td>" . $PwGenerate . "</td></tr>";
    $mail->Body .= "</table>";
    $mail->Body .= "</body></html>";
    $mail->Send();

    if($durumFirmaEkleme == 1 && $durumKullaniciEkleme == 1 && $durumYetkiEkleme == 1){
        OneToOneMessage($gsmNr, $msg, $lastFirmaID, $smsUN, $smsPW, $smsHeader);
        
        echo $durumSMS;
        if($durumSMS == 1){
            header("Location:https://www.estetikpanel.com/login.php?firma=$inpSalonAdi&sahip=$inpSalonSahibi&telefon=$telefon");
        }
    }else{
        if($durumFirmaEkleme == 0){
            echo "Firma Ekleme Hatası";
        }else if($durumKullaniciEkleme == 0){
            echo "Kullanıcı Ekleme Hatası";
        }else if($durumYetkiEkleme == 0){
            echo "Yetki Ekleme Hatası";
        }
    }
}

ob_end_flush();