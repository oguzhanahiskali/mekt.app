<?php include 'header-top.php'; ?>

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
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">Doğum Günü Listesi</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                    </li>
                                    <li class="breadcrumb-item active">Doğum Günü Listesi
                                    </li>
                                    </ol>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body ">
                        <section class="content-body service-reports">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                                        <!-- Ag Grid users list section start -->
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-end">
                                                <h4 class="card-title"><i class="feather icon-list"></i> Doğum Günü Dökümü</h4>
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
                                                                <a href="/report-birthdays"><input class="form-control bg-gradient-primary waves-effect waves-light" type="button" value="Temizle"></a>
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
                                                <form id="FormDateBetweenFilter" action="/report-birthdays" method="get" novalidate>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php' ?>
    <link rel="stylesheet" type="text/css" media="all" href="app-assets/dtRange/daterangepicker.css" />



    <script type="text/javascript" src="app-assets/dtRange/daterangepickerBirthdays.js"></script>

    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/charts/echarts/echarts.min.js"></script>

    <!-- END: Footer-->
    <script>
        $('#hizmetBolgesi').select2({
            allowClear: true,
            multiple: true,
            tags: false,
            placeholder: 'Hizmet Bölgesi Seçin',
            ajax: {
                url: '/api/ajaxHizmetBolge.php',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                success: function(result) {
                    $('#selectedListChange').prop('disabled', false);
                },
                cache: true
            },
        });
        $('#AddhizmetBolgesi').select2({
            allowClear: true,
            multiple: true,
            tags: false,
            placeholder: 'Hizmet Bölgesi Seçin',
            ajax: {
                url: '/api/ajaxHizmetBolge.php',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return { results: data };
                },
                success: function(result) {
                    $('#selectedListChange').prop('disabled', false);
                },
                cache: true
            },
        });

            // $.getJSON('app-assets/data/report-service-earnings.php', function(response) {
            //     // $('#totalPrice').html(params.data.TotalPrice+' TL');
            //     console.log(response);
            // }
            
            $.urlParam = function (name) {
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results == null) {
                return null;
                }
                return decodeURI(results[1]) || 0;
            }
            // if ($.urlParam('between') == 'true') {
            //     $.ajax({
            //         type: "GET",
            //         url: "app-assets/data/report-sessions.php?between=true&start=" + $.urlParam('start') + "&end=" + $.urlParam('end'),
            //         success : function(res) {
            //             var obj = JSON.parse(res);
            //             $('#totalPrice').html(obj[0].TotalPrice+' TL')
            //         }
            //     })
            // }
            
        $(document).on('click', '.smsSend', function() {
            var ids = $(this).attr("ids");


            Swal.fire({
                    title: 'Borçlu SMS Gönderim İşlemi',
                    text: "Bu müşteriye taksit ödemesi yapmasına dair borç sms gönderimi yapılacaktır. Buna gerçekten emin misin?",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#ff8510',
                    cancelButtonColor: '#1f9d57',
                    confirmButtonText: 'Eminim, hemen gönder',
                    cancelButtonText: 'Hayır, vazgeçtim'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'Lütfen Bekleyiniz...',
                            text: 'SMS Gönderim işlemi sağlanıyor.',
                            icon: 'success',
                            timer: 10000
                        });
                        $.ajax({
                            type: "POST",
                            url: "/api/app-sms/report-birthdays-send-sms.php",
                            data: {ids: ids},
                            success: function(res) {
                                var obj = JSON.parse(res);
                                if(obj[0]['code']==1000){
                                    Swal.fire("Başarılı", "SMS başarıyla gönderildi. Sayfa yenileniyor...", "success");
                                    setTimeout(function(){
                                        location.reload(1);
                                    }, 2222);
                                }else if(obj[0]['code'] == 1001){
                                    Swal.fire("Hatalı İşlem Yaptınız", "Bu mesajı zaten daha önce gönderildi. Mükerrer İleti Koruma sistemi devreye alındı.", "warning");
                                }else if(obj[0]['status'] == false){
                                    Swal.fire("Başarısız", "SMS Gönderimi başarısız. Lütfen sistem yöneticisi ile temasa geçiniz.", "warning");
                                }else{
                                    Swal.fire("SMS Entegrasyon Hatası", "Birşeyler ters gitti. Lütfen sistem yöneticisi ile temasa geçiniz.", "warning");
                                }
                            }
                        })
                    }else {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'SMS Gönderimi İptal Edildi',
                            text: 'Bazen yanlıştan dönmekte güzeldir.',
                            icon: 'success',
                            timer: 6000
                        });
                    }
                })
        });
    </script>
</body>
<!-- END: Body-->

</html>