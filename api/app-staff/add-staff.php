<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(
    $_POST['data-firstname'] &&
    $_POST['data-surname'] &&
    $_POST['data-CitizenID'] &&
    $_POST['data-DayOfBirth'] &&
    $_POST['gender'] &&
    $_POST['mobilPhone'] &&
    $_POST['email'] &&
    $_POST['address'] &&
    $_POST['mission'] &&
    $_POST['SalaryType'] &&
    $_POST['salaryPayment'] &&
    $_POST['insuranceNumber'] &&
    $_POST['startDateOfWork'] &&
    $_POST['userAccess'] &&
    $_POST['username'] &&
    $_POST['staffPWsms'] &&
    $_POST['LangStatus']
    
){
    $dataFirstName = ucwords_tr($_POST['data-firstname']);
    $dataSurName        = tr_strtoupper($_POST['data-surname']);
    $dataCitizenID      = $_POST['data-CitizenID'];
    $dataDayOfBirth     = $_POST['data-DayOfBirth'];
    $dataGender         = $_POST['gender'];
    $dataPhone          = $_POST['mobilPhone'];
    $dataCountryISO     = $_POST['countryISO'];
    $dataPhoneCountry   = substr($dataPhone, 0, 3);
    $dataPhoneNumb      = substr($dataPhone, 3, 10);
    $dataEmail          = $_POST['email'];
    $dataAddress        = $_POST['address'];
    $dataMission        = $_POST['mission'];
    $dataSalaryType     = $_POST['SalaryType'];
    $dataSalaryPayment  = $_POST['salaryPayment'];
    $datainsuranceNumber= $_POST['insuranceNumber'];
    $dataDateOfWork     = $_POST['startDateOfWork'];
    $dataUserAccess     = $_POST['userAccess'];
    $dataLangStatus     = $_POST['LangStatus'];
    if($dataUserAccess==1){
        $dataPermissions = $_POST['permissions'];
    }else{
        $dataPermissions = null;
    }
    $dataStaffSMS       = $_POST['staffPWsms'];
    $dataUN             = $_POST['username'];
    if($dataStaffSMS==2){ // if pw enter
        $dataPW         = $_POST['password'];
        $dataPW = PASSWORD_hash($dataPW, PASSWORD_DEFAULT);
    }else if($dataStaffSMS==1){ // if pw -> sms send
        $PwGenerate = "0123456789";
        $PwGenerate = str_shuffle($PwGenerate);
        $PwGenerate = substr($PwGenerate, 0, 6);
        $dataPW = PASSWORD_hash($PwGenerate, PASSWORD_DEFAULT);
        if($_POST['available']>0){
            $query = $db->query("SELECT FIRMA_ID, SMS_UN, SMS_PW, HEADER FROM tbl_sms_firma WHERE FIRMA_ID = '$user_Firma'", PDO::FETCH_ASSOC);
            if ( $query->rowCount()>0 ){
                foreach( $query as $row ){
                    $smsUN 		= $row['SMS_UN'];
                    $smsPW 		= $row['SMS_PW'];
                    $smsHeader	= $row['HEADER'];
                }
                $gsmNr='90'.$dataPhoneNumb;
                $msg = 'EstetikPanel Şifreniz: '.$PwGenerate;
                OneToOneMessage($gsmNr,$msg,$user_Firma,$smsUN,$smsPW,$smsHeader);
            }
        }
    }
    $dataPermission     = $_POST['permissions'];
    $durum = 1;
    $query = $db->prepare("INSERT INTO tbl_personel SET
        FIRMA_ID = ?,
        SUBE_ID = ?,
        DURUM = 1,
        TUR = ?,
        USERSTATUS = ?,
        DIL = ?,
        TEMA = null,
        USERNAME = ?,
        TOKEN = null,
        PASSWORD = ?,
        ADI = ?,
        SOYADI = ?,
        DOGUMT = ?,
        GENDER = ?,
        COUNTRY_ISO = ?,
        PHONE_COUNTRY = ?,
        CEP = ?,
        EPOSTA = ?,
        ADRES = ?,
        SIGORTASICIL = ?,
        ISEGIRISDT = ?,
        MAAS = ?,
        MAAS_TYPE=?,
        UID = ?,
        DT = NOW()"
    );
    $update = $query->execute(array(
        $user_Firma,
        $user_Sube,
        $dataMission,
        $dataUserAccess,
        $dataLangStatus,
        $dataUN,
        $dataPW,
        $dataFirstName,
        $dataSurName,
        $dataDayOfBirth,
        $dataGender,
        $dataCountryISO,
        $dataPhoneCountry,
        $dataPhoneNumb,
        $dataEmail,
        $dataAddress,
        $datainsuranceNumber,
        $dataDateOfWork,
        $dataSalaryPayment,
        $dataSalaryType,
        $user_ID
    ));
    if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
    else{           $json=['code'=> 1001, 'status' => false]; }
    if($dataPermission!==null){
        $qq = '';
        foreach ($dataPermission as $key => $value) {
            $qq .= $value.'="1", ';
        }
        $qqs = rtrim($qq,", ");
    }
    //tbl_yetkiler Insert Process
    $query = $db->prepare("INSERT INTO tbl_yetkiler SET TC = $dataCitizenID, $qqs");
    $update = $query->execute();
    if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
    else{           $json=['code'=> 1001, 'status' => false]; }
}else{
    $json=['code'=> 1012, 'status' => false];
}

echo json_encode($json);

?>