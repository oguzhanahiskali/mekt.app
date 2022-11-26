<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

if($_POST['sid']){
    $sid = $_POST['sid'];
	$QIDtoUN = "SELECT * FROM tbl_personel WHERE ID =  '{$sid}' AND ID <> 33 AND FIRMA_ID = '{$user_Firma}' AND SUBE_ID = '{$user_Sube}' ";
    $QueryIDtoUN = $db->query($QIDtoUN)->fetch(PDO::FETCH_ASSOC);
    if($QueryIDtoUN){
        $staffID        = $QueryIDtoUN['ID'];
        $un             = $QueryIDtoUN['USERNAME'];
        $Access         = $QueryIDtoUN['USERSTATUS'];
        $dataMission    = $QueryIDtoUN['TUR'];
        $dataLang       = $QueryIDtoUN['DIL'];
        $dataFirstName  = $QueryIDtoUN['ADI'];
        $dataSurName    = $QueryIDtoUN['SOYADI'];
        $dataDayOfBirth = $QueryIDtoUN['DOGUMT'];
        $dataGender     = $QueryIDtoUN['GENDER'];
        $dataCountryISO = $QueryIDtoUN['COUNTRY_ISO'];
        $dataPhoneCountry=$QueryIDtoUN['PHONE_COUNTRY'];
        $dataPhoneNumb  = $QueryIDtoUN['CEP'];
        $dataEmail      = $QueryIDtoUN['EPOSTA'];
        $dataAddress    = $QueryIDtoUN['ADRES'];
        $datainsuranceNumber= $QueryIDtoUN['SIGORTASICIL'];
        $dataDateOfWork = $QueryIDtoUN['ISEGIRISDT'];
        $dataSalaryType = $QueryIDtoUN['MAAS_TYPE'];
        $dataSalaryPayment = $QueryIDtoUN['MAAS'];
    
        //Permissions
            $sql = "SELECT * FROM tbl_yetkiler WHERE TC = '$un'";
            $result = $db->query($sql, PDO::FETCH_ASSOC);
    
            $json = [];
            $getJSON = [];
            $varVal = null;
            $total_column = $result->columnCount();
    
            $permissionsArr = [
                'CIRO_DKM'=> 'Ciro Dökümü',
                'PROFIL_ISLM' => 'Profil İşlem Yetkisi',
                'RAND_TAKV'=>'Randevu Takvimi',
                'TAKV_SAAT_EKL'=>'Randevu Saat Seans Tanımla',
                'ODME_TAKV'=>'Ödeme Takvimi',
                'ESTE_TAKV'=>'Estetisyene Göre Takvim',
                'ESTE_KEND_GORS'=>'Estetisyen Kendi Müşterileri Dışında Görmesin',
                'MUSTR_LIST'=>'Müşteri Listele',
                'MUSTR_EKL'=>'Müşteri Ekle',
                'MUSTR_HZMT_EKL'=>'Müşteri Hizmet Ekle',
                'MUSTR_HZMT_SEANS_LST'=>'Müşteri Hizmet Seans Listele',
                'MUSTR_HZMT_SEANS_ISLM'=>'Müşteri Hizmet Seans İşlem Yap / Seans Ekle',
                'MUSTR_HZMT_TKST_LST'=>'Müşteri Hizmet Taksit Listele',
                'MUSTR_HZMT_TKST_ISLM'=>'Müşteri Hizmet Taksit İşlem Yap',
                'ODME_SYF'=>'Alacaklar / Ödemeler',
                'HRCMLR_LST'=>'Harcamalar Listele',
                'HRCMLR_ISLM'=>'Harcamalar Ekle / Düzenle',
                'HZMT_LST'=>'Hizmetler Listele',
                'HZMT_ISLM'=>'Hizmetler Ekle / Düzenle',
                'HZMT_TNM_ISLM'=>'Hizmet Tanımlamaları Ekle / Düzenle',
                'YKLSN_RAND'=>'Yaklaşan Randevular',
                'YPN_SON_HRCMLR'=>'Yapılan Son Harcamalar',
                'ALCK_HTRLT'=>'Alacak Hatırlatmaları',
                'SON_6AY_GLR_GRFK'=>'Son 6 Ay Gelir / Gider Grafiği',
                'PRYDK_HRCM_GRFK'=>'Periyodik Harcama Grafiği',
                'ESTE_SYS'=>'Estetisyen Sayısı',
                'MSTR_SYS'=>'Müşteri Sayısı',
                'AYLK_GLR'=>'Aylık Gelir',
                'AYLK_GDR'=>'Aylık Gider'
            ];
            if ( $result->rowCount() ){
                foreach ($result as $val){
                    foreach ($val as $keys => $vals) {
                        $getJSON[] =[
                            'KEY'   => $keys,
                            'VALUE' => $vals
                        ];
                    }
                }
            }
    
            foreach ($permissionsArr as $perm => $desc) {
                for ($counter = 0; $counter < $total_column; $counter ++) {
                    $meta = $result->getColumnMeta($counter);
                    if($meta['name']==$perm){
                        for ($i=0; $i < count($getJSON); $i++) { 
                            if($getJSON[$i]['KEY']==$perm){
                                $varVal = $getJSON[$i]['VALUE'];
                                $json['Permissions'][]= [
                                    'short' => $perm,
                                    'access'=> boolval($varVal),
                                    'description'=> $desc
                                ];
                            }
                        }
                        
                    }
                }
            }
    
        //Staff Details
            $json['Details']= [
                'staffID'=> $staffID,
                'Username' => $un,
                'Access'=> intval($Access),
                'Mission'=> intval($dataMission),
                'Language'=> $dataLang,
                'Firstname'=> $dataFirstName,
                'Surname'=> $dataSurName,
                'Gender'=> intval($dataGender),
                'CountryISO'=> $dataCountryISO,
                'dayOfBirth'=> $dataDayOfBirth,
                'phoneCountry'=>$dataPhoneCountry,
                'Phone'=> $dataPhoneNumb,
                'Email'=> $dataEmail,
                'Address'=> $dataAddress,
                'InsuranceNumber'=> $datainsuranceNumber,
                'dateOfWork'=> $dataDateOfWork,
                'SalaryType'=> intval($dataSalaryType),
                'SalaryPayment'=> $dataSalaryPayment
            ];
            $json['result'] = ['result'=> true];
    }else{ $json['result'] = ['result'=> false, 'because'=> 'bad request']; }
        
}else{ $json['result'] = ['result'=> false]; }

        
echo json_encode($json);