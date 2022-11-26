<?php 
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
$_GET['tckimlikno'] *= 1; // Gönderilen talepte TC Kimlik Numarası integer olmalı.
$getYear = date("Y", strtotime($_GET['dogumyili']));
try{
    $requestData = array( // Formdan gelen değerler
        "TCKimlikNo" => $_GET['tckimlikno'],
        "Ad" => $_GET['ad'],
        "Soyad" => $_GET['soyad'],
        "DogumYili" => $getYear
    );
    $result = $client->TCKimlikNoDogrula($requestData);
    if ($result->TCKimlikNoDogrulaResult){
        
        $id = $_GET['tckimlikno']; 
        $query = $db->query("SELECT * FROM tbl_personel WHERE FIRMA_ID = '{$user_Firma}' AND USERNAME LIKE '{$id}'")->fetch(PDO::FETCH_ASSOC);
        if ( $query ){
            $customerName = $query['ADI'];
            $json = [
                'status'=> true,
                'enrollmentStatus'=> true
            ];
        }else{
            $json = [
                'status'=> true,
                'enrollmentStatus'=> true
            ];
        }

    }else { $json = [ 'status'=> false ];  }
}
catch (Exception $ex)
{
    $json = ['status' => false, 'because'=> $ex->faultstring];
}

echo json_encode($json);
?>
