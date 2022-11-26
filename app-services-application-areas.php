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
                            <h2 class="content-header-title float-left mb-0">Uygulama Bölgeleri</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                </li>
                                <li class="breadcrumb-item active">Uygulama Bölge Listesi
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
                        <!-- users list start -->
                        <div class="row justify-content-center">
                            <div class="col">
                                <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                                    <!-- Ag Grid users list section start -->
                                    <div id="basic-examples">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                                <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                                                    <button class="btn btn-white filter-btn dropdown-toggle border text-dark" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        1 - 100
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
                                                                        <a class="dropdown-item" href="#">10</a>
                                                                        <a class="dropdown-item" href="#">50</a>
                                                                        <a class="dropdown-item" href="#">100</a>
                                                                        <a class="dropdown-item" href="#">100</a>
                                                                    </div>
                                                                </div>
                                                                <div class="ag-btns d-flex flex-wrap">
                                                                </div>
                                                                <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box" data-i18n="[placeholder]Find Service">
                                                                </button>
                                                                <div class="btn-export">
                                                                    <button class="btn btn-success ag-grid-export-btn">
                                                                        <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel">Excel</b></button>
                                                                    <button type="button" class="btn bg-gradient-primary default action-add" >
                                                                        <i class="feather icon-user-plus"></i> <b data-i18n="Add New Application Region">Yeni Uygulama Bölgesi Ekle</b>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="AppArea" class="aggrid ag-theme-material" style="width: 100%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ag Grid users list section end -->
                                    <!-- add edit sidebar starts -->
                                    <div id="add-edit-data-sidebar" class="add-new-data-sidebar">
                                        <div id="overlay-bg-edit" class="overlay-bg"></div>
                                        <div id="add-edit-data" class="add-new-data">
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4 class="text-uppercase" >UYGULAMA BÖLGESİ DÜZENLE</h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <form id="FormEditBolge" class="add-patient-tabs h-75 col-12">
                                                <div class="data-fields h-100 mt-1">
                                                    <div style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                                        <div class="row">
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-bolge-adi">HİZMET ADI:</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" title="Bu alan değiştirilemez." disabled="disabled" id="inp-edit-bolge-adi" name="inp-edit-bolge-adi">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-price">FİYAT:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <select class="form-control bolder required" name="inp-edit-currency" id="inp-edit-currency" title="Döviz Seçiniz">
                                                                            </select>
                                                                        </div>
                                                                        <input type="number" class="form-control" id="inp-edit-fiyat" aria-label="" name="inp-edit-fiyat" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-bolge-suresi">SEANS SÜRESİ:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="select2sure select2 form-control required" id="inp-edit-bolge-suresi" name="inp-edit-bolge-suresi"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                    <input type="hidden" class="form-control" id="hizmetid" name="hizmetid">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2 my-footer">
                                                <div class="add-data-btn">
                                                    <button class="btn btn-primary round" id="bolgeGuncelle">Güncelle</button>
                                                </div>
                                                <div class="cancel-data-btn">
                                                    <button class="btn btn-outline-danger round">İptal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- add edit sidebar ends -->
                                    
                                    <!-- add new sidebar starts -->
                                    <div id="add-new-data-sidebar" class="add-new-data-sidebar">
                                        <div id="overlay-bg" class="overlay-bg"></div>
                                        <div id="add-new-data" class="add-new-data">
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4 class="text-uppercase" >UYGULAMA BÖLGESİ EKLE</h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <form id="FormAddRegion" class="add-patient-tabs h-75 col-12">
                                                <div class="data-fields h-100 mt-1">
                                                    <div id="to-addList" style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;"></div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2 my-footer">
                                                <div class="add-data-btn">
                                                    <button class="btn btn-primary round" id="bolgeEkle">Ekle</button>
                                                </div>
                                                <div class="cancel-data-btn">
                                                    <button class="btn btn-outline-danger round">İptal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- add new sidebar ends -->
                                </section>
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
    <!-- END: Footer-->
    <script>
        $(document).ready(function() {
            var AllCurrency = {null:"Döviz ?", TRY:"TRY", USD:"USD", EUR:"EUR", GBP:"GBP"};
            $.each(AllCurrency, function (key, value) {
                $('#inp-currency').append('<option value=' + key + '>' + value + '</option>');
                $('#inp-edit-currency').append('<option value=' + key + '>' + value + '</option>');
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
    </script>
</body>
<!-- END: Body-->

</html>