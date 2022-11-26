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
                            <h2 class="content-header-title float-left mb-0">Personel Listesi</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/index">Özet Ekranı</a>
                                </li>
                                <li class="breadcrumb-item active">Personel Listesi
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
                                                                        1 - 10
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
                                                                <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box" data-i18n="[placeholder]Find a Customer">
                                                                </button>
                                                                <div class="btn-export">
                                                                    <button class="btn btn-success ag-grid-export-btn">
                                                                    <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel">Excele Aktar</b></button>
                                                                    <a href="/app-staff-add">
                                                                        <button type="button" class="btn bg-gradient-primary default" >
                                                                            <i class="feather icon-user-plus"></i> <b data-i18n="Add New Staff">Yeni Personel Ekle</b>
                                                                        </button>
                                                                    </a>
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
                                    <!-- add new sidebar starts -->
                                    <div  class="add-new-data-sidebar">
                                        <div id="modalO" class="overlay-bg"></div>
                                        <div id="modalT" class="add-new-data">
                                            <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                                                <div>
                                                    <h4 class="text-uppercase" data-i18n="addNewCustomer"></h4>
                                                </div>
                                                <div class="hide-data-sidebar">
                                                    <i class="feather icon-x"></i>
                                                </div>
                                            </div>
                                            <div class="data-items pb-3">
                                                <div class="data-fields px-2 mt-3">
                                                        <form id="formAddNewCustomer" class="row">
                                                            <div class="col-sm-6 data-field-col">
                                                                <fieldset class="form-label-group">
                                                                    <input type="text" id="firstname" class="form-control maxTwoName uppercase" name="data-firstname" data-index="1" data-i18n="[placeholder]Firstname">
                                                                    <label for="firstname"><span data-i18n="Firstname"></span></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <fieldset class="form-label-group">
                                                                    <input type="text" id="lastname" class="form-control maxTwoName uppercase" name="data-lastname" data-index="2" data-i18n="[placeholder]Lastname">
                                                                    <label for="lastname"><span data-i18n="Lastname"></span></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <fieldset class="form-label-group">
                                                                    <input type="date" id="dayOfbirth" class="form-control" name="data-dayOfbirth" data-index="3" data-i18n="[placeholder]DayOfBirth" require>
                                                                    <label for="birthday"><span data-i18n="DayOfBirth"></span></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <fieldset class="form-label-group">
                                                                    <input class="form-control" id="genders" name="data-genders" required>
                                                                    <label for="genders"><span data-i18n="genders"></span></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <fieldset class="form-label-group">
                                                                    <input type="text" id="mobilPhone" class="form-control phone-inputmask" value="5" name="data-mobilPhone" data-index="4" data-i18n="[placeholder]mobilPhone">
                                                                    <label for="birthday"><span data-i18n="mobilPhone"></span></label>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-6 data-field-col">
                                                                <label style="color:#a7a9d1;font-weight: 500;" data-i18n="ContactPermissions"></label>
                                                                <fieldset class="form-label-group">
                                                                    <ul class="list-unstyled mb-0">
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" name="contactSMS" data-index="5" id="contactSMS">
                                                                                    <label class="custom-control-label" for="contactSMS" data-i18n="SMS"></label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                        <li class="d-inline-block mr-2">
                                                                            <fieldset>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox" class="custom-control-input" name="contactCall" data-index="6" id="contactCall">
                                                                                    <label class="custom-control-label" for="contactCall" data-i18n="CALL"></label>
                                                                                </div>
                                                                            </fieldset>
                                                                        </li>
                                                                    </ul>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-sm-12 data-field-col">
                                                                <fieldset class="form-label-group">
                                                                <textarea id="Address" name="data-Address" class="form-control uppercase" rows="2" cols="50" data-index="7" data-i18n="[placeholder]Address"></textarea>
                                                                    <label for="Address"><span data-i18n="Address"></span></label>
                                                                </fieldset>
                                                            </div>
                                                        </form>
                                                </div>
                                            </div>
                                            <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                                                <div class="add-data-btn">
                                                    <button id="btnNewCustomer" class="btn btn-primary round" data-i18n="Save"></button>
                                                </div>
                                                <div class="">
                                                    <button id="btnFormClear" class="btn btn-outline-danger round" data-dismiss="modal" data-i18n="Cancel"></button>
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
    <script>
        $(document).ready(function(){

            $.urlParam = function (name) {
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results == null) {
                return null;
                }
                return decodeURI(results[1]) || 0;
            }
            if($.urlParam('message')){
                $.getJSON("https://api.ipify.org/?format=json", function(e) {
                    Swal.fire("Hatalı İstek", "Bu işlem "+e.ip+" IP adresiniz ile kayıt altına alındı. ", "warning");
                });
            }

            function preventNumberInput(e){
                var keyCode = (e.keyCode ? e.keyCode : e.which);
                if (keyCode > 47 && keyCode < 58){
                    e.preventDefault();
                }
            }
            $('.maxTwoName').on('input', function () {
                var acceptWords = 2, // Count of words to accept
                boundary = [], // Stores the used word boundary characters
                value = this.value.replace(/[^a-zA-ZEeSsĞğÜüÖöÇçŞşıİI]/g, function (a) { // An array of actual words
                    if (--acceptWords > 0) {
                    boundary.push(a);
                    }
                    return ' ';
                }).split(' '),
                finalValue = value[0], // The final value to enter to the input
                n;
                if (boundary.length) { // If word boundary characters found
                for (n = 0; n < boundary.length; n++) {            
                    finalValue += boundary[n] + value[n + 1]; // Form a final value
                }
                }
                this.value = finalValue; // Replace the value in the input
            }).keypress(function(e) {
                preventNumberInput(e);
            });

            $(".maxTwoName").click(function () {
                $(this).select();
            });
            $("#mobilPhone").click(function () {
                $(this).select();
            });
            
            $.getJSON("/app-assets/data/locales/<?=$userDil?>.json", function(data){
                var gendersArr = [
                    { id: 1, text: data.Woman },
                    { id: 2, text: data.Man }
                ];
                $("#genders").select2({placeholder: data.genders,cache: false,allowClear: true,data: gendersArr});
            });
            $('#btnFormClear').click(function(){
                $('#formAddNewCustomer')[0].reset();
                $('#modalO').removeClass('show');
                $('#modalT').removeClass('show');
            });
            $("#btnNewCustomer").click(function() {
                $.ajax({
                    type: "POST",
                    url: "/api/app-customer/add/index",
                    data: $('#formAddNewCustomer').serialize(),
                    success: function(result) {
                        toastr.remove();
                        toastr.options = {
                            positionClass: 'toast-bottom-right'
                        };
                            var obj = JSON.parse(result);
                            $.each(obj, function(i, item) {
                                if(item['firstname']==false){ toastr.error(i18next.t("MissingFirstname"));
                                }if(item['lastname']==false){ toastr.error(i18next.t("MissingSurname"));
                                }if(item['dayOfbirth']==false){ toastr.error(i18next.t("MissingBirthDay"));
                                }if(item['address']==false){ toastr.error(i18next.t("MissingAddress"));
                                }if(item['phone']==false){ toastr.error(i18next.t("MissingPhone"));
                                }if(item['gender']==false){ toastr.error(i18next.t("MissingGender"));
                                }if(item['phoneFormat']==false){ toastr.error(i18next.t("InvalidPhoneFormat"));
                                }if(item['status']==false){
                                    if(item['errorcode']==931){
                                        Swal.fire({
                                            title: i18next.t("Error"),
                                            text: i18next.t("931"),
                                            icon: 'error',
                                            allowOutsideClick: false,
                                        });
                                    }else if(item['errorcode']==932){
                                        Swal.fire({
                                            title: i18next.t("Error"),
                                            text: i18next.t("932"),
                                            icon: 'error',
                                            allowOutsideClick: false,
                                        });
                                    }else if(item['errorcode']==933){
                                        Swal.fire({
                                            title: i18next.t("Error"),
                                            text: i18next.t("933"),
                                            icon: 'error',
                                            allowOutsideClick: false,
                                        });
                                    }
                                }else if(item['status']==true){
                                    Swal.fire({
                                        title: i18next.t("Success"),
                                        text: i18next.t("RegistrationSuccessful"),
                                        icon: 'success',
                                        allowOutsideClick: false,
                                    })
                                    setTimeout(function(){
                                        window.location.reload(2);
                                    }, 2500);
                                }
                            });
                    }
                });
            });

        });
    </script>
    <!-- END: Footer-->

</body>
<!-- END: Body-->

</html>