<?php include 'header-top.php'?>

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
    <title>Account Settings - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-grid.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/aggrid.css">

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
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
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
                            <h2 class="content-header-title float-left mb-0">Şirket Ayarları</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account Settings
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        Genel
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Yöneticiler
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                        Şirket Çalışma Cetveli
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Personel Ayarları
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                        <i class="feather icon-feather mr-50 font-medium-3"></i>
                                        Ürün Listesi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Hizmet Listesi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Oda Ayarları
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        SMS Ayarları
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill" href="#uygulama-bolge-ayarlari" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Uygulama Bölge Ayarları
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="/app-assets/images/portrait/small/avatar-s-12.jpg" class="rounded mr-75" alt="profile image" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                                            <input type="file" id="account-upload" hidden>
                                                            <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <form novalidate>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-username">Username</label>
                                                                    <input type="text" class="form-control" id="account-username" placeholder="Username" value="hermione007" required data-validation-required-message="This username field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-name">Name</label>
                                                                    <input type="text" class="form-control" id="account-name" placeholder="Name" value="Hermione Granger" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-e-mail">E-mail</label>
                                                                    <input type="email" class="form-control" id="account-e-mail" placeholder="Email" value="granger007@hogward.com" required data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <p class="mb-0">
                                                                    Your email is not confirmed. Please check your inbox.
                                                                </p>
                                                                <a href="javascript: void(0);">Resend confirmation</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-company">Company</label>
                                                                <input type="text" class="form-control" id="account-company" placeholder="Company name">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
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
                                                                                        <button type="button" class="btn bg-gradient-primary default action-edit" >
                                                                                            <i class="feather icon-user-plus"></i> <b data-i18n="Add New Customer">Yeni Müşteri Ekle</b>
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
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel" aria-labelledby="account-pill-info" aria-expanded="false">
                                                <div class="table-responsive">
                                                    <form id="FormdayOfwork">
                                                        <table class="table">
                                                            <tbody>
                                                                <thead style="text-align: center">
                                                                        <tr>
                                                                            <th>Gün</th>
                                                                            <th>Durum</th>
                                                                            <th>Açılış Saati</th>
                                                                            <th>Kapanış Saati</th>
                                                                        </tr>
                                                                </thead>
                                                                <tr>
                                                                    <th scope="row">Pazartesi</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                            <input type="checkbox" class="custom-control-input" name="CheckMonday" id="CheckMonday">
                                                                            <label class="custom-control-label" for="CheckMonday">
                                                                                <span class="switch-text-left">Açık</span>
                                                                                <span class="switch-text-right">Kapalı</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartMonday" name="StartMonday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishMonday" name="FinishMonday"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Salı</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                            <input type="checkbox" class="custom-control-input" name="CheckTuesday" id="CheckTuesday" >
                                                                            <label class="custom-control-label" for="CheckTuesday">
                                                                                <span class="switch-text-left">Açık</span>
                                                                                <span class="switch-text-right">Kapalı</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartTuesday" name="StartTuesday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishTuesday" name="FinishTuesday"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Çarşamba</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                            <input type="checkbox" class="custom-control-input" name="CheckWednesday" id="CheckWednesday" >
                                                                            <label class="custom-control-label" for="CheckWednesday">
                                                                                <span class="switch-text-left">Açık</span>
                                                                                <span class="switch-text-right">Kapalı</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartWednesday" name="StartWednesday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishWednesday" name="FinishWednesday"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Perşembe</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                            <input type="checkbox" class="custom-control-input" name="CheckThursday" id="CheckThursday" >
                                                                            <label class="custom-control-label" for="CheckThursday">
                                                                                <span class="switch-text-left">Açık</span>
                                                                                <span class="switch-text-right">Kapalı</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartThursday" name="StartThursday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishThursday" name="FinishThursday"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Cuma</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                            <input type="checkbox" class="custom-control-input" name="CheckFriday" id="CheckFriday" >
                                                                            <label class="custom-control-label" for="CheckFriday">
                                                                                <span class="switch-text-left">Açık</span>
                                                                                <span class="switch-text-right">Kapalı</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartFriday" name="StartFriday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishFriday" name="FinishFriday"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Cumartesi</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                                <input type="checkbox" class="custom-control-input" name="CheckSaturday" id="CheckSaturday" >
                                                                                <label class="custom-control-label" for="CheckSaturday">
                                                                                    <span class="switch-text-left">Açık</span>
                                                                                    <span class="switch-text-right">Kapalı</span>
                                                                                </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartSaturday" name="StartSaturday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishSaturday" name="FinishSaturday"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Pazar</th>
                                                                    <td>
                                                                        <div class="custom-control custom-switch switch-md custom-switch-success">
                                                                            <input type="checkbox" class="custom-control-input" name="CheckSunday" id="CheckSunday" >
                                                                            <label class="custom-control-label" for="CheckSunday">
                                                                                <span class="switch-text-left">Açık</span>
                                                                                <span class="switch-text-right">Kapalı</span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td><input type="time" class="form-control" id="StartSunday" name="StartSunday"></td>
                                                                    <td><input type="time" class="form-control" id="FinishSunday" name="FinishSunday"></td>
                                                                </tr>
                                                                <tr class="primary" title="Şirket Genel Çalışma Saatleri">
                                                                    <th  scope="row">Genel Ayar</th>
                                                                    <td>
                                                                    </td>
                                                                    <td><input type="time" class="form-control primary" id="AllDayStart" name="AllDayStart"></td>
                                                                    <td><input type="time" class="form-control" id="AllDayFinish" name="AllDayFinish"></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </form>
                                                    <div id="tahsilatBtn" style="text-align:right">
                                                        <button type="button" id="dayOfworkUpdate" class="btn btn-success ">Güncelle</button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-twitter">Twitter</label>
                                                                <input type="text" id="account-twitter" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-facebook">Facebook</label>
                                                                <input type="text" id="account-facebook" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-google">Google+</label>
                                                                <input type="text" id="account-google" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-linkedin">LinkedIn</label>
                                                                <input type="text" id="account-linkedin" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-instagram">Instagram</label>
                                                                <input type="text" id="account-instagram" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="account-quora">Quora</label>
                                                                <input type="text" id="account-quora" class="form-control" placeholder="Add link">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel" aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                            <strong>Twitter</strong></a>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to facebook.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                            <strong>Google</strong>
                                                        </a>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                                        <h6>You are connected to Instagram.</h6>
                                                        <span>Johndoe@gmail.com</span>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel" aria-labelledby="account-pill-notifications" aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="m-1">Activity</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                            <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Email me when someone comments
                                                                onmy
                                                                article</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                            <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                            <span class="switch-label w-100">Email me when someone answers on
                                                                my
                                                                form</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                            <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                            <span class="switch-label w-100">Email me hen someone follows
                                                                me</span>
                                                        </div>
                                                    </div>
                                                    <h6 class="m-1">Application</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                                                            <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                            <span class="switch-label w-100">News and announcements</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                            <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                            <span class="switch-label w-100">Weekly product updates</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                                                            <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                            <span class="switch-label w-100">Weekly blog digest</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="uygulama-bolge-ayarlari" role="tabpanel" aria-labelledby="uygulama-bolge-ayarlari" aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="m-1">uygulama-bolge-ayarlari</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch1">
                                                            <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Email me when someone comments
                                                                onmy
                                                                article</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch2">
                                                            <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                            <span class="switch-label w-100">Email me when someone answers on
                                                                my
                                                                form</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                            <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                            <span class="switch-label w-100">Email me hen someone follows
                                                                me</span>
                                                        </div>
                                                    </div>
                                                    <h6 class="m-1">Application</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch4">
                                                            <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                            <span class="switch-label w-100">News and announcements</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                            <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                            <span class="switch-label w-100">Weekly product updates</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked id="accountSwitch6">
                                                            <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                            <span class="switch-label w-100">Weekly blog digest</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2020<a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent,</a>All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <script src="/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/account-setting.js"></script>
    <script src="/app-assets/js/scripts/pages/app-user.js"></script>

    <script src="/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js"></script>

    <script>
        $(document).ready(function() {
            // Close sidebar
            $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")

            $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
                $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")
                // $("#data-name, #data-price").val("")
                // $("#data-category, #data-status").prop("selectedIndex", 0)
            })
            // On Edit
            $('.action-edit').on("click",function(e){
                e.stopPropagation();
                // $('#data-name').val('Altec Lansing - Bluetooth Speaker');
                // $('#data-price').val('$99');
                $(".add-new-data").addClass("show");
                $(".overlay-bg").addClass("show");
            });

            $.ajax({
                type: "POST",
                url: "/api/select/day-of-work.php",
                success: function(res) {
                    var obj = JSON.parse(res);
                    if(obj[0]['status']=='true') $('#CheckMonday').attr('checked', true); else $('#CheckMonday').attr('checked', false);
                    $('#StartMonday').val(obj[0]['start']);
                    $('#FinishMonday').val(obj[0]['end']);

                    if(obj[1]['status']=='true') $('#CheckTuesday').attr('checked', true); else $('#CheckTuesday').attr('checked', false);
                    $('#StartTuesday').val(obj[1]['start']);
                    $('#FinishTuesday').val(obj[1]['end']);

                    if(obj[2]['status']=='true') $('#CheckWednesday').attr('checked', true); else $('#CheckWednesday').attr('checked', false);
                    $('#StartWednesday').val(obj[2]['start']);
                    $('#FinishWednesday').val(obj[2]['end']);

                    if(obj[3]['status']=='true') $('#CheckThursday').attr('checked', true); else $('#CheckThursday').attr('checked', false);
                    $('#StartThursday').val(obj[3]['start']);
                    $('#FinishThursday').val(obj[3]['end']);

                    if(obj[4]['status']=='true') $('#CheckFriday').attr('checked', true); else $('#CheckFriday').attr('checked', false);
                    $('#StartFriday').val(obj[4]['start']);
                    $('#FinishFriday').val(obj[4]['end']);

                    if(obj[5]['status']=='true') $('#CheckSaturday').attr('checked', true); else $('#CheckSaturday').attr('checked', false);
                    $('#StartSaturday').val(obj[5]['start']);
                    $('#FinishSaturday').val(obj[5]['end']);

                    if(obj[6]['status']=='true') $('#CheckSunday').attr('checked', true); else $('#CheckSunday').attr('checked', false);
                    $('#StartSunday').val(obj[6]['start']);
                    $('#FinishSunday').val(obj[6]['end']);
                    
                    // if(obj[7]['status']=='true') $('#CheckSunday').attr('checked', true); else $('#CheckSunday').attr('checked', false);
                    $('#AllDayStart').val(obj[7]['start']);
                    $('#AllDayFinish').val(obj[7]['end']);
                }
            });
        });
        
        function TrueFalse(){
            if($('#CheckMonday').is(':checked')==true){ $('#StartMonday').prop('disabled', false); $('#FinishMonday').prop('disabled', false);
            }else{ $('#StartMonday').prop('disabled', true); $('#FinishMonday').prop('disabled', true); }
            
            if($('#CheckTuesday').is(':checked')==true){ $('#StartTuesday').prop('disabled', false); $('#FinishTuesday').prop('disabled', false);
            }else{ $('#StartTuesday').prop('disabled', true); $('#FinishTuesday').prop('disabled', true); }
            
            if($('#CheckWednesday').is(':checked')==true){ $('#StartWednesday').prop('disabled', false); $('#FinishWednesday').prop('disabled', false);
            }else{ $('#StartWednesday').prop('disabled', true); $('#FinishWednesday').prop('disabled', true); }
            
            if($('#CheckThursday').is(':checked')==true){ $('#StartThursday').prop('disabled', false); $('#FinishThursday').prop('disabled', false);
            }else{ $('#StartThursday').prop('disabled', true); $('#FinishThursday').prop('disabled', true); }
            
            if($('#CheckFriday').is(':checked')==true){ $('#StartFriday').prop('disabled', false); $('#FinishFriday').prop('disabled', false);
            }else{ $('#StartFriday').prop('disabled', true); $('#FinishFriday').prop('disabled', true); }
            
            if($('#CheckSaturday').is(':checked')==true){ $('#StartSaturday').prop('disabled', false); $('#FinishSaturday').prop('disabled', false);
            }else{ $('#StartSaturday').prop('disabled', true); $('#FinishSaturday').prop('disabled', true); }
            
            if($('#CheckSunday').is(':checked')==true){ $('#StartSunday').prop('disabled', false); $('#FinishSunday').prop('disabled', false);
            }else{ $('#StartSunday').prop('disabled', true); $('#FinishSunday').prop('disabled', true); }
        }

        $(document).on('change', ':checkbox', function() {
            if(this.checked) { $('#'+this.id).attr('checked', true); $('#'+this.id).val(true); $('#'+this.id).prop('checked', true);
            }else{ $('#'+this.id).attr('checked', false); $('#'+this.id).val(false); $('#'+this.id).prop('checked', false);}
            TrueFalse();
        });

        $("#dayOfworkUpdate").click(function() {
            $('#FormdayOfwork').find(':input:disabled').prop("disabled", false);
            var AllInputs=$('#FormdayOfwork input:not([type="checkbox"])').serialize();
            var checkInputs=$("#FormdayOfwork input[type='checkbox']").map(function(){return this.name+"="+this.checked;}).get().join("&");
            if(checkInputs!="" && AllInputs!="") AllInputs+="&"+checkInputs;
            else AllInputs+=checkInputs;
            $.ajax({
                type: "POST",
                url: "/api/update/dayOfWorks.php",
                data: AllInputs,
                success: function(res) {
                    var obj = JSON.parse(res);
                    if(obj['code']==1000){
                        location.reload();
                    }else{
                        alert('Errör');
                    }
                }
            });

            TrueFalse();
        });

        </script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>