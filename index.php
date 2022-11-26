<?php include 'header-top.php'; ?>
<!DOCTYPE html>
<html class="loaded dark-layout" lang="en" data-textdirection="ltr" style="--vh:9.29px;">
<!-- BEGIN: Head-->
<?php include 'includes/head.php';?>
<!-- END: Head-->

<!-- BEGIN: Body-->

</style>
<link rel="stylesheet" href="/app-assets/css/times.css?asd"/>
<style id="clock-animations"></style>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php include 'includes/header.php';?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php include 'includes/main-menu.php';?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <!-- Welcome -->
                        <div class="col-md-5 col-12">
                            <div class="card card-congratulation-medal">
                                <div class="card-body ">
                                    <h5 id="wlcmsg">Hoş Geldiniz 🎉 <?=$personel_adi?></h5>
                                    <p class="card-text font-small-3">Umarım güzel bir gün geçirirsin...❤</br>Bugünun Seans Özetini senin için aşağıdaki şekilde listeledim.</p>
                                    <div class="row">
                                        <div class="text-center colors-container bg-gradient-primary rounded text-white width-150 h-25 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                            <span class="align-middle">Toplam Seans: </span><br>
                                            <span class="align-middle ml-1" id="toplamSeans">-</span>
                                        </div>
                                        <div class="text-center colors-container bg-gradient-danger rounded text-white width-150 h-25 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                            <span class="align-middle">İptal: </span><br>
                                            <span class="align-middle ml-1" id="SeansIptal">-</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text-center colors-container bg-gradient-success rounded text-white width-100 h-25 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                            <span class="align-middle">Gelen: </span><br>
                                            <span class="align-middle ml-1" id="SeansGelen">-</span>
                                        </div>
                                        <div class="text-center colors-container bg-gradient-warning rounded text-white width-100 h-25 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                            <span class="align-middle">Kontrol: </span><br>
                                            <span class="align-middle ml-1" id="SeansBekleyen">-</span>
                                        </div>
                                        <div class="text-center colors-container bg-gradient-info rounded text-white width-100 h-25 d-flex align-items-center justify-content-center mr-1 ml-50 my-1 shadow">
                                            <span class="align-middle">Bekleyen: </span><br>
                                            <span class="align-middle ml-1" id="SeansGelmeyen">-</span>
                                        </div>
                                    </div>
                                    <img src="/app-assets/images/illustration/hello-ep.png" class="ep-hello" alt="Hello EP!">
                                </div>
                            </div>
                        </div>
                        <!-- Welcome -->
                        <!-- Weather -->
                        <div class="col-md-4 col-12">
                            <div class="">
                                <div class="card text-white weatherBG">
                                    <div class="card-content" style="height:19em">
                                        <h5 id="weatherStatus" style="text-transform:uppercase" class="font-medium-3 text-white text-center mt-3">{Status}</h5>
                                        <p id="weatherCity" class="text-white text-center">{City}</p>
                                        <div class="card-content">
                                            <div class="d-flex justify-content-around mt-2">
                                                <div class="icon">
                                                    <img id="weatherICON" src="app-assets/images/weather/night_half_moon_clear.png" height="80" width="80">
                                                </div>
                                                <div class="temprature mt-3">
                                                    <p id="weatherCelcius" class="font-large-3">{}<span class="mt-1">°</span></p>
                                                </div>
                                            </div>
                                            <div class="mt-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Weather --> 
                            <div class="col-lg-3 col-12">
                                <div class="">
                                    <div class="card bg-gradient-danger">
                                        <div class="card-header">
                                            <h4 class="card-title text-white">Tamamlanan Seanslar</h4>                                        </div>
                                            <div class="card-body p-0">
                                                <div id="goal-overview-chart"></div>
                                                <div class="row border-top text-center mx-0">
                                                    <div class="col-6 border-right py-1">
                                                        <p class="card-text mb-0 text-white" style="font-size:.8em">Tamamlanan Seans</p>
                                                        <h3 class="font-weight-bolder mb-0 text-white" id="completed">{0}</h3>
                                                    </div>
                                                    <div class="col-6 py-1">
                                                        <p class="card-text mb-0 text-white" style="font-size:.8em">Bekleyen Seans</p>
                                                        <h3 class="font-weight-bolder mb-0 text-white" id="waiting">{0}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Clock -->
                            <div class="col-lg-3 col-md-12 col-sm-12">
                            </div>
                            <!-- Clock -->
                        </div>
                    </div>
                    <?php if($staffMission==1){?>
                    <div class="row">
                        <div class="col-md-9 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="card-title">Kazanç Grafiği</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-start">
                                            <div class="col-md-3 text-center">
                                                <p class="mb-50 text-bold-600">Bu Ay</p>
                                                [Ü]: <small id="thisMonthProduct" title="Ürün"></small> + [H]: <small id="thisMonthService" title="Hizmet"></small> =
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">₺</sup>
                                                        <span class="text-success" id="thisMonthTotal">0</span>
                                                </h2>
                                            </div>
                                            <div class="col-md-3 text-center">
                                                <p class="mb-50 text-bold-600">Geçen Ay</p>
                                                [Ü]: <small id="lastMonthProduct" title="Ürün"></small> + [H]: <small id="lastMonthService" title="Hizmet"></small> =
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">₺</sup>
                                                        <span id="lastMonthTotal">0</span>
                                                    </span>
                                                </h2>
                                            </div>
                                        </div>
                                        <div id="revenue-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <div>
                                        <h4 class="mb-0">
                                            Gelir Türü (Bu Ay)
                                        </h4>
                                        <small>Kasa: <?=$currency?> <span class="text-muted" id="thisMonthTotal2"></span></small>
                                    </div>
                                </div>

                                <div id="pie-chart" style="height:240px"></div>

                                <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                    <button class="btn btn-primary w-100 box-shadow-1 mt-2" onclick="window.location.href='/report-earnings'">Ciro Dökümü <i class="feather icon-chevrons-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row match-height">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>SMS Hareketleri</h4>
                                    <p class="mb-0">(Bugün)</p>

                                </div>
                                <div class="card-content">
                                    <div class="rounded-top text-center">
                                        <img src="app-assets/images/illustration/faq-illustrations.svg" alt="Meeting Pic" height="170">
                                    </div>
                                    <div class="card-body">
                                        <ul class="activity-timeline timeline-left list-unstyled">
                                        
                                        <?php
                                        if($user_Firma!=124){
                                            $query = $db->query("SELECT * FROM view_today_sendSMS WHERE FIRMA_ID = {$user_Firma} LIMIT 6", PDO::FETCH_ASSOC);
                                            if($query->rowCount()){
                                                foreach($query as $row){
                                                    $StrtoTimedtProcessTime = strtotime($row['DT']);
                                                    $dtProcessTime = date("H:i:s", $StrtoTimedtProcessTime);
                                                    ?>
                                                        <li data-toggle="tooltip" data-original-title="<?=$row['Mesaj'];?>">
                                                        <div class="timeline-icon bg-info">
                                                                <i class="feather icon-message-circle font-medium-2 align-middle"></i>
                                                            </div>
                                                            <div class="timeline-info">
                                                                <p class="font-weight-bold mb-0 success"></p>
                                                                <span class="font-small-1"><a data-html="true">Mesaj Detayı için dokunun</a></span></BR>
                                                                <span class="font-small-1 font-weight-bold">Otomatik SMS</span>
                                                            </div>
                                                            <small class="text-muted font-weight-bold">Müşteri: <?php echo $row['ADI_SOYADI'].' - ('.$dtProcessTime.')'; ?></small>
                                                        </li>
                                                    <li>
                                                    <?php
                                                }
                                            }else{
                                                ?>
                                                    <li>
                                                        <div class="timeline-icon bg-info">
                                                            <i class="feather feather icon-alert-triangle font-medium-2 align-middle"></i>
                                                        </div>
                                                        <div class="timeline-info">
                                                            <p class="font-weight-bold mb-0 info">Bugün henüz bir etkinlik olmadı</p>
                                                            <span class="font-small-1">Etkinlik Yok.</span>
                                                        </div>
                                                        <small class="text-muted">~</small>
                                                    </li>
                                                <?php
                                            }
                                        }
                                        ?></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title">Ürün Satış Hareketleri</h4>
                                    </div>
                                    <p class="mb-0">(Bugün)</p>
                                </div>
                                <div class="card-content">
                                    <div class="rounded-top text-center">
                                        <img src="app-assets/images/illustration/personalization.svg" alt="Meeting Pic" height="170">
                                    </div>
                                    <div class="card-body">
                                        <ul class="activity-timeline timeline-left list-unstyled">
                                        
                                        <?php $query = $db->query("SELECT * FROM view_used_products WHERE FIRMA_ID = {$user_Firma} AND DATE(DT) = CURDATE() ORDER BY DT DESC LIMIT 5", PDO::FETCH_ASSOC);
                                            if($query->rowCount()){
                                                foreach($query as $row){
                                                    $StrtoTimedtProcessTime = strtotime($row['DT']);
                                                    $dtProcessTime = date("H:i:s", $StrtoTimedtProcessTime);
                                                    ?>
                                                        <li>
                                                            <div class="timeline-icon <?php if($row['BUY_STATUS'] == 2){ echo "bg-success";}else{ echo "bg-danger"; } ?>">
                                                                <i class="feather <?php if($row['BUY_STATUS'] == 2){ echo "icon-trending-up";}else{ echo "icon-trending-down"; } ?> font-medium-2 align-middle"></i>
                                                            </div>
                                                            <div class="timeline-info">
                                                                <p class="font-weight-bold mb-0 <?php if($row['BUY_STATUS'] == 2){ echo "success";}else{ echo "danger"; } ?>"><?php echo "( ID: ". $row['ID']." ) - "; if($row['BUY_STATUS'] == 2){ echo "ÜRÜN ÖDEMESİ ALINDI";}else{ echo "ÖDEME ALINMADI"; }?></p>
                                                                <span class="font-small-1">Ürün Adı: <?php echo $row['URUN_ADI']; ?></span></BR>
                                                                <span class="font-small-1 font-weight-bold"><?php echo $row['MUSTERI_ADI'].' - '.$row['FIYAT'].' '.$row['CURRENCY']; ?></span>
                                                            </div>
                                                            <small class="text-muted font-weight-bold"><?php echo $row['PERSONEL'].' - ('.$dtProcessTime.')'; ?></small>
                                                        </li>
                                                    <?php /*
                                                    $UsedProductMusteriAdi = $row['MUSTERI_ADI'];
                                                    $UsedProductUrunAdi = $row['URUN_ADI'];
                                                    $UsedProductUrunFiyat = $row['FIYAT'];
                                                    $UsedProductStatus = $row['BUY_STATUS'];
                                                    $UsedProductKartID = $row['KART_ID'];
                                                    $UsedProductDT = $row['DT'];*/
                                                }
                                            }else{
                                                ?>
                                                    <li>
                                                        <div class="timeline-icon bg-info">
                                                            <i class="feather feather icon-alert-triangle font-medium-2 align-middle"></i>
                                                        </div>
                                                        <div class="timeline-info">
                                                            <p class="font-weight-bold mb-0 info">Bugün henüz bir etkinlik olmadı</p>
                                                            <span class="font-small-1">Etkinlik Yok.</span>
                                                        </div>
                                                        <small class="text-muted">~</small>
                                                    </li>
                                                <?php
                                            }
                                        ?></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-start">
                                    <div>
                                        <h4 class="card-title">Hizmet Satış Hareketleri</h4>
                                    </div>
                                    <p class="mb-0">(Bugün)</p>
                                </div>
                                <div class="card-content">
                                    <div class="rounded-top text-center">
                                        <img src="app-assets/images/illustration/email.svg" alt="Meeting Pic" height="170">
                                    </div>
                                    <div class="card-body">
                                        <ul class="activity-timeline timeline-left list-unstyled">
                                            <?php
                                                $query = $db->query("SELECT * FROM view_today_payment_received WHERE DURUM = 1 AND FIRMA_ID = $user_Firma ORDER BY ISLEM_TARIHI DESC LIMIT 6", PDO::FETCH_ASSOC);
                                                if ( $query->rowCount() )
                                                {
                                                    foreach( $query as $row )
                                                    {
                                                        $StrtoTimedtProcessTime = strtotime($row['ISLEM_TARIHI']);
                                                        $dtProcessTime = date("H:i:s", $StrtoTimedtProcessTime);
                                                        ?>
                                                        <li>
                                                            <div class="timeline-icon <?php if($row['TAHSILAT_DURUM'] == 2){ echo "bg-success";}else{ echo "bg-danger"; } ?>">
                                                                <i class="feather <?php if($row['TAHSILAT_DURUM'] == 2){ echo "icon-trending-up";}else{ echo "icon-trending-down"; } ?> font-medium-2 align-middle"></i>
                                                            </div>
                                                            <div class="timeline-info">
                                                                <p class="font-weight-bold mb-0 success"><?php echo "( ID: ". $row['ID']." ) - "; if($row['TAHSILAT_DURUM'] == 2){ echo "HİZMET ÖDEMESİ ALINDI";}else{ echo "ÖDEME İPTAL"; } ?></p>
                                                                <span class="font-small-1"><?php echo $row['MUSTERI'].' - '.$row['FIYAT'].' TL'; ?></span>
                                                            </div>
                                                            <small class="text-muted"><?php echo $row['PERSONEL'].' - ('.$dtProcessTime.')'; ?></small>
                                                        </li>
                                                        <?php
                                                    }
                                                }else{
                                                    ?>
                                                        <li>
                                                            <div class="timeline-icon bg-info">
                                                                <i class="feather feather icon-alert-triangle font-medium-2 align-middle"></i>
                                                            </div>
                                                            <div class="timeline-info">
                                                                <p class="font-weight-bold mb-0 info">Bugün henüz bir etkinlik olmadı</p>
                                                                <span class="font-small-1">Etkinlik Yok.</span>
                                                            </div>
                                                            <small class="text-muted">~</small>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Yaklaşan Seanslar</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table id="randevus" class="table table-hover-animation mb-0" style="margin-bottom:25px!important">
                                            <thead style="text-align:center">
                                                <tr>
                                                    <th>KART ID</th>
                                                    <th>DURUM</th>
                                                    <th>TÜRÜ</th>
                                                    <th>ESTETİSYEN</th>
                                                    <th>ODA</th>
                                                    <th>HİZMET ADI</th>
                                                    <th>MÜŞTERİ ADI</th>
                                                    <th>ZAMAN</th>
                                                    <th>SÜRESİ</th>
                                                    <th>SEANS</th>
                                                    <th>İŞLEM</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align:center">
                                                <?php // where durum 1 eklendi. 11/06/2019
													$query = $db->query("SELECT * FROM view_test_takvim WHERE FIRMA_ID = '$user_Firma' AND (DATE(START) = CURDATE() OR
                                                                        DATE(KONTROL_START) = CURDATE()) ORDER BY DDD ASC", PDO::FETCH_ASSOC);
                                                    $countSeansSayisi = 0;
                                                    $countBekleyen = 0;
                                                    $countGelmeyen = 0;
                                                    $countGelen = 0;
                                                    $countIptal = 0;
													if ( $query->rowCount() )
													{
                                                        $dateNow = date('Y-m-d H:i:s');
                                                        $dateToday = date('Y-m-d');
														foreach( $query as $row )
														{
                                                            if(!isset($row['KART_ID'])){ continue; }
                                                            $countSeansSayisi +=1;
                                                            $timestampStart = strtotime($row['START']);
                                                            $dates = date("Y-m-d", $timestampStart);
                                                            $dateTime = date("H:i:s", $timestampStart);
                                                            $kartID = $row['KART_ID'];
                                                            $eventDT = $row['START'];
                                                            $eventKontrolDT = $row['KONTROL_START'].' '.$row['KONTROL_SAAT'];

                                                            if($dateNow<$eventDT){ $eventStatus = "Bekliyor"; }
                                                            else{ $eventStatus = "Gelmedi"; }
                                                            if($dateNow<$eventKontrolDT){ $eventKontrolStatus = "Bekliyor"; $countBekleyen +=1;
                                                            }else{ $eventKontrolStatus = "Gelmedi"; }
                                                            if($row['SEANS_NOT']){
                                                                $seansNot = 'data-html="true" data-toggle="tooltip" data-placement="bottom" data-original-title="<b>Seans Notu:</b> <i>'.$row['SEANS_NOT'].'</i>"';
                                                                $lili = '<i class="fa fa-pencil-square-o success"></i>';
                                                            }
                                                            else{   $seansNot = null; $lili = null; }
                                                    
                                                            print '<tr '.$seansNot.'>';
															print '<td>'.$lili.' #'.$row['ID'].'</td>';
                                                            print "<td><i class='fa fa-circle font-small-3 ";
                                                                if($dates == $dateToday){
                                                                    if($row['SEANS_DURUM']==0){ if($eventStatus == "Gelmedi"){ echo ""; }else{ echo "text-warning"; } }elseif($row['SEANS_DURUM']==1){ echo "text-danger"; }elseif($row['SEANS_DURUM']==2){ echo "text-success"; } print" mr-50'></i>";
                                                                    if($row['SEANS_DURUM']==0){ echo $eventStatus; $countGelmeyen+=1; }elseif($row['SEANS_DURUM']==1){ echo "İptal"; $countIptal +=1; }      elseif($row['SEANS_DURUM']==2){ echo "Geldi"; $countGelen+=1; }
                                                                }else{
                                                                    if($row['KONTROL_DURUM']==0){ if($eventKontrolStatus == "Gelmedi"){ echo ""; }else{ echo "text-warning"; }  }elseif($row['KONTROL_DURUM']==1){ echo "text-danger"; }elseif($row['KONTROL_DURUM']==2){ echo "text-success"; } print" mr-50'></i>";
                                                                    if($row['KONTROL_DURUM']==0){ echo $eventKontrolStatus; $countGelmeyen+=1;}elseif($row['KONTROL_DURUM']==1){ echo "İptal"; $countIptal +=1; }      elseif($row['KONTROL_DURUM']==2){ echo "Geldi"; $countGelen+=1; }
                                                                }
                                                            print "</td>";
                                                            if($dates == $dateToday){
                                                                print '<td class="info">';
                                                                echo 'SEANS';
                                                                print '</td>';
                                                            }else{
                                                                print '<td class="warning">';
                                                                echo "KNTRL";
                                                                print '</td>';
                                                            }
                                                            $UygulamaBolgesi= "";
                                                            if($row['HIZMET_BOLGE']){
                                                                $hizmetBolgeler = $row['HIZMET_BOLGE'];
                                                                if (strpos($hizmetBolgeler, ',')) {
                                                                    $hizmetBolgelerFe = explode(',', $hizmetBolgeler);
                                                                    foreach($hizmetBolgelerFe as $bolge) {
                                                                        $QhizmetBolge = "SELECT AREA FROM view_regions_id WHERE ID = '{$bolge}'";
                                                                        $QhizmetBolgesi = $db->query($QhizmetBolge, PDO::FETCH_ASSOC);
                                                                        if($QhizmetBolgesi->rowCount()){
                                                                            foreach($QhizmetBolgesi as $bolgeName){
                                                                                $UygulamaBolgesi .= $bolgeName['AREA'].", ";
                                                                            }
                                                                        }
                                                                    }
                                                                    $UygulamaBolgesi = rtrim($UygulamaBolgesi,", ");
                                                                }else{
                                                                    $QhizmetBolge = "SELECT AREA FROM view_regions_id WHERE ID = '{$hizmetBolgeler}'";
                                                                    $QhizmetBolgesi = $db->query($QhizmetBolge, PDO::FETCH_ASSOC);
                                                                    if($QhizmetBolgesi->rowCount()){
                                                                        $UygulamaBolgesi = '';
                                                                        foreach($QhizmetBolgesi as $bolgeName){
                                                                            $UygulamaBolgesi = $bolgeName['AREA'];
                                                                        }
                                                                    }
                                                                }
                                                                 
                                                                
                                                            }else{
                                                                $UygulamaBolgesi = 'Belirtilmedi';
                                                            }
                                                    
															print '<td>'.$row['ESTETISYENADI'].' '.kelimeden_kes($row['ESTETISYENSOYADI'], 2).'.</td>';
															print '<td>'.$row['RESOURCE_NAME'].'</td>';
															print '<td>'.$row['TITLE'].' <h6 class="primary text-bold-600 small">('.$UygulamaBolgesi.')</h6></td>';
                                                            print '<td>'.$row['ADI_SOYADI'].'</td>';
                                                            print '<td>';
                                                            if($dates == $dateToday){
                                                                echo $dateTime;
                                                            }else{
                                                                echo $row['KONTROL_SAAT'];
                                                            }
                                                            print '</td>';
															print '<td>'.$row['SEANS_SURE'].'</td>';
                                                            print '
                                                            <td>
                                                                <span>'.$row['TOPLAM_SEANS'].' / '.$row['TAMAMLANAN'].' </span>
                                                                <div class="progress progress-bar-success mt-1 mb-0" style="margin:0px 0px 15px 0px!important;">
                                                                    <div class="progress-bar" role="progressbar" style="width: '. $row['TAMAMLANAN'] / ($row['TOPLAM_SEANS'] / 100).'%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>';
                                                            print'<td><button type="button" class="btn btn-success round btn-sm"';?> onclick="window.location.href='session-details.php?CID=<?php print $row['KART_ID']; ?>'"><?php print "GİT".'</button></td>';
															print "</tr>";
													 	}
													}
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="MeetingAppointment" class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Görüşme Randevuları</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table id="randevus" class="table table-hover-animation mb-0" style="margin-bottom:25px!important">
                                            <thead style="text-align:center">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>DURUM</th>
                                                    <th>MÜŞTERİ ADI</th>
                                                    <th>ESTETİSYEN</th>
                                                    <th>HİZMET ADI</th>
                                                    <th>NOT</th>
                                                    <th>ZAMAN</th>
                                                    <th>İŞLEM</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align:center">
                                                <?php
													$query = $db->query("SELECT * FROM view_meetingAppointment WHERE FIRMA_ID = '$user_Firma' AND (DATE(START) = CURDATE()) ORDER BY START ASC", PDO::FETCH_ASSOC);
                                                    $countMeetingBekleyen = 0;
                                                    $countMeetingGelmeyen = 0;
                                                    $countMeetingGelen = 0;
                                                    $countMeetingIptal = 0;
													if ( $query->rowCount() )
													{
                                                        $dateNow = date('Y-m-d H:i:s');
                                                        $dateToday = date('Y-m-d');
														foreach( $query as $row )
														{
                                                            if(!isset($row['ID'])){ continue; }
                                                            $countSeansSayisi +=1;
                                                            $timestampStart = strtotime($row['START']);
                                                            $dates = date("Y-m-d", $timestampStart);
                                                            $dateTime = date("H:i:s", $timestampStart);
                                                            $kartID = $row['ID'];
                                                            $eventDT = $row['START'];

                                                            if($dateNow<$eventDT){ $eventStatus = "Bekliyor"; }
                                                            else{ $eventStatus = "Gelmedi"; }
                                                            print "<tr>";
															print '<td>#'.$row['ID'].'</td>';
                                                            print "<td><i class='fa fa-circle font-small-3 ";
                                                            if($row['MEETING_STATUS']==0){ if($eventStatus == "Gelmedi"){ echo ""; }else{ echo "text-warning"; } }elseif($row['MEETING_STATUS']==1){ echo "text-danger"; }elseif($row['MEETING_STATUS']==2){ echo "text-success"; } print" mr-50'></i>";
                                                            if($row['MEETING_STATUS']==0){ echo $eventStatus; $countMeetingGelmeyen+=1; }elseif($row['MEETING_STATUS']==1){ echo "İptal"; $countMeetingIptal +=1; }      elseif($row['MEETING_STATUS']==2){ echo "Geldi"; $countMeetingGelen+=1; }
                                                            print "</td>";
                                                            print '<td>'.$row['CUSTOMER'].'</td>';
															print '<td>'.$row['STAFF'].'</td>';
                                                            $UygulamaBolgesi= "";
                                                            if(strlen($row['REGIONS'])>0){
                                                                $hizmetBolgeler = $row['REGIONS'];
                                                                if (strpos($hizmetBolgeler, ',')) {
                                                                    $hizmetBolgelerFe = explode(',', $hizmetBolgeler);
                                                                    foreach($hizmetBolgelerFe as $bolge) {
                                                                        $QhizmetBolge = "SELECT AREA FROM view_regions_id WHERE ID = '{$bolge}'";
                                                                        $QhizmetBolgesi = $db->query($QhizmetBolge, PDO::FETCH_ASSOC);
                                                                        if($QhizmetBolgesi->rowCount()){
                                                                            foreach($QhizmetBolgesi as $bolgeName){
                                                                                $UygulamaBolgesi .= $bolgeName['AREA'].", ";
                                                                            }
                                                                        }
                                                                    }
                                                                    $UygulamaBolgesi = rtrim($UygulamaBolgesi,", ");
                                                                }else{
                                                                    $QhizmetBolge = "SELECT AREA FROM view_regions_id WHERE ID = '{$hizmetBolgeler}'";
                                                                    $QhizmetBolgesi = $db->query($QhizmetBolge, PDO::FETCH_ASSOC);
                                                                    if($QhizmetBolgesi->rowCount()){
                                                                        $UygulamaBolgesi = '';
                                                                        foreach($QhizmetBolgesi as $bolgeName){
                                                                            $UygulamaBolgesi = $bolgeName['AREA'];
                                                                        }
                                                                    }else{
                                                                    }
                                                                }
                                                            }else{
                                                                $UygulamaBolgesi = 'Belirtilmedi';
                                                            }
															print '<td>'.$row['SERVICE'].' <h6 class="primary text-bold-600">('.$UygulamaBolgesi.')</h6></td>';
															print '<td>'.substr($row['NOTE'], 0,25).'...</td>';
                                                            print '<td>'.$dateTime.'</td>';
                                                            print'<td><button disabled type="button" class="btn btn-success round btn-sm"';?> onclick="window.location.href='session-details.php?CID=<?php print $row['ID']; ?>'"><?php print "GİT".'</button></td>';
															print "</tr>";
													 	}
													}else{
                                                        ?>
                                                        <script>
                                                            document.getElementById("MeetingAppointment").classList.add("d-none");

                                                        </script>
                                                        <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Analytics end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php';?>
    <!-- <script src="/app-assets/vendors/js/charts/echarts/echarts.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.3.1/echarts.min.js" integrity="sha512-41TNls7qBS/8rKqfgMho0blSRty2TgHbdHq1h8x248EseHj1ZfFPAbjWVBQssJtkXptUwaBLVC3F1W8he53bgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- END: Footer-->
    <script>
        $( ".weatherBG" ).each( function (){
            var rng = Math.round(Math.random()*4);
            var rndmClass = [ 'bg-gradient-primary', 'bg-gradient-success', 'bg-gradient-danger', 'bg-gradient-warning', 'bg-gradient-info' ];

            $(this).addClass( rndmClass[rng]);
        });


        $(window).on("load", function () {
            function formatMoney(n) {
                return parseFloat(n).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1.').replace(/\.(\d+)$/,',$1');
            }
            function animateValue(id, start, end, duration) {
                if (start === end) return;
                var range = start - end;
                var current = start;
                var increment = end > start? 1 : +1;
                var stepTime = Math.abs(0.1);
                var obj = document.getElementById(id);
                var objClass = document.getElementsByClassName(id);
                var timer = setInterval(function() {
                    current += increment;
                    obj.innerHTML = formatMoney(current);
                    if (current == end) {
                        clearInterval(timer);
                    }
                }, 0.00001);
            }

            var $primary = '#7367F0';
            var $danger = '#EA5455';
            var $warning = '#FF9F43';
            var $info = '#00cfe8';
            var $success = '#00db89';
            var $primary_light = '#9c8cfc';
            var $warning_light = '#FFC085';
            var $danger_light = '#f29292';
            var $info_light = '#1edec5';
            var $strok_color = '#b9c3cd';
            var $label_color = '#e7eef7';
            var $purple = '#df87f2';
            var $white = '#fff';

            // Revenue  Chart
            // -----------------------------
            var revenueChartoptions = {
                chart: {
                    height: 260,
                    toolbar: { show: true },
                    type: 'line',
                },
                stroke: {
                    curve: 'smooth',
                    dashArray: [0, 8],
                    width: [4, 2],
                },
                grid: {
                    borderColor: $label_color,
                },
                legend: {
                    show: true,
                },
                colors: [$danger_light, $strok_color],

                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        inverseColors: false,
                        gradientToColors: [$primary, $strok_color],
                        shadeIntensity: 1,
                        type: 'horizontal',
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100, 100, 100]
                    },
                },
                markers: {
                    size: 0,
                    hover: {
                        size: 5
                    }
                },
                xaxis: {
                    labels: {
                        style: {
                            colors: $strok_color,
                        }
                    },
                    axisTicks: {
                        show: true,
                    },
                    categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                    axisBorder: {
                        show: false,
                    },
                    tickPlacement: 'on',
                },
                yaxis: {
                    tickAmount: 9,
                    labels: {
                        style: {
                            color: $strok_color,
                        },
                        formatter: function(val) {
                            return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                        }
                    }
                },
                tooltip: {
                    x: { show: true }
                },

                series: [],
                noData: {
                text: 'EstetikPanel Loading...'
                },
            };

            var revenueChart = new ApexCharts(
                document.querySelector("#revenue-chart"),
                revenueChartoptions
            );

                //thisMonthCash
                // thisMonthEFT
                // thisMonthCC

                // ProgressThisMonthCash
                // ProgressThisMonthEFT
                // ProgressThisMonthCC
            revenueChart.render();


            $.getJSON('/api/reports/charts/earnings-byMonth.php', function(response) {
                var totalPrice = response.totals.thisMonth.totals;
                var bolThisMonth = totalPrice - 500;
                animateValue("thisMonthTotal",bolThisMonth,totalPrice,15000);
                animateValue("thisMonthTotal2",bolThisMonth,totalPrice,15000);
                $('#lastMonthTotal').html(formatMoney(response.totals.lastMonth.totals));
                $('#thisMonthProduct').html(formatMoney(response.totals.thisMonth.product));
                $('#thisMonthService').html(formatMoney(response.totals.thisMonth.service));
                $('#lastMonthProduct').html(formatMoney(response.totals.lastMonth.product));
                $('#lastMonthService').html(formatMoney(response.totals.lastMonth.service));

                $('#thisMonthCash').html(formatMoney(response.totals.thisMonth.paymentType.cash));
                $('#thisMonthEFT').html(formatMoney(response.totals.thisMonth.paymentType.eft));
                $('#thisMonthCC').html(formatMoney(response.totals.thisMonth.paymentType.cc));

                revenueChart.updateSeries([{
                name: "Bu Ay",
                data: response.thisMonth
                },{
                name: "Önceki Ay",
                data: response.lastMonth
                }]);

                // primary
                // danger
                //     warning
                //     info
                //     success
                var pieChart = echarts.init(document.getElementById('pie-chart'));

                var pieChartoption = {
                    tooltip : {
                        trigger: 'item',
                        formatter: "{a} <br/>{b} : {c} ({d}%)"
                    },
                    legend: {
                        orient: 'horizontal',
                        left: 'center',
                        data: ['Nakit', 'Havale / EFT', 'Kredi Kart']
                    },
                    series : [
                        {
                            name: 'Ödeme Türü',
                            type: 'pie',
                            radius : '45%',
                            center: ['50%', '50%'],
                            color: [$success,$info,$primary],
                            data: [
                            {value: response.totals.thisMonth.paymentType.cash, name: 'Nakit'},
                            {value: response.totals.thisMonth.paymentType.eft, name: 'Havale / EFT'},
                            {value: response.totals.thisMonth.paymentType.cc, name: 'Kredi Kart'}
                            ],
                            itemStyle: {
                                emphasis: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: 'rgba(0, 0, 0, 0.5)'
                                }
                            }
                        }
                    ],
                };
                pieChart.setOption(pieChartoption);
            });

            // Goal Overview  Chart
            // -----------------------------

            var goalChartoptions = {
                chart: {
                    height: 135,
                    type: 'radialBar',
                    sparkline: {
                        enabled: true,
                    },
                    dropShadow: {
                        enabled: true,
                        blur: 3,
                        left: 1,
                        top: 1,
                        opacity: 0.1
                    },
                },
                colors: [$white],
                plotOptions: {
                    radialBar: {
                        size: 45,
                        startAngle: -150,
                        endAngle: 150,
                        hollow: {
                            size: '66%',
                        },
                        track: {
                            background: $white,
                            strokeWidth: '50%',
                        },
                        dataLabels: {
                            name: {
                                show: false
                            },
                            value: {
                                offsetY: 9,
                                color: $white,
                                fontSize: '1.4rem'
                            }
                        }
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: 'horizontal',
                        shadeIntensity: 0.5,
                        gradientToColors: ['#fff'],
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 100]
                    },
                },
                <?php
                if($countSeansSayisi !=0 && $countGelen != 0){
                    $a = $countSeansSayisi;
                    $b = $countGelen;
                    // $b $a nın yüzde kaçıdır;
                    $c = $a / 100;
                    $sonucs= floor($b / $c);
                }else{
                    $sonucs = 0;
                }
                ?>
                series: [<?=$sonucs;?>],
                stroke: {
                    lineCap: 'round'
                },
            }

            var goalChart = new ApexCharts(
            document.querySelector("#goal-overview-chart"),
            goalChartoptions
            );

            goalChart.render();

            var $primary = '#7367F0',
                $success = '#28C76F',
                $danger = '#EA5455',
                $warning = '#FF9F43',
                $info = '#00cfe8';

            var themeColors = [$success, $danger, $warning];
        });
        
        var zaman= new Date();
        var saat = zaman.getHours();
        var isimsoyisim = '<?=$personel_adi?>'+'!';
                                        
        if (saat>=6 && saat<12)
        $("#wlcmsg").html('Günaydın '+isimsoyisim);
        
        else if (saat>=12 && saat<20)
        $("#wlcmsg").html('Tünaydın, '+isimsoyisim);
        
        else if (saat>=20 && saat<24)
        $("#wlcmsg").html('İyi akşamlar '+isimsoyisim);
        
        else if (saat>=0 && saat<6)
        $("#wlcmsg").html('İyi geceler '+isimsoyisim);

        $("#toplamSeans").html(<?=$countSeansSayisi?>);
        $("#SeansGelmeyen").html(<?=$countGelmeyen?>);
        $("#SeansGelen").html(<?=$countGelen?>);
        $("#SeansIptal").html(<?=$countIptal?>);
        $("#SeansBekleyen").html(<?=$countBekleyen?>);
        $("#completed").html(<?=$countGelen?>);
        $("#waiting").html(<?=$countGelmeyen?>);
    </script>

</body>
<!-- END: Body-->

</html>