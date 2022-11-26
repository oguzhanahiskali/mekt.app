<?php
$documentBase = $_SERVER['DOCUMENT_ROOT'];

include $documentBase.'/header-top.php';
$CurExJSONbase = $documentBase.'/api/exchange/doViz.json';
$CurrencyExchangeJSON = json_decode(file_get_contents($CurExJSONbase), true);

$JSONs = [];
$JSONservices=[];
$JSONproducts=[];
$month = date('m');
$year = date('Y');
$maxDate = date('t');
$SumServicesTotal = 0;
$SumProductsTotal = 0;

for($d=1; $d<=$maxDate; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month){
      $dayss = date('Y-m-d', $time);
      
      $QeueryServices = "SELECT * FROM view_hizmet_tahsilatlar WHERE ISLEM_TARIHI LIKE '$dayss%' AND FIRMA_ID = $user_Firma AND DURUM = 1 AND TAHSILAT_DURUM = 2";
      $QS = $db->query($QeueryServices, PDO::FETCH_ASSOC);
      $totalServices = 0;
      $exchangeTotalSrv = 0;
      if ( $QS->rowCount() ){
         foreach( $QS as $row ){
            if($row['CURRENCY']=='TRY'){
               $totalServices += $row['FIYAT'];
               $JSONs[$dayss]['Services']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['FIYAT']),
                  'currency'=> $row['CURRENCY']
               ];
            }elseif($row['CURRENCY']=='USD'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['USD']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
               $JSONs[$dayss]['Services']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['FIYAT']),
                  'currency'=> $row['CURRENCY']
               ];
            }elseif($row['CURRENCY']=='EUR'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
               $JSONs[$dayss]['Services']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['FIYAT']),
                  'currency'=> $row['CURRENCY']
               ];
            }elseif($row['CURRENCY']=='GBP'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
               $JSONs[$dayss]['Services']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['FIYAT']),
                  'currency'=> $row['CURRENCY']
               ];
            }
            $JSONs[$dayss]['Services'] = [
               'total'=> Yuvarla($totalServices),
               'exchange'=>$JSONs[$dayss]['Services']['exchange']
            ];
         }
      }else{
         $JSONs[$dayss]['Services']= false;
      }
      $SumServicesTotal +=$totalServices;

      $QeueryProducts = "SELECT * FROM view_products_tahsilatlar WHERE DT LIKE '$dayss%' AND FIRMA_ID = $user_Firma AND DURUM = 1 AND BUY_STATUS = 2 ORDER BY DT";
      $QP = $db->query($QeueryProducts, PDO::FETCH_ASSOC);
      $totalProducts = 0;
      $exchangeTotalsPrd = 0;
      if ( $QP->rowCount() ){
         foreach( $QP as $row ){
            if($row['CURRENCY']=='TRY'){
               $totalProducts += $row['PRICE'];
               $JSONs[$dayss]['Products']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['PRICE']),
                  'currency'=> $row['CURRENCY']
               ];
            }elseif($row['CURRENCY']=='USD'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['USD']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
               $JSONs[$dayss]['Products']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['PRICE']),
                  'currency'=> $row['CURRENCY']
               ];
            }elseif($row['CURRENCY']=='EUR'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
               $JSONs[$dayss]['Products']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['PRICE']),
                  'currency'=> $row['CURRENCY']
               ];
            }elseif($row['CURRENCY']=='GBP'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
               $JSONs[$dayss]['Products']['exchange'][] = [
                  'id'=> intval($row['ID']),
                  'price'=> intval($row['PRICE']),
                  'currency'=> $row['CURRENCY']
               ];
            }
            $JSONs[$dayss]['Products'] = [
               'total'=> Yuvarla($totalProducts),
               'exchange'=>$JSONs[$dayss]['Products']['exchange']
            ];
         }
      }else{
         $JSONs[$dayss]['Products']= false;
      }
      $SumProductsTotal +=$totalProducts;
      
      $JSONs[$dayss]['Total'] = Yuvarla($totalProducts+$totalServices);
    }
}
$TotalProductServices = $SumProductsTotal+$SumServicesTotal;
$JSONs['Sum'] = [
   'Products'=> $SumProductsTotal,
   'Services'=> $SumServicesTotal,
   'Total'=> Yuvarla($TotalProductServices)
];

$JSONs['Exchanges'] = [
   'USD'=>$CurrencyExchangeJSON[1]['USD']['satis'],
   'EUR'=>$CurrencyExchangeJSON[1]['EUR']['satis'],
   'GBP'=>$CurrencyExchangeJSON[1]['GBP']['satis'],
   'LastUpdate'=>$CurrencyExchangeJSON[0]['LastUpdate']
];

echo json_encode($JSONs);