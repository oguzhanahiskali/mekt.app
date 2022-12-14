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
                                                        <h4 class="card-title">EstetikPanel'e Kay??t Ol</h4>
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
                                                                                <h2 class="fw-bolder mb-75" style="color: #3a61ad;">??irket Bilgileriniz</h2>
                                                                                <span>L??tfen ??irket detaylar??n??z?? belirtiniz</span>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 mb-1">
                                                                                    <label class="form-label" for="companyName">Salon Ad??</label>
                                                                                    <input type="text" name="companyName" required id="companyName" class="form-control required" placeholder="??irket Ad??" />
                                                                                </div>
                                                                                <div class="col-md-3 mb-1">
                                                                                    <label class="form-label" for="Iller">??l</label>
                                                                                    <select name="Iller" class="form-control select2 required" required id="Iller">
                                                                                        <option value="">Bir ??l Se??iniz</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3 mb-1">
                                                                                    <label class="form-label" for="Ilceler">??l??e</label>
                                                                                    <select name="Ilceler" class="form-control required" required id="Ilceler" disabled="disabled" aria-invalid="true">
                                                                                        <option value="">??l??e Se??in</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-3 mb-2">
                                                                                    <label class="form-label" for="touchspin">??al????an Say??n??z</label>
                                                                                    <div class="input-group">
                                                                                        <input type="number" name="touchspin" class="touchspin required" required value="0">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-9 mb-1">
                                                                                    <label class="form-label" for="adres">A????k Adres</label>
                                                                                    <input type="text" name="adres" id="adres" class="form-control required" required placeholder="??irket Adresi" />
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
                                                                                        <h2 class="fw-bolder mb-75" style="color: #3a61ad;">Y??netici Kimlik Bilgisi</h2>
                                                                                        <span>L??tfen ??irket yetkilisi oldu??unuz kimlik bilgilerinizi do??rulay??n??z.</span>
                                                                                        <span>Girilen kimlik bilgileri T.C. N??fus ve Vatanda??l??k ????leri Genel M??d??rl?????? taraf??ndan do??rulanmaktad??r.</span>
                                                                                    </div>
                                                                                    <h5 class="mb-2"><i class="feather icon-user m-25"></i>Kimlik Bilgisi</h5>
                                                                                    <div class="row">
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="firstname"><span data-i18n="Firstname">??sim</span></label>
                                                                                                <input type="text" id="firstname" class="form-control maxTwoName uppercase required" required name="data-firstname" data-index="1" data-i18n="[placeholder]Firstname" placeholder="??sim">
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
                                                                                                <label for="DayOfBirth"><span data-i18n="DayOfBirth">Do??um Tarihi</span></label>
                                                                                                <input type="date" id="DayOfBirth" class="form-control maxTwoName uppercase required" required name="data-DayOfBirth" data-index="4" data-i18n="[placeholder]DayOfBirth" placeholder="Do??um Tarihi">
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
                                                                                                                <text class="text-primary">Kad??n</text>
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
                finish: 'Olu??tur'
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
                    return this.replace('??','g')
                        .replace('??','u')
                        .replace('??','s')
                        .replace('I','i')
                        .replace('??','i')
                        .replace('??','o')
                        .replace('??','c')
                        .replace('??','g')
                        .replace('??','u')
                        .replace('??','s')
                        .replace('??','i')
                        .replace('??','o')
                        .replace('??','c').toLowerCase();
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
                        alert('yetkilendirme se??ilmedi');
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
                                                        Swal.fire("Ba??ar??l??", "Personel Ba??ar??yla Olu??turuldu. Y??nleniyorsunuz...", "success");
                                                        window.location.href = 'app-staff-list';
                                                    }, 2000);
                                                }else{
                                                    alert('hata!');
                                                }
                                            } else if (returnedData['status'] == false) {
                                                if(returnedData['code'] == 1001){
                                                        Swal.fire("Ba??ar??s??z", "Veritaban??na eklerken hata olu??tu.", "warning");
                                                }else if(returnedData['code'] == 1012){
                                                    alert('Veritaban?? hatas??. L??tfen daha sonra tekrar deneyiniz.');
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
                                    title: 'Kimlik bilgileri ba??ar??yla do??ruland??!'
                                });
                                $('.actions').show();
                            }else if(obj['enrollmentStatus']==false){
                                $('.actions').hide();
                                Swal.fire("Zaten Kay??tl??", "Kimlik bilgileri do??ruland?? ancak bu personel zaten kay??tl??! ", "info");
                            }
                        }else if(obj['status']==false && obj['because']=='Could not connect to host'){
                                Swal.fire("Ba??lant?? Sorunu", "N??fus m??d??rl?????? sistemine ba??lan??rken bir sorun olu??tu. L??tfen tekrar deneyin. ", "info");
                        }else{
                            Toast.fire({
                                icon: 'error',
                                title: 'Kimlik bilgileri Hatal??!'
                            });
                            $('.actions').hide();
                        }
                    }

                });
            }else{ Toast.fire({ icon: 'info', title: 'Eksik alan b??rakt??n??z' }); }
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


        var missionList = {1:"Y??netici", 2:"Sekreter", 3:"Estetisyen", 4:"Temizlik Personeli", 5:"Stajyer Personel", 6:"Kuaf??r", 7:"Mutfak Personeli"};
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
            if(onunbirlerbas == tcno.substring(10,11)){ Toast.fire({ icon: 'success', title: 'T.C. Kimlik Numaras?? Do??ru' });
            }else{ Toast.fire({ icon: 'error', title: 'T.C. Kimlik Numaras?? Hatal??' }); }
        }
        
        var data = [
                {
                    "il": "Adana",
                    "plaka": 1,
                    "ilceleri": [
                    "Alada??",
                    "Ceyhan",
                    "??ukurova",
                    "Feke",
                    "??mamo??lu",
                    "Karaisal??",
                    "Karata??",
                    "Kozan",
                    "Pozant??",
                    "Saimbeyli",
                    "Sar????am",
                    "Seyhan",
                    "Tufanbeyli",
                    "Yumurtal??k",
                    "Y??re??ir"
                    ]
                },
                {
                    "il": "Ad??yaman",
                    "plaka": 2,
                    "ilceleri": [
                    "Besni",
                    "??elikhan",
                    "Gerger",
                    "G??lba????",
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
                    "Ba??mak????",
                    "Bayat",
                    "Bolvadin",
                    "??ay",
                    "??obanlar",
                    "Dazk??r??",
                    "Dinar",
                    "Emirda??",
                    "Evciler",
                    "Hocalar",
                    "??hsaniye",
                    "??scehisar",
                    "K??z??l??ren",
                    "Merkez",
                    "Sand??kl??",
                    "Sinanpa??a",
                    "Sultanda????",
                    "??uhut"
                    ]
                },
                {
                    "il": "A??r??",
                    "plaka": 4,
                    "ilceleri": [
                    "Diyadin",
                    "Do??ubayaz??t",
                    "Ele??kirt",
                    "Hamur",
                    "Merkez",
                    "Patnos",
                    "Ta??l????ay",
                    "Tutak"
                    ]
                },
                {
                    "il": "Amasya",
                    "plaka": 5,
                    "ilceleri": [
                    "G??yn??cek",
                    "G??m????hac??k??y",
                    "Hamam??z??",
                    "Merkez",
                    "Merzifon",
                    "Suluova",
                    "Ta??ova"
                    ]
                },
                {
                    "il": "Ankara",
                    "plaka": 6,
                    "ilceleri": [
                    "Alt??nda??",
                    "Aya??",
                    "Bala",
                    "Beypazar??",
                    "??aml??dere",
                    "??ankaya",
                    "??ubuk",
                    "Elmada??",
                    "G??d??l",
                    "Haymana",
                    "Kalecik",
                    "K??z??lcahamam",
                    "Nall??han",
                    "Polatl??",
                    "??erefliko??hisar",
                    "Yenimahalle",
                    "G??lba????",
                    "Ke??i??ren",
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
                    "Elmal??",
                    "Finike",
                    "Gazipa??a",
                    "G??ndo??mu??",
                    "Ka??",
                    "Korkuteli",
                    "Kumluca",
                    "Manavgat",
                    "Serik",
                    "Demre",
                    "??brad??",
                    "Kemer",
                    "Aksu",
                    "D????emealt??",
                    "Kepez",
                    "Konyaalt??",
                    "Muratpa??a"
                    ]
                },
                {
                    "il": "Artvin",
                    "plaka": 8,
                    "ilceleri": [
                    "Ardanu??",
                    "Arhavi",
                    "Merkez",
                    "Bor??ka",
                    "Hopa",
                    "??av??at",
                    "Yusufeli",
                    "Murgul"
                    ]
                },
                {
                    "il": "Ayd??n",
                    "plaka": 9,
                    "ilceleri": [
                    "Merkez",
                    "Bozdo??an",
                    "Efeler",
                    "??ine",
                    "Germencik",
                    "Karacasu",
                    "Ko??arl??",
                    "Ku??adas??",
                    "Kuyucak",
                    "Nazilli",
                    "S??ke",
                    "Sultanhisar",
                    "Yenipazar",
                    "Buharkent",
                    "??ncirliova",
                    "Karpuzlu",
                    "K????k",
                    "Didim"
                    ]
                },
                {
                    "il": "Bal??kesir",
                    "plaka": 10,
                    "ilceleri": [
                    "Alt??eyl??l",
                    "Ayval??k",
                    "Merkez",
                    "Balya",
                    "Band??rma",
                    "Bigadi??",
                    "Burhaniye",
                    "Dursunbey",
                    "Edremit",
                    "Erdek",
                    "G??nen",
                    "Havran",
                    "??vrindi",
                    "Karesi",
                    "Kepsut",
                    "Manyas",
                    "Sava??tepe",
                    "S??nd??rg??",
                    "G??me??",
                    "Susurluk",
                    "Marmara"
                    ]
                },
                {
                    "il": "Bilecik",
                    "plaka": 11,
                    "ilceleri": [
                    "Merkez",
                    "Boz??y??k",
                    "G??lpazar??",
                    "Osmaneli",
                    "Pazaryeri",
                    "S??????t",
                    "Yenipazar",
                    "??nhisar"
                    ]
                },
                {
                    "il": "Bing??l",
                    "plaka": 12,
                    "ilceleri": [
                    "Merkez",
                    "Gen??",
                    "Karl??ova",
                    "Ki????",
                    "Solhan",
                    "Adakl??",
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
                    "G??roymak"
                    ]
                },
                {
                    "il": "Bolu",
                    "plaka": 14,
                    "ilceleri": [
                    "Merkez",
                    "Gerede",
                    "G??yn??k",
                    "K??br??sc??k",
                    "Mengen",
                    "Mudurnu",
                    "Seben",
                    "D??rtdivan",
                    "Yeni??a??a"
                    ]
                },
                {
                    "il": "Burdur",
                    "plaka": 15,
                    "ilceleri": [
                    "A??lasun",
                    "Bucak",
                    "Merkez",
                    "G??lhisar",
                    "Tefenni",
                    "Ye??ilova",
                    "Karamanl??",
                    "Kemer",
                    "Alt??nyayla",
                    "??avd??r",
                    "??eltik??i"
                    ]
                },
                {
                    "il": "Bursa",
                    "plaka": 16,
                    "ilceleri": [
                    "Gemlik",
                    "??neg??l",
                    "??znik",
                    "Karacabey",
                    "Keles",
                    "Mudanya",
                    "Mustafakemalpa??a",
                    "Orhaneli",
                    "Orhangazi",
                    "Yeni??ehir",
                    "B??y??korhan",
                    "Harmanc??k",
                    "Nil??fer",
                    "Osmangazi",
                    "Y??ld??r??m",
                    "G??rsu",
                    "Kestel"
                    ]
                },
                {
                    "il": "??anakkale",
                    "plaka": 17,
                    "ilceleri": [
                    "Ayvac??k",
                    "Bayrami??",
                    "Biga",
                    "Bozcaada",
                    "??an",
                    "Merkez",
                    "Eceabat",
                    "Ezine",
                    "Gelibolu",
                    "G??k??eada",
                    "Lapseki",
                    "Yenice"
                    ]
                },
                {
                    "il": "??ank??r??",
                    "plaka": 18,
                    "ilceleri": [
                    "Merkez",
                    "??erke??",
                    "Eldivan",
                    "Ilgaz",
                    "Kur??unlu",
                    "Orta",
                    "??aban??z??",
                    "Yaprakl??",
                    "Atkaracalar",
                    "K??z??l??rmak",
                    "Bayram??ren",
                    "Korgun"
                    ]
                },
                {
                    "il": "??orum",
                    "plaka": 19,
                    "ilceleri": [
                    "Alaca",
                    "Bayat",
                    "Merkez",
                    "??skilip",
                    "Karg??",
                    "Mecit??z??",
                    "Ortak??y",
                    "Osmanc??k",
                    "Sungurlu",
                    "Bo??azkale",
                    "U??urluda??",
                    "Dodurga",
                    "La??in",
                    "O??uzlar"
                    ]
                },
                {
                    "il": "Denizli",
                    "plaka": 20,
                    "ilceleri": [
                    "Ac??payam",
                    "Buldan",
                    "??al",
                    "??ameli",
                    "??ardak",
                    "??ivril",
                    "Merkez",
                    "Merkezefendi",
                    "Pamukkale",
                    "G??ney",
                    "Kale",
                    "Sarayk??y",
                    "Tavas",
                    "Babada??",
                    "Bekilli",
                    "Honaz",
                    "Serinhisar",
                    "Baklan",
                    "Beya??a??",
                    "Bozkurt"
                    ]
                },
                {
                    "il": "Diyarbak??r",
                    "plaka": 21,
                    "ilceleri": [
                    "Kocak??y",
                    "??ermik",
                    "????nar",
                    "????ng????",
                    "Dicle",
                    "Ergani",
                    "Hani",
                    "Hazro",
                    "Kulp",
                    "Lice",
                    "Silvan",
                    "E??il",
                    "Ba??lar",
                    "Kayap??nar",
                    "Sur",
                    "Yeni??ehir",
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
                    "??psala",
                    "Ke??an",
                    "Lalapa??a",
                    "Meri??",
                    "Uzunk??pr??",
                    "S??lo??lu"
                    ]
                },
                {
                    "il": "Elaz????",
                    "plaka": 23,
                    "ilceleri": [
                    "A????n",
                    "Baskil",
                    "Merkez",
                    "Karako??an",
                    "Keban",
                    "Maden",
                    "Palu",
                    "Sivrice",
                    "Ar??cak",
                    "Kovanc??lar",
                    "Alacakaya"
                    ]
                },
                {
                    "il": "Erzincan",
                    "plaka": 24,
                    "ilceleri": [
                    "??ay??rl??",
                    "Merkez",
                    "??li??",
                    "Kemah",
                    "Kemaliye",
                    "Refahiye",
                    "Tercan",
                    "??z??ml??",
                    "Otlukbeli"
                    ]
                },
                {
                    "il": "Erzurum",
                    "plaka": 25,
                    "ilceleri": [
                    "A??kale",
                    "??at",
                    "H??n??s",
                    "Horasan",
                    "??spir",
                    "Karayaz??",
                    "Narman",
                    "Oltu",
                    "Olur",
                    "Pasinler",
                    "??enkaya",
                    "Tekman",
                    "Tortum",
                    "Kara??oban",
                    "Uzundere",
                    "Pazaryolu",
                    "K??pr??k??y",
                    "Paland??ken",
                    "Yakutiye",
                    "Aziziye"
                    ]
                },
                {
                    "il": "Eski??ehir",
                    "plaka": 26,
                    "ilceleri": [
                    "??ifteler",
                    "Mahmudiye",
                    "Mihal????????k",
                    "Sar??cakaya",
                    "Seyitgazi",
                    "Sivrihisar",
                    "Alpu",
                    "Beylikova",
                    "??n??n??",
                    "G??ny??z??",
                    "Han",
                    "Mihalgazi",
                    "Odunpazar??",
                    "Tepeba????"
                    ]
                },
                {
                    "il": "Gaziantep",
                    "plaka": 27,
                    "ilceleri": [
                    "Araban",
                    "??slahiye",
                    "Nizip",
                    "O??uzeli",
                    "Yavuzeli",
                    "??ahinbey",
                    "??ehitkamil",
                    "Karkam????",
                    "Nurda????"
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
                    "G??rele",
                    "Ke??ap",
                    "??ebinkarahisar",
                    "Tirebolu",
                    "Piraziz",
                    "Ya??l??dere",
                    "??amoluk",
                    "??anak????",
                    "Do??ankent",
                    "G??ce"
                    ]
                },
                {
                    "il": "G??m????hane",
                    "plaka": 29,
                    "ilceleri": [
                    "Merkez",
                    "Kelkit",
                    "??iran",
                    "Torul",
                    "K??se",
                    "K??rt??n"
                    ]
                },
                {
                    "il": "Hakkari",
                    "plaka": 30,
                    "ilceleri": [
                    "??ukurca",
                    "Merkez",
                    "??emdinli",
                    "Y??ksekova"
                    ]
                },
                {
                    "il": "Hatay",
                    "plaka": 31,
                    "ilceleri": [
                    "Alt??n??z??",
                    "Arsuz",
                    "Defne",
                    "D??rtyol",
                    "Hassa",
                    "Antakya",
                    "??skenderun",
                    "K??r??khan",
                    "Payas",
                    "Reyhanl??",
                    "Samanda??",
                    "Yaylada????",
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
                    "E??irdir",
                    "Gelendost",
                    "Merkez",
                    "Ke??iborlu",
                    "Senirkent",
                    "S??t????ler",
                    "??arkikaraa??a??",
                    "Uluborlu",
                    "Yalva??",
                    "Aksu",
                    "G??nen",
                    "Yeni??arbademli"
                    ]
                },
                {
                    "il": "Mersin",
                    "plaka": 33,
                    "ilceleri": [
                    "Anamur",
                    "Erdemli",
                    "G??lnar",
                    "Mut",
                    "Silifke",
                    "Tarsus",
                    "Ayd??nc??k",
                    "Bozyaz??",
                    "??aml??yayla",
                    "Akdeniz",
                    "Mezitli",
                    "Toroslar",
                    "Yeni??ehir"
                    ]
                },
                {
                    "il": "??stanbul",
                    "plaka": 34,
                    "ilceleri": [
                    "Adalar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Arnavutk??y",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ata??ehir",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Avc??lar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ba??c??lar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bah??elievler",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bak??rk??y",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ba??ak??ehir",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bayrampa??a",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Be??ikta??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Beykoz",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Beylikd??z??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Beyo??lu",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "B??y??k??ekmece",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??atalca",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??ekmek??y",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Esenler",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Esenyurt",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ey??p",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Fatih",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Gaziosmanpa??a",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "G??ng??ren",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Kad??k??y",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ka????thane",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Kartal",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "K??????k??ekmece",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Maltepe",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Pendik",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Sancaktepe",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Sar??yer",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??ile",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Silivri",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??i??li",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Sultanbeyli",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Sultangazi",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Tuzla",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??mraniye",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??sk??dar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Zeytinburnu"
                    ]
                },
                {
                    "il": "??zmir",
                    "plaka": 35,
                    "ilceleri": [
                    "Alia??a",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bal??ova",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bay??nd??r",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bayrakl??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bergama",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Beyda??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bornova",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Buca",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??e??me",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??i??li",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Dikili",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Fo??a",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Gaziemir",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "G??zelbah??e",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Karaba??lar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Karaburun",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Kar????yaka",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Kemalpa??a",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "K??n??k",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Kiraz",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Konak",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Menderes",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Menemen",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Narl??dere",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??demi??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Seferihisar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Sel??uk",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Tire",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Torbal??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Urla"
                    ]
                },
                {
                    "il": "Kars",
                    "plaka": 36,
                    "ilceleri": [
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Akyaka",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Arpa??ay",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Digor",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ka????zman",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Merkez",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Sar??kam????",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Selim",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Susuz"
                    ]
                },
                {
                    "il": "Kastamonu",
                    "plaka": 37,
                    "ilceleri": [
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Abana",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "A??l??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ara??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Azdavay",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Bozkurt",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??atalzeytin",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Cide",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Daday",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Devrekani",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Do??anyurt",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Han??n??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??hsangazi",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??nebolu",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "K??re",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Merkez",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "P??narba????",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "??enpazar",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Seydiler",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Ta??k??pr??",
?? ?? ?? ?? ?? ?? ?? ?? ?? ?? "Tosya"
                    ]
                },
                {
                    "il": "Kayseri",
                    "plaka": 38,
                    "ilceleri": [
                    "B??nyan",
                    "Develi",
                    "Felahiye",
                    "??ncesu",
                    "P??narba????",
                    "Sar??o??lan",
                    "Sar??z",
                    "Tomarza",
                    "Yahyal??",
                    "Ye??ilhisar",
                    "Akk????la",
                    "Talas",
                    "Kocasinan",
                    "Melikgazi",
                    "Hac??lar",
                    "??zvatan"
                    ]
                },
                {
                    "il": "K??rklareli",
                    "plaka": 39,
                    "ilceleri": [
                    "Babaeski",
                    "Demirk??y",
                    "Merkez",
                    "Kof??az",
                    "L??leburgaz",
                    "Pehlivank??y",
                    "P??narhisar",
                    "Vize"
                    ]
                },
                {
                    "il": "K??r??ehir",
                    "plaka": 40,
                    "ilceleri": [
                    "??i??ekda????",
                    "Kaman",
                    "Merkez",
                    "Mucur",
                    "Akp??nar",
                    "Ak??akent",
                    "Boztepe"
                    ]
                },
                {
                    "il": "Kocaeli",
                    "plaka": 41,
                    "ilceleri": [
                    "Gebze",
                    "G??lc??k",
                    "Kand??ra",
                    "Karam??rsel",
                    "K??rfez",
                    "Derince",
                    "Ba??iskele",
                    "??ay??rova",
                    "Dar??ca",
                    "Dilovas??",
                    "??zmit",
                    "Kartepe"
                    ]
                },
                {
                    "il": "Konya",
                    "plaka": 42,
                    "ilceleri": [
                    "Ak??ehir",
                    "Bey??ehir",
                    "Bozk??r",
                    "Cihanbeyli",
                    "??umra",
                    "Do??anhisar",
                    "Ere??li",
                    "Hadim",
                    "Ilg??n",
                    "Kad??nhan??",
                    "Karap??nar",
                    "Kulu",
                    "Saray??n??",
                    "Seydi??ehir",
                    "Yunak",
                    "Ak??ren",
                    "Alt??nekin",
                    "Derebucak",
                    "H??y??k",
                    "Karatay",
                    "Meram",
                    "Sel??uklu",
                    "Ta??kent",
                    "Ah??rl??",
                    "??eltik",
                    "Derbent",
                    "Emirgazi",
                    "G??neys??n??r",
                    "Halkap??nar",
                    "Tuzluk??u",
                    "Yal??h??y??k"
                    ]
                },
                {
                    "il": "K??tahya",
                    "plaka": 43,
                    "ilceleri": [
                    "Alt??nta??",
                    "Domani??",
                    "Emet",
                    "Gediz",
                    "Merkez",
                    "Simav",
                    "Tav??anl??",
                    "Aslanapa",
                    "Dumlup??nar",
                    "Hisarc??k",
                    "??aphane",
                    "??avdarhisar",
                    "Pazarlar"
                    ]
                },
                {
                    "il": "Malatya",
                    "plaka": 44,
                    "ilceleri": [
                    "Ak??ada??",
                    "Arapgir",
                    "Arguvan",
                    "Darende",
                    "Do??an??ehir",
                    "Hekimhan",
                    "Merkez",
                    "P??t??rge",
                    "Ye??ilyurt",
                    "Battalgazi",
                    "Do??anyol",
                    "Kale",
                    "Kuluncak",
                    "Yaz??han"
                    ]
                },
                {
                    "il": "Manisa",
                    "plaka": 45,
                    "ilceleri": [
                    "Akhisar",
                    "Ala??ehir",
                    "Demirci",
                    "G??rdes",
                    "K??rka??a??",
                    "Kula",
                    "Merkez",
                    "Salihli",
                    "Sar??g??l",
                    "Saruhanl??",
                    "Selendi",
                    "Soma",
                    "??ehzadeler",
                    "Yunusemre",
                    "Turgutlu",
                    "Ahmetli",
                    "G??lmarmara",
                    "K??pr??ba????"
                    ]
                },
                {
                    "il": "Kahramanmara??",
                    "plaka": 46,
                    "ilceleri": [
                    "Af??in",
                    "And??r??n",
                    "Dulkadiro??lu",
                    "Oniki??ubat",
                    "Elbistan",
                    "G??ksun",
                    "Merkez",
                    "Pazarc??k",
                    "T??rko??lu",
                    "??a??layancerit",
                    "Ekin??z??",
                    "Nurhak"
                    ]
                },
                {
                    "il": "Mardin",
                    "plaka": 47,
                    "ilceleri": [
                    "Derik",
                    "K??z??ltepe",
                    "Artuklu",
                    "Merkez",
                    "Maz??da????",
                    "Midyat",
                    "Nusaybin",
                    "??merli",
                    "Savur",
                    "Darge??it",
                    "Ye??illi"
                    ]
                },
                {
                    "il": "Mu??la",
                    "plaka": 48,
                    "ilceleri": [
                    "Bodrum",
                    "Dat??a",
                    "Fethiye",
                    "K??yce??iz",
                    "Marmaris",
                    "Mente??e",
                    "Milas",
                    "Ula",
                    "Yata??an",
                    "Dalaman",
                    "Seydikemer",
                    "Ortaca",
                    "Kavakl??dere"
                    ]
                },
                {
                    "il": "Mu??",
                    "plaka": 49,
                    "ilceleri": [
                    "Bulan??k",
                    "Malazgirt",
                    "Merkez",
                    "Varto",
                    "Hask??y",
                    "Korkut"
                    ]
                },
                {
                    "il": "Nev??ehir",
                    "plaka": 50,
                    "ilceleri": [
                    "Avanos",
                    "Derinkuyu",
                    "G??l??ehir",
                    "Hac??bekta??",
                    "Kozakl??",
                    "Merkez",
                    "??rg??p",
                    "Ac??g??l"
                    ]
                },
                {
                    "il": "Ni??de",
                    "plaka": 51,
                    "ilceleri": [
                    "Bor",
                    "??amard??",
                    "Merkez",
                    "Uluk????la",
                    "Altunhisar",
                    "??iftlik"
                    ]
                },
                {
                    "il": "Ordu",
                    "plaka": 52,
                    "ilceleri": [
                    "Akku??",
                    "Alt??nordu",
                    "Aybast??",
                    "Fatsa",
                    "G??lk??y",
                    "Korgan",
                    "Kumru",
                    "Mesudiye",
                    "Per??embe",
                    "Ulubey",
                    "??nye",
                    "G??lyal??",
                    "G??rgentepe",
                    "??ama??",
                    "??atalp??nar",
                    "??ayba????",
                    "??kizce",
                    "Kabad??z",
                    "Kabata??"
                    ]
                },
                {
                    "il": "Rize",
                    "plaka": 53,
                    "ilceleri": [
                    "Arde??en",
                    "??aml??hem??in",
                    "??ayeli",
                    "F??nd??kl??",
                    "??kizdere",
                    "Kalkandere",
                    "Pazar",
                    "Merkez",
                    "G??neysu",
                    "Derepazar??",
                    "Hem??in",
                    "??yidere"
                    ]
                },
                {
                    "il": "Sakarya",
                    "plaka": 54,
                    "ilceleri": [
                    "Akyaz??",
                    "Geyve",
                    "Hendek",
                    "Karasu",
                    "Kaynarca",
                    "Sapanca",
                    "Kocaali",
                    "Pamukova",
                    "Tarakl??",
                    "Ferizli",
                    "Karap??r??ek",
                    "S??????tl??",
                    "Adapazar??",
                    "Arifiye",
                    "Erenler",
                    "Serdivan"
                    ]
                },
                {
                    "il": "Samsun",
                    "plaka": 55,
                    "ilceleri": [
                    "Ala??am",
                    "Bafra",
                    "??ar??amba",
                    "Havza",
                    "Kavak",
                    "Ladik",
                    "Terme",
                    "Vezirk??pr??",
                    "Asarc??k",
                    "Ondokuzmay??s",
                    "Sal??pazar??",
                    "Tekkek??y",
                    "Ayvac??k",
                    "Yakakent",
                    "Atakum",
                    "Canik",
                    "??lkad??m"
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
                    "??irvan",
                    "Tillo"
                    ]
                },
                {
                    "il": "Sinop",
                    "plaka": 57,
                    "ilceleri": [
                    "Ayanc??k",
                    "Boyabat",
                    "Dura??an",
                    "Erfelek",
                    "Gerze",
                    "Merkez",
                    "T??rkeli",
                    "Dikmen",
                    "Sarayd??z??"
                    ]
                },
                {
                    "il": "Sivas",
                    "plaka": 58,
                    "ilceleri": [
                    "Divri??i",
                    "Gemerek",
                    "G??r??n",
                    "Hafik",
                    "??mranl??",
                    "Kangal",
                    "Koyulhisar",
                    "Merkez",
                    "Su??ehri",
                    "??ark????la",
                    "Y??ld??zeli",
                    "Zara",
                    "Ak??nc??lar",
                    "Alt??nyayla",
                    "Do??an??ar",
                    "G??lova",
                    "Ula??"
                    ]
                },
                {
                    "il": "Tekirda??",
                    "plaka": 59,
                    "ilceleri": [
                    "??erkezk??y",
                    "??orlu",
                    "Ergene",
                    "Hayrabolu",
                    "Malkara",
                    "Muratl??",
                    "Saray",
                    "S??leymanpa??a",
                    "Kapakl??",
                    "??ark??y",
                    "Marmaraere??lisi"
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
                    "Re??adiye",
                    "Merkez",
                    "Turhal",
                    "Zile",
                    "Pazar",
                    "Ye??ilyurt",
                    "Ba????iftlik",
                    "Sulusaray"
                    ]
                },
                {
                    "il": "Trabzon",
                    "plaka": 61,
                    "ilceleri": [
                    "Ak??aabat",
                    "Arakl??",
                    "Arsin",
                    "??aykara",
                    "Ma??ka",
                    "Of",
                    "Ortahisar",
                    "S??rmene",
                    "Tonya",
                    "Vakf??kebir",
                    "Yomra",
                    "Be??ikd??z??",
                    "??alpazar??",
                    "??ar????ba????",
                    "Dernekpazar??",
                    "D??zk??y",
                    "Hayrat",
                    "K??pr??ba????"
                    ]
                },
                {
                    "il": "Tunceli",
                    "plaka": 62,
                    "ilceleri": [
                    "??emi??gezek",
                    "Hozat",
                    "Mazgirt",
                    "Naz??miye",
                    "Ovac??k",
                    "Pertek",
                    "P??l??m??r",
                    "Merkez"
                    ]
                },
                {
                    "il": "??anl??urfa",
                    "plaka": 63,
                    "ilceleri": [
                    "Ak??akale",
                    "Birecik",
                    "Bozova",
                    "Ceylanp??nar",
                    "Eyy??biye",
                    "Halfeti",
                    "Haliliye",
                    "Hilvan",
                    "Karak??pr??",
                    "Siverek",
                    "Suru??",
                    "Viran??ehir",
                    "Harran"
                    ]
                },
                {
                    "il": "U??ak",
                    "plaka": 64,
                    "ilceleri": [
                    "Banaz",
                    "E??me",
                    "Karahall??",
                    "Sivasl??",
                    "Ulubey",
                    "Merkez"
                    ]
                },
                {
                    "il": "Van",
                    "plaka": 65,
                    "ilceleri": [
                    "Ba??kale",
                    "??atak",
                    "Erci??",
                    "Geva??",
                    "G??rp??nar",
                    "??pekyolu",
                    "Muradiye",
                    "??zalp",
                    "Tu??ba",
                    "Bah??esaray",
                    "??ald??ran",
                    "Edremit",
                    "Saray"
                    ]
                },
                {
                    "il": "Yozgat",
                    "plaka": 66,
                    "ilceleri": [
                    "Akda??madeni",
                    "Bo??azl??yan",
                    "??ay??ralan",
                    "??ekerek",
                    "Sar??kaya",
                    "Sorgun",
                    "??efaatli",
                    "Yerk??y",
                    "Merkez",
                    "Ayd??nc??k",
                    "??and??r",
                    "Kad????ehri",
                    "Saraykent",
                    "Yenifak??l??"
                    ]
                },
                {
                    "il": "Zonguldak",
                    "plaka": 67,
                    "ilceleri": [
                    "??aycuma",
                    "Devrek",
                    "Ere??li",
                    "Merkez",
                    "Alapl??",
                    "G??k??ebey"
                    ]
                },
                {
                    "il": "Aksaray",
                    "plaka": 68,
                    "ilceleri": [
                    "A??a????ren",
                    "Eskil",
                    "G??la??a??",
                    "G??zelyurt",
                    "Merkez",
                    "Ortak??y",
                    "Sar??yah??i"
                    ]
                },
                {
                    "il": "Bayburt",
                    "plaka": 69,
                    "ilceleri": [
                    "Merkez",
                    "Ayd??ntepe",
                    "Demir??z??"
                    ]
                },
                {
                    "il": "Karaman",
                    "plaka": 70,
                    "ilceleri": [
                    "Ermenek",
                    "Merkez",
                    "Ayranc??",
                    "Kaz??mkarabekir",
                    "Ba??yayla",
                    "Sar??veliler"
                    ]
                },
                {
                    "il": "K??r??kkale",
                    "plaka": 71,
                    "ilceleri": [
                    "Delice",
                    "Keskin",
                    "Merkez",
                    "Sulakyurt",
                    "Bah??ili",
                    "Bal????eyh",
                    "??elebi",
                    "Karake??ili",
                    "Yah??ihan"
                    ]
                },
                {
                    "il": "Batman",
                    "plaka": 72,
                    "ilceleri": [
                    "Merkez",
                    "Be??iri",
                    "Gerc????",
                    "Kozluk",
                    "Sason",
                    "Hasankeyf"
                    ]
                },
                {
                    "il": "????rnak",
                    "plaka": 73,
                    "ilceleri": [
                    "Beyt??????ebap",
                    "Cizre",
                    "??dil",
                    "Silopi",
                    "Merkez",
                    "Uludere",
                    "G????l??konak"
                    ]
                },
                {
                    "il": "Bart??n",
                    "plaka": 74,
                    "ilceleri": [
                    "Merkez",
                    "Kuruca??ile",
                    "Ulus",
                    "Amasra"
                    ]
                },
                {
                    "il": "Ardahan",
                    "plaka": 75,
                    "ilceleri": [
                    "Merkez",
                    "????ld??r",
                    "G??le",
                    "Hanak",
                    "Posof",
                    "Damal"
                    ]
                },
                {
                    "il": "I??d??r",
                    "plaka": 76,
                    "ilceleri": [
                    "Aral??k",
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
                    "Alt??nova",
                    "Armutlu",
                    "????narc??k",
                    "??iftlikk??y",
                    "Termal"
                    ]
                },
                {
                    "il": "Karab??k",
                    "plaka": 78,
                    "ilceleri": [
                    "Eflani",
                    "Eskipazar",
                    "Merkez",
                    "Ovac??k",
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
                    "Bah??e",
                    "Kadirli",
                    "Merkez",
                    "D??zi??i",
                    "Hasanbeyli",
                    "Sumbas",
                    "Toprakkale"
                    ]
                },
                {
                    "il": "D??zce",
                    "plaka": 81,
                    "ilceleri": [
                    "Ak??akoca",
                    "Merkez",
                    "Y??????lca",
                    "Cumayeri",
                    "G??lyaka",
                    "??ilimli",
                    "G??m????ova",
                    "Kayna??l??"
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
                text:  'L??tfen Bir ??l??e se??iniz'
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