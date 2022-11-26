<iframe src="/api/app-sms/available-count.php" style="position: absolute;width:0;height:0;border:0;"></iframe>
<script type='text/javascript'>

(function(){
  if( window.localStorage ){
    if( !localStorage.getItem('firstLoad') ){
      localStorage['firstLoad'] = true;
      window.location.reload();
    }else
      localStorage.removeItem('firstLoad');
  }
})();

</script>

<?php

include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$documentBase = $_SERVER['DOCUMENT_ROOT'];
$CurExJSONbase = $documentBase.'/api/app-sms/available-sms.json';
$CurrencyExchangeJSON = json_decode(file_get_contents($CurExJSONbase), true);
print_r($CurrencyExchangeJSON);


?>

