<?php

include $_SERVER['DOCUMENT_ROOT'].'/conf.php';

// if($_SERVER['HTTP_REFERER']== 'https://estetik.app/EstetikPanel/register'){

    $client = new SoapClient("https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL");
    $_POST['tckimlikno'] *= 1; // Gönderilen talepte TC Kimlik Numarası integer olmalı.
    $getYear = date("Y", strtotime($_POST['dogumyili']));
    try{
        $requestData = array( // Formdan gelen değerler
            "TCKimlikNo" => $_POST['tckimlikno'],
            "Ad" => $_POST['ad'],
            "Soyad" => $_POST['soyad'],
            "DogumYili" => $getYear
        );
        $result = $client->TCKimlikNoDogrula($requestData);
        if ($result->TCKimlikNoDogrulaResult){
            
            $Phone = $_POST['Phone'];
            $query = $db->query("SELECT * FROM tbl_sms_company WHERE Telefon LIKE '%$Phone'")->fetch(PDO::FETCH_ASSOC);
            if ( $query ){
                $customerName = $query['ADI'];
                $json = [
                    'status'=> false,
                    'code'=> 2001,
                    'because'=> 'The entered credentials have been verified, but this phone number has already been registered in the system.'
                ];
            }else{
                $json = [
                    'status'=> true
                ];
            }
    
        }else { $json = [ 'status'=> false, 'because'=>'The entered credentials appear incomplete or incorrect. Please check and retry.' ];  }
    }
    catch (Exception $ex)
    {
        $json = ['status' => false, 'because'=> $ex->faultstring];
    }

// }else { $json = [ 'status'=> false, 'because'=>'An unauthorized access request was made. Your IP address has been recorded, and legal action will be initiated against you in the repetition of this process.' ];  }

echo json_encode($json);

?>
