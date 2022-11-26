<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$documentBase = $_SERVER['DOCUMENT_ROOT'];
$CurExJSONbase = $documentBase.'/api/exchange/doViz.json';
$CurrencyExchangeJSON = json_decode(file_get_contents($CurExJSONbase), true);

if(!empty($_POST['ids'])){
	$ids = $_POST['ids'];

	$resultJson = [];
	$PaymentServiceArr = [];
	$paymentProductArr = [];

	$paymentServiceQ = "SELECT * FROM view_paymentServices WHERE ID = '{$ids}' AND FIRMA_ID = '{$user_Firma}' ORDER BY MID";
	$paymentSummaryR = $db->query($paymentServiceQ, PDO::FETCH_ASSOC);

	if ( $paymentSummaryR->rowCount() ){
		foreach( $paymentSummaryR as $row ){
			$ServicePayment = Yuvarla($row['FIYAT']);
			$ServiceReceived = Yuvarla($row['ALINAN']);
			$ServiceRemainingDebt = $ServicePayment-$ServiceReceived;


			if($row['CURRENCY']=='TRY'){
				$PaymentServiceArr[] =	[
					'Price'		=>	intval($row['FIYAT']),
					'Received'=>	intval($row['ALINAN']),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt
				];
			}else if($row['CURRENCY']=='USD'){
				$PaymentServiceArr[] =	[
					'Price'		=>	intval($row['FIYAT']),
					'Received'=>	intval($row['ALINAN']),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt
				];
			}else if($row['CURRENCY']=='EUR'){
				$PaymentServiceArr[] =	[
					'Price'		=>	intval($row['FIYAT']),
					'Received'=>	intval($row['ALINAN']),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt
				];
			}else if($row['CURRENCY']=='GBP'){
				$PaymentServiceArr[] =	[
					'Price'		=>	intval($row['FIYAT']),
					'Received'=>	intval($row['ALINAN']),
					'Currency'	=>	$row['CURRENCY'],
					'RemainingDebt'=> $ServiceRemainingDebt

				];
			}
		}
	}
	
	$paymentProductQ = "SELECT * FROM tbl_seans_kart_urun WHERE DURUM = 1 AND KART_ID = '{$ids}'";
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
				'productID'		=>	intval($row['PRODUCT']),
				'buy_status'=>	intval($row['BUY_STATUS']),
				'price'	=>	intval($row['PRICE']),
				'currency'	=>	$row['CURRENCY']
				];
			}else if($row['CURRENCY']=='USD'){
				$exchangeTotal = $CurrencyExchangeJSON[1]['USD']['satis']*$row['PRICE'];
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
					'productID'	=>	intval($row['PRODUCT']),
					'buy_status'=>	intval($row['BUY_STATUS']),
					'price'	=>	intval($row['PRICE']),
					'Currency'	=>	$row['CURRENCY'],
					'exchange'	=> $exchangeTotal,
					'sellPrice'	=> $CurrencyExchangeJSON[1]['USD']['satis']
					];
			}else if($row['CURRENCY']=='EUR'){
				$exchangeTotal = $CurrencyExchangeJSON[1]['EUR']['satis']*$row['PRICE'];
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
					'productID'		=>	intval($row['PRODUCT']),
					'buy_status'=>	intval($row['BUY_STATUS']),
					'price'	=>	intval($row['PRICE']),
					'currency'	=>	$row['CURRENCY'],
					'exchange'	=> $exchangeTotal,
					'sellPrice'	=> $CurrencyExchangeJSON[1]['EUR']['satis']
					];
			}else if($row['CURRENCY']=='GBP'){
				$exchangeTotal = $CurrencyExchangeJSON[1]['GBP']['satis']*$row['PRICE'];
				if($row['BUY_STATUS']==2){ $paymentProductReceive += $exchangeTotal; }

				$paymentProductArr[] =	[
					'productID'		=>	intval($row['PRODUCT']),
					'buy_status'=>	intval($row['BUY_STATUS']),
					'price'	=>	intval($row['PRICE']),
					'currency'	=>	$row['CURRENCY'],
					'exchange'	=> $exchangeTotal,
					'sellPrice'	=> $CurrencyExchangeJSON[1]['GBP']['satis']
					];
			}
			$paymentProductTotal += $exchangeTotal;
		}
	}

	$TotalPayments = Yuvarla($PaymentServiceArr[0]['Price']+$paymentProductTotal);
	$TotalReceived = Yuvarla($PaymentServiceArr[0]['Received']+$paymentProductReceive);
	$TotalRemainingDebt = $TotalPayments-$TotalReceived;
	$resultJson[] =	[
		'PaymentServices'		=>	$PaymentServiceArr,
		'PaymentProducts'		=>	[
			'Count'	=>	$paymentProductArr,
			'Total' =>	Yuvarla($paymentProductTotal),
			'Receive' =>	Yuvarla($paymentProductReceive)
		],
		'Payments'	=> [
			'Total'=>	$TotalPayments,
			'Receive'=>$TotalReceived,
			'RemainingDebt'=> $TotalRemainingDebt
		]
	];

}else{
	exit();
}
echo json_encode($resultJson);