<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';

$json = [];

if(!empty($_GET['id'])){

   $id = $_GET['id'];
   if ($result = $link->query("SELECT * FROM view_expenses WHERE ID = '{$id}' AND FIRMA_ID=$user_Firma ORDER BY ID DESC")) {
      while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $expensesID = $row['ADI'];
        $expensesDesc = null;
        switch ($expensesID) {
           case 1: $expensesDesc = "Aidat Gideri"; break;
           case 2: $expensesDesc = "Demirbaş Alımı"; break;
           case 3: $expensesDesc = "Diğer Harcamalar"; break;
           case 4: $expensesDesc = "Doğalgaz Faturası"; break;
           case 5: $expensesDesc = "Elektrik Faturası"; break;
           case 6: $expensesDesc = "Firma Ödemeleri"; break;
           case 7: $expensesDesc = "İnternet Faturası"; break;
           case 8: $expensesDesc = "Kira Gideri"; break;
           case 9: $expensesDesc = "Kargo Ödemeleri"; break;
           case 10: $expensesDesc = "Malzeme Ödemeleri"; break;
           case 11: $expensesDesc = "Muhasebe Gideri"; break;
           case 12: $expensesDesc = "Mutfak Harcamaları"; break;
           case 13: $expensesDesc = "Personel Harcamaları"; break;
           case 14: $expensesDesc = "Su Faturası"; break;
           case 15: $expensesDesc = "Telefon Faturası"; break;
           case 16: $expensesDesc = "Temizlik Ürünleri"; break;
           case 17: $expensesDesc = "Cihaz Kalibrasyon / Bakım Onarım"; break;
        }
        $paymentTypeID = $row['TAHSILAT_TIPI'];
        $paymentTypeDesc = null;
        switch ($paymentTypeID) {
           case 1: $paymentTypeDesc = "Nakit"; break;
           case 2: $paymentTypeDesc = "Havale / EFT"; break;
           case 3: $paymentTypeDesc = "Kredi Kartı"; break;
        }
        $paymentStatusID = $row['TAHSILAT_DURUM'];
        $paymentStatusDesc = null;
        switch ($paymentStatusID) {
           case 0: $paymentStatusDesc = "Ödenmedi"; break;
           case 1: $paymentStatusDesc = "İptal"; break;
           case 2: $paymentStatusDesc = "Ödendi"; break;
        }
        $expensesPhoto = $row['FILE'];
        if(empty($expensesPhoto)){
           $expensesPhoto = '~';
        }
        $json[] = [
           'ID'			=>	intval($row['ID']),
           'ExpensesID'		=>  $expensesID,
           'Expenses'		=>  $expensesDesc,
           'Description'	=>  $row['ACIKLAMA'],
           'Price'			=>  $row['TUTAR'],
           'Currency'		=>  $row['CURRENCY'],
           'Payment'       => [
               'TypeID'    =>  $paymentTypeID,
               'Type'	   =>  $paymentTypeDesc,
               'StatusID'  =>  $paymentStatusID,
               'Status'    =>  $paymentStatusDesc,
           ],
           'Photo'			=>  $expensesPhoto,
           'PaymentDT'		=>  date('Y-m-d', strtotime($row['DT'])),
           'CreateUID'		=>  $row['STAFF'],
           'CreateDT'		=>  $row['UDT']
        ];
      }
   }else{ 
      $json[]=[
         'Results'   => 'Bad request!'
      ];
   }
  

}else{
   $json[]=[
      'Results'   => 'Bad request!'
   ];
}
      
echo json_encode($json);
?>