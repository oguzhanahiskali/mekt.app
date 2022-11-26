<?php include 'header-top.php'; ?>

<?php //if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<link href="/app-assets/dualList/dual-listbox.css" rel="stylesheet">

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
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Borçlular Raporu</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                    </li>
                                    <li class="breadcrumb-item active">Borçlu Müşteri Listesi
                                    </li>
                                    </ol>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                        </div>
                    </div>
                    <div class="content-body">
                        <section class="content-body service-reports">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                                        <!-- Ag Grid users list section start -->
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-end">
                                                <h4 class="card-title"><i class="feather icon-list"></i> Detaylı Borçlular Listesi</h4>
                                                <div class="dropdown chart-dropdown">
                                                    <button class="btn bg-gradient-primary config-demo">
                                                    <i class="feather icon-calendar"></i> <b data-i18n="Filter data between dates"></b> <i class="feather icon-filter"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <?php if(isset($_GET['between'])){
                                                        if($_GET['between']==true){?>
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                            <div class="row">
                                                                <div class="col-sm-3 text-center">
                                                                    Başlangıç: </br><div class="badge bg-gradient-success badge-md"><?=$_GET['start']?></div>
                                                                </div>
                                                                <div class="col-sm-3 text-center">
                                                                </div>
                                                                <div class="col-sm-3 text-center">
                                                                    Bitiş: </br><div class="badge bg-gradient-danger badge-md"><?=$_GET['end']?></div>
                                                                </div>
                                                                <div class="col-sm-3 float-right">
                                                                <a href="/report-sessions"><input class="form-control bg-gradient-primary waves-effect waves-light" type="button" value="Temizle"></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                    }
                                                        ?>
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
                                                                <input type="text" class="ag-grid-filter ag-grid-filterx form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box" data-i18n="[placeholder]Find">
                                                                <div class="btn-export">
                                                                    <button class="btn btn-success ag-grid-export-btn">
                                                                        <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel"></b>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="GridService" class="aggrid ag-theme-material" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- add new sidebar starts -->
                                        <div id="add-new-data-sidebar" class="add-new-data-sidebar">
                                            <div id="overlay-bg" class="overlay-bg"></div>
                                            <div id="add-new-data" class="add-new-data">
                                                <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                    <div>
                                                        <h4 class="text-uppercase" >İki Tarih Arası Kayıtlar</h4>
                                                    </div>
                                                    <div class="hide-data-sidebar">
                                                        <i class="feather icon-x"></i>
                                                    </div>
                                                </div>
                                                <form id="FormDateBetweenFilter" action="/app-debtors" method="get" novalidate>
                                                    <div class="data-items pb-3">
                                                        <div class="data-fields px-2 mt-3">
                                                            <div class="row">
                                                                <div class="col-sm-6 data-field-col">
                                                                    <div class="form-group">
                                                                        <label for="hizmet">BAŞLANGIÇ TARİHİ:<span class="danger">*</span></label>
                                                                        <div class="input-group">
                                                                        <input class="form-control required" data-validation-required-message="This field is required" type="date" id="startDT" name="start" require>
                                                                        <input class="form-control" type="hidden" name="between" value="true">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 data-field-col">
                                                                    <div class="form-group">
                                                                        <label for="hizmet">BİTİŞ TARİHİ:<span class="danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="date" class="form-control required" data-validation-required-message="This field is required"  id="endDT" aria-label="" name="end" aria-invalid="false" require>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                        <div class="add-data-btn">
                                                            <button type="submit" class="btn btn-primary round" >Filtrele</button>
                                                        </div>
                                                        <div class="cancel-data-btn">
                                                            <button class="btn btn-outline-danger round">İptal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                        </div>
                                        <!-- add new sidebar ends -->
                                    </section>
                                </div>
                            </div>
                        </section>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="totalSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <p>Toplam SMS Paket</p>
                                        </div>
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-package text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="sentSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <p>Gönderilen SMS</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-message-square text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="remainingSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <input id="remainingSMSinput" type="hidden" val="">
                                            <p>Kalan SMS</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-pie-chart text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="cancalledSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <p>İptal Olan</p>
                                        </div>
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-x-square text-danger font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- users list start -->
                        <div class="row justify-content-center">
                            <div class="col">
                                <section id="payment-reports">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title" id="horz-layout-colored-controls">SMS Gönder</h4>
                                                    <div>
                                                        Borçlular Toplam Liste: <label id="debtorsTotalList">{0}</label><br>
                                                        Seçili Müşteriler: <label id="debtorsSelectedList">{0}</label>
                                                    </div>

                                                </div>
                                                <div class="card-content collpase show">
                                                    
                                                    <form id="SendSMSforms" class="noselected">
                                                        <div class="card-body" >
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <select class="multipleSelects" name="numbers[]" id="multipleSelects" multiple></select>
                                                                    <p class="mt-1" style="text-align:center;">İlgili müşteriye <code>gönderilmesi istenilen mesaj</code> için lütfen <code>Sol Listede</code> bulunan kişileri <code>Sağ Listeye</code> taşıyınız.</p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="iphone">
                                                                        <div class="border">
                                                                            <div class="responsive-html5-chat"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mt-1" style="text-align:center;font-size: 0.9em;color:#b4b4b4;">Abone Numaralı SMS (Türkçe Karakterli) : 1 boy SMS 155, 2 boy SMS 301, 3 boy SMS 454, 4 boy SMS 607, 5 boy SMS 761, 6 boy SMS 913 karakterdir. Sadece ulaşan SMS'lerden ücret alınır. Mesajlar Yurt içi her yöne aynı fiyattır. K.K.T.C. numaralarına gönderim yapılamaz. EstetikPanel tarife tarih ve koşullarında degişiklik yapma hakkını saklı tutar.</p>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div id="loadingss"></div>
                    <div class="swal2-container swal2-center swal2-backdrop-show d-none" id="loadings" style="overflow-y: auto;">
                        <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container" class="swal2-popup swal2-modal swal2-icon-warning animate__animated animate__flipInX" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="width: 600px; padding: 2em; display: grid;">
                            <ul class="swal2-progress-steps" style="display: none;"></ul>
                            <div class="swal2-icon swal2-warning swal2-icon-show" style="display: flex;">
                                <div class="swal2-icon-content">!</div>
                            </div>
                            <img class="swal2-image" style="display: none;">
                            <h2 class="swal2-title" id="swal2-title" style="display: block;">Gönderilecekler Listesine Aktarılıyor...</h2>
                            <div class="swal2-html-container" id="swal2-html-container" style="display: block;">Aktarılan Kişi Sayısı: <b id="SelectedListCount"></b></div>
                            <div class="swal2-footer" style="display: none;"></div>
                            <div class="swal2-timer-progress-bar-container">
                                <div class="swal2-timer-progress-bar" style="display: none;"></div>
                            </div>
                        </div>
                    </div>
                    <!-- users list ends -->
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php' ?>
    <link rel="stylesheet" type="text/css" media="all" href="/app-assets/dtRange/daterangepicker.css" />
    <script type="text/javascript" src="/app-assets/dtRange/daterangepickerDebtors.js"></script>

    <!-- END: Footer-->
    <script src="/app-assets/apple/msg.js"></script>
    <script src="/app-assets/dualList/dual-listbox-debtors.js"></script>
    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script src="/app-assets/dualList/crypto-js-function.js"></script>
    

    <script>
		var returnSMSResult;
		function callback(response) { returnSMSResult = response; }
        $.ajax({
            type: "POST",
            url: "/api/app-sms/debtors",
            success: function(res) {
                let obj = JSON.parse(res);
                var debtorsTotalList = 0;
                $.each(obj['Success'], function(i, field) {

                    if(obj['Success'][i]){
                        debtorsTotalList++;
                    }
                    var ApiKey = obj['Success'][i]['Key'];
                    var decrypted = JSON.parse(CryptoJS.AES.decrypt(obj['Success'][i]['Key'], obj['Success'][i]['TimeStamp'], {format: CryptoJSAesJson}).toString(CryptoJS.enc.Utf8));
                    var Api_Service = obj['Success'][i]['Installment']['SERVICE'];
                    var Api_ID = obj['Success'][i]['Installment']['ID'];
                    var Api_Price = obj['Success'][i]['Installment']['PRICE'];
                    var Api_DT = obj['Success'][i]['Installment']['DT'];
                    var titleDesc = 'Taksit: '+Api_ID+'. Taksit\r\n'+'Fiyat: '+Api_Price+'\r\nTaksit Tarihi: '+Api_DT+'\r\nHizmet: '+Api_Service;
                    $('#multipleSelects').append(
                        $('<option>',{ value : decrypted, title : titleDesc, ApiService : Api_Service, ApiID : Api_ID, ApiPrice : Api_Price  }).text(obj['Success'][i]['Phone']+' | '+obj['Success'][i]['Customer']));
                });
                $('#debtorsTotalList').html(debtorsTotalList);
                
            }
        });
        setTimeout(function(){
            let dualListbox = new DualListbox('#multipleSelects', {
                availableTitle:'Borçlu Müşteri Listesi',
                selectedTitle: 'SMS Gönderilecekler',
                addButtonText: 'Ekle',
                removeButtonText: 'Çıkar',
                addAllButtonText: 'Tümünü Ekle',
                removeAllButtonText: 'Tümünü Çıkar',
                searchPlaceholder: 'Müşteri Ara',
            });
        },1500);
        
        $.ajax({
                type: "POST",
                url: "/api/app-sms/available-count.php",
                success: function(res) {
                    var obj = JSON.parse(res);
                    var resTotal = obj[0]['Total'];
                    var resUsed = obj[0]['Used'];
                    var resAvailable = obj[0]['Available'];
                    callback(obj);
                }
            });
        setTimeout(function(){
            $('#totalSMS').html(returnSMSResult[0]['Total']);
            $('#sentSMS').html(returnSMSResult[0]['Used']);
            var remainingSMS = returnSMSResult[0]['Total']-returnSMSResult[0]['Used'];
            $('#remainingSMS').html(remainingSMS);
            $('#remainingSMSinput').val(remainingSMS);
        },500);

    </script>
</body>
<!-- END: Body-->

</html>