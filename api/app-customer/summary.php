<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$documentBase = $_SERVER['DOCUMENT_ROOT'];
$CurExJSONbase = $documentBase.'/api/exchange/doViz.json';
$CurrencyExchangeJSON = json_decode(file_get_contents($CurExJSONbase), true);

if(!empty($_POST['MID'])){
	$ids = $_POST['MID'];

	$resultJson = [];
	$PaymentServiceArr = [];
	$paymentProductArr = [];

    $ServiceCanceled = 0;

	$paymentServiceQ = "SELECT * FROM view_paymentServices WHERE DURUM = 1 AND MID = '{$ids}'";
	$paymentSummaryR = $db->query($paymentServiceQ, PDO::FETCH_ASSOC);

	if ( $paymentSummaryR->rowCount() ){
		foreach( $paymentSummaryR as $row ){
			$ServicePayment = Yuvarla($row['FIYAT']);
			$ServiceReceived = Yuvarla($row['ALINAN']);
			$ServiceRemainingDebt = $ServicePayment-$ServiceReceived;
			$ServiceCanceled += Yuvarla($row['IPTAL']);

			if($row['CURRENCY']=='TRY'){
                $exchangeTotal = $row['FIYAT'];
                $exchangeAlinan = $row['ALINAN'];
				$PaymentServiceArr[] =	[
					'CID'=> $row['ID'],
					'Price'=>	intval($exchangeTotal),
					'Received'=>	intval($exchangeAlinan),
					'Currency'=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt,
					'Canceled'=> Yuvarla($row['IPTAL'])
				];
			}else if($row['CURRENCY']=='USD'){
                $exchangeTotal = $CurrencyExchangeJSON[1]['USD']['satis']*$row['FIYAT'];
                $exchangeAlinan = $CurrencyExchangeJSON[1]['USD']['satis']*$row['ALINAN'];
				$PaymentServiceArr[] =	[
					'CID'=> $row['ID'],
					'Price'=>	intval($exchangeTotal),
					'Received'=>	intval($exchangeAlinan),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt,
					'Canceled'=> Yuvarla($row['IPTAL'])
				];
			}else if($row['CURRENCY']=='EUR'){
                $exchangeTotal = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['FIYAT'];
                $exchangeAlinan = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['ALINAN'];
				$PaymentServiceArr[] =	[
					'CID'=> $row['ID'],
					'Price'=>	intval($exchangeTotal),
					'Received'=>	intval($exchangeAlinan),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt,
					'Canceled'=> Yuvarla($row['IPTAL'])
				];
			}else if($row['CURRENCY']=='GBP'){
                $exchangeTotal = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['FIYAT'];
                $exchangeAlinan = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['ALINAN'];
				$PaymentServiceArr[] =	[
					'CID'=> $row['ID'],
					'Price'=>	intval($exchangeTotal),
					'Received'=>	intval($exchangeAlinan),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt,
					'Canceled'=> Yuvarla($row['IPTAL'])

				];
			}
		}
		$paymentServicePrice = $PaymentServiceArr[0]['Price'];
		$paymentServiceReceived = $PaymentServiceArr[0]['Received'];
	}else{
		$paymentServicePrice = 0;
		$paymentServiceReceived = 0;
	}
	
	$paymentProductQ = "SELECT * FROM view_products_tahsilatlar WHERE DURUM = 1 AND MID = '{$ids}'";
	$paymentProductR = $db->query($paymentProductQ, PDO::FETCH_ASSOC);

	$paymentProductTotal = null;
	$paymentProductReceive = null;
	$exchangeTotal = null;

	if ( $paymentProductR->rowCount() ){
		foreach( $paymentProductR as $row ){
			if($row['CURRENCY']=='TRY'){
				$exchangeTotal = intval($row['PRICE']);
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
				'CID'=> $row['KART_ID'],
				'productID'		=>	intval($row['PRODUCT']),
				'buy_status'=>	intval($row['BUY_STATUS']),
				'price'	=>	intval($row['PRICE']),
				'currency'	=>	$row['CURRENCY'],
				'exchange'	=> Yuvarla($exchangeTotal)
				];
			}else if($row['CURRENCY']=='USD'){
				$exchangeTotal = $CurrencyExchangeJSON[1]['USD']['satis']*$row['PRICE'];
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
					'CID'=> $row['KART_ID'],
					'productID'	=>	intval($row['PRODUCT']),
					'buy_status'=>	intval($row['BUY_STATUS']),
					'price'	=>	intval($row['PRICE']),
					'Currency'	=>	$row['CURRENCY'],
					'exchange'	=> Yuvarla($exchangeTotal),
					'sellPrice'	=> $CurrencyExchangeJSON[1]['USD']['satis']
					];
			}else if($row['CURRENCY']=='EUR'){
				$exchangeTotal = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['PRICE'];
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
					'CID'=> $row['KART_ID'],
					'productID'		=>	intval($row['PRODUCT']),
					'buy_status'=>	intval($row['BUY_STATUS']),
					'price'	=>	intval($row['PRICE']),
					'currency'	=>	$row['CURRENCY'],
					'exchange'	=> ($exchangeTotal),
					'sellPrice'	=> $CurrencyExchangeJSON[1]['EUR']['satis']
					];
			}else if($row['CURRENCY']=='GBP'){
				$exchangeTotal = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['PRICE'];
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
					'CID'=> $row['KART_ID'],
					'productID'		=>	intval($row['PRODUCT']),
					'buy_status'=>	intval($row['BUY_STATUS']),
					'price'	=>	intval($row['PRICE']),
					'currency'	=>	$row['CURRENCY'],
					'exchange'	=> Yuvarla($exchangeTotal),
					'sellPrice'	=> $CurrencyExchangeJSON[1]['GBP']['satis']
					];
			}
			$paymentProductTotal += $exchangeTotal;
		}
	}

	$TotalPayments = Yuvarla($paymentServicePrice+$paymentProductTotal);
	$TotalReceived = Yuvarla($paymentServiceReceived+$paymentProductReceive);

	$TotalRemainingDebt = $TotalPayments-$TotalReceived;

    $ServiceFiyat = 0;
    $ServiceAlinanlar = 0;
    foreach ($PaymentServiceArr as $key => $value) {
        $ServiceFiyat  += $value['Price'];
        $ServiceAlinanlar  += $value['Received'];
    }



	$resultJson[] =	[
		'PaymentProducts'		=>	[
			'Count'	=>	$paymentProductArr,
			'Total' =>	Yuvarla($paymentProductTotal),
			'Receive' =>	Yuvarla($paymentProductReceive)
		],
		'PaymentService' => [
			'Count'	=>	$PaymentServiceArr,
			'Total' =>	Yuvarla($ServiceFiyat),
			'Receive' => Yuvarla($ServiceAlinanlar)
		],
		'TotalPayment' => [
			'Total'=>	Yuvarla($paymentProductTotal+$ServiceFiyat),
			'Receive' => Yuvarla($paymentProductReceive+$ServiceAlinanlar),
			'Canceled'=> $ServiceCanceled
		]
	];

}else{
	exit();
}
echo json_encode($resultJson);