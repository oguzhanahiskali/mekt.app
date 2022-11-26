<?php


      function telefonConvert ($telefon){
        $bul = " "; $degistir = "";
        $telefon = str_replace($bul, $degistir, $telefon);
        $bul = "-";
        $telefon = str_replace($bul, $degistir, $telefon);
        $bul = "(";
        $telefon = str_replace($bul, $degistir, $telefon);
        $bul = ")";
        $telefon = str_replace($bul, $degistir, $telefon);

        echo $telefon;
      }

      function bulDegistir ($change){
        $bul = " "; $degistir = "";
        $telefon = str_replace($bul, $degistir, $change);
        return $telefon;
      }
      
      function filterData(&$str){
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
      }

      
      function logSQL ($user, $page, $old, $new){

        $old = json_encode($old, JSON_UNESCAPED_UNICODE);
        $new = json_encode($new, JSON_UNESCAPED_UNICODE);

        Global $db;
        $query = $db->prepare("INSERT INTO tbl_logs SET
        USERID = ?,
        PAGE = ?,
        OLD = ?,
        NEW = ?,
        DATE = NOW()");
        $insert = $query->execute(array(
             $user, $page, $old, $new
        ));
        if ( $insert ){
            $last_id = $db->lastInsertId();
            //print "Log alındı!";
        }

      }
      function kacGunKaldi($gelecekTarih){
        $gelecek = new DateTime($gelecekTarih); 
        $bugun = new DateTime(date('Y-m-d'));
        $zamanFarki = $gelecek->diff($bugun);
        $kalanGun = $zamanFarki->format('%a');
        return $kalanGun;
      }
    
      function yetkiSor($kullaniciadi){
          Global $db;
          $veri = $db->prepare("SELECT * FROM tbl_yetkiler WHERE TC='$kullaniciadi'");
          $veri->execute(array());
          $v = $veri->fetchAll(PDO::FETCH_ASSOC);
          return $v;
      }
      function nviRequre($user_Firma,$user_Sube){
          Global $db;
          $veri = $db->prepare("SELECT NVI FROM tbl_firma WHERE FIRMA_ID='$user_Firma' AND SUBE_ID='$user_Sube'");
          $veri->execute(array());
          $v = $veri->fetchAll(PDO::FETCH_ASSOC);
          return $v;
      }
      function tcRequre($user_Firma,$user_Sube){
          Global $db;
          $veri = $db->prepare("SELECT TCREQ FROM tbl_firma WHERE FIRMA_ID='$user_Firma' AND SUBE_ID='$user_Sube'");
          $veri->execute(array());
          $v = $veri->fetchAll(PDO::FETCH_ASSOC);
          return $v;
      }
      function kelimeden_kes($degisken,$adet){
        // $degisken = addslashes($degisken);
        $degisken = addslashes($degisken ?? '');
        $sonrasi = substr($degisken,$adet,strlen($degisken));
        $ilk_yeri = strpos($sonrasi, " ", 0);
        $kesilen = substr($degisken,0,($adet + $ilk_yeri));
        if(strlen($degisken) >=$adet){
        }
        $kesilen = stripslashes($kesilen);
        return $kesilen;
      }

      function ucwords_tr($gelen){
        $sonuc='';
        $kelimeler=explode(" ", $gelen);
        foreach ($kelimeler as $kelime_duz)
        {
            $kelime_uzunluk=strlen($kelime_duz);
            $ilk_karakter=mb_substr($kelime_duz,0,1,'UTF-8');

            if($ilk_karakter=='Ç' or $ilk_karakter=='ç'){
              $ilk_karakter='Ç';
            }elseif ($ilk_karakter=='Ğ' or $ilk_karakter=='ğ') {
              $ilk_karakter='Ğ';
            }elseif($ilk_karakter=='I' or $ilk_karakter=='ı'){
              $ilk_karakter='I';
            }elseif ($ilk_karakter=='İ' or $ilk_karakter=='i'){
              $ilk_karakter='İ';
            }elseif ($ilk_karakter=='Ö' or $ilk_karakter=='ö'){
              $ilk_karakter='Ö';
            }elseif ($ilk_karakter=='Ş' or $ilk_karakter=='ş'){
              $ilk_karakter='Ş';
            }elseif ($ilk_karakter=='Ü' or $ilk_karakter=='ü'){
              $ilk_karakter='Ü';
            }else{
              $ilk_karakter=strtoupper($ilk_karakter);
            }

            $digerleri=mb_substr($kelime_duz,1,$kelime_uzunluk,'UTF-8');
            $sonuc.=$ilk_karakter.kucuk_yap($digerleri).' ';
        }
        $son=trim(str_replace('  ', ' ', $sonuc));
        return $son;
      }

      function kucuk_yap($gelen){
        $gelen=str_replace('Ç', 'ç', $gelen);
        $gelen=str_replace('Ğ', 'ğ', $gelen);
        $gelen=str_replace('I', 'ı', $gelen);
        $gelen=str_replace('İ', 'i', $gelen);
        $gelen=str_replace('Ö', 'ö', $gelen);
        $gelen=str_replace('Ş', 'ş', $gelen);
        $gelen=str_replace('Ü', 'ü', $gelen);
        $gelen=strtolower($gelen);
        return $gelen;
      }
      function tr_strtoupper($text){
          $search=array("ç","i","ı","ğ","ö","ş","ü");
          $replace=array("Ç","İ","I","Ğ","Ö","Ş","Ü");
          $text=str_replace($search,$replace,$text);
          $text=strtoupper($text);
          return $text;
      }
      

      function kisalt($metin, $uzunluk){
              $metin = substr($metin, 0, $uzunluk)."...";
              $metin_son = strrchr($metin, " ");
              $metin = str_replace($metin_son,".....", $metin);

              return $metin;
          }

      function turkcetarih_formati($format, $datetime = 'now')
      {
        $z = date("$format", strtotime($datetime));
        $gun_dizi = array(
                          'Monday'    => 'Pazartesi',
                          'Tuesday'   => 'Salı',
                          'Wednesday' => 'Çarşamba',
                          'Thursday'  => 'Perşembe',
                          'Friday'    => 'Cuma',
                          'Saturday'  => 'Cumartesi',
                          'Sunday'    => 'Pazar',
                          'January'   => 'Ocak',
                          'February'  => 'Şubat',
                          'March'     => 'Mart',
                          'April'     => 'Nisan',
                          'May'       => 'Mayıs',
                          'June'      => 'Haziran',
                          'July'      => 'Temmuz',
                          'August'    => 'Ağustos',
                          'September' => 'Eylül',
                          'October'   => 'Ekim',
                          'November'  => 'Kasım',
                          'December'  => 'Aralık',
                          'Mon'       => 'Pts',
                          'Tue'       => 'Sal',
                          'Wed'       => 'Çar',
                          'Thu'       => 'Per',
                          'Fri'       => 'Cum',
                          'Sat'       => 'Cts',
                          'Sun'       => 'Paz',
                          'Jan'       => 'Oca',
                          'Feb'       => 'Şub',
                          'Mar'       => 'Mar',
                          'Apr'       => 'Nis',
                          'Jun'       => 'Haz',
                          'Jul'       => 'Tem',
                          'Aug'       => 'Ağu',
                          'Sep'       => 'Eyl',
                          'Oct'       => 'Eki',
                          'Nov'       => 'Kas',
                          'Dec'       => 'Ara',
      );
        foreach($gun_dizi as $en => $tr){
            $z = str_replace($en, $tr, $z);
        }
          if(strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
          return $z;
      }
      function phone_number_format($number) {
        // Allow only Digits, remove all other characters.
        $number = preg_replace("/[^\d]/","",$number);

        // get number length.
        $length = strlen($number);

       // if number = 10
       if($length == 10) {
        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1) $2 $3", $number);
       }
        return $number;
      }

      function iceriyormu($igne, $samanlik)
      {
          return strpos($samanlik, $igne) !== false;
      }

      function report($bulkid, $tel)
      {
        $username= '8508404578';
        $pass= 'K9$X4fFt';

        $startdate=date('d.m.Y H:i');
        $startdate=str_replace('.', '',$startdate );
        $startdate=str_replace(':', '',$startdate);
        $startdate=str_replace(' ', '',$startdate);

        $stopdate=date('d.m.Y H:i', strtotime('+1 day'));
        $stopdate=str_replace('.', '',$stopdate );
        $stopdate=str_replace(':', '',$stopdate);
        $stopdate=str_replace(' ', '',$stopdate);

        $url="http://api.netgsm.com.tr/httpbulkrapor.asp?usercode=$username&password=$pass&bulkid=$bulkid&type=0&status=100&version=2";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
      //  curl_setopt($ch,CURLOPT_HEADER, false);
        $output=curl_exec($ch);
        curl_close($ch);
        return $output;
      }

      function OneToOneMessage($gsmNr, $msg, $smsFirmaID, $smsUN, $smsPW, $smsHeader)
      { //TEK NUMARA TEK MESAJ
        $xml_data =
          '<?xml version="1.0" encoding="UTF-8"?>
            <mainbody>
              <header>
                <company dil="TR">Netgsm</company>
                <usercode>'.$smsUN.'</usercode>
                <password>'.$smsPW.'</password>
                <startdate>

                </startdate>
                <stopdate>

                </stopdate>
                <type>n:n</type>
                <msgheader>'.$smsHeader.'</msgheader>
              </header>
              <body>
                <mp>
                  <msg>'.$msg.'</msg>
                  <no>'.$gsmNr.'</no>
                </mp>
              </body>
            </mainbody>';
          $url = 'https://api.netgsm.com.tr/sms/send/xml';

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
          curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
          curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          $output = curl_exec($ch);
          $aranan = "02 ";
          if(iceriyormu($aranan,$output)==1)
          {
              global $durumSMS;
              $durumSMS = 1;
              // echo "<p>[İşleme Alındı]: ".$output."</p>";
              $bul      = "02 ";
              $degistir = "";
              $GorevID = str_replace($bul, $degistir, $output);
              //SMS SONUC BİLGİSİ START
              sleep(6);
                          $iletimrapor = report($GorevID, $gsmNr);
                          $report = explode(" ", $iletimrapor);
                          $SmsHataKodu = null;

                          $smsTelefon = $report[0];

                               if($report[1]==0){ $smsDuurum = "İletilmeyi bekliyor";}
                          else if($report[1]==1){ $smsDuurum = "İletildi";}
                          else if($report[1]==2){ $smsDuurum = "Zaman aşımına uğramış"; }
                          else if($report[1]==3){ $smsDuurum = "Hatalı veya kısıtlı numara"; }
                          else if($report[1]==4){ $smsDuurum = "Operatöre gönderilemedi"; }
                          else if($report[1]==11){ $smsDuurum = "Operatör tarafından kabul edilmedi"; }
                          else if($report[1]==12){ $smsDuurum = "Gönderim hatası"; }
                          else if($report[1]==13){ $smsDuurum = "Mükerrer İleti"; }
                          else if($report[1]==100){ $smsDuurum = "Tüm Mesaj Durumları"; }
                          else if($report[1]==103){ $smsDuurum = "Başarısız Görev"; }


                              if($report[2]==10){ $smsOperator = "Vodafone"; }
                          else if($report[2]==20){ $smsOperator = "Türktelekom"; }
                          else if($report[2]==30){ $smsOperator = "Turkcell"; }
                          else if($report[2]==40){ $smsOperator = "NetGSM"; }
                          else if($report[2]==50){ $smsOperator = "TTNet Mobil"; }
                          else if($report[2]==60){ $smsOperator = "Türktelekom"; }
                          else if($report[2]==70){ $smsOperator = "Diğer Operatör"; }

                          $smsMesajAdet = $report[3];
                          $smsTarih = $report[4];
                          $smsTarih = date("Y-m-d", strtotime($smsTarih));
                          $smsSaat = $report[5];

                               if($report[6]==0){ $SmsHataKodu = "Hata Yok"; }
                          else if($report[6]==101){ $SmsHataKodu = "Mesaj Kutusu Dolu"; }
                          else if($report[6]==102){ $SmsHataKodu = "Kapalı yada Kapsama Dışında"; }
                          else if($report[6]==103){ $SmsHataKodu = "Meşgul"; }
                          else if($report[6]==104){ $SmsHataKodu = "Hat Aktif Değil"; }
                          else if($report[6]==105){ $SmsHataKodu = "Hatalı Numara"; }
                          else if($report[6]==106){ $SmsHataKodu = "SMS red, karaliste"; }
                          else if($report[6]==111){ $SmsHataKodu = "Zaman Aşımı"; }
                          else if($report[6]==112){ $SmsHataKodu = "Mobil Cihaz Sms Gönderimine Kapalı"; }
                          else if($report[6]==113){ $SmsHataKodu = "Mobil Cihaz Desteklemiyor"; }
                          else if($report[6]==114){ $SmsHataKodu = "Yönlendirme Başarısız"; }
                          else if($report[6]==115){ $SmsHataKodu = "Çağrı Yasaklandı"; }
                          else if($report[6]==116){ $SmsHataKodu = "Tanımlanmayan Abone"; }
                          else if($report[6]==117){ $SmsHataKodu = "Yasadışı Abone"; }
                          else if($report[6]==118){ $SmsHataKodu = "Sistemsel Hata"; }
              //SMS SONUC BİLGİSİ END

              $db = new PDO("mysql:host=localhost;dbname=v2ep_db;charset=utf8", "v2ep_usr", "Mzw?s151F4#3daw1");
              Global $db;
              $query  = $db->prepare("INSERT INTO tbl_sms_logs SET
                                      FIRMA_ID = ?,
                                      Telefon   = ?,
                                      GorevID  = ?,
                                      Durum     = ?,
                                      Operator = ?,
                                      MesajAdet = ?,
                                      Tarih = ?,
                                      Saat = ?,
                                      HataKodu = ?,
                                      Mesaj = ?
              ");

              $update = $query->execute(array(
                                      $smsFirmaID,
                                      $gsmNr,
                                      $GorevID,
                                      $smsDuurum,
                                      $smsOperator,
                                      $smsMesajAdet,
                                      $smsTarih,
                                      $smsSaat,
                                      $SmsHataKodu,
                                      $msg
              ));
          }
        curl_close($ch);
        return $smsDuurum;
      }
      function OneToOneMessageCompanyRegister($gsmNr, $msg, $VerificationCode, $smsUN, $smsPW, $smsHeader,$ad,$soyad,$musteriIP)
      { //TEK NUMARA TEK MESAJ
        $xml_data =
          '<?xml version="1.0" encoding="UTF-8"?>
            <mainbody>
              <header>
                <company dil="TR">Netgsm</company>
                <usercode>'.$smsUN.'</usercode>
                <password>'.$smsPW.'</password>
                <startdate>

                </startdate>
                <stopdate>

                </stopdate>
                <type>n:n</type>
                <msgheader>'.$smsHeader.'</msgheader>
              </header>
              <body>
                <mp>
                  <msg>'.$msg.'</msg>
                  <no>'.$gsmNr.'</no>
                </mp>
              </body>
            </mainbody>';
          $url = 'https://api.netgsm.com.tr/sms/send/xml';

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
          curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
          curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          $output = curl_exec($ch);
          $aranan = "02 ";
          if(iceriyormu($aranan,$output)==1)
          {
              global $durumSMS;
              $durumSMS = 1;
              // echo "<p>[İşleme Alındı]: ".$output."</p>";
              $bul      = "02 ";
              $degistir = "";
              $GorevID = str_replace($bul, $degistir, $output);
              //SMS SONUC BİLGİSİ START
              sleep(6);
                          $iletimrapor = report($GorevID, $gsmNr);
                          $report = explode(" ", $iletimrapor);

                          $SmsHataKodu = null;

                          $smsTelefon = $report[0];

                               if($report[1]==0){ $smsDuurum = "İletilmeyi bekliyor";}
                          else if($report[1]==1){ $smsDuurum = "İletildi";}
                          else if($report[1]==2){ $smsDuurum = "Zaman aşımına uğramış"; }
                          else if($report[1]==3){ $smsDuurum = "Hatalı veya kısıtlı numara"; }
                          else if($report[1]==4){ $smsDuurum = "Operatöre gönderilemedi"; }
                          else if($report[1]==11){ $smsDuurum = "Operatör tarafından kabul edilmedi"; }
                          else if($report[1]==12){ $smsDuurum = "Gönderim hatası"; }
                          else if($report[1]==13){ $smsDuurum = "Mükerrer İleti"; }
                          else if($report[1]==100){ $smsDuurum = "Tüm Mesaj Durumları"; }
                          else if($report[1]==103){ $smsDuurum = "Başarısız Görev"; }


                              if($report[2]==10){ $smsOperator = "Vodafone"; }
                          else if($report[2]==20){ $smsOperator = "Avea"; }
                          else if($report[2]==30){ $smsOperator = "Turkcell"; }
                          else if($report[2]==40){ $smsOperator = "NetGSM"; }
                          else if($report[2]==50){ $smsOperator = "TTNet Mobil"; }
                          else if($report[2]==60){ $smsOperator = "Türktelekom"; }
                          else if($report[2]==70){ $smsOperator = "Diğer Operatör"; }

                          $smsMesajAdet = $report[3];
                          $smsTarih = $report[4];
                          $smsTarih = date("Y-m-d", strtotime($smsTarih));
                          $smsSaat = $report[5];

                               if($report[6]==0){ $SmsHataKodu = "Hata Yok"; }
                          else if($report[6]==101){ $SmsHataKodu = "Mesaj Kutusu Dolu"; }
                          else if($report[6]==102){ $SmsHataKodu = "Kapalı yada Kapsama Dışında"; }
                          else if($report[6]==103){ $SmsHataKodu = "Meşgul"; }
                          else if($report[6]==104){ $SmsHataKodu = "Hat Aktif Değil"; }
                          else if($report[6]==105){ $SmsHataKodu = "Hatalı Numara"; }
                          else if($report[6]==106){ $SmsHataKodu = "SMS red, karaliste"; }
                          else if($report[6]==111){ $SmsHataKodu = "Zaman Aşımı"; }
                          else if($report[6]==112){ $SmsHataKodu = "Mobil Cihaz Sms Gönderimine Kapalı"; }
                          else if($report[6]==113){ $SmsHataKodu = "Mobil Cihaz Desteklemiyor"; }
                          else if($report[6]==114){ $SmsHataKodu = "Yönlendirme Başarısız"; }
                          else if($report[6]==115){ $SmsHataKodu = "Çağrı Yasaklandı"; }
                          else if($report[6]==116){ $SmsHataKodu = "Tanımlanmayan Abone"; }
                          else if($report[6]==117){ $SmsHataKodu = "Yasadışı Abone"; }
                          else if($report[6]==118){ $SmsHataKodu = "Sistemsel Hata"; }
              //SMS SONUC BİLGİSİ END

              //$db = new PDO("mysql:host=localhost;dbname=estetikp_db;charset=utf8", "estetikp_usr", "gzeCIeUkaJOR");
              Global $db;
              $query  = $db->prepare("INSERT INTO tbl_sms_company SET
                                      VerificationCode = ?,
                                      FirstName = ?,
                                      LastName = ?,
                                      CustomerIP = ?,
                                      Telefon   = ?,
                                      GorevID  = ?,
                                      Durum     = ?,
                                      Operator = ?,
                                      MesajAdet = ?,
                                      Tarih = ?,
                                      Saat = ?,
                                      HataKodu = ?,
                                      Mesaj = ?
              ");

              $update = $query->execute(array(
                                      $VerificationCode,
                                      $ad,
                                      $soyad,
                                      $musteriIP,
                                      $gsmNr,
                                      $GorevID,
                                      $smsDuurum,
                                      $smsOperator,
                                      $smsMesajAdet,
                                      $smsTarih,
                                      $smsSaat,
                                      $SmsHataKodu,
                                      $msg
              ));
          }
        curl_close($ch);
      }

      function OneToOneMessageRegisterInfoSMS($gsmNr, $msg, $smsUN, $smsPW, $smsHeader,$ad,$soyad,$musteriIP)
      { //TEK NUMARA TEK MESAJ
        $xml_data =
          '<?xml version="1.0" encoding="UTF-8"?>
            <mainbody>
              <header>
                <company dil="TR">Netgsm</company>
                <usercode>'.$smsUN.'</usercode>
                <password>'.$smsPW.'</password>
                <startdate>

                </startdate>
                <stopdate>

                </stopdate>
                <type>n:n</type>
                <msgheader>'.$smsHeader.'</msgheader>
              </header>
              <body>
                <mp>
                  <msg>'.$msg.'</msg>
                  <no>'.$gsmNr.'</no>
                </mp>
              </body>
            </mainbody>';
          $url = 'https://api.netgsm.com.tr/sms/send/xml';

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
          curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
          curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          $output = curl_exec($ch);
          $aranan = "02 ";
          if(iceriyormu($aranan,$output)==1)
          {
              global $durumSMS;
              $durumSMS = 1;
              // echo "<p>[İşleme Alındı]: ".$output."</p>";
              $bul      = "02 ";
              $degistir = "";
              $GorevID = str_replace($bul, $degistir, $output);
              //SMS SONUC BİLGİSİ START
              sleep(6);
                          $iletimrapor = report($GorevID, $gsmNr);
                          $report = explode(" ", $iletimrapor);

                          $SmsHataKodu = null;

                          $smsTelefon = $report[0];

                               if($report[1]==0){ $smsDuurum = "İletilmeyi bekliyor";}
                          else if($report[1]==1){ $smsDuurum = "İletildi";}
                          else if($report[1]==2){ $smsDuurum = "Zaman aşımına uğramış"; }
                          else if($report[1]==3){ $smsDuurum = "Hatalı veya kısıtlı numara"; }
                          else if($report[1]==4){ $smsDuurum = "Operatöre gönderilemedi"; }
                          else if($report[1]==11){ $smsDuurum = "Operatör tarafından kabul edilmedi"; }
                          else if($report[1]==12){ $smsDuurum = "Gönderim hatası"; }
                          else if($report[1]==13){ $smsDuurum = "Mükerrer İleti"; }
                          else if($report[1]==100){ $smsDuurum = "Tüm Mesaj Durumları"; }
                          else if($report[1]==103){ $smsDuurum = "Başarısız Görev"; }


                              if($report[2]==10){ $smsOperator = "Vodafone"; }
                          else if($report[2]==20){ $smsOperator = "Avea"; }
                          else if($report[2]==30){ $smsOperator = "Turkcell"; }
                          else if($report[2]==40){ $smsOperator = "NetGSM"; }
                          else if($report[2]==50){ $smsOperator = "TTNet Mobil"; }
                          else if($report[2]==60){ $smsOperator = "Türktelekom"; }
                          else if($report[2]==70){ $smsOperator = "Diğer Operatör"; }

                          $smsMesajAdet = $report[3];
                          $smsTarih = $report[4];
                          $smsTarih = date("Y-m-d", strtotime($smsTarih));
                          $smsSaat = $report[5];

                               if($report[6]==0){ $SmsHataKodu = "Hata Yok"; }
                          else if($report[6]==101){ $SmsHataKodu = "Mesaj Kutusu Dolu"; }
                          else if($report[6]==102){ $SmsHataKodu = "Kapalı yada Kapsama Dışında"; }
                          else if($report[6]==103){ $SmsHataKodu = "Meşgul"; }
                          else if($report[6]==104){ $SmsHataKodu = "Hat Aktif Değil"; }
                          else if($report[6]==105){ $SmsHataKodu = "Hatalı Numara"; }
                          else if($report[6]==106){ $SmsHataKodu = "SMS red, karaliste"; }
                          else if($report[6]==111){ $SmsHataKodu = "Zaman Aşımı"; }
                          else if($report[6]==112){ $SmsHataKodu = "Mobil Cihaz Sms Gönderimine Kapalı"; }
                          else if($report[6]==113){ $SmsHataKodu = "Mobil Cihaz Desteklemiyor"; }
                          else if($report[6]==114){ $SmsHataKodu = "Yönlendirme Başarısız"; }
                          else if($report[6]==115){ $SmsHataKodu = "Çağrı Yasaklandı"; }
                          else if($report[6]==116){ $SmsHataKodu = "Tanımlanmayan Abone"; }
                          else if($report[6]==117){ $SmsHataKodu = "Yasadışı Abone"; }
                          else if($report[6]==118){ $SmsHataKodu = "Sistemsel Hata"; }
              //SMS SONUC BİLGİSİ END

          }
        curl_close($ch);
      }

        function OneMessageToManySend($gsmNr, $msg)
        {  //TEK MESAJ ÇOKLU NUMARA
          $mps = "";
          for ($i=0; $i < sizeof($gsmNr); $i++){
            $mps .="<mp>
                  <msg>
                    <![CDATA[" .$msg. "]]>
                  </msg>
                  <no>
                    " .$gsmNr[$i]. "
                  </no>
                </mp>";
          }

          $xml_data =
              '<?xml version="1.0" encoding="UTF-8"?>
              <mainbody>
                <header>
                  <company dil="TR">Netgsm</company>
                  <usercode>8508404578</usercode>
                  <password>K9$X4fFt</password>
                  <startdate>

                  </startdate>
                  <stopdate>

                  </stopdate>
                  <type>n:n</type>
                  <msgheader>08508404578</msgheader>
                </header>
                <body>
                  ' .$mps. '
                </body>
              </mainbody>';

          $url = "https://api.netgsm.com.tr/sms/send/xml";

          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
          curl_setopt($ch, CURLOPT_ENCODING, "UTF-8");
          curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          $output = curl_exec($ch);
          echo $output;
          curl_close($ch);
        }
        /*
        function yuzde($a,$b){
              $c = $a / 100; 
          return floor($b / $c); 
        }*/
          
      function PhoneConvert($num){
        $to = sprintf("+90 %s %s %s",
                      substr($num, 0, 3),
                      substr($num, 3, 3),
                      substr($num, 6, 5));
        
                      return $to;
    }
    function RandLtrim($el){
      ltrim($el);
      rtrim($el);
      return $el;
    }
    
    function textToURL($s) {
      $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
      $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
      $s = str_replace($tr,$eng,$s);
      $s = strtolower($s);
      $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
      $s = preg_replace('/\s+/', '-', $s);
      $s = preg_replace('|-+|', '-', $s);
      $s = trim($s, '-');
    return $s;
    }

    function Yuvarla($s){
      
      // echo $s;
      // // $int = round($s);
      // // $int *= 20;
      // // $int = ceil($int);
      // // $int /= 20;
      // $int = round($s);

      return $s;
    }
    function time_elapsed_string($datetime, $full = false) {
      $now = new DateTime;
      $ago = new DateTime($datetime);
      $diff = $now->diff($ago);
  
      $diff->w = floor($diff->d / 7);
      $diff->d -= $diff->w * 7;
  
      $string = array(
          'y' => 'yıl',
          'm' => 'ay',
          'w' => 'hafta',
          'd' => 'gün',
          'h' => 'saat',
          'i' => 'dakika',
          's' => 'saniye',
      );
      foreach ($string as $k => &$v) {
          if ($diff->$k) {
              $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
          } else {
              unset($string[$k]);
          }
      }
  
      if (!$full) $string = array_slice($string, 0, 1);
      return $string ? implode(', ', $string) . ' önce' : 'şuan da';
  }
  $numbersArr = array('530','531','532','533','534','535','536','537','538','539', //Türkcell
  '540','541','542','543','544','545','546','547','548','549', // Vodafone
  '501','505','506','507','551','552','553','554','555','556','557','558','559' // Avea
  );
  function MyEncrypted($string_to_encrypt){
    $password="password1";
    $encrypted_string=openssl_encrypt($string_to_encrypt,"AES-128-ECB",$password);
    return $encrypted_string;
  }
  function MyDecrypted($encrypted_string){
    $password="password1";
    $decrypted_string=openssl_decrypt($encrypted_string,"AES-128-ECB",$password);
    return $decrypted_string;
  }

  function cryptoJsAesDecrypt($passphrase, $jsonString){
    $jsondata = json_decode($jsonString, true);
    $salt = hex2bin($jsondata["s"]);
    $ct = base64_decode($jsondata["ct"]);
    $iv  = hex2bin($jsondata["iv"]);
    $concatedPassphrase = $passphrase.$salt;
    $md5 = array();
    $md5[0] = md5($concatedPassphrase, true);
    $result = $md5[0];
    for ($i = 1; $i < 3; $i++) {
        $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
        $result .= $md5[$i];
    }
    $key = substr($result, 0, 32);
    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
    return json_decode($data, true);
  }
  function cryptoJsAesEncrypt($passphrase, $value){
      $salt = openssl_random_pseudo_bytes(8);
      $salted = '';
      $dx = '';
      while (strlen($salted) < 48) {
          $dx = md5($dx.$passphrase.$salt, true);
          $salted .= $dx;
      }
      $key = substr($salted, 0, 32);
      $iv  = substr($salted, 32,16);
      $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
      $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
      return json_encode($data);
  }
  function randomNumber($length) {
      $result = '';
      for($i = 0; $i < $length; $i++) {
          $result .= mt_rand(0, 9);
      }
      return $result;
  }

?>
