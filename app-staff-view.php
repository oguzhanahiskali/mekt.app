<?php include 'header-top.php'; ?>
<?php if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<?php if($_GET['sid']){
    $sid = $_GET['sid'];
}else{
    exit();
}?>
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
<link href="/app-assets/dualList/dual-listbox.css" rel="stylesheet">

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
                     <h2 class="content-header-title float-left mb-0">Personel Detayları</h2>
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                           </li>
                           <li class="breadcrumb-item"><a href="app-staff-list">Personel Listesi</a>
                           </li>
                           <li class="breadcrumb-item active">Personel Detay Sayfası
                           </li>
                        </ol>
                     </div>
                  </div>
               </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none"></div>
         </div>
         <div class="content-body">
            <!-- users list start -->
            <div class="row justify-content-center">
               <div class="col">
                  <section id="data-list-view" class="data-list-view-header">
                    <div class="card">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Personel Kartı</div>
                            </div>
                            <div class="card-body bg-text" id="staffCard">
                                <div class="row">
                                    <div class="col-12 col-lg-2">
                                        <img id="people-img" src="/app-assets/images/pages/login/preloader2.gif" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="firstname"><span data-i18n="Firstname">İsim</span></label>
                                                    <input type="text" id="firstname" class="form-control " disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="surname"><span data-i18n="surname">Soyisim</span></label>
                                                    <input type="text" id="surname" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="CitizenID"><span data-i18n="CitizenID">Kullanıcı Adı</span></label>
                                                    <input type="text" id="CitizenID" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="DayOfBirth"><span data-i18n="DayOfBirth">Doğum Tarihi</span></label>
                                                    <input type="date" id="DayOfBirth" class="form-control " disabled>
                                                    <small id="gunKaldi"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-5">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Telefon</label>
                                                    <input type="text" class="form-control phone-inputmask" id="phonex" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Eposta</label>
                                                    <input type="text" id="email" class="form-control " disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>ADRES</label>
                                                    <textarea type="text" id="address" class="form-control " disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Görevi</label>
                                                    <select class="form-control" id="mission" disabled>
                                                        <option disabled value="" selected>Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Maaş Türü:</label>
                                                    <select class="form-control" id="SalaryType" disabled>
                                                        <option value="" selected>Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Maaş:</label>
                                                    <input type="number" class="form-control " id="salaryPayment" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sigorta Sicil No:</label>
                                                    <input type="number" class="form-control " id="insuranceNumber" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>İşe Giriş Tarihi</label>
                                                    <input type="date" class="form-control " id="startDateOfWork" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sisteme Erişim Yetkisi</label>
                                                    <select name="infoAccess" id="infoAccess" class="form-control text-center" disabled>
                                                        <option value="">Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                    <a id="edits" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Düzenle</a>
                                        <button id="customer-delete" class="btn btn-outline-danger"><i class="feather icon-trash-2"></i> Sil</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="staffPermissions" class="card userPermission d-none">
                        <div class="card-body">
                            <h4 class="card-title mb-50">Personel Yetkilendirme</h4>
                            <p class="mt-1">İlgili kullanıcıya <code>Verilmesi istenilen Yetkiler</code> için
                            lütfen <code>Sol Listede (Tüm Yetkiler)</code> bulunan yetkileri <code>Sağ Listeye (Atanan Yetkiler)</code> taşıyınız.</p>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row justify-content-md-center userPermission">
                                    <div class="col-md-12">
                                        <form id="FormPermissionStaff" class="add-patient-tabs h-75 col-12" novalidate>
                                            <select class="multipleSelects required" name="permissions[]" id="multipleSelects" data-index="15" required multiple></select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary me-1 waves-effect waves-float waves-light" id="btnStaffPermissionUpdate">Güncelle</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Vazgeç</button>
                        </div>
                    </div>
                    <div id="add-edit-data-sidebar" class="add-new-data-sidebar">
                        <div id="overlay-bg-edit" class="overlay-bg"></div>
                        <div id="add-edit-data" class="add-new-data">
                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                <div>
                                    <h4 class="text-uppercase" >Personel Düzenleme</h4>
                                </div>
                                <div class="hide-data-sidebar">
                                    <i class="feather icon-x"></i>
                                </div>
                            </div>
                            <form id="FormEditStaff" class="add-patient-tabs h-75 col-12" novalidate>
                                <div class="data-fields h-100 mt-1">
                                    <div style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                        <div class="row">
                                        <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label>Telefon<span class="danger">*</span></label>
                                                    <input type="phone" class="form-control phone-inputmask" id="phone" minlength="10" maxlength="14" name="mobilPhone" data-index="7" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="inp-price">Eposta:<span class="danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="text" id="edtEmail" class="form-control required" data-index="8" placeholder="Eposta" name="edtEmail" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Adress:<span class="danger">*</span></label>
                                                        <textarea type="text" id="edtAddress" class="form-control required" data-index="9" placeholder="Adres" name="edtAddress" required rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Görevi:<span class="danger">*</span></label>
                                                    <select class="form-control required" id="edtMission" name="edtMission" data-index="10" title="Görevi Seçiniz" required>
                                                        <option disabled value="" selected>Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Sigorta Sicil No:<span class="danger">*</span></label>
                                                    <input type="number" class="form-control required " id="edtInsuranceNumber" data-index="13" name="edtInsuranceNumber" required placeholder="Sigorta Sicil No">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Maaş Türü:<span class="danger">*</span></label>
                                                    <select class="form-control required" id="edtSalaryType" name="edtSalaryType" data-index="11" title="Maaş Türü" required>
                                                        <option value="" selected>Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">Maaş:<span class="danger">*</span></label>
                                                    <input type="number" class="form-control required " id="edtSalaryPayment" data-index="12" name="edtSalaryPayment" required placeholder="Maaş">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col">
                                                <div class="form-group">
                                                    <label for="hizmet">İşe Giriş Tarihi:<span class="danger">*</span></label>
                                                    <input type="date" class="form-control required " id="edtStartDateOfWork" data-index="14" name="edtStartDateOfWork" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Cinsiyet<span class="danger">*</span></label>
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="d-inline-block mr-1">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" id="edtWoman" name="edtGender" value="1" data-index="5" required>
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <text class="text-primary">Kadın</text>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                        <li class="d-inline-block">
                                                            <fieldset>
                                                                <div class="vs-radio-con">
                                                                    <input type="radio" id="edtMan" name="edtGender" value="2" data-index="6" required>
                                                                    <span class="vs-radio">
                                                                        <span class="vs-radio--border"></span>
                                                                        <span class="vs-radio--circle"></span>
                                                                    </span>
                                                                    <text class="text-primary">Erkek</text>
                                                                </div>
                                                            </fieldset>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 data-field-col text-center">
                                                <div class="form-group">
                                                    <label for="userAccess"><span data-i18n="">Kullanıcı Erişimi Olacak mı?</span><span class="danger">*</span></label>
                                                    <select name="userAccess" id="userAccess" class="form-control text-center">
                                                        <option value="">Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col text-center userAccessTF">
                                                <div class="form-group">
                                                    <label for="username"><span data-i18n="">Kullanıcı Adı</span></label>
                                                    <input type="text" class="form-control text-center" id="username" name="username" placeholder="Kullanıcı Adı" readonly="readonly">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col text-center userAccessTF">
                                                <div class="form-group">
                                                    <label for="firstname"><span data-i18n="">Yeni Şifre Gönder</span></label>
                                                    <select name="staffPWsms" id="staffPWsms" class="form-control text-center">
                                                        <option value="">Seçiniz</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col text-center userAccessPW">
                                                <div class="form-group">
                                                    <label for="password"><span data-i18n="">Şifre</span></label>
                                                    <div class="controls">
                                                        <input type="password" id="password" name="password" class="form-control text-center userAccessTF" placeholder="Your Password" required data-validation-required-message="The password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 data-field-col text-center userAccessPW">
                                                <div class="form-group">
                                                <label for="con-password"><span data-i18n="">Doğrulama</span></label>
                                                    <div class="controls">
                                                        <input type="password" id="con-password" name="con-password" class="form-control text-center userAccessTF" placeholder="Confirm Password" required data-validation-match-match="password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                    <input type="hidden" class="form-control" id="staffID" name="staffID">
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
                                    <button class="btn btn-primary round" id="btnStaffUpdate">Güncelle</button>
                                </div>
                                <div class="cancel-data-btn">
                                    <button class="btn btn-outline-danger round">İptal</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
   <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
   <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
   <script src="/app-assets/js/scripts/forms/validation/form-validation.js"></script>

   <script src="/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js"></script>
   <script src="/app-assets/dualList/dual-listbox.js"></script>

   <script>

    $(document).ready(function() {
         // Close sidebar
        $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
            $(".add-new-data").removeClass("show")
            $(".overlay-bg").removeClass("show")
            $("#data-name, #data-price").val("")
            $("#data-category, #data-status").prop("selectedIndex", 0)      
        });
        $.urlParam = function (name) {
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
            if (results == null) {
            return null;
            }
            return decodeURI(results[1]) || 0;
        }
        // Close sidebar
        $(".add-new-data").removeClass("show")
        $(".overlay-bg").removeClass("show")
        var YerOrNoArr = {1:"Evet", 2:"Hayır"};
        var QsmsArr = {1:"SMS gönder", 2:"Şifre belirle"};
        $.each(YerOrNoArr, function (key, value) {
            $('#userAccess').append('<option value=' + key + ' >' + value + '</option>');
            $('#infoAccess').append('<option value=' + key + ' >' + value + '</option>');
        });
        $.each(QsmsArr, function (key, value) {
            $('#staffPWsms').append('<option value=' + key + ' >' + value + '</option>');
        });
        $(".userAccessTF").hide();
        $(".userAccessPW").hide();
        $(".userPermission").hide();
        $('#staffPermissions').addClass('d-none');
        var userStatus = $('#userAccess');
        var staffPWsms = $('#staffPWsms');

        $('#userAccess').on('change', function(evt) {
            if (userStatus.val() !== '') {
                if (userStatus.val() == 1) {
                    $(".userAccessTF").show();
                    $(".staffPWsms").show();
                    $('#staffPermissions').removeClass('d-none');
                    document.getElementById("password").required = true;
                    document.getElementById("con-password").required = true;
                } else if (userStatus.val() == 2){
                    $(".userAccessTF").hide();
                    $(".staffPWsms").hide();
                    $(".userPermission").hide();
                    $('#staffPermissions').addClass('d-none');
                    $('#staffPWsms').val(null);
                    $(".userAccessPW").hide();
                    document.getElementById("password").required = false;
                    document.getElementById("con-password").required = false;
                }
            }else{
                    $(".userAccessTF").hide();
                    $(".staffPWsms").hide();
                    $(".userPermission").hide();
                    $('#staffPermissions').addClass('d-none');
                    $('#staffPWsms').val(null);
                    $(".userAccessPW").hide();
            }
        });
        $('#staffPWsms').on('change', function(evt) {
            if (staffPWsms.val() !== '') {
                $(".userPermission").show();
                $('#staffPermissions').removeClass('d-none');
                if (staffPWsms.val() == 2) {
                    $(".userAccessPW").show();
                    $(".userPermission").show();
                    $('input#password').attr('name', 'password');
                    $('input#con-password').attr('name', 'con-password');
                    $('#staffPermissions').removeClass('d-none');

                } else if(staffPWsms.val() == 1) {
                    $(".userAccessPW").hide();
                    $("input#password").removeAttr('name');
                    $("input#con-password").removeAttr('name');
                    $('#staffPermissions').removeClass('d-none');
                $.ajax({
                    type: "POST",
                    url: "/api/app-sms/available-count.php",
                    success: function(res) {
                        var obj = JSON.parse(res);
                        var resAvailable = obj[0]['Available'];
                        $inputAvaibleSMS = $('<input type="hidden" name="available"/>').val(resAvailable);
                        $('#FormEditStaff').append($inputAvaibleSMS);

                    }
                });
                }
            }else{
                $(".userAccessPW").hide();
                $(".userPermission").hide();
                $("input#password").removeAttr('name');
                $("input#con-password").removeAttr('name');
            }
        });
        $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
            $(".add-new-data").removeClass("show")
            $(".overlay-bg").removeClass("show")
            // $("#data-name, #data-price").val("")
            // $("#data-category, #data-status").prop("selectedIndex", 0)
        })
        // On Edit
        $('.action-edit').on("click", function(e) {
            e.stopPropagation();
            // $('#data-name').val('Altec Lansing - Bluetooth Speaker');
            // $('#data-price').val('$99');
            $(".add-new-data").addClass("show");
            $(".overlay-bg").addClass("show");
        });

        $.ajax({
            type: "POST",
            url: "/api/app-staff/staff-details",
            data: ({
               sid: $.urlParam('sid')
            }),
            success: function(res) {
                let obj = JSON.parse(res);
                if(obj['result']['result']==false){
                    window.location.href = "/app-staff-list?message=BadRequest";
                }else if(obj['result']['result']==true){
                
                    //DualListBox
                        $ArrPermissions= [];
                        for (let i = 0; i < obj['Permissions'].length; i++) {
                            $short = obj['Permissions'][i]['short'];
                            $description = obj['Permissions'][i]['description'];
                            $selected = false;
                            if(obj['Permissions'][i]['access']==true){ $selected = true; }
                            $ArrPermissions.push({
                                text: $description,
                                value: $short,
                                selected: $selected
                            });
                        }
                        var dualListbox = new DualListbox('#multipleSelects', {
                            availableTitle:'Tüm Yetkiler',
                            selectedTitle: 'Atanan Yetkiler',
                            addButtonText: 'Ekle',
                            removeButtonText: 'Çıkar',
                            addAllButtonText: 'Tümünü Ekle',
                            removeAllButtonText: 'Tümünü Çıkar',
                            searchPlaceholder: 'Yetki Ara',
                            options: $ArrPermissions
                        });
                        dualListbox.addEventListener('added', function(event){
                            $(".permissionsClass").remove();
                            $.each( dualListbox.selected, function( key, value ) {
                                $selectedPermissions = dualListbox.selected[key].dataset.id;
                                $inputSelectedPermission = $('<input type="hidden" class="permissionsClass" name="permissions[]"/>').val($selectedPermissions);
                                $('#FormPermissionStaff').append($inputSelectedPermission);
                            });
                        });
                        dualListbox.addEventListener('removed', function(event){
                            $(".permissionsClass").remove();
                            $.each( dualListbox.selected, function( key, value ) {
                                $selectedPermissions = dualListbox.selected[key].dataset.id;
                                $inputSelectedPermission = $('<input type="hidden" class="permissionsClass" name="permissions[]"/>').val($selectedPermissions);
                                $('#FormPermissionStaff').append($inputSelectedPermission);
                            });
                        });
                        $( ".dual-listbox__container div:nth-child(1)").css( "width", "100%" );
                        $( ".dual-listbox__container div:nth-child(1)").css( "display", "inline-grid" );
                        $( ".dual-listbox__container div:nth-child(3)").css( "width", "100%" );
                        $( ".dual-listbox__container div:nth-child(3)").css( "display", "inline-grid" );
                    var Qgender = obj['Details']['Gender'];
                    if(Qgender==1){
                        $("#people-img").attr("src", '/app-assets/images/portrait/small/woman.png');
                    }else if(Qgender==2){
                        $("#people-img").attr("src", '/app-assets/images/portrait/small/man.png');
                    }
                    $userName = obj['Details']['Username'];
                    $('#CitizenID').val($userName);
                    $(".permissionUserName").remove();
                    $inputPermissionsUserName = $('<input type="hidden" class="permissionUserName" name="username"/>').val($userName);
                    $('#FormPermissionStaff').append($inputPermissionsUserName);
                    $('#firstname').val(obj['Details']['Firstname'])
                    $('#surname').val(obj['Details']['Surname']);
                    $('#staffCard').attr('data-bg-text', obj['Details']['Firstname']+' '+obj['Details']['Surname'])
                    $('#DayOfBirth').val(obj['Details']['dayOfBirth']);
                    $('#phonex').val(obj['Details']['Phone']);
                    $('#email').val(obj['Details']['Email']);
                    $('#address').val(obj['Details']['Address']);
                    var birthDays = obj['Details']['dayOfBirth'];
                    $('#salaryPayment').val(obj['Details']['SalaryPayment']);
                    $('#insuranceNumber').val(obj['Details']['InsuranceNumber']);
                    $('#startDateOfWork').val(obj['Details']['dateOfWork']);

                    var missionList = {1:"Yönetici", 2:"Sekreter", 3:"Estetisyen", 4:"Temizlik Personeli", 5:"Stajyer Personel", 6:"Kuaför", 7:"Mutfak Personeli"};
                    var salaryTypeJson = {1:"Aylık Maaş", 2:"Haftalık Maaş"};
                    $.each(missionList, function (key, value) { $('#mission').append('<option value=' + key + ' >' + value + '</option>'); });
                    $.each(salaryTypeJson, function (key, value) { $('#SalaryType').append('<option value=' + key + ' >' + value + '</option>');});
                    varMission = obj['Details']['Mission'];
                    varSallaryType= obj['Details']['SalaryType'];
                    $Access = obj['Details']['Access'];
                    $("#mission").prop('selectedIndex', 0);
                    $("#mission").val(varMission).trigger("change");
                    $(`#mission option[value=`+varMission+`]`).attr('selected', 'selected');
                    $("#SalaryType").prop('selectedIndex', 0);
                    $("#SalaryType").val(varSallaryType).trigger("change");
                    $(`#SalaryType option[value=`+varSallaryType+`]`).attr('selected', 'selected');
                    $.each(missionList, function (key, value) { $('#edtMission').append('<option value=' + key + ' >' + value + '</option>'); });
                    $.each(salaryTypeJson, function (key, value) { $('#edtSalaryType').append('<option value=' + key + ' >' + value + '</option>');});
                    $("#edtMission").prop('selectedIndex', 0);
                    $("#edtMission").val(varMission).trigger("change");
                    $(`#edtMission option[value=`+varMission+`]`).attr('selected', 'selected');
                    $("#edtSalaryType").prop('selectedIndex', 0);
                    $("#edtSalaryType").val(varSallaryType).trigger("change");
                    $(`#edtSalaryType option[value=`+varSallaryType+`]`).attr('selected', 'selected');
                    $("#userAccess").prop('selectedIndex', 0);
                    $("#userAccess").val($Access).trigger("change");
                    $(`#userAccess option[value=`+$Access+`]`).attr('selected', 'selected');
                    $("#infoAccess").prop('selectedIndex', 0);
                    $("#infoAccess").val($Access).trigger("change");
                    $(`#infoAccess option[value=`+$Access+`]`).attr('selected', 'selected');
                    if($Access == 1){
                        $(".userPermission").show();
                        $('#staffPermissions').removeClass('d-none');
                    }else if($Access == 2){
                        $(".userPermission").hide();
                        $('#staffPermissions').addClass('d-none');
                    }
                    String.prototype.turkishtoEnglish = function () {
                        return this.replace('Ğ','g')
                            .replace('Ü','u')
                            .replace('Ş','s')
                            .replace('I','i')
                            .replace('İ','i')
                            .replace('Ö','o')
                            .replace('Ç','c')
                            .replace('ğ','g')
                            .replace('ü','u')
                            .replace('ş','s')
                            .replace('ı','i')
                            .replace('ö','o')
                            .replace('ç','c').toLowerCase();
                    };
                    function UpperKelimeler( str )
                    {
                        var parcalar = str.split(" ");
                        for ( var i = 0; i < parcalar.length; i++ )
                        {
                            var j = parcalar[i].charAt(0).toUpperCase();
                            parcalar[i] = j + parcalar[i].substr(1).toLowerCase();
                        }
                        return parcalar.join(" ");
                    }

                    $('#edtEmail').keyup(function(){
                        this.value=this.value.turkishtoEnglish();
                    });
                    $('#edtAddress').keyup(function(){
                        this.value=UpperKelimeler(this.value);
                    });
                    function calculateDays(biday) {
                        let today = new Date();
                        let bday = new Date(biday); 
                        let age = today.getFullYear() - bday.getFullYear();
                        let upcomingBday = new Date(today.getFullYear(), bday.getMonth(), bday.getDate());
                        if(today > upcomingBday) { upcomingBday.setFullYear(today.getFullYear() + 1); }
                        var one_day = 24 * 60 * 60 * 1000;
                        let daysLeft = Math.ceil((upcomingBday.getTime() - today.getTime()) / (one_day));
                        if (daysLeft && age < 200) { $("#gunKaldi").html(`${daysLeft} gün sonra, ${age+1} Yaşında`); }
                    }
                    calculateDays(birthDays);
                    
                    $( "#edits" ).click(function() {
                        $('#FormEditStaff')[0].reset();
                        $('#username').val($userName);
                        $("#add-edit-data").addClass("show");
                        $("#overlay-bg-edit").addClass("show");
                        $('#phone').val(obj['Details']['Phone']);
                        $('#edtEmail').val(obj['Details']['Email']);
                        $('#edtAddress').val(obj['Details']['Address']);
                        $('#edtSalaryPayment').val(obj['Details']['SalaryPayment']);
                        $('#edtInsuranceNumber').val(obj['Details']['InsuranceNumber']);
                        $('#edtStartDateOfWork').val(obj['Details']['dateOfWork']);
                        $('#staffID').val(obj['Details']['staffID']);
                        if(Qgender==1){ $('#edtWoman').attr('checked',true); }
                        else if(Qgender==2){ $('#edtMan').attr('checked',true); }
                    });
                }
            }
        });

        $(document).on('click', '#btnStaffUpdate', function(){
            $("input[name='updateType']").remove();
            $inputstaffDetails = $('<input type="hidden" name="updateType"/>').val('staffDetails');
            $('#FormEditStaff').append($inputstaffDetails);
            if ($('#staffPWsms').val() == '') {
                $('#staffPermissions').removeClass('d-none');
                $("input#password").removeAttr('name');
                $("input#con-password").removeAttr('name');
                $("#staffPWsms").removeAttr('name');
                $inputstaffDetails = $('<input type="hidden" name="updateType"/>').val('staffDetails');
                $('#FormEditStaff').append($inputstaffDetails);
            }else if ($('#staffPWsms').val() == 1) {
                $("#staffPWsms").attr('name','staffPWsms');
                $("input#password").removeAttr('name');
                $("input#con-password").removeAttr('name');
                $inputstaffDetails = $('<input type="hidden" name="updateType"/>').val('staffDetails');
                $('#FormEditStaff').append($inputstaffDetails);
            }else if ($('#staffPWsms').val() == 2){
                $("#staffPWsms").attr('name','staffPWsms');
                $('input#password').attr('name', 'password');
                $('input#con-password').attr('name', 'con-password');
                $inputstaffDetails = $('<input type="hidden" name="updateType"/>').val('staffDetails');
                $('#FormEditStaff').append($inputstaffDetails);
            }

            $staffEditFormSerialize = $('#FormEditStaff').serialize();
            
            if($staffEditFormSerialize.indexOf('=&') > -1==false && $('#phone').val().length== 10 && $('#phone').val().slice(0,1)==5 && $('#edtMission').val() != null && $('#edtSalaryType').val() != null){
                if ($('#staffPWsms').val() == 2){
                    if($('input#password').val() == $('input#con-password').val() && $('input#password').val().length>5){
                        Swal.fire("İşleniyor", "Güncellemeler işleniyor, Lütfen bekleyiniz...", "info");
                        $.ajax({
                        type: "POST",
                        url: "/api/app-staff/update-staff.php",
                        data: $('#FormEditStaff').serialize(),
                        success: function(result) {
                            res = JSON.parse(result)
                            if(res['status']==true){
                                Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
                                location.reload();
                            }else if(res['code']==1001){
                                Swal.fire("Hata", "Güncelleme hatası.", "warning");
                            }else if(res['code']==1012){
                                Swal.fire("Hata", "Form gönderimi sırasında birşeyler ters gitti", "warning");
                            }
                        }
                        });
                    }else{
                        Swal.fire("Şifre Bilgisi Hatalı", "Şifre alanları eşit değil veya 6 haneden az karakter girildi. Lütfen en az 6 karakter uzunluğunda bir şifre belirleyiniz.", "warning");
                    }
                }else if ($('#staffPWsms').val() == 1){
                    Swal.fire("SMS Gönderiliyor.", "Güncelleme başarılı Sms gönderimi işleme alındı lütfen bekleyin...", "info");
                        $.ajax({
                        type: "POST",
                        url: "/api/app-staff/update-staff.php",
                        data: $('#FormEditStaff').serialize(),
                        success: function(result) {
                            res = JSON.parse(result)
                            if(res['status']==true){
                                Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
                                location.reload();
                            }else if(res['code']==1001){
                                Swal.fire("Hata", "Güncelleme hatası.", "warning");
                            }else if(res['code']==1012){
                                Swal.fire("Hata", "Form gönderimi sırasında birşeyler ters gitti", "warning");
                            }
                        }
                    });
                }else{
                    Swal.fire("Güncelleniyor...", "Güncelleme işlemi devam ediyor. Lütfen bekleyiniz...", "info");
                        $.ajax({
                        type: "POST",
                        url: "/api/app-staff/update-staff.php",
                        data: $('#FormEditStaff').serialize(),
                        success: function(result) {
                            res = JSON.parse(result)
                            if(res['status']==true){
                                Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
                                location.reload();
                            }else if(res['code']==1001){
                                Swal.fire("Hata", "Güncelleme hatası.", "warning");
                            }else if(res['code']==1012){
                                Swal.fire("Hata", "Form gönderimi sırasında birşeyler ters gitti", "warning");
                            }
                        }
                    });
                }
                
            }else{
                Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
            }
        });
        $(document).on('click', '#btnStaffPermissionUpdate', function(){
            
            $inputstaffPermissions = $('<input type="hidden" name="updateType"/>').val('staffPermissions');
            $('#FormPermissionStaff').append($inputstaffPermissions);
            Swal.fire("Güncelleniyor...", "Güncelleme işlemi devam ediyor. Lütfen bekleyiniz...", "info");
            $.ajax({
            type: "POST",
            url: "/api/app-staff/update-staff.php",
            data: $('#FormPermissionStaff').serialize(),
            success: function(result) {
                res = JSON.parse(result)
                if(res['status']==true){
                    Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
                    location.reload();
                }else if(res['code']==1012){
                    Swal.fire("Hata", "Yetki değişikliği yapılmadı.", "warning");
                }
            }
        });
        });
    });

   </script>
</body>
<!-- END: Body-->

</html>