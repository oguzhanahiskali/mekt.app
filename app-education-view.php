<?php
include $_SERVER['DOCUMENT_ROOT'].'/header-top.php';
$varmi = false;

if(isset($_GET['id'])){
    $getID = $_GET['id'];
    $query = $db->query("SELECT * FROM tbl_egitim WHERE ID = '{$getID}' AND STATUS=1")->fetch(PDO::FETCH_ASSOC);
    if($query){
        $varmi = true;
        $educationName = $query['EGITIM_ADI'];
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
    // $query = $db->query("SELECT *,YEAR(CURDATE()) - YEAR(DOGUM_TARIHI) AS YAS FROM tbl_musteri_kimlik WHERE ID = '{$getID}' AND DURUM = 1 AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
    // $tckimlikno = $query['TC'];
    // $hastaadisoyadi = $query['ADI'].' '.$query['SOYADI'];
    // $originalDate = $query['DOGUM_TARIHI'];
    // $ProfilDogumTarihi = date("d-m-Y", strtotime($originalDate));

    // $kimlikTC = $query['TC'];
    // $adres = $query['ADRES'];
    // $yass = $query['YAS'];
    // $cep = $query['CEP'];
    // if(empty($query['EPOSTA'])){ $eposta ="[girilmedi]"; }
    // else{ $eposta = $query['EPOSTA']; }
    // if($query['FEEDBACK_SMS']=='false'){ $sms = '<i class="feather icon-x-square h4 danger" title="Kabul Etmedi"></i>'; }else{ $sms = '<i class="feather icon-check-circle h4 success" title="Kabul Etti"></i>'; }
    // if($query['FEEDBACK_CALL']=='false'){ $call ='<i class="feather icon-x-square h4 danger" title="Kabul Etmedi"></i>'; }else{ $call = '<i class="feather icon-check-circle h4 success" title="Kabul Etti"></i>'; }
    // if($query['FEEDBACK_EMAIL']=='false'){ $email ='<i class="feather icon-x-square h4 danger" title="Kabul Etmedi"></i>'; }else{ $email = '<i class="feather icon-check-circle h4 success" title="Kabul Etti"></i>'; }
    // $hizmetyok = '';
}


?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<link href="/app-assets/dualList/dual-listbox.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/basvuru-formu/app-assets/vendors/css/extensions/toastr.min.css">
<script>
    
    var ids = <?php echo $getID; ?>;
    var educationNames = '<?php echo $educationName?>';
</script>
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
                <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                    <!-- Ag Grid users list section start -->
                    <div id="basic-examples">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box" placeholder="Grup filtrele...">
                                                </button>
                                                <div class="btn-export">
                                                    <button class="btn btn-success ag-grid-export-btn">
                                                    <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel">Excele Aktar</b></button>
                                                    <button type="button" class="btn bg-gradient-primary default action-edit" >
                                                        <i class="feather icon-pie-chart"></i> <b>Yeni Grup Ekle</b>
                                                    </button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="myGrid" class="aggrid ag-theme-material" style="width: 100%;"></div>
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
                                    <h4 class="text-uppercase" >GRUP DÜZENLE</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form id="FormEditHizmet" class="add-patient-tabs h-75 col-12">
                                <div class="data-fields h-100 mt-1">
                                    <div  style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Grup Adı:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="inp-edit-grup-adi" name="inp-edit-grup-adi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Başlangıç:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="datetime-local" name="inp-edit-start" class="form-control text-center required" id="inp-edit-start" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Bitiş:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                    <input type="datetime-local" name="inp-edit-finish" class="form-control text-center required" id="inp-edit-finish" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <input type="hidden" class="form-control" id="editID" name="editID">
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
                                    <button class="btn btn-primary round" id="btnEditUpdate">Güncelle</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger round">İptal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add edit sidebar ends -->
                    <!-- add edit sidebar starts -->
                    <div id="add-edit-data-sidebar" class="add-new-data-sidebar">
                        <div id="overlay-bg-join" class="overlay-bg"></div>
                        <div id="add-join-data" class="add-new-data add-new-data2">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase" >YENİ GRUP EKLE</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form id="formAddGroup" class="add-patient-tabs h-75 col-12">
                                <div class="data-fields h-100 mt-1">
                                    <div  style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                        <div class="row">
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Eğitim Adı:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="inp-edit-education-name" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Grup Adı:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                        <input class="form-control" id="inp-new-group" name="inp-new-group">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Başlangıç:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="datetime-local" name="inp-new-start" class="form-control text-center required" id="inp-new-start" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Bitiş:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                    <input type="datetime-local" name="inp-new-finish" class="form-control text-center required" id="inp-new-finish" aria-invalid="false">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <input type="hidden" class="form-control" id="educationID" name="educationID">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2 my-footer">
                                <div class="cancel-data-btn">
                                    <button type="reset" class="btn btn-outline-danger waves-effect mr-2" data-dismiss="modal">Vazgeç</button>
                                </div>
                                <div class="add-data-btn">
                                    <button class="btn btn-primary me-1 waves-effect waves-float waves-light" id="btnNewGroup">Grup Ekle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add edit sidebar ends -->

                    <!-- calendar Modal starts-->
                    <div class="modal hide fade in" data-keyboard="false" data-backdrop="static" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-text-bold-600" id="cal-modal">Eğitim > Grup > Davetli İşlemleri</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-content">
                                    <div class="col">
                                        <div class="card-content">
                                            <div class="card">
                                                <div class="card-content collpase show">
                                                    <form id="JoinsList">
                                                        <div class="row">
                                                            <div class="col ml-1 mr-1 mb-1 mb-md-0 mb-lg-0 border">
                                                                <legend class="text-center primary p-1 h4 w-auto">Şirket Davetli Listesi</legend>
                                                                <select class="multipleSelects" name="multipleSirketler[]" id="multipleSirketler" multiple></select>
                                                                <p class="mt-1" style="text-align:center;">İlgili şirketleri <code>davet edebilmek</code>  için lütfen <code>Sol Listede</code> bulunan şirketleri <code>Sağ Listeye</code> taşıyınız.</p>
                                                            </div>
                                                            <div class="col ml-1 mr-1 border">
                                                                <legend class="text-center primary p-1 h4 w-auto">Kişi Davetli Listesi</legend>
                                                                <select class="multipleSelects" name="multipleKisiler[]" id="multipleKisiler" multiple></select>
                                                                <p class="mt-1" style="text-align:center;">İlgili kişileri <code>davet edebilmek</code>  için lütfen <code>Sol Listede</code> bulunan kişileri <code>Sağ Listeye</code> taşıyınız.</p>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer float-right">
                                    <button type="reset" class="btn btn-outline-secondary waves-effect mr-2" data-dismiss="modal">Vazgeç</button>
                                    <button class="btn btn-primary me-1 waves-effect waves-float waves-light" id="btnJoinsUpdate">Güncelle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calendar Modal ends-->

                    <!-- calendar Modal starts-->
                    <div class="modal hide fade in" data-keyboard="false" data-backdrop="static" id="ModalDetails" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-text-bold-600" id="cal-modal">Davetli Katılım İşlemleri</h4>
                                    <button type="button" class="close" onclick="location.reload();" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-content">
                                    <div class="col">
                                        <div class="card-content">
                                            <div class="card">
                                                <div class="card-content collpase show">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="ag-grid-btns d-flex justify-content-between flex-wrap mb-1">
                                                                    <input type="text" class="ag-grid-detail-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box2" placeholder="Davetli filtrele...">
                                                                    <div class="dropdown sort-dropdown mb-1 mb-sm-0">
                                                                        <button class="btn btn-white filter-btn dropdown-toggle border text-dark" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            1 - 10
                                                                        </button>
                                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton6">
                                                                            <a class="dropdown-item" href="#">10</a>
                                                                            <a class="dropdown-item" href="#">50</a>
                                                                            <a class="dropdown-item" href="#">100</a>
                                                                            <a class="dropdown-item" href="#">100</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form id="joinList2">
                                                            <div id="myGridJoinList" class="aggrid ag-theme-material" style="width: 100%;height:27em!important"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer float-right">
                                    <button type="reset" class="btn btn-outline-secondary waves-effect mr-2" onclick="location.reload();">Vazgeç</button>
                                    <button class="btn btn-primary me-1 waves-effect waves-float waves-light" id="btnJoins2Update">Güncelle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- calendar Modal ends-->
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Footer-->
    <script>
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const getID = urlParams.get('id')
    </script>
    <?php include 'includes/footer.php'?>
    <script src="app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="/app-assets/dualList/dual-listbox-education-company.js"></script>
    <script src="/basvuru-formu/app-assets/js/scripts/extensions/ext-component-toastr.min.js"></script>
    <abc></abc>
    <script>
        $(document).ready(function() {

            $.urlParam = function (name) {
               var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
               if (results == null) {
               return null;
               }
               return decodeURI(results[1]) || 0;
            }

            $('#FormEditHizmet').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) { 
                    e.preventDefault();
                    return false;
                }
            });

            $('.ag-grid-export-btn').click(function() {
                window.open(
                    'https://panel.dijitalsultanbeyli.com/app-assets/data/export-education-joins?type=edu&eduID='+ids,
                '_self' // <- This is what makes it open in a new window.
                );
            });


            $("#btnJoinsUpdate").click(function() {
                $.ajax({
                    type: "POST",
                    url: "/api/update/educations-join.php",
                    data : $('#JoinsList').serialize(),
                    success: function(res) {
                        var obj = JSON.parse(res);
                        if(obj[0]['status']==true){
                            Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>    <!-- END: Footer-->
</body>
<!-- END: Body-->

</html>