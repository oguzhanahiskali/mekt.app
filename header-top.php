<?php
error_reporting(-1);
ini_set('display_errors', 'on');
date_default_timezone_set('Europe/Istanbul');

//header('Content-Type: text/html; charset=utf-8');
// Initialize the session
if(!isset($_SESSION)) 
{ 
    ini_set('session.gc_maxlifetime', 36000);
    session_set_cookie_params(36000);

    session_start(); 
} 
// If session variable is not set it will redirect to login page

if(!isset($_SESSION['USERNAME']) || empty($_SESSION['USERNAME'])){
    header("location: /auth-login.php?returnURL=".$_SERVER['REQUEST_URI']);
    exit;
}
include 'conf.php';
include 'functions.php';

$kullaniciadi = $_SESSION['USERNAME'];

$inactive = 999000;

if(isset($_SESSION['timeout']) ) {
    $session_life = time() - $_SESSION['timeout'];
    if($session_life > $inactive)
    {
        session_destroy();
        header("Location: auth-login.php?user=$kullaniciadi");
    }
}
$_SESSION['timeout'] = time();

$Quser=mysqli_query($link,"SELECT * FROM tbl_personel WHERE USERNAME = '$kullaniciadi'");
$QuserRow=mysqli_fetch_array($Quser);
$staffMission = $QuserRow['TUR'];
$user_ID = $QuserRow['ID'];
$userDil = $QuserRow['DIL'];
if($userDil=="tr"){ $Languages = 'Türkçe';}
elseif($userDil=='us'){ $Languages='English';}
elseif($userDil=='fr'){ $Languages='French';}
elseif($userDil=='de'){ $Languages='German';}
else{ $Languages='English'; }


$userTheme = $QuserRow['TEMA'];
$user_Firma = $QuserRow['FIRMA_ID'];
$user_Sube = $QuserRow['SUBE_ID'];


$QfirmaDurum    = "SELECT * FROM tbl_firma WHERE FIRMA_ID = '$user_Firma'";
$firmaDurum     = mysqli_query($link,$QfirmaDurum);
$QfirmaRow       = mysqli_fetch_array($firmaDurum);
if($QfirmaRow['DURUM']==0){
    header("Location:https://estetik.app/auth-login.php?durum=AccessDenied");
}

$currency = $QfirmaRow['CUR_SYMBL'];
$firmaLogo = $QfirmaRow['LOGO'];


$urls = basename($_SERVER['SCRIPT_NAME']);
$urlSlug = str_replace('-', ' ', $urls);
$urlSlug = str_replace('.', ' ', $urlSlug);
function checkUrlMenu($urls,$page){
    if($urls == $page){
        $result = 'active open';
    }else{
        $result = 'passive';
    }
    return $result;
}

$takvim = "takvim";

$QuserProfil = "SELECT
                ADI,
                concat(ADI,' ',SOYADI) AS ISIMSOYISIM,
                TUR
                FROM tbl_personel
                WHERE USERNAME = '$kullaniciadi'";

$userProfil=mysqli_query($link,$QuserProfil);
$QuserRow=mysqli_fetch_array($userProfil);
$personel_adi = $QuserRow['ADI'];
$isimsoyisim = $QuserRow['ISIMSOYISIM'];
$unvan = $QuserRow['TUR'];

/* SMS HAKKI VARMI? START */
$query = $db->query("SELECT * FROM view_firma_id WHERE FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
$FirmaAdi = $query['FIRMA_ADI'];

$query = $db->query("SELECT TOPLAM FROM tbl_sms_firma WHERE FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
if(!empty($query['TOPLAM'])){
    $SMStoplam = $query['TOPLAM'];
}else{
    $SMStoplam = 0;
}

$query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum LIKE '%İletil%' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
$SMSkullanilan = $query['SAYAC'];

$query = $db->query("SELECT COUNT(ID) AS SAYAC FROM tbl_sms_logs WHERE Durum NOT LIKE '%İletil%' AND FIRMA_ID = '$user_Firma'")->fetch(PDO::FETCH_ASSOC);
$SMShatali = $query['SAYAC'];

$SMSkalan = $SMStoplam-$SMSkullanilan;


//$smsOran= (100*$SMSkullanilan)/$SMStoplam;


// $CurrencyExchangeJSON = json_decode(file_get_contents('/var/www/vhosts/estetikpanel.com/v2.estetikpanel.com/api/exchange/doViz.json'), true);

?>