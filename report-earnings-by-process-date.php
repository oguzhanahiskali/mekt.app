<?php include 'header-top.php'; ?>
<?php if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>

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
                                <h2 class="content-header-title float-left mb-0">Ciro Raporu</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                    </li>
                                    <li class="breadcrumb-item active">Ciro Raporu
                                    </li>
                                    </ol>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-body ">
                        <section class="content-body earning-graph">
                            <div class="row">
                                <div class="col-md-9 col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-end">
                                            <h4 class="card-title"><i class="feather icon-trending-up"></i> Kazanç Grafiği</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body pb-0">
                                                <div class="d-flex justify-content-start">
                                                    <div class="col-md-3 text-center">
                                                        <p class="mb-50 text-bold-600">Bu Ay</p>
                                                        <small id="thisMonthProduct" title="Ürün"></small> + <small id="thisMonthService" title="Hizmet"></small> =
                                                        <h2 class="text-bold-400">
                                                            <sup class="font-medium-1"><?=$currency?></sup>
                                                                <span class="text-success" id="thisMonthTotal">0</span>
                                                        </h2>
                                                    </div>
                                                    <div class="col-md-3 text-center">
                                                        <p class="mb-50 text-bold-600">Geçen Ay</p>
                                                        <small id="lastMonthProduct" title="Ürün"></small> + <small id="lastMonthService" title="Hizmet"></small> =
                                                        <h2 class="text-bold-400">
                                                            <sup class="font-medium-1"><?=$currency?></sup>
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
                                                <h4 class="mb-0"><i class="feather icon-pie-chart"></i> Gelir Türü (Bu Ay)</h4>
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
                        </section>

                        <section class="content-body service-reports">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                                        <!-- Ag Grid users list section start -->
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-end">
                                                <h4 class="card-title"><i class="feather icon-list"></i> Hizmet Satış Dökümü</h4>
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
                                                                    Toplam: </br><div id="totalPrice" class="badge bg-gradient-success badge-md">[Yükleniyor]</div>
                                                                </div>
                                                                <div class="col-sm-3 text-center">
                                                                    Bitiş: </br><div class="badge bg-gradient-danger badge-md"><?=$_GET['end']?></div>
                                                                </div>
                                                                <div class="col-sm-3 float-right">
                                                                <a href="/report-earnings"><input class="form-control bg-gradient-primary waves-effect waves-light" type="button" value="Temizle"></a>
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
                                                <form id="FormDateBetweenFilter" action="/report-earnings" method="get" novalidate>
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
                        <section class="content-body product-reports">
                            <div class="row justify-content-center">
                                <div class="col">
                                    <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                                        <!-- Ag Grid users list section start -->
                                        <div class="card">
                                            <div class="card-header d-flex justify-content-between align-items-end">
                                                <h4 class="card-title"><i class="feather icon-list"></i> Ürün Satış Dökümü</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <?php if(isset($_GET['between'])){
                                                        if($_GET['between']==true){?>
                                                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                        <div class="row">
                                                            <div class="col-sm-5 text-center">
                                                                Başlangıç: </br><div class="badge bg-gradient-success badge-md"><?=$_GET['start']?></div>
                                                            </div>
                                                            <div class="col-sm-5 text-center">
                                                                Bitiş: </br><div class="badge bg-gradient-danger badge-md"><?=$_GET['end']?></div>
                                                            </div>
                                                            <div class="col-sm-2 float-right">
                                                            <a href="/report-earnings"><input class="form-control bg-gradient-primary waves-effect waves-light" type="button" value="Temizle"></a>
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
                                                                <div class="ag-btns d-flex flex-wrap w-25 mr-1 mb-1 mb-sm-0">
                                                                    <input type="text" class="ag-grid-filter form-control" id="filter-text-box" data-i18n="[placeholder]Find">
                                                                </div>
                                                                <div class="btn-export w-25">
                                                                    <button class="btn btn-success ag-grid-export-btn">
                                                                    <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel"></b></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="GridProduct" class="aggrid ag-theme-material" style="width: 100%;"></div>
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
                                                <form id="FormDateBetweenFilter" action="/report-earnings" method="get" novalidate>
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
    <link rel="stylesheet" type="text/css" media="all" href="/app-assets/dtRange/daterangepicker.css" />



    <script type="text/javascript" src="/app-assets/dtRange/daterangepickerByProcess.js"></script>

    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/app-assets/vendors/js/charts/echarts/echarts.min.js"></script>

    <!-- END: Footer-->
    <script>
        $(window).on('hashchange',function(){ 
            if (location.hash=='#earning-graph') {
                $("#NavProductReport").removeClass( "active open" );
                $("#NavServiceReport").removeClass( "active open" );
                $("#NavEarningsReport").addClass( "active open" );
                $(window).scrollTop($('.earning-graph').position().top-95);
            }else if (location.hash=='#service-reports') {
                $("#NavProductReport").removeClass( "active open" );
                $("#NavEarningsReport").removeClass( "active open" );
                $("#NavServiceReport").addClass( "active open" );
                $(window).scrollTop($('.service-reports').position().top-95);
            }else if (location.hash=='#product-reports') {
                $("#NavServiceReport" ).removeClass( "active open" );
                $("#NavEarningsReport").removeClass( "active open" );
                $("#NavProductReport").addClass( "active open" );
                $(window).scrollTop($('.product-reports').position().top-95);
            }
        });
        $(window).on("load", function () {

            // $('.ag-paging-panel').remove();
            if (location.hash=='#earning-graph') {
                $("#NavProductReport").removeClass( "active open" );
                $("#NavServiceReport").removeClass( "active open" );
                $("#NavEarningsReport").addClass( "active open" );
                $(window).scrollTop($('.earning-graph').position().top-95);
            }else if (location.hash=='#service-reports') {
                $("#NavProductReport").removeClass( "active open" );
                $("#NavEarningsReport").removeClass( "active open" );
                $("#NavServiceReport").addClass( "active open" );
                $(window).scrollTop($('.service-reports').position().top-95);
            }else if (location.hash=='#product-reports') {
                $("#NavServiceReport" ).removeClass( "active open" );
                $("#NavEarningsReport").removeClass( "active open" );
                $("#NavProductReport").addClass( "active open" );
                $(window).scrollTop($('.product-reports').position().top-95);
            }
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
                    if (current == end) { clearInterval(timer); }
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
            revenueChart.render();

            $.getJSON('/api/reports/charts/earnings-byMonth-process.php', function(response) {
                var totalPrice = response.totals.thisMonth.totals;
                var bolThisMonth = totalPrice - 500;
                // animateValue("thisMonthTotal",bolThisMonth,totalPrice,15000);
                // animateValue("thisMonthTotal2",bolThisMonth,totalPrice,15000);
                $('#thisMonthTotal').html(formatMoney(bolThisMonth));
                $('#thisMonthTotal2').html(formatMoney(bolThisMonth));
                $('#lastMonthTotal').html(formatMoney(response.totals.lastMonth.totals));
                $('#thisMonthProduct').html(formatMoney(response.totals.thisMonth.product));
                $('#thisMonthService').html(formatMoney(response.totals.thisMonth.service));
                $('#lastMonthProduct').html(formatMoney(response.totals.lastMonth.product));
                $('#lastMonthService').html(formatMoney(response.totals.lastMonth.service));

                $('#thisMonthCash').html(formatMoney(response.totals.thisMonth.paymentType.cash));
                $('#thisMonthEFT').html(formatMoney(response.totals.thisMonth.paymentType.eft));
                $('#thisMonthCC').html(formatMoney(response.totals.thisMonth.paymentType.cc));

                revenueChart.updateSeries([{ name: "Bu Ay", data: response.thisMonth },{ name: "Önceki Ay", data: response.lastMonth }]);
                var pieChart = echarts.init(document.getElementById('pie-chart'));

                var pieChartoption = {
                    tooltip: { trigger: 'item', formatter: "{a} <br/>{b} : {c} ({d}%)" },
                    legend: { orient: 'horizontal', left: 'center', data: ['Nakit', 'Havale / EFT', 'Kredi Kart'] },
                    series: [
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

        });
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

            // $.getJSON('/app-assets/data/report-service-earnings.php', function(response) {
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
            if ($.urlParam('between') == 'true') {
                $.ajax({
                    type: "GET",
                    url: "/app-assets/data/report-service-earnings-by-process.php?between=true&start=" + $.urlParam('start') + "&end=" + $.urlParam('end'),
                    success : function(res) {
                        var obj = JSON.parse(res);
                        $('#totalPrice').html(obj[0].TotalPrice+' TL')
                    }
                })
            }
    </script>
</body>
<!-- END: Body-->

</html>