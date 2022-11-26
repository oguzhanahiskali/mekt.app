<?php include 'header-top.php'; ?>
<?php if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<style>
    div.ag-theme-alpine div.ag-row {
    font-size: 5px !important;
}

</style>
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
                            <h2 class="content-header-title float-left mb-0">Ürün Listesi</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                </li>
                                <li class="breadcrumb-item active">Ürün Stok Modülü
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
                                                                        <a class="dropdown-item" href="#">500</a>
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
                                                                        <i class="feather icon-user-plus"></i> <b data-i18n="Add New Product Lot">Yeni Ürün Parti Ekle</b>
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
                                            <form id="FormEditProduct" class="add-patient-tabs h-75 col-12">
                                                <div class="data-fields h-100 mt-1">
                                                    <div  style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                                        <div class="row">
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label>ÜRÜN ADI:<span class="danger"></span></label>
                                                                    <div class="input-group">
                                                                    <input class="hidden" id="inp-edit-product-id" name="inp-edit-product-id">
                                                                    <input class="form-control" title="Bu alan değiştirilemez." disabled="disabled" id="inp-edit-product-name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-price">FİYAT:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <select class="form-control bolder required" name="inp-edit-currency" id="inp-edit-currency" title="Döviz Seçiniz">
                                                                            </select>
                                                                        </div>
                                                                        <input type="number" class="form-control required" id="inp-edit-price" aria-label="" name="inp-edit-price" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-barcode">BARKOD:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-edit-barcode" aria-label="" name="inp-edit-barcode" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-scale">ÖLÇEK:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-edit-scale" aria-label="" name="inp-edit-scale" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-type">ÖLÇEK TÜRÜ:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="select2 form-control required" id="inp-edit-type" name="inp-edit-type"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-stock">STOK ADET:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-edit-stock" aria-label="" name="inp-edit-stock" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-stock-alarm">STOK ADET ALARM:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-edit-stock-alarm" aria-label="" name="inp-edit-stock-alarm" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-batch-arrival-dt">PARTİ GELİŞ TARİHİ:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="date" class="form-control" id="inp-edit-batch-arrival-dt" aria-label="" name="inp-edit-batch-arrival-dt" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-edit-expiration-dt">Son Kullanım Tarih (SKT):<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="date" class="form-control" id="inp-edit-expiration-dt" aria-label="" name="inp-edit-expiration-dt" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn">
                                                    <button class="btn btn-primary round" id="productUpdate">Güncelle</button>
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
                                                    <h4 class="text-uppercase" >ÜRÜN PARTİ EKLE</h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <form id="FormAddProduct" class="add-patient-tabs h-75 col-12">
                                                <div class="data-fields h-100 mt-1">
                                                    <div  style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                                        <div class="row">
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-product">ÜRÜN ADI:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="select2 form-control required" id="inp-product" name="inp-product"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-price">FİYAT:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <select class="form-control bolder required" name="inp-currency" id="inp-currency" title="Döviz Seçiniz"></select>
                                                                        </div>
                                                                        <input type="number" class="form-control required" id="inp-price" aria-label="" name="inp-price" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-barcode">BARKOD:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-barcode" aria-label="" name="inp-barcode" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-scale">ÖLÇEK:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-scale" aria-label="" name="inp-scale" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-type">ÖLÇE TÜRÜ:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="select2 form-control required" id="inp-type" name="inp-type"></select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-stock">STOK ADET:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-stock" aria-label="" name="inp-stock" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-stock-alarm">STOK ADET ALARM:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="number" class="form-control" id="inp-stock-alarm" aria-label="" name="inp-stock-alarm" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-batch-arrival-dt">PARTİ GELİŞ TARİHİ:<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="date" class="form-control" id="inp-batch-arrival-dt" aria-label="" name="inp-batch-arrival-dt" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 data-field-col">
                                                                <div class="form-group">
                                                                    <label for="inp-expiration-dt">Son Kullanım Tarih (SKT):<span class="danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <input type="date" class="form-control" id="inp-expiration-dt" aria-label="" name="inp-expiration-dt" aria-invalid="false">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2 my-footer">
                                                <div class="add-data-btn">
                                                    <button class="btn btn-primary round" id="ProductPartyAdd">Ekle</button>
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
    </script>
</body>
<!-- END: Body-->

</html>