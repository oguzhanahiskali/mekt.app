<?php

if(isset($_GET['phone'])){
    $phoneNumb = $_GET['phone'];
    $randPW = random_int(100000, 999999);

    ini_set('soap.wsdl_cache_enabled', 0);
    ini_set('soap.wsdl_cache_ttl', 900);
    ini_set('default_socket_timeout', 15);

    $params = array(
        'Username'=>'sbeyli.strateji',
        'Password'=>'+Y8aglik+',
        'UserCode'=>'5750',
        'AccountId'=>'128',
        'Originator'=>'S.BEYLI BLD',
        'SendDate' => '',
        'ValidityPeriod'=> 60,
        'MessageText'=>'Dijital Sultanbeyli, Giriş şifreniz: ['.$randPW.'] Lütfen giriş ekranına telefon numaranızı ve giriş şifreniz ile giriş yapınız.',
        'IsCheckBlackList'=>'0',
            'IsEncryptedParameter'=>'0',
        'ReceiverList'=>[
            $phoneNumb
        ],
    );

    $wsdl = 'https://webservice.asistiletisim.com.tr/SmsProxy.asmx?WSDL';

    $options = array(
        'uri'=>'http://schemas.xmlsoap.org/soap/envelope',
        'style'=>SOAP_RPC,
        'use'=>SOAP_ENCODED,
        'soap_version'=>SOAP_1_1,
        'cache_wsdl'=>WSDL_CACHE_NONE,
        'connection_timeout'=>15,
        'trace'=>true,
        'encoding'=>'UTF-8',
        'exceptions'=>true,
    );

    $SendSms = new SimpleXMLElement('<SendSms/>');
    foreach($params as $Key=>$Value){
        if(in_array($Key,['ReceiverList'])){
            $ReceiverList = $SendSms->addChild('ReceiverList');
            foreach($Value as $Tmp=>$Gsm){
                $ReceiverList->addChild('Receiver',$Gsm);
            }
        }else{
            $SendSms->addChild($Key,$Value);
        }
    }
    $Send=['requestXml'=>str_replace('<?xml version="1.0"?>','',trim($SendSms->asXML()))];
    // echo "Request:<br/>\n<pre>".htmlentities(var_export($Send,true))."</pre>";
    $asd = [];
    try {
        $soap = new SoapClient($wsdl, $options);
        $data = $soap->sendSms($Send);
    }catch(Exception $e) {
        $data = $e;
    }


    // echo "<hr>response:<br/>\n<pre>".htmlentities(var_export($data,true))."</pre>";
    // echo htmlentities(var_export($data,true));

    $result = json_encode($data);
    $output = json_decode($result, true);
    $ErrorCode = $output['sendSmsResult']['ErrorCode'];
    $PacketId = $output['sendSmsResult']['PacketId'];
    $MessageId = $output['sendSmsResult']['MessageIdList']['MessageId'];

    echo $ErrorCode;
    echo "<br>";
    echo $PacketId;
    echo "<br>";
    echo $ErrorCode;
    echo "<br>";
    // print_r($result);
}else{
    echo "hatali istek";
}