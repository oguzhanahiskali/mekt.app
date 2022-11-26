<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$varmi = false;

if(isset($_GET['id'])){
    $hastaid = $_GET['id'];
    $query = $db->query("SELECT ID FROM tbl_musteri_kimlik WHERE ID = '{$hastaid}' AND DURUM=1 AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
    if($query){
        $varmi = true;
    }else{
        $varmi = false;
    }
}else{
    echo "errör";
    exit();
}

if($varmi==false){
    header("Location: 404.php"); /* Redirect browser */
    exit();
}else{
    $query = $db->query("SELECT *,YEAR(CURDATE()) - YEAR(DOGUM_TARIHI) AS YAS FROM tbl_musteri_kimlik WHERE ID = '{$hastaid}' AND DURUM = 1 AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
    $tckimlikno = $query['TC'];
    $hastaadisoyadi = $query['ADI'].' '.$query['SOYADI'];
    $originalDate = $query['DOGUM_TARIHI'];
    $ProfilDogumTarihi = date("d-m-Y", strtotime($originalDate));

    $kimlikTC = $query['TC'];
    $adres = $query['ADRES'];
    $yass = $query['YAS'];
    $cep = $query['CEP'];
    $cep2 = $query['CEP2'];
    if(empty($query['EPOSTA'])){ $eposta ="[girilmedi]"; }
    else{ $eposta = $query['EPOSTA']; }
    if($query['FEEDBACK_SMS']=='false'){ $sms = '<i class="feather icon-x-square h4 danger" title="Kabul Etmedi"></i>'; }else{ $sms = '<i class="feather icon-check-circle h4 success" title="Kabul Etti"></i>'; }
    if($query['FEEDBACK_CALL']=='false'){ $call ='<i class="feather icon-x-square h4 danger" title="Kabul Etmedi"></i>'; }else{ $call = '<i class="feather icon-check-circle h4 success" title="Kabul Etti"></i>'; }
    $hizmetyok = '';
}


?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php include 'includes/header.php'?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php include 'includes/main-menu.php'?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- page users view start -->
                <section class="page-users-view">
                    <div class="row">
                        <!-- account start -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Müşteri Kartı</div>
                                </div>
                                <div class="card-body bg-text" data-bg-text="<?=substr($hastaadisoyadi, 0, 20)?>">
                                    <div class="row">
                                        <div class="users-view-image">
                                            <img id="people-img" src="/app-assets/images/pages/login/preloader2.gif" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                            <table>
                                                <tr>
                                                    <td class="font-weight-bold">T.C. Kimlik</td>
                                                    <td><?=$kimlikTC?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">İsim Soyisim</td>
                                                    <td><?=$hastaadisoyadi?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Doğum Tarihi</td>
                                                    <td><?=$ProfilDogumTarihi?> (<?=$yass?> Yaşında)</td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Telefon</td>
                                                    <td class="phone-inputmask" data-inputmask-mask="(999) 999-9999"><?=$cep?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Eposta</td>
                                                    <td><?=$eposta?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-5">
                                            <table class="ml-0 ml-sm-0 ml-lg-0">
                                                <tr>
                                                    <td class="font-weight-bold">Adres</td>
                                                    <td><?=$adres?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">SMS İzni</td>
                                                    <td><?=$sms?></td>
                                                </tr>
                                                <tr>
                                                    <td class="font-weight-bold">Telefon İzni</td>
                                                    <td><?=$call?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-12">
                                        <a href="app-customer-edit.php?id=<?=$hastaid?>" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Düzenle</a>
                                            <button id="customer-delete" class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Sil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- account end -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom mx-2 px-0">
                                    <h6 class="border-bottom py-1 mb-0 font-medium-2"><i class="fa fa-tag mr-50 "></i>Hizmet Listesi</h6>
                                </div>
                                <div class="card-body px-75">
                                    <div class="table-responsive">
                                        <table id="tblServices" class="table table-hover-animation table-striped table-bordered nowrap" style="text-align:center" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ESTETİSYEN</th>
                                                    <th>HİZMET ADI</th>
                                                    <th>SEANS ORANI</th>
                                                    <th>SÜRE</th>
                                                    <th>FİYAT</th>
                                                    <th>KALAN ÖDM.</th>
                                                    <th>KULLANICI</th>
                                                    <th>KAYIT TARİHİ</th>
                                                    <th width="16%">İŞLEM</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <section class="content-body product-reports">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                                            <!-- Ag Grid users list section start -->
                                            <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-end">
                                                    <h4 class="card-title"><i class="feather icon-tag"></i> Ürün Satış Dökümü</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                                    <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                                                        <button class="btn btn-white filter-btn dropdown-toggle border text-dark" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            1 - 10
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right">
                                                                            <a class="dropdown-item" >50</a>
                                                                            <a class="dropdown-item" >100</a>
                                                                            <a class="dropdown-item" >250</a>
                                                                            <a class="dropdown-item" >500</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ag-btns d-flex flex-wrap">
                                                                    </div>
                                                                    <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box" data-i18n="[placeholder]Find">
                                                                    </button>
                                                                    <div class="btn-export">
                                                                        <button class="btn btn-success ag-grid-export-btn">
                                                                        <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel"></b></button>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="GridProduct" class="aggrid ag-theme-material" style="width: 100%;height: 350px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-6 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2"><i class="fa fa-money mr-50 "></i>Toplam Ödeme Bilgisi</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php
                                            $query = $db->query("
                                                SELECT SUM(FIYAT) AS TOPLAM,
                                                (SELECT SUM(FIYAT) AS ALINAN FROM tbl_seans_taksit WHERE MID = '$hastaid' AND TAHSILAT_DURUM = 2 AND DURUM=1) AS ALINAN,
                                                (SELECT SUM(FIYAT) AS ALINAN FROM tbl_seans_taksit WHERE MID = '$hastaid' AND TAHSILAT_DURUM = 1 AND DURUM=1) AS IPTAL
                                                FROM tbl_seans_taksit WHERE MID = '$hastaid' AND FIRMA_ID=$user_Firma AND DURUM=1
                                            ")->fetch(PDO::FETCH_ASSOC);
                                            $toplamOdeme    = $query['TOPLAM'];
                                            $alinanOdeme     = $query['ALINAN'];
                                            $iptalOdeme     = $query['IPTAL'];

                                            $query = $db->query("SELECT sum(FIYAT) as KALAN from tbl_seans_taksit WHERE TAHSILAT_DURUM = 0 AND MID='$hastaid' AND FIRMA_ID=$user_Firma AND DURUM=1")->fetch(PDO::FETCH_ASSOC);
                                            $kalanOdeme     = $query['KALAN'];
                                        ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Alınacak Ödeme</th>
                                                    <th>Alınan Ödeme</th>
                                                    <th>İptal Ödeme</th>
                                                    <th>Kalan Ödeme</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td id="tdTotalPayment"></td>
                                                    <td id="tdReceivedPayment"></td>
                                                    <td id="tdCanceledPayment"></td>
                                                    <td id="tdRemainingPayment"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title mb-2">Yaklaşan Seans Bilgisi</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                            <?php
                                                $query = $db->query("
                                                    SELECT SUM(FIYAT) AS TOPLAM,
                                                    (SELECT SUM(FIYAT) AS ALINAN FROM tbl_seans_taksit WHERE MID = '$hastaid' AND TAHSILAT_DURUM = 2 AND DURUM=1) AS ALINAN,
                                                    (SELECT SUM(FIYAT) AS ALINAN FROM tbl_seans_taksit WHERE MID = '$hastaid' AND TAHSILAT_DURUM = 1 AND DURUM=1) AS IPTAL
                                                    FROM tbl_seans_taksit WHERE MID = '$hastaid' AND FIRMA_ID=$user_Firma AND DURUM=1
                                                ")->fetch(PDO::FETCH_ASSOC);
                                                $toplamOdeme    = $query['TOPLAM'];
                                                $alinanOdeme     = $query['ALINAN'];
                                                $iptalOdeme     = $query['IPTAL'];

                                                $query = $db->query("SELECT sum(FIYAT) as KALAN from tbl_seans_taksit WHERE TAHSILAT_DURUM = 0 AND MID='$hastaid' AND FIRMA_ID=$user_Firma AND DURUM=1")->fetch(PDO::FETCH_ASSOC);
                                                $kalanOdeme     = $query['KALAN'];
                                            ?>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Hizmet</th>
                                                        <th>Tarih</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = $db->query("
                                                        SELECT * FROM view_upcoming_profile_seans
                                                        WHERE MID = $hastaid AND FIRMA_ID=$user_Firma
                                                        ORDER BY TARIH ASC
                                                        LIMIT 5
                                                            ", PDO::FETCH_ASSOC);
                                                        if ($query->rowCount())
                                                        {
                                                            foreach( $query as $row )
                                                            {
                                                                $tarih1 = $row['TARIH'];
                                                                $date=date_create($tarih1);
                                                                $tarihs = date_format($date,"d/m/Y");
                                                                echo "<tr>";
                                                                echo "<td>".$row['TITLEx']."</td>";
                                                                echo "<td>".$tarihs."</td>";
                                                                echo "</tr>";
                                                            }
                                                        }else{ echo "<li style='text-align:center'>Seans bilgisi bulunamadı.</li>"; }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">Seans Devamlılık Oranı</h4>
                                    <p class="font-medium-5 mb-0"><i class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-overview-chart" class="mt-75"></div>
                                        <div class="row text-center mx-0">
                                            <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Toplam Alınacak Seans</p>
                                                <p id="SessionTotal" class="font-large-1 text-bold-700 mb-50"></p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Toplam Alınan Seans</p>
                                                <p id="SessionAccepted" class="font-large-1 text-bold-700 mb-50"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- page users view end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php'?>
    <script>
        $(document).ready(function() {
            var ids = <?php echo $hastaid; ?>;
            $.ajax({
                type: "get",
                url: "/api/ajaxQprofil.php",
                data:{id:ids},
                success: function(res){
                    var obj = JSON.parse(res);
                    var Qgender = obj[0]['cinsiyet'];
                    if(Qgender==1){
                        $("#people-img").attr("src", '/app-assets/images/portrait/small/woman.png');

                    }else if(Qgender==2){
                        $("#people-img").attr("src", '/app-assets/images/portrait/small/man.png');

                    }
            }
            });

            SessionAccepted = null;
            SessionTotal = null;
            $.ajax({
                'async': false,
                type: "POST",
                url:"/api/app-customer/view/attendance-rate.php",
                data:{MID:ids},
                success: function(result) {
                    var obj = JSON.parse(result);
                    if(obj['Session']['Total']>0){
                        SessionAccepted = obj['Session']['Accepted'];
                        SessionTotal = obj['Session']['Total'];
                        $('#SessionAccepted').text(SessionAccepted);
                        $('#SessionTotal').text(SessionTotal);
                        $(window).on("load", function(){

                            var $success = '#00db89';
                            var $strok_color = '#b9c3cd';

                            var goalChartoptions = {
                                chart: {
                                height: 250,
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
                                colors: [$success],
                                plotOptions: {
                                    radialBar: {
                                        size: 110,
                                        startAngle: -150,
                                        endAngle: 150,
                                        hollow: {
                                            size: '77%',
                                        },
                                        track: {
                                            background: $strok_color,
                                            strokeWidth: '50%',
                                        },
                                        dataLabels: {
                                            name: {
                                                show: false
                                            },
                                            value: {
                                                offsetY: 18,
                                                color: $strok_color,
                                                fontSize: '4rem'
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
                                        gradientToColors: ['#00b5b5'],
                                        inverseColors: true,
                                        opacityFrom: 1,
                                        opacityTo: 1,
                                        stops: [0, 100]
                                    },
                                },
                                series: [Math.ceil(SessionAccepted / (SessionTotal / 100))],
                                stroke: {
                                lineCap: 'round'
                                },
                            }
                            var goalChart = new ApexCharts(
                                document.querySelector("#goal-overview-chart"),
                                goalChartoptions
                            );

                            goalChart.render();
                            //console.clear();
                        });
                    }else{
                        $('#SessionAccepted').text(0);
                        $('#SessionTotal').text(0);
                    }

                }
            });
            $.ajax({
                'async': false,
                type: "POST",
                url:"/api/app-customer/summary.php",
                data:{MID:ids},
                success: function(result) {
                    var obj = JSON.parse(result);
                    PaymentTotal = obj[0]['TotalPayment']['Total'];
                    PaymentReceived = obj[0]['TotalPayment']['Receive'];
                    PaymentCanceled = obj[0]['TotalPayment']['Canceled'];
                    PaymentCurrency = 'TRY';

                    $('#tdTotalPayment').text(PaymentTotal.toLocaleString('tr-TR', {currency: PaymentCurrency, style: 'currency'}));
                    $('#tdReceivedPayment').text(PaymentReceived.toLocaleString('tr-TR', {currency: PaymentCurrency, style: 'currency'}));
                    $('#tdCanceledPayment').text(PaymentCanceled.toLocaleString('tr-TR', {currency: PaymentCurrency, style: 'currency'}));
                    $('#tdRemainingPayment').text((PaymentTotal-PaymentReceived).toLocaleString('tr-TR', {currency: PaymentCurrency, style: 'currency'}));
                }
            });

            $( "#customer-delete" ).click(function() {
                
                Swal.fire({
                    title: 'Gerçekten buna emin misin?',
                    text: "İlgili müşteriyi ve buna bağlı tüm seans, taksitlendirme bilgilerini kaybetmek üzeresiniz. Onaylamak istediğine emin misin?",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#ff8510',
                    cancelButtonColor: '#1f9d57',
                    confirmButtonText: 'Eminim',
                    cancelButtonText: 'Vazgeçtim'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var ids = <?=$hastaid?>;
                        $.ajax({
                            type: "GET",
                            url: "/api/delete/app-customer/customer-delete.php",
                            data: {
                                ids: ids
                            },
                            success: function(result) {
                                if (result == "basarili") {
                                    swal.fire("Silindi!", "Bu müşteri başarıyla silindi.", "success");
                                    window.location.href = "app-customer-list.php?respons=OK!";
                                }else if(result == "hata") {
                                    window.location.href = "app-customer-list.php?respons=Error!";
                                }
                            }
                        })
                    }else {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'Vazgeçildi',
                            text: 'Silme işleminden vazgeçildi',
                            icon: 'info',
                            timer: 1200
                        });
                    }
                })
                // swal.fire({
                //     title: "Bak Emin misin?",
                //     text: "Bu müşteri silerseniz geri kurtaramayabilirsiniz :(",
                //     icon: "warning",
                //     buttons: {
                //         cancel: {
                //             text: "Hayır, Vazgeçtim",
                //             value: null,
                //             visible: true,
                //             className: "",
                //             closeModal: false,
                //         },
                //         confirm: {
                //             text: "Evet, şimdi Sil",
                //             value: true,
                //             visible: true,
                //             className: "",
                //             closeModal: false
                //         }
                //     }
                // })
                // .then((isConfirm) => {
                //     if (isConfirm) {
                //         var ids = <?=$hastaid?>;
                //         $.ajax({
                //             type: "GET",
                //             url: "/api/delete/app-customer/customer-delete.php",
                //             data: {
                //                 ids: ids
                //             },
                //             success: function(result) {
                //                 if (result == "basarili") {
                //                     window.location.href = "app-customer-list.php?respons=OK!";
                //                 }else if(result == "hata") {
                //                     window.location.href = "app-customer-list.php?respons=Error!";
                //                 }
                //             }
                //         })
                //         swal.fire("Silindi!", "Bu müşteri başarıyla silindi.", "success");
                //         } else {
                //         swal.fire("İptal Edildi", "Oh çok şükür! herşey yerli yerinde.", "error");
                //     }
                // });
            });
            
            var dataTable=$('#tblServices').DataTable({
                "searching": false,
                "lengthChange": false,
                "processing": true,
                "serverSide":true,
                "sDom": "lfrti",
                columnDefs: [
                    { orderable: false, targets: 0 },
                    { orderable: false, targets: 1 },
                    { orderable: false, targets: 2 },
                    { orderable: false, targets: 3 },
                    { orderable: false, targets: 4 },
                    { orderable: false, targets: 5 },
                    { orderable: false, targets: 6 },
                    { orderable: false, targets: 7 },
                    { orderable: false, targets: 8 }
                ],
                "ajax":{
                    url:"/api/app-customer/view/services.php?MID="+ids,
                    type:"get"
                },
                "initComplete":function( settings, json){
                    $(".hizmet-sil").click(function() {
                        var ids = $(this).attr("ids");
                        Swal.fire({
                            title: 'Gerçekten buna emin misin?',
                            text: "İlgili müşterinin bu hizmetini silmek üzeresiniz. Onaylamak istediğine emin misin?",
                            icon: 'warning',
                            allowOutsideClick: false,
                            showCancelButton: true,
                            confirmButtonColor: '#ff8510',
                            cancelButtonColor: '#1f9d57',
                            confirmButtonText: 'Eminim',
                            cancelButtonText: 'Vazgeçtim'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "POST",
                                    url: "/api/delete/app-services/service.php",
                                    data: {
                                        ids: ids,
                                        important: true
                                    },
                                    success: function(res) {
                                        var obj = JSON.parse(res);
                                        if (obj['status'] == true) {
                                            setTimeout(function(){
                                                Swal.fire({
                                                    allowOutsideClick: false,
                                                    showConfirmButton: false,
                                                    title: 'Başarılı',
                                                    text: 'Silme işlemi başarıyla gerçekleşti',
                                                    icon: 'success'
                                                });
                                                location.reload(1);
                                            }, 1200);
                                        }else if (obj['status'] == false) {
                                            Swal.fire({
                                                allowOutsideClick: false,
                                                showConfirmButton: false,
                                                title: 'Hata',
                                                text: 'Silme işleminde bir hata oluştu. Lütfen Sistem Yönetici ile temasa geçiniz',
                                                icon: 'danger',
                                                timer: 1200
                                            });
                                        }else if (obj['code'] == 9999) {
                                            Swal.fire({
                                                allowOutsideClick: false,
                                                showConfirmButton: true,
                                                title: 'Başarısız',
                                                text: 'Bu işlemi yapmaya yetkiniz yok!',
                                                icon: 'error',
                                            });
                                        }
                                    }
                                })
                            }else {
                                Swal.fire({
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    title: 'Vazgeçildi',
                                    text: 'Silme işleminden vazgeçildi',
                                    icon: 'info',
                                    timer: 1200
                                });
                            }
                        })
                    });
                }
            });
            
            // $('.hizmet-sil').click(function() {
            //     console.log($(this).attr('ids'));
            // });
        });


        </script>    <!-- END: Footer-->
</body>
<!-- END: Body-->

</html>