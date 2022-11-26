<?php
$documentBase = $_SERVER['DOCUMENT_ROOT'];
include $documentBase.'/conf.php';
include $documentBase.'/functions.php';
require_once $documentBase."/mail/PHPMailerAutoload.php";
$json = [];
$StatusJson = [];
// print_r($_SERVER);

$url = $_SERVER['HTTP_REFERER'];
$data = parse_url($url);
$referer= $data['host'];
if($referer=='estetik.app'){
    
    $Post_VerifyCode = $_POST['verify-code'];
    $Post_Phone = bulDegistir($_POST['mobile-number']);
    $query = $db->query("SELECT * FROM tbl_sms_company WHERE Telefon LIKE '%$Post_Phone' ORDER BY ID DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
    $QueryVerifyCode = $query['VerificationCode'];

    if($Post_VerifyCode==$QueryVerifyCode){
        //Variables
            //Post Variables
                $Post_CompanyName   = $_POST['companyName'];
                $Post_il            = $_POST['Iller'];
                $Post_ilce          = $_POST['Ilceler'];
                $Post_AutoSMS       = $_POST['AutoSMS'];
                $Post_citizenVerifySystem    = $_POST['citizenVerifySystem'];
                $Post_NumbOfRooms   = $_POST['numberOfRooms'];
                $Post_CompanyAddress= $_POST['company-address'];
                $Post_citizenID     = $_POST['citizenNumber'];
                $Post_FirstName     = $_POST['FirstName'];
                $Post_LastName      = $_POST['LastName'];
                $Post_dOfb          = date("Y-m-d", strtotime($_POST['dOfb']));
                // $Post_Phone         = bulDegistir($_POST['mobile-number']);
                // $Post_VerifyCode    = $_POST['verify-code'];
                $Post_RoomsArray    = $_POST['invoice'];
                $Post_Plan          = $_POST['plans'];
                $Post_Latitude      = $_POST['Latitude'];
                $Post_Longitude     = $_POST['Longitude'];
            //Static Variables
                $sube = 1;
                $pasif = 0;
                $aktif = 1;
                $RegionArr = array();
            //jSON Base Dir
                $AppAreasArr = file_get_contents('./Application_Areas.json');   $ArrAppAreas = json_decode($AppAreasArr, true);
                $dayOfWorkArr = file_get_contents('./dayOfWork.json');          $ArrdayOfWork = json_decode($dayOfWorkArr, true);
                $servicesArr = file_get_contents('./Services.json');            $ArrServices = json_decode($servicesArr, true);
                $ProductsArr = file_get_contents('./Products.json');            $ArrProducts = json_decode($ProductsArr, true);
                $StaffArr = file_get_contents('./Staff.json');                  $ArrStaff = json_decode($StaffArr, true);
            //Dates & Times
                $todayNow = date("Y-m-d H:i:s");
                $date = new DateTime('2022-01-01');
                $dtNow = $date->format('Y-m-d H:i:s');
                $timeStart = new DateTime('2022-01-01 09:00:00');
                $timeFinish = new DateTime('2022-01-01 20:00:00');
                $stTimeStart = $timeStart->format('H:i:s');
                $stTimeFinish = $timeFinish->format('H:i:s');
                $dateSKT = new DateTime('2024-01-01');
                $dtSKT = $dateSKT->format('Y-m-d H:i:s');
            //Password Class
                $PwGenerate = "0123456789";
                $PwGenerate = str_shuffle($PwGenerate);
                $PwGenerate = substr($PwGenerate, 0, 6);            //<< şifrenin raw format
                $pw = PASSWORD_hash($PwGenerate, PASSWORD_DEFAULT);//<< şifrenin hash format
            //Last Firma_ID Query
                $QLastCompanyID = $db->query("SELECT MAX(FIRMA_ID) as SON_FIRMA FROM tbl_firma")->fetch(PDO::FETCH_ASSOC);
                $lastFirmaID = $QLastCompanyID['SON_FIRMA']+1;
        //Insert Company
            $Qfirma = $db->prepare(
                "INSERT INTO tbl_firma SET
                FIRMA_ID = ?,
                SUBE_ID = ?,
                FIRMA_ADI = ?,
                IL = ?,
                ILCE = ?,
                ADRES = ?,
                Latitude = ?,
                Longitude = ?,
                PLAN = ?,
                TCREQ = ?,
                NVI = ?,
                CURRENCY = 'TRY',
                CUR_SYMBL = 'TRY',
                DURUM = ?,
                created_at = NOW()");
            $Insertfirma = $Qfirma->execute(
                array(
                    $lastFirmaID,
                    $sube,
                    $Post_CompanyName,
                    $Post_il,
                    $Post_ilce,
                    $Post_CompanyAddress,
                    $Post_Latitude,
                    $Post_Longitude,
                    $Post_Plan,
                    $aktif,
                    $Post_citizenVerifySystem,
                    $aktif
                    )
            ) or die(print_r($db->errorInfo(), true));
            if ( $Insertfirma ){ // tbl_firma_resources - ODA INSERT
                    $colorsArr = array("var(--indigo)", "var(--blue)", "var(--green)", "var(--red)", "var(--pink)", "var(--orange)", "var(--yellow)");
                    //------------------------ Query -------------------------
                        // #1 Room Insert Query
                            $QRoomAdd = $db->prepare(
                                "INSERT INTO tbl_firma_resources SET
                                FIRMA_ID = ?,
                                SUBE_ID = ?,
                                STATUS = ?,
                                ROOM_ID = ?,
                                ROOM_NAME = ?,
                                COLOR = ?"
                            );
                        // #2 App Area Insert Query
                            $QAppAreaInsert = $db->prepare(
                                "INSERT INTO tbl_firma_application_area SET
                                FIRMA_ID = ?,
                                SUBE_ID = ?,
                                STATUS = ?,
                                AREA_ID = ?,
                                DURATION = ?,
                                PRICE = ?,
                                DT = ?,
                                UID = ?"
                            );
                        // #3 Day Of Work Insert Query
                            $QdayOfWorkInsert = $db->prepare(
                                "INSERT INTO tbl_dayOfWork SET
                                FIRMA_ID = ?,
                                SUBE_ID = ?,
                                STATUS = ?,
                                DAY_OF_WORK = ?,
                                HOURS_START = ?,
                                HOURS_FINISH = ?"
                            );
                        // #4 Services Insert Query
                            $QservicesInsert = $db->prepare(
                                "INSERT INTO tbl_hizmet SET
                                FIRMA_ID = ?,
                                SUBE_ID = ?,
                                DURUM = ?,
                                HIZMET_ADI = ?,
                                HIZMET_SURE = ?,
                                HIZMET_SEANS = ?,
                                HIZMET_FIYAT = ?,
                                CURRENCY = ?,
                                REGIONS = ?,
                                UID = ?,
                                DT = ?"
                            );
                        // #5 Products Insert Query
                            $QproductsInsert = $db->prepare(
                                "INSERT INTO tbl_product_party SET
                                PID = ?,
                                FIRMA_ID = ?,
                                SUBE_ID = ?,
                                STATUS = ?,
                                BARCODE = ?,
                                CURRENCY = ?,
                                PRICE = ?,
                                SCALE = ?,
                                TYPE = ?,
                                IN_DT = ?,
                                STOCK = ?,
                                STOCK_ALARM = ?,
                                EXPIRY_DT = ?,
                                UID = ?,
                                DT = ?"
                            );
                        // #6 Staff Insert Query
                            $QstaffInsert =$db->prepare(
                                    "INSERT INTO tbl_personel SET
                                    DURUM = ?,
                                    FIRMA_ID = ?,
                                    SUBE_ID = ?,
                                    TUR = ?,
                                    USERSTATUS = ?,
                                    DIL = ?,
                                    TEMA = ?,
                                    USERNAME = ?,
                                    PASSWORD = ?,
                                    TC = ?,
                                    ADI = ?,
                                    SOYADI = ?,
                                    DOGUMT = ?,
                                    MAAS_TYPE = ?,
                                    COUNTRY_ISO = ?,
                                    PHONE_COUNTRY = ?,
                                    CEP = ?,
                                    UID = ?,
                                    DT = ?"
                                );
                    //------------------------ Execute -----------------------
                        // #1 Rooms Add Execute
                            foreach($Post_RoomsArray as $keys => $values) {
                                $Insertfirma = $QRoomAdd->execute(
                                    array(
                                        $lastFirmaID,
                                        $sube,
                                        $aktif,
                                        'Oda'.$values['roomID'],
                                        $values['roomName'],
                                        $colorsArr[rand(0,sizeof($colorsArr)-1)]
                                    )
                                ) or die(print_r($db->errorInfo(), true));
                            }
                            if($Insertfirma){
                                $last_id = $db->lastInsertId();
                                array_push($RegionArr, $last_id);
                                $StatusJson['Rooms']=['code'=> 1000, 'status' => true];
                            }else{
                                $StatusJson['Rooms']=['code'=> 1001, 'status' => true];
                            }
                        // #2 Application Areas Add Execute
                            foreach($ArrAppAreas['Application_Areas'] as $key => $value) {
                                $InsertAppAreas = $QAppAreaInsert->execute(
                                    array(
                                        $lastFirmaID,
                                        $sube,
                                        strval($value['STATUS']),
                                        $value['AREA_ID'],
                                        $value['DURATION'],
                                        $value['PRICE'],
                                        $dtNow,
                                        $value['UID']
                                    )
                                ) or die(print_r($db->errorInfo(), true));
                                if($InsertAppAreas){
                                    $last_id = $db->lastInsertId();
                                    array_push($RegionArr, $last_id);
                                    $StatusJson['ApplicationAreas']=['code'=> 1000, 'status' => true];
                                }else{
                                    $StatusJson['ApplicationAreas']=['code'=> 1001, 'status' => true];
                                }
                            }
                        // #3 dayOfWork Add Execute
                            foreach($ArrdayOfWork['dayOfWork'] as $k => $v) {
                                $InsertdayOfWork = $QdayOfWorkInsert->execute(
                                    array(
                                        $lastFirmaID,
                                        $sube,
                                        $v['STATUS'],
                                        $v['DAY_OF_WORK'],
                                        $stTimeStart,
                                        $stTimeFinish
                                    )
                                ) or die(print_r($db->errorInfo(), true));
                            }
                            if($InsertdayOfWork){
                                $StatusJson['dayOfWork']=['code'=> 1000, 'status' => true];
                            }else{
                                $StatusJson['dayOfWork']=['code'=> 1001, 'status' => true];
                            }
                        // #4 Services Add Execute
                            $regionsArr = implode(", ", $RegionArr);
                            foreach($ArrServices['Services'] as $k => $v) {
                                if($v['HIZMET_ADI']=='Lazer Epilasyon'){
                                    $InsertServices = $QservicesInsert->execute(
                                        array(
                                            $lastFirmaID,
                                            $sube,
                                            $aktif,
                                            $v['HIZMET_ADI'],
                                            $v['HIZMET_SURE'],
                                            $v['HIZMET_SEANS'],
                                            $v['HIZMET_FIYAT'],
                                            $v['CURRENCY'],
                                            $regionsArr,
                                            33,
                                            $dtNow
                                        )
                                    ) or die(print_r($db->errorInfo(), true));
                                }else{
                                    $InsertServices = $QservicesInsert->execute(
                                        array(
                                            $lastFirmaID,
                                            $sube,
                                            $aktif,
                                            $v['HIZMET_ADI'],
                                            $v['HIZMET_SURE'],
                                            $v['HIZMET_SEANS'],
                                            $v['HIZMET_FIYAT'],
                                            $v['CURRENCY'],
                                            NULL,
                                            33,
                                            $dtNow
                                        )
                                    ) or die(print_r($db->errorInfo(), true));
                                }
                                if($InsertServices){
                                    $StatusJson['Services']=['code'=> 1000, 'status' => true];
                                }else{
                                    $StatusJson['Services']=['code'=> 1001, 'status' => true];
                                }
                            }
                        // #5 Products Add Execute
                            foreach($ArrProducts['Products'] as $k => $v) {
                                $InsertProducts = $QproductsInsert->execute(
                                    array(
                                        $v['PID'],
                                        $lastFirmaID,
                                        $sube,
                                        $aktif,
                                        $v['BARCODE'],
                                        $v['CURRENCY'],
                                        $v['PRICE'],
                                        $v['SCALE'],
                                        $v['TYPE'],
                                        $dtNow,
                                        $v['STOCK'],
                                        $v['STOCK_ALARM'],
                                        $dtSKT,
                                        33,
                                        $dtNow
                                    )
                                ) or die(print_r($db->errorInfo(), true));
                            }
                            if($InsertProducts){
                                $StatusJson['Products']=['code'=> 1000, 'status' => true];
                            }else{
                                $StatusJson['Products']=['code'=> 1001, 'status' => true];
                            }
                        // #6 Staff Add Execute
                            foreach($ArrStaff['Staff'] as $k => $v) {
                                $InsertStaff = $QstaffInsert->execute(
                                    array(
                                        $aktif,
                                        $lastFirmaID,
                                        $sube,
                                        $v['TUR'],
                                        $v['USERSTATUS'],
                                        $v['DIL'],
                                        $v['TEMA'],
                                        $Post_Phone,
                                        $pw,
                                        $Post_citizenID,
                                        $Post_FirstName,
                                        $Post_LastName,
                                        $Post_dOfb,
                                        $v['MAAS_TYPE'],
                                        $v['COUNTRY_ISO'],
                                        $v['PHONE_COUNTRY'],
                                        $Post_Phone,
                                        33,
                                        $todayNow
                                    )
                                ) or die(print_r($db->errorInfo(), true));
                            }
                            if($InsertStaff){
                                $StatusJson['Staff']=['code'=> 1000, 'status' => true];
                            }else{
                                $StatusJson['Staff']=['code'=> 1001, 'status' => true];
                            }
                        // #END SEND SMS
                            if(
                                $StatusJson['ApplicationAreas']['status']==true AND
                                $StatusJson['Products']['status']==true AND
                                $StatusJson['Rooms']['status']==true AND
                                $StatusJson['Services']['status']==true AND
                                $StatusJson['Staff']['status']==true AND
                                $StatusJson['dayOfWork']['status']==true
                            ){
                                $smsUN = '8508404578';
                                $smsPW = 'K9$X4fFt';
                                $smsHeader = '08508404578';
                        
                                $gsmNr='90'.$Post_Phone;
                                $msg='Merhaba, '.$Post_FirstName.' '.$Post_LastName;
                                $msg.='\nEstetik.App kayıt işleminiz başarıyla onaylanmıştır.\n';
                                $msg.='Kullanıcı Adı:'.$Post_Phone.'\n';
                                $msg.='Şifre:'.$PwGenerate.'\nB021';

                                OneToOneMessageRegisterInfoSMS($gsmNr,$msg,$smsUN,$smsPW,$smsHeader, $ad, $soyad,$musteriIP);
                                // Mail Send
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
                                    $mail->Username = "noreply@estetik.app"; 
                                    $mail->Password = "k6Ej7KKR6xSXzhx8";
                                    $mail->SetFrom("noreply@estetik.app", "Esetik Panel"); // Mail attigimizda yazacak isim
                                    $mail->AddAddress("oguzhan@ahiskali.org"); // Maili gonderecegimiz kisi/ alici
                                    $mail->Subject = "Yeni Firma Kaydı"; // Konu basligi

                                    $mail->Body = '<html><body>';
                                    $mail->Body .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
                                    $mail->Body .= "<tr style='background: #eee;'><td><strong>Adı:</strong> </td><td>" . $Post_FirstName.' '.$Post_LastName . "</td></tr>";
                                    $mail->Body .= "<tr><td><strong>Kullanıcı Adı:</strong> </td><td><a href='https://wa.me/90" . $Post_Phone . "'>".$Post_Phone."</a></td></tr>";
                                    $mail->Body .= "<tr><td><strong>Şifre:</strong> </td><td>" . $PwGenerate . "</td></tr>";
                                    $mail->Body .= "</table>";
                                    $mail->Body .= "</body></html>";
                                    $mail->Send();


                                $json=['status'=> true, 'details'=>'sms sent successfully'];
                            }

            }else{
                $json=['code'=> 1001, 'status' => false];
            }
    }else{
        $json=['status'=> false];
    }
}else{
    $json=['code'=> 1999, 'status' => false];
}

echo json_encode($json);