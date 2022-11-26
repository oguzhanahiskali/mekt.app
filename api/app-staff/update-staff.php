<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if(isset($_POST['updateType'])){
    $updateType = $_POST['updateType'];
    if($updateType=='staffDetails'){
        if( $_POST['staffID'] &&
            $_POST['username'] &&
            $_POST['edtEmail'] &&
            $_POST['mobilPhone'] &&
            $_POST['edtAddress'] &&
            $_POST['edtMission'] &&
            $_POST['edtInsuranceNumber'] &&
            $_POST['edtSalaryType'] &&
            $_POST['edtSalaryPayment'] &&
            $_POST['edtStartDateOfWork'] &&
            $_POST['edtGender']
        ){
            $dataUserName       = $_POST['username'];
            $dataGender         = $_POST['edtGender'];
            $dataPhone          = $_POST['mobilPhone'];
            $dataEmail          = $_POST['edtEmail'];
            $dataAddress        = $_POST['edtAddress'];
            $dataMission        = $_POST['edtMission'];
            $dataSalaryType     = $_POST['edtSalaryType'];
            $dataSalaryPayment  = $_POST['edtSalaryPayment'];
            $datainsuranceNumber= $_POST['edtInsuranceNumber'];
            $dataDateOfWork     = $_POST['edtStartDateOfWork'];
            $dataUserAccess     = $_POST['userAccess'];
            $staffID            = $_POST['staffID'];
            if(isset($_POST['staffPWsms'])){            
                $dataStaffSMS = $_POST['staffPWsms'];
                if($dataStaffSMS==2){ // if pw enter
                    $dataPW = $_POST['password'];
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
                            $gsmNr='90'.$dataPhone;
                            $msg = 'EstetikPanel\nKullanıcı Adı: '.$dataUserName.'\nŞifren: '.$PwGenerate;
                            OneToOneMessage($gsmNr,$msg,$user_Firma,$smsUN,$smsPW,$smsHeader);
                        }
                    }
                }
                $query = $db->prepare("UPDATE tbl_personel SET
                    PASSWORD = ?,
                    EPOSTA=?,
                    ADRES=?,
                    TUR=?,
                    SIGORTASICIL=?,
                    MAAS_TYPE=?,
                    MAAS=?,
                    ISEGIRISDT=?,
                    GENDER=?,
                    USERSTATUS=?,
                    CEP=?
                    WHERE ID = $staffID AND
                    FIRMA_ID = $user_Firma AND
                    SUBE_ID = $user_Sube"
                );
                $update = $query->execute(array(
                    $dataPW,
                    $dataEmail,
                    $dataAddress,
                    $dataMission,
                    $datainsuranceNumber,
                    $dataSalaryType,
                    $dataSalaryPayment,
                    $dataDateOfWork,
                    $dataGender,
                    $dataUserAccess,
                    $dataPhone
                ));
            }else{
                $query = $db->prepare("UPDATE tbl_personel SET
                    EPOSTA=?,
                    ADRES=?,
                    TUR=?,
                    SIGORTASICIL=?,
                    MAAS_TYPE=?,
                    MAAS=?,
                    ISEGIRISDT=?,
                    GENDER=?,
                    USERSTATUS=?,
                    CEP=?
                    WHERE
                    ID = $staffID AND
                    FIRMA_ID = $user_Firma AND
                    SUBE_ID = $user_Sube"
                );
                $update = $query->execute(array(
                    $dataEmail,
                    $dataAddress,
                    $dataMission,
                    $datainsuranceNumber,
                    $dataSalaryType,
                    $dataSalaryPayment,
                    $dataDateOfWork,
                    $dataGender,
                    $dataUserAccess,
                    $dataPhone
                ));

            }
            if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
            else{           $json=['code'=> 1001, 'status' => false]; }
        }else{
            $json=['code'=> 1012, 'status' => false];
        }

    }else if($updateType=='staffPermissions'){
        if(isset($_POST['permissions'])){
            $dataPermission     = $_POST['permissions'];
            $dataUserName       = $_POST['username'];
    
            if($dataPermission!==null){
                $qq = '';
                foreach ($dataPermission as $key => $value) {
                    $qq .= $value.'="1", ';
                }
                $qqs = rtrim($qq,", ");
            }
            $query = $db->prepare("UPDATE tbl_yetkiler SET PROFIL_ISLM='0', RAND_TAKV='0', ESTE_TAKV='0', MUSTR_LIST='0', CIRO_DKM='0', TAKV_SAAT_EKL='0', ODME_TAKV='0', ESTE_KEND_GORS='0', MUSTR_EKL='0', MUSTR_HZMT_EKL='0', MUSTR_HZMT_SEANS_LST='0', MUSTR_HZMT_SEANS_ISLM='0', MUSTR_HZMT_TKST_LST='0', MUSTR_HZMT_TKST_ISLM='0', ODME_SYF='0', HRCMLR_LST='0', HRCMLR_ISLM='0', HZMT_LST='0', HZMT_ISLM='0', HZMT_TNM_ISLM='0', YKLSN_RAND='0', YPN_SON_HRCMLR='0', ALCK_HTRLT='0', SON_6AY_GLR_GRFK='0', PRYDK_HRCM_GRFK='0', ESTE_SYS='0', MSTR_SYS='0', AYLK_GLR='0', AYLK_GDR='0' WHERE TC = '{$dataUserName}'");
            $update = $query->execute();
            $query = $db->prepare("UPDATE tbl_yetkiler SET $qqs WHERE TC = $dataUserName");
            $update = $query->execute();
            if ( $update ){ $json=['code'=> 1000, 'status' => true]; }
            else{           $json=['code'=> 1001, 'status' => false]; }
        }else{
            $json=['code'=> 1012, 'status' => false, 'because'=> 'There are empty fields'];
        }
    
    }else{
        $json=['code'=> 1999, 'status' => false, 'because'=> 'Bad request'];
    }
}else{
    $json=['code'=> 1999, 'status' => false, 'because'=> 'Bad request'];
}

echo json_encode($json);

?>