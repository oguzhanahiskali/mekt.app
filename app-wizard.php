<?php include 'header-top.php'; ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
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
                            <h2 class="content-header-title float-left mb-0">Müşteriler</h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                </li>
                                <li class="breadcrumb-item active">Müşteri Listesi
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
                                <section id="icon-tabs">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Otomatik Kurulum...</h4>
                                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                        Bugün harika bir gün!
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content collapse show">
                                                    <div class="card-body">
                                                        <form action="#" id="myForm" class="icons-tab-steps wizard-circle">

                                                            <!-- Step 1 -->
                                                            <h6><i class="step-icon feather icon-home"></i> 1. Hizmetleriniz Nelerdir?</h6>
                                                            <fieldset>
                                                                <hr>

                                                                <div class="row list-group-item justify-content-md-center" style="display:flex!important"><!-- 1. Hizmet -->
                                                                    
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Hizmet Adı :</label>
                                                                            <input class="form-control required" placeholder="Hizmet Adı" name="inp-hizmet-adi[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Hizmet Süresi :</label>
                                                                            <select class="form-control required" name="inp-hizmet-suresi[]">
                                                                                <option value="">-Seçiniz-</option>
                                                                                <option value="5">5 Dakika</option>
                                                                                <option value="15">15 Dakika</option>
                                                                                <option value="30">30 Dakika</option>
                                                                                <option value="45">45 Dakika</option>
                                                                                <option value="60">60 Dakika</option>
                                                                                <option value="75">1 Saat 15 dk.</option>
                                                                                <option value="90">1 Saat 30 dk.</option>
                                                                                <option value="105">1 Saat 45 dk.</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Seans Sayısı:</label>
                                                                            <select class="form-control required" name="inp-seans-sayisi[]">
                                                                                <option value="">-Seçiniz-</option>
                                                                                <option value="1">1 Seans</option>
                                                                                <option value="2">2 Seans</option>
                                                                                <option value="3">3 Seans</option>
                                                                                <option value="4">4 Seans</option>
                                                                                <option value="5">5 Seans</option>
                                                                                <option value="6">6 Seans</option>
                                                                                <option value="7">7 Seans</option>
                                                                                <option value="8">8 Seans</option>
                                                                                <option value="9">9 Seans</option>
                                                                                <option value="10">10 Seans</option>
                                                                                <option value="11">11 Seans</option>
                                                                                <option value="12">12 Seans</option>
                                                                                <option value="13">13 Seans</option>
                                                                                <option value="14">14 Seans</option>
                                                                                <option value="15">15 Seans</option>
                                                                                <option value="16">16 Seans</option>
                                                                                <option value="17">17 Seans</option>
                                                                                <option value="18">18 Seans</option>
                                                                                <option value="19">19 Seans</option>
                                                                                <option value="20">20 Seans</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Fiyat :</label>
                                                                            <input type="number" class="form-control required" aria-label="" placeholder="Fiyat" name="inp-fiyat[]" aria-invalid="false">

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row list-group-item justify-content-md-center" style="display:flex!important"><!-- 2. Hizmet -->
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Hizmet Adı :</label>
                                                                            <input class="form-control required" placeholder="Hizmet Adı" name="inp-hizmet-adi[]">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Hizmet Süresi :</label>
                                                                            <select class="form-control required" name="inp-hizmet-suresi[]">
                                                                                <option value="">-Seçiniz-</option>
                                                                                <option value="5">5 Dakika</option>
                                                                                <option value="15">15 Dakika</option>
                                                                                <option value="30">30 Dakika</option>
                                                                                <option value="45">45 Dakika</option>
                                                                                <option value="60">60 Dakika</option>
                                                                                <option value="75">1 Saat 15 dk.</option>
                                                                                <option value="90">1 Saat 30 dk.</option>
                                                                                <option value="105">1 Saat 45 dk.</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Seans Sayısı:</label>
                                                                            <select class="form-control required" name="inp-seans-sayisi[]">
                                                                                <option value="">-Seçiniz-</option>
                                                                                <option value="1">1 Seans</option>
                                                                                <option value="2">2 Seans</option>
                                                                                <option value="3">3 Seans</option>
                                                                                <option value="4">4 Seans</option>
                                                                                <option value="5">5 Seans</option>
                                                                                <option value="6">6 Seans</option>
                                                                                <option value="7">7 Seans</option>
                                                                                <option value="8">8 Seans</option>
                                                                                <option value="9">9 Seans</option>
                                                                                <option value="10">10 Seans</option>
                                                                                <option value="11">11 Seans</option>
                                                                                <option value="12">12 Seans</option>
                                                                                <option value="13">13 Seans</option>
                                                                                <option value="14">14 Seans</option>
                                                                                <option value="15">15 Seans</option>
                                                                                <option value="16">16 Seans</option>
                                                                                <option value="17">17 Seans</option>
                                                                                <option value="18">18 Seans</option>
                                                                                <option value="19">19 Seans</option>
                                                                                <option value="20">20 Seans</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Fiyat :</label>
                                                                            <input type="number" class="form-control required" aria-label="" placeholder="Fiyat" name="inp-fiyat[]" aria-invalid="false">

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row list-group-item justify-content-md-center" style="display:flex!important"><!-- 3. Hizmet -->

                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Hizmet Adı :</label>
                                                                            <input class="form-control required" placeholder="Hizmet Adı" name="inp-hizmet-adi[]">

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Hizmet Süresi :</label>
                                                                            <select class="form-control required" name="inp-hizmet-suresi[]">
                                                                                <option value="">-Seçiniz-</option>
                                                                                <option value="5">5 Dakika</option>
                                                                                <option value="15">15 Dakika</option>
                                                                                <option value="30">30 Dakika</option>
                                                                                <option value="45">45 Dakika</option>
                                                                                <option value="60">60 Dakika</option>
                                                                                <option value="75">1 Saat 15 dk.</option>
                                                                                <option value="90">1 Saat 30 dk.</option>
                                                                                <option value="105">1 Saat 45 dk.</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Seans Sayısı:</label>
                                                                            <select class="form-control required" name="inp-seans-sayisi[]">
                                                                                <option value="">-Seçiniz-</option>
                                                                                <option value="1">1 Seans</option>
                                                                                <option value="2">2 Seans</option>
                                                                                <option value="3">3 Seans</option>
                                                                                <option value="4">4 Seans</option>
                                                                                <option value="5">5 Seans</option>
                                                                                <option value="6">6 Seans</option>
                                                                                <option value="7">7 Seans</option>
                                                                                <option value="8">8 Seans</option>
                                                                                <option value="9">9 Seans</option>
                                                                                <option value="10">10 Seans</option>
                                                                                <option value="11">11 Seans</option>
                                                                                <option value="12">12 Seans</option>
                                                                                <option value="13">13 Seans</option>
                                                                                <option value="14">14 Seans</option>
                                                                                <option value="15">15 Seans</option>
                                                                                <option value="16">16 Seans</option>
                                                                                <option value="17">17 Seans</option>
                                                                                <option value="18">18 Seans</option>
                                                                                <option value="19">19 Seans</option>
                                                                                <option value="20">20 Seans</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="phoneNumber2">Fiyat :</label>
                                                                            <input type="number" class="form-control required" aria-label="" placeholder="Fiyat" name="inp-fiyat[]" aria-invalid="false">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div id="to-add-first" class="outerDiv first"><!-- 4. Hizmet -->
                                                                    <div id="primary" class="clone row list-group-item justify-content-md-center" style="display:flex!important">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="phoneNumber2">Hizmet Adı :</label>
                                                                                <input class="form-control required" placeholder="Hizmet Adı" name="inp-hizmet-adi[]">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="phoneNumber2">Hizmet Süresi :</label>
                                                                                <select class="form-control required" name="inp-hizmet-suresi[]">
                                                                                    <option value="">-Seçiniz-</option>
                                                                                    <option value="5">5 Dakika</option>
                                                                                    <option value="15">15 Dakika</option>
                                                                                    <option value="30">30 Dakika</option>
                                                                                    <option value="45">45 Dakika</option>
                                                                                    <option value="60">60 Dakika</option>
                                                                                    <option value="75">1 Saat 15 dk.</option>
                                                                                    <option value="90">1 Saat 30 dk.</option>
                                                                                    <option value="105">1 Saat 45 dk.</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label for="phoneNumber2">Seans Sayısı:</label>
                                                                                <select class="form-control required" name="inp-seans-sayisi[]">
                                                                                    <option value="">-Seçiniz-</option>
                                                                                    <option value="1">1 Seans</option>
                                                                                    <option value="2">2 Seans</option>
                                                                                    <option value="3">3 Seans</option>
                                                                                    <option value="4">4 Seans</option>
                                                                                    <option value="5">5 Seans</option>
                                                                                    <option value="6">6 Seans</option>
                                                                                    <option value="7">7 Seans</option>
                                                                                    <option value="8">8 Seans</option>
                                                                                    <option value="9">9 Seans</option>
                                                                                    <option value="10">10 Seans</option>
                                                                                    <option value="11">11 Seans</option>
                                                                                    <option value="12">12 Seans</option>
                                                                                    <option value="13">13 Seans</option>
                                                                                    <option value="14">14 Seans</option>
                                                                                    <option value="15">15 Seans</option>
                                                                                    <option value="16">16 Seans</option>
                                                                                    <option value="17">17 Seans</option>
                                                                                    <option value="18">18 Seans</option>
                                                                                    <option value="19">19 Seans</option>
                                                                                    <option value="20">20 Seans</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2" style="    max-width: 19em;">
                                                                            <div class="form-group">
                                                                                <label for="phoneNumber2">Fiyat :</label>
                                                                                <input type="number" class="form-control required" aria-label="" placeholder="Fiyat" name="inp-fiyat[]" aria-invalid="false">

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-0">
                                                                            <div class="form-group deleteNow" style="text-align:right">
                                                                                <label>‏</label><br>
                                                                                <button type="button" onClick="deleteAddress(this);return false;" class="btn btn-icon btn-danger waves-effect waves-light"><i class="feather icon-x"></i></button>
                                                                            </div>
                                                                            
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="form-group overflow-hidden">
                                                                    <div class="col-12" style="margin-top:23px">
                                                                        <button onClick="addAddress();return false;" class="btn btn-danger">
                                                                            <i class="ft-plus"></i> Yeni Hizmet Ekle
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </fieldset>

                                                            <!-- Step 2 -->
                                                            <h6><i class="step-icon feather icon-home"></i> 2. Estetisyen Tanımlaması</h6>
                                                            <fieldset>
                                                                
                                                                <div class="container">
                                                                    <div class="row justify-content-md-center">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="phoneNumber2">Kaç Hizmet Daha Eklensin?</label>
                                                                                <input class="form-control required" placeholder="Kaç Tane" type="number" id="inp-count">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-1">
                                                                            <div class="form-group" style="text-align: right;" placeholder="NaN" name="NaN">
                                                                                <label for="phoneNumber2">&rlm;</label><br>
                                                                                <button type="button" onClick="counts();" class="btn btn-icon btn-danger waves-effect waves-light">Ekle</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                            </fieldset>

                                                            <!-- Step 3 -->
                                                            <h6><i class="step-icon feather icon-home"></i>Step 3</h6>
                                                            <fieldset>3
                                                            </fieldset>

                                                            <!-- Step 4 -->
                                                            <h6><i class="step-icon feather icon-home"></i>Step 4</h6>
                                                            <fieldset>
                                                    <div class="card-content collapse show">
                                                        <div class="card-body">
                                                            <div class="repeater-default">
                                                                <div data-repeater-list="car">
                                                                    <div data-repeater-item class="float-left">
                                                                        <form class="form row" style="float:left">
                                                                            <div class="form-group mb-1 col-sm-12 col-md-2 float-left">
                                                                                <label for="email-addr">Email address</label>
                                                                                <br>
                                                                                <input type="email" class="form-control" id="email-addr" placeholder="Enter email">
                                                                            </div>
                                                                            <div class="form-group mb-1 col-sm-12 col-md-2 float-left">
                                                                                <label for="pass">Password</label>
                                                                                <br>
                                                                                <input type="password" class="form-control" id="pass" placeholder="Password">
                                                                            </div>
                                                                            <div class="form-group mb-1 col-sm-12 col-md-2 float-left">
                                                                                <label for="bio" class="cursor-pointer">Bio</label>
                                                                                <br>
                                                                                <textarea class="form-control" id="bio" rows="2"></textarea>
                                                                            </div>
                                                                            <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-2 float-left">
                                                                                <label for="tel-input">Gender</label>
                                                                                <br>
                                                                                <input class="form-control" type="tel" value="1-(555)-555-5555" id="tel-input">
                                                                            </div>
                                                                            <div class="form-group mb-1 col-sm-12 col-md-2 float-left">
                                                                                <label for="profession">Profession</label>
                                                                                <br>
                                                                                <select class="form-control" id="profession">
                                                                                    <option>Select Option</option>
                                                                                    <option>Option 1</option>
                                                                                    <option>Option 2</option>
                                                                                    <option>Option 3</option>
                                                                                    <option>Option 4</option>
                                                                                    <option>Option 5</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group col-sm-12 col-md-2 text-center mt-2 float-left">
                                                                                <button type="button" class="btn btn-danger" data-repeater-delete> <i class="ft-x"></i>
                                                                                    Delete</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group overflow-hidden float-left">
                                                                    <div class="col-12">
                                                                        <button data-repeater-create class="btn btn-primary">
                                                                            <i class="ft-plus"></i> Add
                                                                        </button>
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

</body>
<!-- END: Body-->

</html>