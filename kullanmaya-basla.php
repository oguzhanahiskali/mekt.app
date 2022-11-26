<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Register Page - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">
    <link href="/app-assets/dualList/dual-listbox.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-9 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-4 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="/app-assets/images/pages/register.jpg" class="w-100" alt="branding logo">
                                </div>
                                <div class="col-lg-8 col-12 p-0">

                                    <!-- Form wizard with step validation section start -->
                                    <section id="validation">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">EstetikPanel'e Kayıt Ol</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <form id="formStaff" action="#" class="steps-validation wizard-circle">
                                                                <!-- Step 1 -->
                                                                <h6><i class="step-icon feather icon-home"></i> Kurumsal</h6>
                                                                <fieldset>
                                                                    <div class="card-content">
                                                                        <img class="card-img img-fluid" src="/app-assets/images/illustration/create-account2.svg" alt="Card image" style="opacity: 0.5;width:40em;height:40em">
                                                                        <div class="card-img-overlay overflow-hidden">
                                                                            <div class="content-header mb-2 text-right">
                                                                                <h2 class="fw-bolder mb-75" style="color: #3a61ad;">Şirket Bilgileriniz</h2>
                                                                                <span>Lütfen şirket detaylarınızı belirtiniz</span>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-1">
                                                                                    <label class="form-label" for="companyName">Salon Adı</label>
                                                                                    <input type="text" name="companyName" required id="companyName" class="form-control required" placeholder="Şirket Adı" />
                                                                                </div>
                                                                                <div class="col-md-3 mb-1">
                                                                                    <label class="form-label" for="Iller">İl</label>
                                                                                    <select name="Iller" class="form-control select2 required" required id="Iller">
                                                                                        <option value="">Bir İl Seçiniz</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 mb-1">
                                                                                    <label class="form-label" for="Ilceler">İlçe</label>
                                                                                    <select name="Ilceler" class="form-control required" required id="Ilceler" disabled="disabled" aria-invalid="true">
                                                                                        <option value="">İlçe Seçin</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-3 mb-2">
                                                                                    <label class="form-label" for="touchspin">Çalışan Sayınız</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" name="touchspin" class="touchspin required" required value="0">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-9 mb-1">
                                                                                    <label class="form-label" for="adres">Açık Adres</label>
                                                                                    <input type="text" name="adres" id="adres" class="form-control required" required placeholder="Şirket Adresi" />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <h6><i class="step-icon feather icon-home"></i> Yetkili Bilgisi</h6>
                                                                <fieldset>
                                                                    <div class="row m-1 ">
                                                                        <div class="col-12">
                                                                            <div class="card-content">
                                                                                <img class="card-img img-fluid" src="/app-assets/images/illustration/create-account2.svg" alt="Card image" style="opacity: 0.5;width:34em;height:34em">
                                                                                <div class="card-img-overlay overflow-hidden">
                                                                                    <div class="content-header mb-2 text-right" style="background-color:#ffffffb5">
                                                                                        <h2 class="fw-bolder mb-75" style="color: #3a61ad;">Yönetici Kimlik Bilgisi</h2>
                                                                                        <span>Lütfen şirket yetkilisi olduğunuz kimlik bilgilerinizi doğrulayınız.</span>
                                                                                        <span>Girilen kimlik bilgileri T.C. Nüfus ve Vatandaşlık İşleri Genel Müdürlüğü tarafından doğrulanmaktadır.</span>
                                                                                    </div>
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
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/intPhone/intlTelInput.min.js"></script>
   <script src="/app-assets/intPhone/utils.js"></script>

   <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="/app-assets/js/scripts/forms/validation/form-validation.js"></script>

    <script>
        $(document).ready(function() {
                
            i18next.on('loaded', function(loaded) {
                i18next.changeLanguage('tr', function (err, t) {
                    $(document).localize();
                    localStorage.removeItem('LangStatus');
                    localStorage.setItem('LangStatus',i18next.language);
                });
            });
        });
    </script>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>

    
    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js"></script>
    <!-- END: Page Vendor JS-->
   
    

    <!-- BEGIN: Theme JS-->
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script>
        localStorage.removeItem('LangStatus');
        localStorage.setItem('LangStatus','tr');
    </script>
    <script src="/app-assets/js/core/app.js"></script>
    <script src="/app-assets/js/scripts/components.js"></script>
    <!-- SESSION-DETAILS PAGE  -->
    <script src="app-assets/vendors/js/extensions/moment.min.js"></script>
        <!--<script src = "https://code.jquery.com/mobile/1.5.0-rc1/jquery.mobile-1.5.0-rc1.min.js"></script>-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="https://v1.estetik.app/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="/app-assets/js/scripts/forms/jquery.inputmask.bundle.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-inputmask.js"></script>

    <!-- <script src="/app-assets/js/scripts/forms/number-input.js"></script> -->
    <script src="/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>

    <!-- SESSION-DETAILS PAGE  -->

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    
        <script>
        $(document).ready(function() {
            setTimeout(function(){
                $(document).prop('title', i18next.t("Title app staff add php")+" | EstetikPanel v2");
            }, 1500);
        });
    
    </script>
    <!-- END: Page JS-->
   <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
   <script src="/app-assets/js/scripts/forms/validation/form-validation.js"></script>

    <!-- <script src="/app-assets/js/scripts/forms/wizard-steps.js"></script> -->


   <script src="/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js"></script>

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
        $.each(missionList, function (key, value) {
            $('#mission').append('<option value=' + key + ' >' + value + '</option>');
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
        
        var data = [
                {
                    "il": "Adana",
                    "plaka": 1,
                    "ilceleri": [
                    "Aladağ",
                    "Ceyhan",
                    "Çukurova",
                    "Feke",
                    "İmamoğlu",
                    "Karaisalı",
                    "Karataş",
                    "Kozan",
                    "Pozantı",
                    "Saimbeyli",
                    "Sarıçam",
                    "Seyhan",
                    "Tufanbeyli",
                    "Yumurtalık",
                    "Yüreğir"
                    ]
                },
                {
                    "il": "Adıyaman",
                    "plaka": 2,
                    "ilceleri": [
                    "Besni",
                    "Çelikhan",
                    "Gerger",
                    "Gölbaşı",
                    "Kahta",
                    "Merkez",
                    "Samsat",
                    "Sincik",
                    "Tut"
                    ]
                },
                {
                    "il": "Afyonkarahisar",
                    "plaka": 3,
                    "ilceleri": [
                    "Başmakçı",
                    "Bayat",
                    "Bolvadin",
                    "Çay",
                    "Çobanlar",
                    "Dazkırı",
                    "Dinar",
                    "Emirdağ",
                    "Evciler",
                    "Hocalar",
                    "İhsaniye",
                    "İscehisar",
                    "Kızılören",
                    "Merkez",
                    "Sandıklı",
                    "Sinanpaşa",
                    "Sultandağı",
                    "Şuhut"
                    ]
                },
                {
                    "il": "Ağrı",
                    "plaka": 4,
                    "ilceleri": [
                    "Diyadin",
                    "Doğubayazıt",
                    "Eleşkirt",
                    "Hamur",
                    "Merkez",
                    "Patnos",
                    "Taşlıçay",
                    "Tutak"
                    ]
                },
                {
                    "il": "Amasya",
                    "plaka": 5,
                    "ilceleri": [
                    "Göynücek",
                    "Gümüşhacıköy",
                    "Hamamözü",
                    "Merkez",
                    "Merzifon",
                    "Suluova",
                    "Taşova"
                    ]
                },
                {
                    "il": "Ankara",
                    "plaka": 6,
                    "ilceleri": [
                    "Altındağ",
                    "Ayaş",
                    "Bala",
                    "Beypazarı",
                    "Çamlıdere",
                    "Çankaya",
                    "Çubuk",
                    "Elmadağ",
                    "Güdül",
                    "Haymana",
                    "Kalecik",
                    "Kızılcahamam",
                    "Nallıhan",
                    "Polatlı",
                    "Şereflikoçhisar",
                    "Yenimahalle",
                    "Gölbaşı",
                    "Keçiören",
                    "Mamak",
                    "Sincan",
                    "Kazan",
                    "Akyurt",
                    "Etimesgut",
                    "Evren",
                    "Pursaklar"
                    ]
                },
                {
                    "il": "Antalya",
                    "plaka": 7,
                    "ilceleri": [
                    "Akseki",
                    "Alanya",
                    "Elmalı",
                    "Finike",
                    "Gazipaşa",
                    "Gündoğmuş",
                    "Kaş",
                    "Korkuteli",
                    "Kumluca",
                    "Manavgat",
                    "Serik",
                    "Demre",
                    "İbradı",
                    "Kemer",
                    "Aksu",
                    "Döşemealtı",
                    "Kepez",
                    "Konyaaltı",
                    "Muratpaşa"
                    ]
                },
                {
                    "il": "Artvin",
                    "plaka": 8,
                    "ilceleri": [
                    "Ardanuç",
                    "Arhavi",
                    "Merkez",
                    "Borçka",
                    "Hopa",
                    "Şavşat",
                    "Yusufeli",
                    "Murgul"
                    ]
                },
                {
                    "il": "Aydın",
                    "plaka": 9,
                    "ilceleri": [
                    "Merkez",
                    "Bozdoğan",
                    "Efeler",
                    "Çine",
                    "Germencik",
                    "Karacasu",
                    "Koçarlı",
                    "Kuşadası",
                    "Kuyucak",
                    "Nazilli",
                    "Söke",
                    "Sultanhisar",
                    "Yenipazar",
                    "Buharkent",
                    "İncirliova",
                    "Karpuzlu",
                    "Köşk",
                    "Didim"
                    ]
                },
                {
                    "il": "Balıkesir",
                    "plaka": 10,
                    "ilceleri": [
                    "Altıeylül",
                    "Ayvalık",
                    "Merkez",
                    "Balya",
                    "Bandırma",
                    "Bigadiç",
                    "Burhaniye",
                    "Dursunbey",
                    "Edremit",
                    "Erdek",
                    "Gönen",
                    "Havran",
                    "İvrindi",
                    "Karesi",
                    "Kepsut",
                    "Manyas",
                    "Savaştepe",
                    "Sındırgı",
                    "Gömeç",
                    "Susurluk",
                    "Marmara"
                    ]
                },
                {
                    "il": "Bilecik",
                    "plaka": 11,
                    "ilceleri": [
                    "Merkez",
                    "Bozüyük",
                    "Gölpazarı",
                    "Osmaneli",
                    "Pazaryeri",
                    "Söğüt",
                    "Yenipazar",
                    "İnhisar"
                    ]
                },
                {
                    "il": "Bingöl",
                    "plaka": 12,
                    "ilceleri": [
                    "Merkez",
                    "Genç",
                    "Karlıova",
                    "Kiğı",
                    "Solhan",
                    "Adaklı",
                    "Yayladere",
                    "Yedisu"
                    ]
                },
                {
                    "il": "Bitlis",
                    "plaka": 13,
                    "ilceleri": [
                    "Adilcevaz",
                    "Ahlat",
                    "Merkez",
                    "Hizan",
                    "Mutki",
                    "Tatvan",
                    "Güroymak"
                    ]
                },
                {
                    "il": "Bolu",
                    "plaka": 14,
                    "ilceleri": [
                    "Merkez",
                    "Gerede",
                    "Göynük",
                    "Kıbrıscık",
                    "Mengen",
                    "Mudurnu",
                    "Seben",
                    "Dörtdivan",
                    "Yeniçağa"
                    ]
                },
                {
                    "il": "Burdur",
                    "plaka": 15,
                    "ilceleri": [
                    "Ağlasun",
                    "Bucak",
                    "Merkez",
                    "Gölhisar",
                    "Tefenni",
                    "Yeşilova",
                    "Karamanlı",
                    "Kemer",
                    "Altınyayla",
                    "Çavdır",
                    "Çeltikçi"
                    ]
                },
                {
                    "il": "Bursa",
                    "plaka": 16,
                    "ilceleri": [
                    "Gemlik",
                    "İnegöl",
                    "İznik",
                    "Karacabey",
                    "Keles",
                    "Mudanya",
                    "Mustafakemalpaşa",
                    "Orhaneli",
                    "Orhangazi",
                    "Yenişehir",
                    "Büyükorhan",
                    "Harmancık",
                    "Nilüfer",
                    "Osmangazi",
                    "Yıldırım",
                    "Gürsu",
                    "Kestel"
                    ]
                },
                {
                    "il": "Çanakkale",
                    "plaka": 17,
                    "ilceleri": [
                    "Ayvacık",
                    "Bayramiç",
                    "Biga",
                    "Bozcaada",
                    "Çan",
                    "Merkez",
                    "Eceabat",
                    "Ezine",
                    "Gelibolu",
                    "Gökçeada",
                    "Lapseki",
                    "Yenice"
                    ]
                },
                {
                    "il": "Çankırı",
                    "plaka": 18,
                    "ilceleri": [
                    "Merkez",
                    "Çerkeş",
                    "Eldivan",
                    "Ilgaz",
                    "Kurşunlu",
                    "Orta",
                    "Şabanözü",
                    "Yapraklı",
                    "Atkaracalar",
                    "Kızılırmak",
                    "Bayramören",
                    "Korgun"
                    ]
                },
                {
                    "il": "Çorum",
                    "plaka": 19,
                    "ilceleri": [
                    "Alaca",
                    "Bayat",
                    "Merkez",
                    "İskilip",
                    "Kargı",
                    "Mecitözü",
                    "Ortaköy",
                    "Osmancık",
                    "Sungurlu",
                    "Boğazkale",
                    "Uğurludağ",
                    "Dodurga",
                    "Laçin",
                    "Oğuzlar"
                    ]
                },
                {
                    "il": "Denizli",
                    "plaka": 20,
                    "ilceleri": [
                    "Acıpayam",
                    "Buldan",
                    "Çal",
                    "Çameli",
                    "Çardak",
                    "Çivril",
                    "Merkez",
                    "Merkezefendi",
                    "Pamukkale",
                    "Güney",
                    "Kale",
                    "Sarayköy",
                    "Tavas",
                    "Babadağ",
                    "Bekilli",
                    "Honaz",
                    "Serinhisar",
                    "Baklan",
                    "Beyağaç",
                    "Bozkurt"
                    ]
                },
                {
                    "il": "Diyarbakır",
                    "plaka": 21,
                    "ilceleri": [
                    "Kocaköy",
                    "Çermik",
                    "Çınar",
                    "Çüngüş",
                    "Dicle",
                    "Ergani",
                    "Hani",
                    "Hazro",
                    "Kulp",
                    "Lice",
                    "Silvan",
                    "Eğil",
                    "Bağlar",
                    "Kayapınar",
                    "Sur",
                    "Yenişehir",
                    "Bismil"
                    ]
                },
                {
                    "il": "Edirne",
                    "plaka": 22,
                    "ilceleri": [
                    "Merkez",
                    "Enez",
                    "Havsa",
                    "İpsala",
                    "Keşan",
                    "Lalapaşa",
                    "Meriç",
                    "Uzunköprü",
                    "Süloğlu"
                    ]
                },
                {
                    "il": "Elazığ",
                    "plaka": 23,
                    "ilceleri": [
                    "Ağın",
                    "Baskil",
                    "Merkez",
                    "Karakoçan",
                    "Keban",
                    "Maden",
                    "Palu",
                    "Sivrice",
                    "Arıcak",
                    "Kovancılar",
                    "Alacakaya"
                    ]
                },
                {
                    "il": "Erzincan",
                    "plaka": 24,
                    "ilceleri": [
                    "Çayırlı",
                    "Merkez",
                    "İliç",
                    "Kemah",
                    "Kemaliye",
                    "Refahiye",
                    "Tercan",
                    "Üzümlü",
                    "Otlukbeli"
                    ]
                },
                {
                    "il": "Erzurum",
                    "plaka": 25,
                    "ilceleri": [
                    "Aşkale",
                    "Çat",
                    "Hınıs",
                    "Horasan",
                    "İspir",
                    "Karayazı",
                    "Narman",
                    "Oltu",
                    "Olur",
                    "Pasinler",
                    "Şenkaya",
                    "Tekman",
                    "Tortum",
                    "Karaçoban",
                    "Uzundere",
                    "Pazaryolu",
                    "Köprüköy",
                    "Palandöken",
                    "Yakutiye",
                    "Aziziye"
                    ]
                },
                {
                    "il": "Eskişehir",
                    "plaka": 26,
                    "ilceleri": [
                    "Çifteler",
                    "Mahmudiye",
                    "Mihalıççık",
                    "Sarıcakaya",
                    "Seyitgazi",
                    "Sivrihisar",
                    "Alpu",
                    "Beylikova",
                    "İnönü",
                    "Günyüzü",
                    "Han",
                    "Mihalgazi",
                    "Odunpazarı",
                    "Tepebaşı"
                    ]
                },
                {
                    "il": "Gaziantep",
                    "plaka": 27,
                    "ilceleri": [
                    "Araban",
                    "İslahiye",
                    "Nizip",
                    "Oğuzeli",
                    "Yavuzeli",
                    "Şahinbey",
                    "Şehitkamil",
                    "Karkamış",
                    "Nurdağı"
                    ]
                },
                {
                    "il": "Giresun",
                    "plaka": 28,
                    "ilceleri": [
                    "Alucra",
                    "Bulancak",
                    "Dereli",
                    "Espiye",
                    "Eynesil",
                    "Merkez",
                    "Görele",
                    "Keşap",
                    "Şebinkarahisar",
                    "Tirebolu",
                    "Piraziz",
                    "Yağlıdere",
                    "Çamoluk",
                    "Çanakçı",
                    "Doğankent",
                    "Güce"
                    ]
                },
                {
                    "il": "Gümüşhane",
                    "plaka": 29,
                    "ilceleri": [
                    "Merkez",
                    "Kelkit",
                    "Şiran",
                    "Torul",
                    "Köse",
                    "Kürtün"
                    ]
                },
                {
                    "il": "Hakkari",
                    "plaka": 30,
                    "ilceleri": [
                    "Çukurca",
                    "Merkez",
                    "Şemdinli",
                    "Yüksekova"
                    ]
                },
                {
                    "il": "Hatay",
                    "plaka": 31,
                    "ilceleri": [
                    "Altınözü",
                    "Arsuz",
                    "Defne",
                    "Dörtyol",
                    "Hassa",
                    "Antakya",
                    "İskenderun",
                    "Kırıkhan",
                    "Payas",
                    "Reyhanlı",
                    "Samandağ",
                    "Yayladağı",
                    "Erzin",
                    "Belen",
                    "Kumlu"
                    ]
                },
                {
                    "il": "Isparta",
                    "plaka": 32,
                    "ilceleri": [
                    "Atabey",
                    "Eğirdir",
                    "Gelendost",
                    "Merkez",
                    "Keçiborlu",
                    "Senirkent",
                    "Sütçüler",
                    "Şarkikaraağaç",
                    "Uluborlu",
                    "Yalvaç",
                    "Aksu",
                    "Gönen",
                    "Yenişarbademli"
                    ]
                },
                {
                    "il": "Mersin",
                    "plaka": 33,
                    "ilceleri": [
                    "Anamur",
                    "Erdemli",
                    "Gülnar",
                    "Mut",
                    "Silifke",
                    "Tarsus",
                    "Aydıncık",
                    "Bozyazı",
                    "Çamlıyayla",
                    "Akdeniz",
                    "Mezitli",
                    "Toroslar",
                    "Yenişehir"
                    ]
                },
                {
                    "il": "İstanbul",
                    "plaka": 34,
                    "ilceleri": [
                    "Adalar",
                    "Arnavutköy",
                    "Ataşehir",
                    "Avcılar",
                    "Bağcılar",
                    "Bahçelievler",
                    "Bakırköy",
                    "Başakşehir",
                    "Bayrampaşa",
                    "Beşiktaş",
                    "Beykoz",
                    "Beylikdüzü",
                    "Beyoğlu",
                    "Büyükçekmece",
                    "Çatalca",
                    "Çekmeköy",
                    "Esenler",
                    "Esenyurt",
                    "Eyüp",
                    "Fatih",
                    "Gaziosmanpaşa",
                    "Güngören",
                    "Kadıköy",
                    "Kağıthane",
                    "Kartal",
                    "Küçükçekmece",
                    "Maltepe",
                    "Pendik",
                    "Sancaktepe",
                    "Sarıyer",
                    "Şile",
                    "Silivri",
                    "Şişli",
                    "Sultanbeyli",
                    "Sultangazi",
                    "Tuzla",
                    "Ümraniye",
                    "Üsküdar",
                    "Zeytinburnu"
                    ]
                },
                {
                    "il": "İzmir",
                    "plaka": 35,
                    "ilceleri": [
                    "Aliağa",
                    "Balçova",
                    "Bayındır",
                    "Bayraklı",
                    "Bergama",
                    "Beydağ",
                    "Bornova",
                    "Buca",
                    "Çeşme",
                    "Çiğli",
                    "Dikili",
                    "Foça",
                    "Gaziemir",
                    "Güzelbahçe",
                    "Karabağlar",
                    "Karaburun",
                    "Karşıyaka",
                    "Kemalpaşa",
                    "Kınık",
                    "Kiraz",
                    "Konak",
                    "Menderes",
                    "Menemen",
                    "Narlıdere",
                    "Ödemiş",
                    "Seferihisar",
                    "Selçuk",
                    "Tire",
                    "Torbalı",
                    "Urla"
                    ]
                },
                {
                    "il": "Kars",
                    "plaka": 36,
                    "ilceleri": [
                    "Akyaka",
                    "Arpaçay",
                    "Digor",
                    "Kağızman",
                    "Merkez",
                    "Sarıkamış",
                    "Selim",
                    "Susuz"
                    ]
                },
                {
                    "il": "Kastamonu",
                    "plaka": 37,
                    "ilceleri": [
                    "Abana",
                    "Ağlı",
                    "Araç",
                    "Azdavay",
                    "Bozkurt",
                    "Çatalzeytin",
                    "Cide",
                    "Daday",
                    "Devrekani",
                    "Doğanyurt",
                    "Hanönü",
                    "İhsangazi",
                    "İnebolu",
                    "Küre",
                    "Merkez",
                    "Pınarbaşı",
                    "Şenpazar",
                    "Seydiler",
                    "Taşköprü",
                    "Tosya"
                    ]
                },
                {
                    "il": "Kayseri",
                    "plaka": 38,
                    "ilceleri": [
                    "Bünyan",
                    "Develi",
                    "Felahiye",
                    "İncesu",
                    "Pınarbaşı",
                    "Sarıoğlan",
                    "Sarız",
                    "Tomarza",
                    "Yahyalı",
                    "Yeşilhisar",
                    "Akkışla",
                    "Talas",
                    "Kocasinan",
                    "Melikgazi",
                    "Hacılar",
                    "Özvatan"
                    ]
                },
                {
                    "il": "Kırklareli",
                    "plaka": 39,
                    "ilceleri": [
                    "Babaeski",
                    "Demirköy",
                    "Merkez",
                    "Kofçaz",
                    "Lüleburgaz",
                    "Pehlivanköy",
                    "Pınarhisar",
                    "Vize"
                    ]
                },
                {
                    "il": "Kırşehir",
                    "plaka": 40,
                    "ilceleri": [
                    "Çiçekdağı",
                    "Kaman",
                    "Merkez",
                    "Mucur",
                    "Akpınar",
                    "Akçakent",
                    "Boztepe"
                    ]
                },
                {
                    "il": "Kocaeli",
                    "plaka": 41,
                    "ilceleri": [
                    "Gebze",
                    "Gölcük",
                    "Kandıra",
                    "Karamürsel",
                    "Körfez",
                    "Derince",
                    "Başiskele",
                    "Çayırova",
                    "Darıca",
                    "Dilovası",
                    "İzmit",
                    "Kartepe"
                    ]
                },
                {
                    "il": "Konya",
                    "plaka": 42,
                    "ilceleri": [
                    "Akşehir",
                    "Beyşehir",
                    "Bozkır",
                    "Cihanbeyli",
                    "Çumra",
                    "Doğanhisar",
                    "Ereğli",
                    "Hadim",
                    "Ilgın",
                    "Kadınhanı",
                    "Karapınar",
                    "Kulu",
                    "Sarayönü",
                    "Seydişehir",
                    "Yunak",
                    "Akören",
                    "Altınekin",
                    "Derebucak",
                    "Hüyük",
                    "Karatay",
                    "Meram",
                    "Selçuklu",
                    "Taşkent",
                    "Ahırlı",
                    "Çeltik",
                    "Derbent",
                    "Emirgazi",
                    "Güneysınır",
                    "Halkapınar",
                    "Tuzlukçu",
                    "Yalıhüyük"
                    ]
                },
                {
                    "il": "Kütahya",
                    "plaka": 43,
                    "ilceleri": [
                    "Altıntaş",
                    "Domaniç",
                    "Emet",
                    "Gediz",
                    "Merkez",
                    "Simav",
                    "Tavşanlı",
                    "Aslanapa",
                    "Dumlupınar",
                    "Hisarcık",
                    "Şaphane",
                    "Çavdarhisar",
                    "Pazarlar"
                    ]
                },
                {
                    "il": "Malatya",
                    "plaka": 44,
                    "ilceleri": [
                    "Akçadağ",
                    "Arapgir",
                    "Arguvan",
                    "Darende",
                    "Doğanşehir",
                    "Hekimhan",
                    "Merkez",
                    "Pütürge",
                    "Yeşilyurt",
                    "Battalgazi",
                    "Doğanyol",
                    "Kale",
                    "Kuluncak",
                    "Yazıhan"
                    ]
                },
                {
                    "il": "Manisa",
                    "plaka": 45,
                    "ilceleri": [
                    "Akhisar",
                    "Alaşehir",
                    "Demirci",
                    "Gördes",
                    "Kırkağaç",
                    "Kula",
                    "Merkez",
                    "Salihli",
                    "Sarıgöl",
                    "Saruhanlı",
                    "Selendi",
                    "Soma",
                    "Şehzadeler",
                    "Yunusemre",
                    "Turgutlu",
                    "Ahmetli",
                    "Gölmarmara",
                    "Köprübaşı"
                    ]
                },
                {
                    "il": "Kahramanmaraş",
                    "plaka": 46,
                    "ilceleri": [
                    "Afşin",
                    "Andırın",
                    "Dulkadiroğlu",
                    "Onikişubat",
                    "Elbistan",
                    "Göksun",
                    "Merkez",
                    "Pazarcık",
                    "Türkoğlu",
                    "Çağlayancerit",
                    "Ekinözü",
                    "Nurhak"
                    ]
                },
                {
                    "il": "Mardin",
                    "plaka": 47,
                    "ilceleri": [
                    "Derik",
                    "Kızıltepe",
                    "Artuklu",
                    "Merkez",
                    "Mazıdağı",
                    "Midyat",
                    "Nusaybin",
                    "Ömerli",
                    "Savur",
                    "Dargeçit",
                    "Yeşilli"
                    ]
                },
                {
                    "il": "Muğla",
                    "plaka": 48,
                    "ilceleri": [
                    "Bodrum",
                    "Datça",
                    "Fethiye",
                    "Köyceğiz",
                    "Marmaris",
                    "Menteşe",
                    "Milas",
                    "Ula",
                    "Yatağan",
                    "Dalaman",
                    "Seydikemer",
                    "Ortaca",
                    "Kavaklıdere"
                    ]
                },
                {
                    "il": "Muş",
                    "plaka": 49,
                    "ilceleri": [
                    "Bulanık",
                    "Malazgirt",
                    "Merkez",
                    "Varto",
                    "Hasköy",
                    "Korkut"
                    ]
                },
                {
                    "il": "Nevşehir",
                    "plaka": 50,
                    "ilceleri": [
                    "Avanos",
                    "Derinkuyu",
                    "Gülşehir",
                    "Hacıbektaş",
                    "Kozaklı",
                    "Merkez",
                    "Ürgüp",
                    "Acıgöl"
                    ]
                },
                {
                    "il": "Niğde",
                    "plaka": 51,
                    "ilceleri": [
                    "Bor",
                    "Çamardı",
                    "Merkez",
                    "Ulukışla",
                    "Altunhisar",
                    "Çiftlik"
                    ]
                },
                {
                    "il": "Ordu",
                    "plaka": 52,
                    "ilceleri": [
                    "Akkuş",
                    "Altınordu",
                    "Aybastı",
                    "Fatsa",
                    "Gölköy",
                    "Korgan",
                    "Kumru",
                    "Mesudiye",
                    "Perşembe",
                    "Ulubey",
                    "Ünye",
                    "Gülyalı",
                    "Gürgentepe",
                    "Çamaş",
                    "Çatalpınar",
                    "Çaybaşı",
                    "İkizce",
                    "Kabadüz",
                    "Kabataş"
                    ]
                },
                {
                    "il": "Rize",
                    "plaka": 53,
                    "ilceleri": [
                    "Ardeşen",
                    "Çamlıhemşin",
                    "Çayeli",
                    "Fındıklı",
                    "İkizdere",
                    "Kalkandere",
                    "Pazar",
                    "Merkez",
                    "Güneysu",
                    "Derepazarı",
                    "Hemşin",
                    "İyidere"
                    ]
                },
                {
                    "il": "Sakarya",
                    "plaka": 54,
                    "ilceleri": [
                    "Akyazı",
                    "Geyve",
                    "Hendek",
                    "Karasu",
                    "Kaynarca",
                    "Sapanca",
                    "Kocaali",
                    "Pamukova",
                    "Taraklı",
                    "Ferizli",
                    "Karapürçek",
                    "Söğütlü",
                    "Adapazarı",
                    "Arifiye",
                    "Erenler",
                    "Serdivan"
                    ]
                },
                {
                    "il": "Samsun",
                    "plaka": 55,
                    "ilceleri": [
                    "Alaçam",
                    "Bafra",
                    "Çarşamba",
                    "Havza",
                    "Kavak",
                    "Ladik",
                    "Terme",
                    "Vezirköprü",
                    "Asarcık",
                    "Ondokuzmayıs",
                    "Salıpazarı",
                    "Tekkeköy",
                    "Ayvacık",
                    "Yakakent",
                    "Atakum",
                    "Canik",
                    "İlkadım"
                    ]
                },
                {
                    "il": "Siirt",
                    "plaka": 56,
                    "ilceleri": [
                    "Baykan",
                    "Eruh",
                    "Kurtalan",
                    "Pervari",
                    "Merkez",
                    "Şirvan",
                    "Tillo"
                    ]
                },
                {
                    "il": "Sinop",
                    "plaka": 57,
                    "ilceleri": [
                    "Ayancık",
                    "Boyabat",
                    "Durağan",
                    "Erfelek",
                    "Gerze",
                    "Merkez",
                    "Türkeli",
                    "Dikmen",
                    "Saraydüzü"
                    ]
                },
                {
                    "il": "Sivas",
                    "plaka": 58,
                    "ilceleri": [
                    "Divriği",
                    "Gemerek",
                    "Gürün",
                    "Hafik",
                    "İmranlı",
                    "Kangal",
                    "Koyulhisar",
                    "Merkez",
                    "Suşehri",
                    "Şarkışla",
                    "Yıldızeli",
                    "Zara",
                    "Akıncılar",
                    "Altınyayla",
                    "Doğanşar",
                    "Gölova",
                    "Ulaş"
                    ]
                },
                {
                    "il": "Tekirdağ",
                    "plaka": 59,
                    "ilceleri": [
                    "Çerkezköy",
                    "Çorlu",
                    "Ergene",
                    "Hayrabolu",
                    "Malkara",
                    "Muratlı",
                    "Saray",
                    "Süleymanpaşa",
                    "Kapaklı",
                    "Şarköy",
                    "Marmaraereğlisi"
                    ]
                },
                {
                    "il": "Tokat",
                    "plaka": 60,
                    "ilceleri": [
                    "Almus",
                    "Artova",
                    "Erbaa",
                    "Niksar",
                    "Reşadiye",
                    "Merkez",
                    "Turhal",
                    "Zile",
                    "Pazar",
                    "Yeşilyurt",
                    "Başçiftlik",
                    "Sulusaray"
                    ]
                },
                {
                    "il": "Trabzon",
                    "plaka": 61,
                    "ilceleri": [
                    "Akçaabat",
                    "Araklı",
                    "Arsin",
                    "Çaykara",
                    "Maçka",
                    "Of",
                    "Ortahisar",
                    "Sürmene",
                    "Tonya",
                    "Vakfıkebir",
                    "Yomra",
                    "Beşikdüzü",
                    "Şalpazarı",
                    "Çarşıbaşı",
                    "Dernekpazarı",
                    "Düzköy",
                    "Hayrat",
                    "Köprübaşı"
                    ]
                },
                {
                    "il": "Tunceli",
                    "plaka": 62,
                    "ilceleri": [
                    "Çemişgezek",
                    "Hozat",
                    "Mazgirt",
                    "Nazımiye",
                    "Ovacık",
                    "Pertek",
                    "Pülümür",
                    "Merkez"
                    ]
                },
                {
                    "il": "Şanlıurfa",
                    "plaka": 63,
                    "ilceleri": [
                    "Akçakale",
                    "Birecik",
                    "Bozova",
                    "Ceylanpınar",
                    "Eyyübiye",
                    "Halfeti",
                    "Haliliye",
                    "Hilvan",
                    "Karaköprü",
                    "Siverek",
                    "Suruç",
                    "Viranşehir",
                    "Harran"
                    ]
                },
                {
                    "il": "Uşak",
                    "plaka": 64,
                    "ilceleri": [
                    "Banaz",
                    "Eşme",
                    "Karahallı",
                    "Sivaslı",
                    "Ulubey",
                    "Merkez"
                    ]
                },
                {
                    "il": "Van",
                    "plaka": 65,
                    "ilceleri": [
                    "Başkale",
                    "Çatak",
                    "Erciş",
                    "Gevaş",
                    "Gürpınar",
                    "İpekyolu",
                    "Muradiye",
                    "Özalp",
                    "Tuşba",
                    "Bahçesaray",
                    "Çaldıran",
                    "Edremit",
                    "Saray"
                    ]
                },
                {
                    "il": "Yozgat",
                    "plaka": 66,
                    "ilceleri": [
                    "Akdağmadeni",
                    "Boğazlıyan",
                    "Çayıralan",
                    "Çekerek",
                    "Sarıkaya",
                    "Sorgun",
                    "Şefaatli",
                    "Yerköy",
                    "Merkez",
                    "Aydıncık",
                    "Çandır",
                    "Kadışehri",
                    "Saraykent",
                    "Yenifakılı"
                    ]
                },
                {
                    "il": "Zonguldak",
                    "plaka": 67,
                    "ilceleri": [
                    "Çaycuma",
                    "Devrek",
                    "Ereğli",
                    "Merkez",
                    "Alaplı",
                    "Gökçebey"
                    ]
                },
                {
                    "il": "Aksaray",
                    "plaka": 68,
                    "ilceleri": [
                    "Ağaçören",
                    "Eskil",
                    "Gülağaç",
                    "Güzelyurt",
                    "Merkez",
                    "Ortaköy",
                    "Sarıyahşi"
                    ]
                },
                {
                    "il": "Bayburt",
                    "plaka": 69,
                    "ilceleri": [
                    "Merkez",
                    "Aydıntepe",
                    "Demirözü"
                    ]
                },
                {
                    "il": "Karaman",
                    "plaka": 70,
                    "ilceleri": [
                    "Ermenek",
                    "Merkez",
                    "Ayrancı",
                    "Kazımkarabekir",
                    "Başyayla",
                    "Sarıveliler"
                    ]
                },
                {
                    "il": "Kırıkkale",
                    "plaka": 71,
                    "ilceleri": [
                    "Delice",
                    "Keskin",
                    "Merkez",
                    "Sulakyurt",
                    "Bahşili",
                    "Balışeyh",
                    "Çelebi",
                    "Karakeçili",
                    "Yahşihan"
                    ]
                },
                {
                    "il": "Batman",
                    "plaka": 72,
                    "ilceleri": [
                    "Merkez",
                    "Beşiri",
                    "Gercüş",
                    "Kozluk",
                    "Sason",
                    "Hasankeyf"
                    ]
                },
                {
                    "il": "Şırnak",
                    "plaka": 73,
                    "ilceleri": [
                    "Beytüşşebap",
                    "Cizre",
                    "İdil",
                    "Silopi",
                    "Merkez",
                    "Uludere",
                    "Güçlükonak"
                    ]
                },
                {
                    "il": "Bartın",
                    "plaka": 74,
                    "ilceleri": [
                    "Merkez",
                    "Kurucaşile",
                    "Ulus",
                    "Amasra"
                    ]
                },
                {
                    "il": "Ardahan",
                    "plaka": 75,
                    "ilceleri": [
                    "Merkez",
                    "Çıldır",
                    "Göle",
                    "Hanak",
                    "Posof",
                    "Damal"
                    ]
                },
                {
                    "il": "Iğdır",
                    "plaka": 76,
                    "ilceleri": [
                    "Aralık",
                    "Merkez",
                    "Tuzluca",
                    "Karakoyunlu"
                    ]
                },
                {
                    "il": "Yalova",
                    "plaka": 77,
                    "ilceleri": [
                    "Merkez",
                    "Altınova",
                    "Armutlu",
                    "Çınarcık",
                    "Çiftlikköy",
                    "Termal"
                    ]
                },
                {
                    "il": "Karabük",
                    "plaka": 78,
                    "ilceleri": [
                    "Eflani",
                    "Eskipazar",
                    "Merkez",
                    "Ovacık",
                    "Safranbolu",
                    "Yenice"
                    ]
                },
                {
                    "il": "Kilis",
                    "plaka": 79,
                    "ilceleri": [
                    "Merkez",
                    "Elbeyli",
                    "Musabeyli",
                    "Polateli"
                    ]
                },
                {
                    "il": "Osmaniye",
                    "plaka": 80,
                    "ilceleri": [
                    "Bahçe",
                    "Kadirli",
                    "Merkez",
                    "Düziçi",
                    "Hasanbeyli",
                    "Sumbas",
                    "Toprakkale"
                    ]
                },
                {
                    "il": "Düzce",
                    "plaka": 81,
                    "ilceleri": [
                    "Akçakoca",
                    "Merkez",
                    "Yığılca",
                    "Cumayeri",
                    "Gölyaka",
                    "Çilimli",
                    "Gümüşova",
                    "Kaynaşlı"
                    ]
                }
        ]
        function search(nameKey, myArray){
            for (var i=0; i < myArray.length; i++) {
                if (myArray[i].plaka == nameKey) {
                    return myArray[i];
                }
            }
        }
        $( document ).ready(function() {
        $.each(data, function( index, value ) {
            $('#Iller').append($('<option>', {
                value: value.plaka,
                text:  value.il
            }));
        });
        $("#Iller").change(function(){
            var valueSelected = this.value;
            if($('#Iller').val() > 0) {
            $('#Ilceler').html('');
            $('#Ilceler').append($('<option>', {
                value: 0,
                text:  'Lütfen Bir İlçe seçiniz'
            }));
            $('#Ilceler').prop("disabled", false);
            var resultObject = search($('#Iller').val(), data);
            $.each(resultObject.ilceleri, function( index, value ) {
                $('#Ilceler').append($('<option>', {
                    value: value,
                    text:  value
                }));
            });
            return false;
            }
            $('#Ilceler').prop("disabled", true);
        });
        });
    </script>
    
    <script>
        // Default Spin
        $(".touchspin").TouchSpin({
            buttondown_class: "btn btn-primary",
            buttonup_class: "btn btn-primary",
        });
        
        var touchspinValue = $(".touchspin-min-max"),
            counterMin = 15,
            counterMax = 21;
        if (touchspinValue.length > 0) {
            touchspinValue.TouchSpin({
            min: counterMin,
            max: counterMax
            }).on('touchspin.on.startdownspin', function () {
            var $this = $(this);
            $('.bootstrap-touchspin-up').removeClass("disabled-max-min");
            if ($this.val() == counterMin) {
                $(this).siblings().find('.bootstrap-touchspin-down').addClass("disabled-max-min");
            }
            }).on('touchspin.on.startupspin', function () {
            var $this = $(this);
            $('.bootstrap-touchspin-down').removeClass("disabled-max-min");
            if ($this.val() == counterMax) {
                $(this).siblings().find('.bootstrap-touchspin-up').addClass("disabled-max-min");
            }
            });
        }
    </script>
</body>
<!-- END: Body-->

</html>