<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    $mail->IsSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.yandex.com';
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->CharSet ="utf-8";
    $mail->Username = "noreply@estetik.app"; 
    $mail->Password = "k6Ej7KKR6xSXzhx8";
    $mail->SetFrom("noreply@estetik.app", "Esetik Panel"); // Mail attigimizda yazacak isim
    $mail->AddAddress("oguzhan@ahiskali.org"); // Maili gonderecegimiz kisi/ alici
    $mail->Subject = "Yeni Firma Kaydı"; // Konu basligi
if($_GET['request']){
    if($_GET['request']=='musteriler'){
        $fileName = $_GET['request']."_". date('Y-m-d').".xls";
        $fields = array('ID', 'ADI', 'SOYADI', 'DOGUM_TARIHI', 'CINSIYET', 'ADRES', 'CEP');
        $excelData = implode("\t", array_values($fields)) . "\n";
        $query = $db->query("SELECT * FROM tbl_musteri_kimlik WHERE FIRMA_ID = $user_Firma ORDER BY ID ASC", PDO::FETCH_ASSOC);
        $gender = null;
        if ( $query->rowCount() ){
            foreach( $query as $row ){
                if($row['CINSIYET']==1){ $gender = 'Kadın';}else
                if($row['CINSIYET']==2){ $gender = 'Erkek';}
                $lineData = array($row['ID'], $row['ADI'], $row['SOYADI'], $row['DOGUM_TARIHI'], $gender, $row['ADRES'], $row['CEP']);
                array_walk($lineData, 'filterData');
                $excelData .= implode("\t", array_values($lineData)) . "\n";
            }
        }else{
            $excelData .= 'No records found...'. "\n"; 
        }
    }else if($_GET['request']=='taksitler'){
        $fileName = $_GET['request']."_". date('Y-m-d').".xls";
        $fields = array('ID', 'ADI_SOYADI', 'KART_ID', 'TAKSIT_ID', 'TAKSIT_TARIHI', 'TAHSILAT_DURUM', 'TAHSILAT_TIPI', 'FIYAT', 'CURRENCY', 'ISLEM_TARIHI', 'ISLEM_YAPAN');
        $excelData = implode("\t", array_values($fields)) . "\n";
        $query = $db->query("SELECT * FROM view_Export_Taksitler WHERE FIRMA_ID =$user_Firma", PDO::FETCH_ASSOC);
        $gender = null;
        if ( $query->rowCount() ){
            foreach( $query as $row ){
                $lineData = array($row['ID'], $row['ADI_SOYADI'], $row['KART_ID'], $row['TAKSIT_ID'], $row['TAKSIT_TARIHI'], $row['TAHSILAT_DURUM'], $row['TAHSILAT_TIPI'], $row['FIYAT'], $row['CURRENCY'], $row['ISLEM_TARIHI'], $row['ISLEM_YAPAN']);
                array_walk($lineData, 'filterData');
                $excelData .= implode("\t", array_values($lineData)) . "\n";
            }
        }else{
            $excelData .= 'No records found...'. "\n"; 
        }
    }else if($_GET['request']=='seanslar'){
        $fileName = $_GET['request']."_". date('Y-m-d').".xls";
        $fields = array('ID', 'ADI_SOYADI', 'SEANS_ID', 'SEANS_DURUM', 'HIZMET', 'HIZMET_BOLGE', 'ESTETISYENADI', 'SEANS_TARIHI', 'SEANS_SURE', 'KONTROL_TARIHI', 'KONTROL_SAAT',  'SEANS_ODASI',  'KONTROL_DURUM',  'TOPLAM_SEANS', 'TAMAMLANAN' );
        $excelData = implode("\t", array_values($fields)) . "\n";
        $query = $db->query("SELECT * FROM view_Export_Seanslar WHERE FIRMA_ID =$user_Firma", PDO::FETCH_ASSOC);
        $gender = null;
        if ( $query->rowCount() ){
            foreach( $query as $row ){
                $lineData = array($row['ID'], $row['ADI_SOYADI'], $row['SEANS_ID'], $row['SEANS_DURUM'], $row['HIZMET'], $row['HIZMET_BOLGE'], $row['ESTETISYENADI'], $row['SEANS_TARIHI'], $row['SEANS_SURE'], $row['KONTROL_TARIHI'], $row['KONTROL_SAAT'], $row['SEANS_ODASI'], $row['KONTROL_DURUM'], $row['TOPLAM_SEANS'], $row['TAMAMLANAN']);
                array_walk($lineData, 'filterData');
                $excelData .= implode("\t", array_values($lineData)) . "\n";
            }
        }else{
            $excelData .= 'No records found...'. "\n"; 
        }
    }
    header("Content-Type: application/vnd.ms-excel;charset=UTF-8");
    header("Content-Disposition: attachment; filename=\"$fileName\"");
    // echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $excelData);
    // $output = fopen('php://output', 'w');
    // fputcsv($output, array('serial', 'group','end'));
    $aaa = chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $excelData);
    $mail->Body = '<html><body>';
    $mail->Body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
    $mail->Body .= "<tr style='background: #eee;'><td><strong>Adı:</strong> </td><td>aa</td></tr>";
    $mail->Body .= "<tr><td><strong>Kullanıcı Adı:</strong> </td><td><a href='https://wa.me/90'>xxx</a></td></tr>";
    $mail->Body .= "<tr><td><strong>Şifre:</strong> </td><td>yyy</td></tr>";
    $mail->Body .= "</table>";
    $mail->Body .= "</body></html>";
    // $mail->AddAttachment( chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $excelData) , 'NameOfFile.xls' );
    $mail->AddAttachment($aaa);
    echo $aaa;


    $mail->Send();
    ob_end_flush();
    exit;
}
