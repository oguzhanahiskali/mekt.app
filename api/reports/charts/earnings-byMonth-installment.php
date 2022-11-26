<?php
$documentBase = $_SERVER['DOCUMENT_ROOT'];

include $documentBase.'/header-top.php';
$CurExJSONbase = $documentBase.'/api/exchange/doViz.json';
$CurrencyExchangeJSON = json_decode(file_get_contents($CurExJSONbase), true);

$JSONs['api'] = [];

$month = date('m');
$year = date('Y');
// $maxDate = date('t');
$maxDate = 31;
$SumServicesTotal = 0;
$SumProductsTotal = 0;

$totalsThisMonth = 0;
$totalsThisMonthProducts = 0;
$totalsThisMonthServices = 0;

$totalsLastMonth = 0;
$totalsLastMonthProducts = 0;
$totalsLastMonthServices = 0;

$thisMonthSerPayTypeCASH = [];
$thisMonthSerPayTypeEFT = [];
$thisMonthSerPayTypeCC = [];

$thisMonthProPayTypeCASH = [];
$thisMonthProPayTypeEFT = [];
$thisMonthProPayTypeCC = [];

$lastMonthSerPayTypeCASH = [];
$lastMonthSerPayTypeEFT = [];
$lastMonthSerPayTypeCC = [];

$lastMonthProPayTypeCASH = [];
$lastMonthProPayTypeEFT = [];
$lastMonthProPayTypeCC = [];

$totalServicesReset = 0;

function sum_index($arr, $col_name){
   $sum = 0;
   foreach ($arr as $item) {
       $sum += $item[$col_name];
   }
   return $sum;
}

for($d=1; $d<=$maxDate; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month){
      $dayss = date('Y-m-d', $time);

      $QeueryServices = "SELECT * FROM view_hizmet_tahsilatlar WHERE TAKSIT_TARIHI LIKE '$dayss%' AND FIRMA_ID = $user_Firma AND DURUM = 1 AND TAHSILAT_DURUM = 2 ORDER BY TAHSILAT_TIPI";
      $QS = $db->query($QeueryServices, PDO::FETCH_ASSOC);
      $totalServices = 0;
      $exchangeTotalSrv = 0;
      if ( $QS->rowCount() ){
         foreach( $QS as $row ){

            if($row['CURRENCY']=='TRY'){
               $totalServices += $row['FIYAT'];
               $totalServicesReset += $row['FIYAT'];
            }elseif($row['CURRENCY']=='USD'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['USD']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
               $totalServicesReset += $exchangeTotalSrv;
            }elseif($row['CURRENCY']=='EUR'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
               $totalServicesReset += $exchangeTotalSrv;
            }elseif($row['CURRENCY']=='GBP'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
               $totalServicesReset += $exchangeTotalSrv;
            }

            $SerPaymentType = $row['TAHSILAT_TIPI'];
            if($SerPaymentType == 1){
               $thisMonthSerPayTypeCASH[] = [
                  'id' => $row['ID'],
                  'price' => $totalServicesReset
               ];
            }else if($SerPaymentType == 2){
               $thisMonthSerPayTypeEFT[] = [
                  'id' => $row['ID'],
                  'price' => $totalServicesReset
               ];
            }else if($SerPaymentType == 3){
               $thisMonthSerPayTypeCC[] = [
                  'id' => $row['ID'],
                  'price' => $totalServicesReset
               ];}
               $totalServicesReset = 0;

         }
      }else{
         // $JSONs[$dayss]['Services']= false;
      }
      $SumServicesTotal +=$totalServices;
      $QeueryProducts = "SELECT * FROM view_products_tahsilatlar WHERE DT LIKE '$dayss%' AND FIRMA_ID = $user_Firma AND DURUM = 1 AND BUY_STATUS = 2 ORDER BY PAYMENT_TYPE";
      $QP = $db->query($QeueryProducts, PDO::FETCH_ASSOC);
      $totalProducts = 0;
      $exchangeTotalsPrd = 0;
      if ( $QP->rowCount() ){
         foreach( $QP as $row ){
            
            if($row['CURRENCY']=='TRY'){
               $totalProducts += $row['PRICE'];
            }elseif($row['CURRENCY']=='USD'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['USD']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
            }elseif($row['CURRENCY']=='EUR'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
            }elseif($row['CURRENCY']=='GBP'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
            }

            $ProPaymentType = $row['PAYMENT_TYPE'];
            if($ProPaymentType == 1){        array_push($thisMonthProPayTypeCASH, $totalProducts);
            }else if($ProPaymentType == 2){  array_push($thisMonthProPayTypeEFT, $totalProducts);
            }else if($ProPaymentType == 3){  array_push($thisMonthProPayTypeCC, $totalProducts); }

         }
      }else{
         // $JSONs[$dayss]['Products']= false;
      }
      $SumProductsTotal +=$totalProducts;
      
      $TotalProductServices = $SumProductsTotal+$SumServicesTotal;

      $totalsThisMonth +=  Yuvarla($TotalProductServices);
      $totalsThisMonthProducts += $SumProductsTotal;
      $totalsThisMonthServices += $SumServicesTotal;

      $JSONs['api']['thisMonth'][] = Yuvarla($TotalProductServices);
      $SumProductsTotal = 0;
      $SumServicesTotal = 0;
      $TotalProductServices= 0;

   }
}
$TotalThisMonthSerPayTypeCASH = sum_index($thisMonthSerPayTypeCASH, 'price');
$TotalThisMonthSerPayTypeEFT = sum_index($thisMonthSerPayTypeEFT, 'price');
$TotalThisMonthSerPayTypeCC = sum_index($thisMonthSerPayTypeCC, 'price');

$TotalThisMonthProPayTypeCASH = array_sum($thisMonthProPayTypeCASH);
$TotalThisMonthProPayTypeEFT = array_sum($thisMonthProPayTypeEFT);
$TotalThisMonthProPayTypeCC = array_sum($thisMonthProPayTypeCC);

$JSONs['api']['totals']['thisMonth'] = [
  'totals' =>  Yuvarla($totalsThisMonth),
  'product' => Yuvarla($totalsThisMonthProducts),
  'service' => Yuvarla($totalsThisMonthServices),
  'paymentType' => [
      'service' => [
         'cash' => Yuvarla($TotalThisMonthSerPayTypeCASH),
         'eft' => Yuvarla($TotalThisMonthSerPayTypeEFT),
         'cc' => Yuvarla($TotalThisMonthSerPayTypeCC)
      ],
     'product' => [
        'cash' => Yuvarla($TotalThisMonthProPayTypeCASH),
        'eft' => Yuvarla($TotalThisMonthProPayTypeEFT),
        'cc' => Yuvarla($TotalThisMonthProPayTypeCC)
     ],
     'cash' => Yuvarla($TotalThisMonthSerPayTypeCASH+$TotalThisMonthProPayTypeCASH),
     'eft' => Yuvarla($TotalThisMonthSerPayTypeEFT+$TotalThisMonthProPayTypeEFT),
     'cc' => Yuvarla($TotalThisMonthSerPayTypeCC+$TotalThisMonthProPayTypeCC)
  ]
];

$month = date('m',strtotime ( 'first day of previous month' ));

$year = date('Y');
// $maxDate = date('t');
$maxDate = 31;
$SumServicesTotal = 0;
$SumProductsTotal = 0;

for($d=1; $d<=$maxDate+1; $d++)
{
    $time=mktime(12, 0, 0, $month, $d, $year);          
    if (date('m', $time)==$month){
      $dayss = date('Y-m-d', $time);

      $QeueryServices = "SELECT * FROM view_hizmet_tahsilatlar WHERE TAKSIT_TARIHI LIKE '$dayss%' AND FIRMA_ID = $user_Firma AND DURUM = 1 AND TAHSILAT_DURUM = 2";
      $QS = $db->query($QeueryServices, PDO::FETCH_ASSOC);
      $totalServices = 0;
      $exchangeTotalSrv = 0;
      if ( $QS->rowCount() ){
         foreach( $QS as $row ){
            if($row['CURRENCY']=='TRY'){
               $totalServices += $row['FIYAT'];
            }elseif($row['CURRENCY']=='USD'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['USD']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
            }elseif($row['CURRENCY']=='EUR'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
            }elseif($row['CURRENCY']=='GBP'){
               $exchangeTotalSrv = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['FIYAT'];
               $totalServices += $exchangeTotalSrv;
            }
         }
      }else{
         // $JSONs[$dayss]['Services']= false;
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
               // $JSONs[$dayss]['Products']['exchange'][] = [
               //    'id'=> intval($row['ID']),
               //    'price'=> intval($row['PRICE']),
               //    'currency'=> $row['CURRENCY']
               // ];
            }elseif($row['CURRENCY']=='USD'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['USD']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
               // $JSONs[$dayss]['Products']['exchange'][] = [
               //    'id'=> intval($row['ID']),
               //    'price'=> intval($row['PRICE']),
               //    'currency'=> $row['CURRENCY']
               // ];
            }elseif($row['CURRENCY']=='EUR'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
               // $JSONs[$dayss]['Products']['exchange'][] = [
               //    'id'=> intval($row['ID']),
               //    'price'=> intval($row['PRICE']),
               //    'currency'=> $row['CURRENCY']
               // ];
            }elseif($row['CURRENCY']=='GBP'){
               $exchangeTotalsPrd = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['PRICE'];
               $totalProducts += $exchangeTotalsPrd;
               // $JSONs[$dayss]['Products']['exchange'][] = [
               //    'id'=> intval($row['ID']),
               //    'price'=> intval($row['PRICE']),
               //    'currency'=> $row['CURRENCY']
               // ];
            }
            // $JSONs[$dayss]['Products'] = [
            //    'total'=> Yuvarla($totalProducts),
            //    'exchange'=>$JSONs[$dayss]['Products']['exchange']
            // ];
         }
      }else{
         // $JSONs[$dayss]['Products']= false;
      }
      $SumProductsTotal +=$totalProducts;


      $TotalProductServices = $SumProductsTotal+$SumServicesTotal;

      
      $totalsLastMonth +=  Yuvarla($TotalProductServices);
      $totalsLastMonthProducts += $SumProductsTotal;
      $totalsLastMonthServices += $SumServicesTotal;
      
      $JSONs['api']['lastMonth'][] = Yuvarla($TotalProductServices);
      $SumProductsTotal = 0;
      $SumServicesTotal = 0;
      $TotalProductServices= 0;

      
    }
    
    $JSONs['api']['totals']['lastMonth'] = [
      'totals' =>  $totalsLastMonth,
      'product' => Yuvarla($totalsLastMonthProducts),
      'service' => Yuvarla($totalsLastMonthServices)
    ];

}
echo json_encode($JSONs['api']);