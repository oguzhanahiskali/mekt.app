<?php include 'header-top.php'; ?>
<?php if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">
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
                     <h2 class="content-header-title float-left mb-0">Personel Ekle</h2>
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                           </li>
                           <li class="breadcrumb-item"><a href="app-staff-list">Personel Listesi</a>
                           </li>
                           <li class="breadcrumb-item active">Personel Ekleme Sayfası
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
                  <section id="data-list-view" class="users-list-wrapper data-list-view-header">
                     <div id="basic-examples">
                        <div class="card">                            
                            <div class="content-body">

                                <!-- Form wizard with step validation section start -->
                                <section id="validation">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Personel Ekleme Sihirbazı</h4>
                                                </div>
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <form id="formStaff" action="#" class="steps-validation wizard-circle">
                                                            <!-- Step 1 -->
                                                            <h6><i class="step-icon feather icon-user-plus"></i> Kimlik Bilgisi</h6>
                                                            <fieldset>
                                                                <div class="row m-1 ">
                                                                    <div class="col-12">
                                                                        <div class="card-content">
                                                                            <img class="card-img img-fluid" src="/app-assets/images/illustration/create-account2.svg" alt="Card image" style="opacity: 0.5;width:34em;height:34em">
                                                                            <div class="card-img-overlay overflow-hidden">
                                                                                <h5 class="mb-2"><i class="feather icon-user m-25"></i>Kimlik Bilgisi</h5>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="firstname"><span data-i18n="Firstname">İsim</span></label>
                                                                                            <input type="text" id="firstname" class="form-control maxTwoName uppercase required" required name="data-firstname" data-index="1" data-i18n="[placeholder]Firstname" placeholder="İsim">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="surname"><span data-i18n="surname">Soyisim</span></label>
                                                                                            <input type="text" id="surname" class="form-control maxTwoName uppercase required" required name="data-surname" data-index="2" data-i18n="[placeholder]Surname" placeholder="Soyisim">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="CitizenID"><span data-i18n="CitizenID">T.C. Kimlik No</span></label>
                                                                                            <input type="text" onblur="tckimlikkontorolu(this);" required minlength="11" maxlength="11" id="CitizenID" class="form-control maxTwoName uppercase required" name="data-CitizenID" data-index="3" data-i18n="[placeholder]CitizenID" placeholder="T.C. Kimlik No">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label for="DayOfBirth"><span data-i18n="DayOfBirth">Doğum Tarihi</span></label>
                                                                                            <input type="date" id="DayOfBirth" class="form-control maxTwoName uppercase required" required name="data-DayOfBirth" data-index="4" data-i18n="[placeholder]DayOfBirth" placeholder="Doğum Tarihi">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6"></div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label>Cinsiyet</label>
                                                                                            <ul class="list-unstyled mb-0">
                                                                                                <li class="d-inline-block mr-2">
                                                                                                    <fieldset>
                                                                                                        <div class="vs-radio-con">
                                                                                                            <input type="radio" id="woman" name="gender" value="1" data-index="5" required>
                                                                                                            <span class="vs-radio">
                                                                                                                <span class="vs-radio--border"></span>
                                                                                                                <span class="vs-radio--circle"></span>
                                                                                                            </span>
                                                                                                            <text class="text-primary">Kadın</text>
                                                                                                        </div>
                                                                                                    </fieldset>
                                                                                                </li>
                                                                                                <li class="d-inline-block mr-2">
                                                                                                    <fieldset>
                                                                                                        <div class="vs-radio-con">
                                                                                                            <input type="radio" id="man" name="gender" value="2" data-index="6" required>
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <!-- Step 2 -->
                                                            <h6><i class="step-icon feather icon-lock"></i> İletişim Bilgisi</h6>
                                                            <fieldset>
                                                                <div class="row mt-1 ">
                                                                    <div class="col-12 col-sm-6">
                                                                        <img class="card-img img-fluid" src="/app-assets/images/illustration/two-steps-verification-illustration.svg" alt="Card image" style="opacity: 0.1;height: 35em;">
                                                                        <div class="card-img-overlay overflow-hidden">
                                                                            <h5 class="mb-1"><i class="feather icon-user mr-25"></i>İletişim Bilgisi</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Telefon</label>
                                                                                        <input type="hidden" id="phone2" name="mobilPhone"/>
                                                                                        <input type="tel" class="form-control" id="phone" data-index="7" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Eposta</label>
                                                                                        <input type="text" id="email" class="form-control required" data-index="8" placeholder="Eposta" name="email" required>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label>Adres</label>
                                                                                        <textarea type="text" id="address" class="form-control required" data-index="9" placeholder="Adres" name="address" required rows="4"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-sm-6">
                                                                        <img class="card-img img-fluid" src="/app-assets/images/illustration/email.svg" alt="Card image" style="opacity: 0.1;height: 35em;">
                                                                        <div class="card-img-overlay overflow-hidden">
                                                                            <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Sigorta & Görev Bilgisi</h5>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label>Görevi</label>
                                                                                        <select class="form-control required" id="mission" name="mission" data-index="10" title="Görevi Seçiniz" required>
                                                                                            <option disabled value="" selected>Seçiniz</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Maaş Türü:</label>
                                                                                        <select class="form-control required" id="SalaryType" name="SalaryType" data-index="11" title="Maaş Türü" required>
                                                                                            <option value="" selected>Seçiniz</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Maaş:</label>
                                                                                        <input type="number" class="form-control required " id="salaryPayment" data-index="12" name="salaryPayment" required placeholder="Maaş">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Sigorta Sicil No:</label>
                                                                                        <input type="number" class="form-control required " id="insuranceNumber" data-index="13" name="insuranceNumber" required placeholder="Sigorta Sicil No">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>İşe Giriş Tarihi</label>
                                                                                        <input type="date" class="form-control required " id="startDateOfWork" data-index="14" name="startDateOfWork" required>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <!-- Step 3 -->
                                                            <h6><i class="step-icon feather icon-lock"></i> Yetkilendirme</h6>
                                                            <fieldset style="padding: 0px 0px 0px 0px">
                                                                <div class="container">
                                                                    <div class="row justify-content-md-center mt-1">
                                                                        <div class="col col-lg-6 text-center">
                                                                            <div class="form-group">
                                                                                <label for="userAccess"><span data-i18n="">Kullanıcı Erişimi Olacak mı?</span></label>
                                                                                <select name="userAccess" id="userAccess" class="form-control text-center">
                                                                                    <option value="">Seçiniz</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-md-center">
                                                                        <div class="col col-lg-3 text-center userAccessTF">
                                                                            <div class="form-group">
                                                                                <label for="username"><span data-i18n="">Kullanıcı Adı</span></label>
                                                                                <input type="text" class="form-control text-center" id="username" name="username" placeholder="Kullanıcı Adı" readonly="readonly">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col col-lg-3 text-center userAccessTF">
                                                                            <div class="form-group">
                                                                                <label for="firstname"><span data-i18n="">Şifreyi SMS Gönder</span></label>
                                                                                <select name="staffPWsms" id="staffPWsms" class="form-control text-center">
                                                                                    <option value="">Seçiniz</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row justify-content-md-center">
                                                                        <div class="col col-lg-3 text-center userAccessPW">
                                                                            <div class="form-group">
                                                                                <label for="password"><span data-i18n="">Şifre</span></label>
                                                                                <div class="controls">
                                                                                    <input type="password" id="password" name="password" class="form-control text-center" placeholder="Your Password" required data-validation-required-message="The password field is required" minlength="6">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col col-lg-3 text-center userAccessPW">
                                                                            <div class="form-group">
                                                                            <label for="password_confirm"><span data-i18n="">Doğrulama</span></label>
                                                                                <div class="controls">
                                                                                    <input type="password" id="password_confirm" name="password_confirm" class="form-control text-center" placeholder="Confirm Password" required data-validation-match-match="password" data-validation-required-message="The Confirm password field is required" minlength="6">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row justify-content-md-center userPermission">
                                                                    <div class="col-md-12">
                                                                        <p class="mt-1">İlgili kullanıcıya <code>Verilmesi istenilen Yetkiler</code> için
                                                                        lütfen <code>Sol Listede (Tüm Yetkiler)</code> bulunan yetkileri <code>Sağ Listeye (Atanan Yetkiler)</code> taşıyınız.</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <select class="multipleSelects required" name="permissions[]" id="multipleSelects" data-index="15" required multiple></select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- Form wizard with step validation section end -->
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
   <div>
   </div>
   <!-- END: Content-->

   <div class="sidenav-overlay"></div>
   <div class="drag-target"></div>

   <!-- BEGIN: Footer-->
   <?php include 'includes/footer.php' ?>
   <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
   <script src="/app-assets/js/scripts/forms/validation/form-validation.js"></script>

    <!-- <script src="/app-assets/js/scripts/forms/wizard-steps.js"></script> -->

   <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>

   <script src="/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js"></script>
   <script src="/app-assets/dualList/dual-listbox.js"></script>

    <script>
        // Show form
        var form = $(".steps-validation").show();
        var wto;
        $(".steps-validation").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: 'Oluştur'
            },
            onStepChanging: function (event, currentIndex, newIndex) {
                $("#phone").intlTelInput();
                $("#phone2").val($("#phone").intlTelInput("getNumber"));
                $('#phone').on('countrychange', function(e){
                    var currentMask = $(this).attr('placeholder').replace(/[0-9+]/ig,'9');
                    $(this).attr('placeholder', currentMask);
                    $('#phone').inputmask({ mask: currentMask, keepStatic: true });
                });
                // $.get('/api/locations/locations', function() {}, "json").always(function(res) {
                //     $("#phone").intlTelInput("setCountry", res['country_code']);
                //     $("#phone").attr('title',i18next.t("The Country you are affiliated with")+' '+res['country_name'] );
                // });

                // $('#phone').focusout(function(){
                //     if($('#phone').val().indexOf('_')>-1){
                //         Toast.fire({
                //             icon: 'warning',
                //             title: 'Telefon bilgisi eksik yada hatalı'
                //         });
                //         $('.actions').hide();
                //     }else if($('#phone').val().indexOf('_')==-1){
                //         $('.actions').show();
                //         Toast.fire({
                //             icon: 'success',
                //             title: 'Telefon doğrulandı'
                //         });

                //     }else{
                //         console.log('other ');
                //     }
                // });
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

                $('#email').keyup(function(){
                    this.value=this.value.turkishtoEnglish();
                });
                $('#address').keyup(function(){
                    this.value=UpperKelimeler(this.value);
                });
                if (currentIndex > newIndex) {
                    return form.valid();
                }
                if (currentIndex < newIndex) {
                    // To remove error styles
                    form.find(".body:eq(" + newIndex + ") label.error").remove();
                    form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                }
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function (event, currentIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinished: function (event, currentIndex) {
                var continues = null;
                if($('#userAccess').val()==1){
                    if($("#multipleSelects :selected").length>0){
                        continues = true;
                    }else{
                        alert('yetkilendirme seçilmedi');
                        continues = false;
                    }
                }else if($('#userAccess').val()==2){
                    continues = true;
                }
                if(continues == true ){
                    var formStaffSerializeArr = $('#formStaff').serializeArray();

                    $.ajax({
                            type: "POST",
                            url: "/api/app-sms/available-count.php",
                            success: function(res) {
                                var obj = JSON.parse(res);
                                var resTotal = obj[0]['Total'];
                                var resUsed = obj[0]['Used'];
                                var resAvailable = obj[0]['Available'];
                                var uniquekey = {
                                    name: "available",
                                    value: resAvailable
                                };
                                var CountryISO = $("#phone").intlTelInput("getSelectedCountryData").iso2;
                                var countryISOarr = {
                                    name: "countryISO",
                                    value: CountryISO
                                };
                                var LangStatus = {
                                    name: "LangStatus",
                                    value: localStorage.getItem("LangStatus")
                                };

                                setTimeout(function() {
                                    formStaffSerializeArr.push(uniquekey);
                                    formStaffSerializeArr.push(countryISOarr);
                                    formStaffSerializeArr.push(LangStatus);
                                    $.ajax({
                                        type: "POST",
                                        url: "/api/app-staff/add-staff.php",
                                        data: formStaffSerializeArr,
                                        success: function (res) {
                                            var returnedData = JSON.parse(res);
                                            if (returnedData['status'] == true) {
                                                if(returnedData['code'] == 1000){
                                                    setTimeout(function() {
                                                        Swal.fire("Başarılı", "Personel Başarıyla Oluşturuldu. Yönleniyorsunuz...", "success");
                                                        window.location.href = 'app-staff-list';
                                                    }, 2000);
                                                }else{
                                                    alert('hata!');
                                                }
                                            } else if (returnedData['status'] == false) {
                                                if(returnedData['code'] == 1001){
                                                        Swal.fire("Başarısız", "Veritabanına eklerken hata oluştu.", "warning");
                                                }else if(returnedData['code'] == 1012){
                                                    alert('Veritabanı hatası. Lütfen daha sonra tekrar deneyiniz.');
                                                }
                                            }
                                        }
                                    });
                                }, 1500);
                            }
                        });
                }else{
                    alert('devam edilemez!');
                }


            }
        });

        $("#phone").focusin(function() {
            $("#phone").intlTelInput('setCountry', 'gb');
            $("#phone").intlTelInput('setCountry', 'tr');
        });

        // Initialize validation
        $(".steps-validation").validate({
            ignore: 'input[type=hidden]',
            errorClass: 'warning',
            successClass: 'success',
            highlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            unhighlight: function (element, errorClass) {
                $(element).removeClass(errorClass);
            },
            errorPlacement: function (error, element) {
                error.insertAfter(element);
            },
            rules: {
                email: {
                    email: true
                },
                password : {
                    minlength : 6
                },
                password_confirm : {
                    minlength : 6,
                    equalTo : "#password"
                }
            }
        });
        $('.actions').show();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        function hesaps(){
            if(($('#firstname').val().length>0) && ($('#surname').val().length>0 ) && ($('#CitizenID').val().length>0) && ($('#DayOfBirth').val() != "")){
                var firstName = $('#firstname').val();
                var surName = $('#surname').val();
                var CitizenID = $('#CitizenID').val();
                var DofB = $('#DayOfBirth').val();
                $('#username').val(CitizenID);
                $.ajax({
                    type: "POST",
                    url: "/api/nvi-verify.php",
                    data: {tckimlikno:CitizenID,ad:firstName,soyad:surName,dogumyili:DofB},
                    success: function(res) {
                        var obj = JSON.parse(res);
                        if(obj['status']==true){
                            if(obj['enrollmentStatus']==true){
                                Toast.fire({
                                    icon: 'success',
                                    title: 'Kimlik bilgileri başarıyla doğrulandı!'
                                });
                                $('.actions').show();
                            }else if(obj['enrollmentStatus']==false){
                                $('.actions').hide();
                                Swal.fire("Zaten Kayıtlı", "Kimlik bilgileri doğrulandı ancak bu personel zaten kayıtlı! ", "info");
                            }
                        }else if(obj['status']==false && obj['because']=='Could not connect to host'){
                                Swal.fire("Bağlantı Sorunu", "Nüfus müdürlüğü sistemine bağlanırken bir sorun oluştu. Lütfen tekrar deneyin. ", "info");
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Kimlik bilgileri Hatalı!'
                            });
                            $('.actions').hide();
                        }
                    }

                });
            }else{ Toast.fire({ icon: 'info', title: 'Eksik alan bıraktınız' }); }
        };
        $('#firstname').change(function(){ hesaps(); });
        $('#surname').change(function(){ hesaps(); });
        $('#CitizenID').change(function(){ hesaps(); });
        $('#DayOfBirth').change(function(){
            clearTimeout(wto);
            wto = setTimeout(function() {
            hesaps();
            }, 2222);
        });


        var missionList = {1:"Yönetici", 2:"Sekreter", 3:"Estetisyen", 4:"Temizlik Personeli", 5:"Stajyer Personel", 6:"Kuaför", 7:"Mutfak Personeli"};
        var salaryTypeJson = {1:"Aylık Maaş", 2:"Haftalık Maaş"};
        var YerOrNoArr = {1:"Evet", 2:"Hayır"};
        var QsmsArr = {1:"SMS gönder", 2:"Şifre belirle"};
        $.each(missionList, function (key, value) {
            $('#mission').append('<option value=' + key + ' >' + value + '</option>');
        });
        $.each(salaryTypeJson, function (key, value) {
            $('#SalaryType').append('<option value=' + key + ' >' + value + '</option>');
        });
        $.each(YerOrNoArr, function (key, value) {
            $('#userAccess').append('<option value=' + key + ' >' + value + '</option>');
        });
        $.each(QsmsArr, function (key, value) {
            $('#staffPWsms').append('<option value=' + key + ' >' + value + '</option>');
        });
        $(".userAccessTF").hide();
        $(".userAccessPW").hide();
        $(".userPermission").hide();
        var userStatus = $('#userAccess');
        var staffPWsms = $('#staffPWsms');

        $('#userAccess').on('change', function(evt) {
            if (userStatus.val() !== '') {
                if (userStatus.val() == 1) {
                    $(".userAccessTF").show();
                    $(".staffPWsms").show();
                    document.getElementById("password").required = true;
                    document.getElementById("password_confirm").required = true;
                } else if (userStatus.val() == 2){
                    $(".userAccessTF").hide();
                    $(".staffPWsms").hide();
                    $(".userPermission").hide();
                    $('#staffPWsms').val(null);
                    $(".userAccessPW").hide();
                    document.getElementById("password").required = false;
                    document.getElementById("password_confirm").required = false;
                }
            }else{
                    $(".userAccessTF").hide();
                    $(".staffPWsms").hide();
                    $(".userPermission").hide();
                    $('#staffPWsms').val(null);
                    $(".userAccessPW").hide();
            }
        });
        $('#staffPWsms').on('change', function(evt) {
            if (staffPWsms.val() !== '') {
                $(".userPermission").show();
                if (staffPWsms.val() == 2) {
                    $(".userAccessPW").show();
                    document.getElementById("password").required = true;
                    document.getElementById("password_confirm").required = true;
                } else if(staffPWsms.val() == 1) {
                    $(".userAccessPW").hide();
                    document.getElementById("password").required = false;
                    document.getElementById("password_confirm").required = false;
                }
            }else{
                $(".userAccessPW").hide();
                $(".userPermission").hide();
            }
        });
        $.fn.ForceNumericOnly = function(){
            return this.each(function(){
                $(this).keydown(function(e){
                    var key = e.charCode || e.keyCode || 0;
                    return (
                        key == 8 || 
                        key == 9 ||
                        key == 13 ||
                        key == 46 ||
                        key == 110 ||
                        key == 190 ||
                        (key >= 35 && key <= 40) ||
                        (key >= 48 && key <= 57) ||
                        (key >= 96 && key <= 105));
                });
            });
        };
        $("#CitizenID").ForceNumericOnly();

        function ge(a) { return document.getElementById(a); }
        function tckimlikkontorolu(tcno){
            var tckontrol,toplam;
            tckontrol = tcno;
            tcno = tcno.value;
            toplam = Number(tcno.substring(0,1)) + Number(tcno.substring(1,2)) + Number(tcno.substring(2,3)) + Number(tcno.substring(3,4)) + Number(tcno.substring(4,5)) + Number(tcno.substring(5,6)) + Number(tcno.substring(6,7)) + Number(tcno.substring(7,8)) + Number(tcno.substring(8,9)) + Number(tcno.substring(9,10));
            strtoplam = String(toplam);
            onunbirlerbas = strtoplam.substring(strtoplam.length, strtoplam.length-1);
            var sonuc = ge("sonuc");
            if(onunbirlerbas == tcno.substring(10,11)){ Toast.fire({ icon: 'success', title: 'T.C. Kimlik Numarası Doğru' });
            }else{ Toast.fire({ icon: 'error', title: 'T.C. Kimlik Numarası Hatalı' }); }
        }
        
        $.ajax({
            type: "GET",
            url: "/api/app-staff/all-permissions.php",
            success: function(res) {
                let obj = JSON.parse(res);
                $.each(obj['Permissions'], function (key, value) {
                    $('#multipleSelects').append('<option value=' + key + '>' + value + '</option>');
                });
                let dualListbox = new DualListbox('#multipleSelects', {
                    availableTitle:'Tüm Yetkiler',
                    selectedTitle: 'Atanan Yetkiler',
                    addButtonText: 'Ekle',
                    removeButtonText: 'Çıkar',
                    addAllButtonText: 'Tümünü Ekle',
                    removeAllButtonText: 'Tümünü Çıkar',
                    searchPlaceholder: 'Yetki Ara',
                });
                $( ".dual-listbox__container div:nth-child(1)").css( "width", "100%" );
                $( ".dual-listbox__container div:nth-child(1)").css( "display", "inline-grid" );
                $( ".dual-listbox__container div:nth-child(3)").css( "width", "100%" );
                $( ".dual-listbox__container div:nth-child(3)").css( "display", "inline-grid" );


            }
        });
    </script>
</body>
<!-- END: Body-->

</html>