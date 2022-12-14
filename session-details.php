<?php include 'header-top.php'; ?>
<!DOCTYPE html>
<html class="loaded dark-layout" lang="en" data-textdirection="ltr" style="--vh:9.29px;">
<!-- BEGIN: Head-->
<?php include 'includes/head.php';?>
<!-- END: Head-->
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">

<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-file-uploader.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .img-wrapper {
    height: 400px;
    position: relative;
    overflow-x:auto;
    overflow-y:auto;
}

.img-wrapper > img {
    display: inline-block;
    position: relative;
    border:1px solid red
}

 
</style>
<!-- BEGIN: Body-->
<?php

if(empty($_GET['CID'])){
    // header('Location: error-404.html');
    // include 'error-404.html';
    // exit();
}
if(isset($_GET['SERVID'])){
    $GetServiceID = $_GET['SERVID'];
}else{
    $GetServiceID = null;
}
if(isset($_GET['PRODID'])){
    $GetProductID = $_GET['PRODID'];
}else{
    $GetProductID = null;
}
?>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?php include 'includes/header.php';?>
    <style>
        .first {
            color: #2a2e39;
        }
    </style>
    <?php

        $id = $_GET['CID'];
        
        $query = $db->query("SELECT * from tbl_seans_kart where ID = '{$id}' AND DURUM=1 AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
        if(empty($query['MID'])) {
            ?>
            <script>
                // document.location.href = '/error-404.html';
            </script>
            <?php
            // header('Location: error-404.html');
            // exit();
        }
        $tckimlikno = $query['MID'];
        $ProductTotalPayment = null;
        $ProductReceived = null;
        $ProductNotReceived = null;

        $Qviewhasta = $db->query("SELECT * FROM view_hasta_tc WHERE MID = '{$tckimlikno}' AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
        $hastaadisoyadi = $Qviewhasta['HASTAADISOYADI'];
        
        $query = $db->query("SELECT FIYAT, ODEME FROM tbl_seans_kart WHERE ID = '{$id}'")->fetch(PDO::FETCH_ASSOC);
        if ( $query ){
            $hizmetfiyati = $query['FIYAT'];
            //$hizmetalinan = $query['ODEME'];
        } 

        $query = $db->query("SELECT * FROM tbl_seans_taksit WHERE KART_ID = '{$id}' AND TAKSIT_ID = 1 AND TAHSILAT_DURUM = 1")->fetch(PDO::FETCH_ASSOC);
        if ( $query ){
            // $hizmetalinan = $query['FIYAT'];
        }
        
        $query = $db->query("SELECT SUM(FIYAT) AS FIYAT FROM tbl_seans_taksit WHERE KART_ID = '{$id}' AND TAHSILAT_DURUM = 2")->fetch(PDO::FETCH_ASSOC);
        if ( $query ){
            $toplamalinanS = $query['FIYAT'];
            $qProductPrice = $db->query("SELECT * FROM tbl_seans_kart_urun WHERE DURUM = 1 AND KART_ID = '{$id}'", PDO::FETCH_ASSOC);

            // if ( $qProductPrice ){
            //     $ProductTotalPayment = $qProductPrice['PRICE'];
            //     $ProductReceived = $qProductPrice['RECEIVED'];
            //     $ProductNotReceived = $qProductPrice['NOT_RECEIVED'];
            //     $toplamalinan = $toplamalinan + $ProductReceived;
            // }
            $aaa = null;
            if ( $qProductPrice->rowCount() ){
                foreach( $qProductPrice as $row ){
                    $ProductTotalPayment +=$row['PRICE'];
                    if($row['BUY_STATUS']==1){
                        $ProductReceived += $row['PRICE'];
                        $toplamalinan = $toplamalinanS + $ProductReceived;
                    }else if($row['BUY_STATUS']==0){
                        $ProductNotReceived += $row['PRICE'];
                    }
                    // $toplamalinan = $toplamalinan + $ProductReceived;
                }
                echo $aaa;
           }
           
        }

     
    ?>

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?php include 'includes/main-menu.php';?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12 float-left mb-0 ml-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">G??sterge Paneli</a>
                                </li>
                                <li class="breadcrumb-item"><a href="/app-customer-view.php?id=<?php echo $tckimlikno; ?>"><?php echo ucwords_tr($hastaadisoyadi); ?></a>
                                </li>
                                <li class="breadcrumb-item active">Seans Detaylar??
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Uygulama B??lgelerini Yap??land??r</a>
                                <a class="dropdown-item yapilandirmaOnayi" href="#">Taksitlendirmeyi S??f??rdan Yap??land??r</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">

            <?php
                $data1 = "";
                $hizmetbolgeleri = "";
                $query = $db->query("SELECT * from view_seans WHERE id = '{$id}' AND DURUM = 1 AND FIRMA_ID='{$user_Firma}' ORDER BY ID DESC", PDO::FETCH_ASSOC);
                if ( $query->rowCount() ){
                foreach( $query as $row )
                {
                    $hizmetalinan = $row['ODEME'];
                    //ESTET??SYEN id to string
                    $estetisyenid= $row['EST_ID'];
                    $Qinttostr = $db->query("SELECT * FROM tbl_personel WHERE ID= '{$estetisyenid}' AND FIRMA_ID='{$user_Firma}'")->fetch(PDO::FETCH_ASSOC);
                    $Str_select2estetisyen = $Qinttostr['ADI'].' '.$Qinttostr['SOYADI'];
                    
                    //HIZMETADI id to string
                    $select2hizmet = $row['HIZMET'];
                    $Qinttostr = $db->query("SELECT * FROM tbl_hizmet WHERE ID= '{$select2hizmet}' AND FIRMA_ID='{$user_Firma}'")->fetch(PDO::FETCH_ASSOC);
                    $Str_select2hizmet = $Qinttostr['HIZMET_ADI'];
                    $Str_select2hizmetID = $Qinttostr['ID'];
                    
                    //SURE id to string
                    $select2sure = $row['SURE'];
                    $Qinttostr = $db->query("SELECT * FROM tbl_hizmet_sure WHERE ID= '{$select2sure}'")->fetch(PDO::FETCH_ASSOC);
                    $Str_select2sure = $Qinttostr['ADI'];
                    
                    $qqq = "SELECT BOLGE_ID FROM tbl_seans_kart WHERE ID = '{$id}'";
                    $Qinttostr = $db->query($qqq, PDO::FETCH_ASSOC);

                    foreach( $Qinttostr as $rows ){ $data1 .= $rows['BOLGE_ID'].", ";}
                    $explodes = explode(', ', $data1);

                    $aasd = array_filter(array_unique($explodes));
                    sort($aasd);
                    
                    foreach ($aasd as &$deger) {
                        $qqq = "SELECT AREA FROM view_regions_id WHERE ID = '{$deger}' AND STATUS = 1";
                        $Qinttostr = $db->query($qqq)->fetch(PDO::FETCH_ASSOC);
                        $hizmetbolgeleri .= $Qinttostr['AREA'].', ';
                    }
                    
                    $estID = $row['EST_ID'];
                    $SeansBilgisi = $row['SEANS'];

            ?>
            <section id="statistics-card">
                   
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                        <a class="text-success" href="/app-customer-view.php?id=<?php echo $tckimlikno; ?>" style="font-weight:bolder;">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success"> <?=ucwords_tr($hastaadisoyadi); ?></h4>
                                    <p>M????teri Bilgisi</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-user text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success"><?=ucwords_tr($Str_select2estetisyen)?></h4>
                                    <p>Estetisyen</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-female text-info font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success"><?=ucwords_tr($Str_select2hizmet)?></h4>
                                    <p>Hizmet</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-magic text-warning font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success"><?=$SeansBilgisi?> Seans</h4>
                                    <p>Toplam Seans Say??s??</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-list-ol text-danger font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success"><?=$Str_select2sure?></h4>
                                    <p>S??re</p>
                                </div>
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-clock-o text-primary font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12" data-html="true" data-toggle="tooltip" data-original-title="Bilgilendirme*</br> Bu alandaki bilgiler <b>Genel Sat????</b> bilgilerini kapsamaktad??r. <b>Hizmet Sat????</b> ve <b>??r??n Sat????</b> olmak ??zere toplam de??erleri i??erir.">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success"><PaymentsTotal id="PaymentsTotal">0</PaymentsTotal> / <totalReceived id="totalReceived">0</totalReceived></h4>
                                    <div  class="progress progress-bar-success mt-1 mb-0" style="margin:0px 0px 0px 0px!important">
                                    
                                        <div class="progress-bar" role="progressbar" id="percentageTotalProgress" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>Toplam Al??nan ??deme [%<percentage id="percentege"></percentage>]</p>
                                </div>
                                
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="fa fa-handshake-o text-success font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $query = $db->query("SELECT k.NOT FROM tbl_seans_kart AS k WHERE id = '{$id}'")->fetch(PDO::FETCH_ASSOC); if ( $query ){ $not = $query['NOT']; } ?>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex align-items-start pb-0">
                                <div>
                                    <h4 class="text-bold-700 mb-0 text-success">Hasta Notu</h4>
                                    <h4><?=$not?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="card alert alert-primary" role="alert">
                            <h4 class="alert-heading">Uygulama B??lgeleri</h4>
                            <p class="mb-0"></p>
                                <div class="row no-gutters">
                                    <div class="col-12 col-sm-6 col-md-11">
                                        <select class="select2 form-control required border-warning" id="hizmetBolgesi" name="hizmetBolgesi[]" ></select>
                                    </div>
                                    <div class="col-2 col-md-1 ml">
                                        <button type="button" disabled="disabled" id="selectedListChange" class="btn ter bg-gradient-success"><i class="fa fa-check-circle"></i></button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php } } ?>
                <!-- Vertical Tabs start -->
                <div id="yakala"></div>
                <section id="vertical-tabs">
                    <div class="col-12">
                            <h4 class="">H??ZMET DETAYLARI</h4>
                    </div>
                </section>
                <!-- Vertical Tabs end -->

                <!-- Nav Filled Starts -->
                <section id="nav-filled">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-content">
                                    <div class="modal zoomIn text-left" id="SeansDIV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content shadowx">
                                                <div class="modal-header bg-success white">
                                                    <h5 class="modal-title" id="myModalLabel120">Seans & Kontrol ????lemleri</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="card">
                                                    <section id="add-patient">
                                                        <div class="icon-tabs">
                                                            <div class="row">
                                                                <div class="col col-lg-2" style="margin-top: 20px;">
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="card-content collapse show">
                                                                        <div class="card-body">
                                                                            <form id="FormEditSeans"
                                                                                class="add-patient-tabs steps-validation wizard-notification">
                                                                                <h4 class="form-section">
                                                                                    <i class="fa fa-calendar-check-o"></i>Seans D??zenleme ????lemi<a style="float:right;color:#28c76f" class="seansne"></a>
                                                                                </h4>
                                                                                <?php
                                                                                    if($user_Firma==176){
                                                                                        ?>
                                                                                            <fieldset id="myDiv" class="border col-md-12 mb-1 img-wrapper" style="max-height: 32em;">
                                                                                                <legend class="w-auto">G??rsel Y??kleme Alan??</legend>
                                                                                                <div class="input-group dropzone dropzone-area expensesFiles dz-clickable upload__box modal-dialog-scrollable">
                                                                                                    <div class="dz-message">Dosyalar?? buraya b??rak??n veya y??klemek i??in t??klay??n.</div>
                                                                                                </div>
                                                                                                <input type="hidden" id="expensesID" name="expensesID" value="">
                                                                                                <div class="upload__box" id="file-upload">
                                                                                                    <div class="upload__btn-box">
                                                                                                        <input type="file" style="display:none" multiple="" id="clickBtn" data-max_length="20" action="/adropzone/upload.php" class="upload__inputfile">
                                                                                                    </div>
                                                                                                    <div class="upload__img-wrap"></div>
                                                                                                </div>
                                                                                            </fieldset>
                                                                                        <?php
                                                                                    }
                                                                                ?>
                                                                                <fieldset id="AppRegFieldset" class="border col-md-12 mb-1" data-html="true" data-toggle="tooltip" data-original-title="Dikkat!</br> En az bir <b>uygulama b??lgesi</b> se??im zorunludur. <u><i>B??lge se??imi yaln??zca bu seans?? ilgilendirdi??ini l??tfen unutmay??n.</i></u>">
                                                                                    <legend class="w-auto">Uygulama B??lgesi Belirleyiniz</legend>
                                                                                    <ul id="regionsListUL" class="list-unstyled mb-0 w-100"></ul>
                                                                                </fieldset>
                                                                                <fieldset class="border col-md-12 mb-1 pb-1">
                                                                                    <legend class="w-auto">Seans Bilgisi</legend>
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <div class="form-group">
                                                                                                <label for="select2estetisyen">Tarih:
                                                                                                    <span class="danger">*</span>
                                                                                                </label>
                                                                                                <input type="datetime-local" name="inp-seans-tarih" class="form-control text-center" id="inp-seans-tarih">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="select2estetisyen">Estetisyen Se??</label>
                                                                                                <select class="form-control required" id="select2estetisyen" name="select2estetisyen"></select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-2">
                                                                                            <div class="form-group">
                                                                                                <label for="sure">Durumu:
                                                                                                </label>
                                                                                                <select class="form-control" name="inp-seans-durum" id="inp-seans-durum"></select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="OdaSecimi">Oda Se??imi: <span class="danger">*</span></label>
                                                                                                <select class="form-control" name="inp-odaSecimiSeans" id="odaSecimiSeans" require></select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <fieldset class="form-label-group mb-0">
                                                                                                <textarea class="form-control" name="inp-seans-not" id="inp-seans-not" rows="2" placeholder="Seans Notu"></textarea>
                                                                                                <label for="inp-seans-not">Seans Notu</label>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="text-align: center;display:none" id="result-edit">
                                                                                        <div class="alert alert-warning" role="alert">
                                                                                            <h4 class="alert-heading">Dikkat!</h4>
                                                                                            <p class="mb-0">Gelecek tarih i??in <b>(Seans ??ptali)</b> d??????nda i??lem yap??lamaz.</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2" style="display:none">
                                                                                        <div class="form-group">
                                                                                            <div class="input-group">
                                                                                                <input class="form-control" id="inp-edit-seans-ids" name="inp-edit-seans-ids">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                                <div class="form-group" style="float:right">
                                                                                    <button type="button" class="btn btn-secondary btn-sm " data-dismiss="modal">??ptal</button>
                                                                                    <button type="button" id="seansGuncelle" class="btn btn-success btn-sm">Seans?? G??ncelle</button>
                                                                                </div>
                                                                                <div id="seansDateCheck" class="table-responsive" style="display:none"></div>
                                                                                <hr>
                                                                            </form>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <form id="FormAddkontrol" class="add-patient-tabs steps-validation wizard-notification">
                                                                                <h4 class="form-section">
                                                                                    <i class="fa fa-calendar-plus-o"></i>Kontrol Seans ????lemi<a style="float:right;color:#28c76f" class="seansnekontrol"></a>
                                                                                </h4>
                                                                                <fieldset class="border col-md-12 mb-1 pb-1">
                                                                                    <legend class="w-auto">Kontrol Seans Bilgisi</legend>

                                                                                    <div class="row">
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="select2estetisyen">Tarih: <span class="danger">*</span>
                                                                                                </label>
                                                                                                <input type='date' class='form-control' id='inp-kontrol-seans-tarih' name='inp-kontrol-seans-tarih'>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="seans">Saat: <span class="danger">*</span>
                                                                                                </label>
                                                                                                <div
                                                                                                    class="position-relative has-icon-left">
                                                                                                    <input type="time" class="form-control" id="inp-kontrol-seans-start" name="inp-kontrol-seans-start">
                                                                                                    <div class="form-control-position" style="width: 5%;">
                                                                                                        <i class="ft-clock"></i>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="sure">Durumu:</label>
                                                                                                <select class="form-control" name="inp-kontrol-seans-durum" id="inp-kontrol-seans-durum"></select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="odaSecimiKontrol">Oda Se??imi:</label>
                                                                                                <select class="form-control" name="inp-odaSecimiKontrol" id="odaSecimiKontrol">
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <fieldset class="form-label-group mb-0">
                                                                                                <textarea class="form-control" name="inp-kontrol-not" id="inp-kontrol-not" rows="2" placeholder="Kontrol Notu"></textarea>
                                                                                                <label for="inp-kontrol-not">Kontrol Notu</label>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="text-align: center;display:none"
                                                                                        id="result-kontrol">
                                                                                        <div class="alert bg-warning alert-icon-right alert-dismissible mb-2 text-white" role="alert"> 
                                                                                            <span class="alert-icon"><i class="la la-warning"></i></span>
                                                                                            <strong>Dikkat!</strong> Gelecek tarih i??in <b>(Seans ??ptali)</b> d??????nda i??lem yap??lamaz.
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2" style="display:none">
                                                                                        <div class="form-group">
                                                                                            <div class="input-group">
                                                                                                <input class="form-control" id="inp-kontrol-seans-ids" name="inp-kontrol-seans-ids">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                                <div class="form-group" style="float:right">
                                                                                    <button type="button" class="btn btn-secondary btn-sm bold" data-dismiss="modal">??ptal</button>
                                                                                    <button type="button" id="kontrolGuncelle" class="btn btn-success btn-sm">Kontrol [Ekle / G??ncelle]</button>
                                                                                </div>
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
                                    </div>
                                    <div class="modal" id="TaksitYapilandir" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"  aria-labelledby="myModalLabel16" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-success white">
                                                    <h5 class="modal-title" id="myModalLabel110">??deme Yap??land??rma</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">??</span>
                                                    </button>
                                                </div>
                                                <div id="model-body">
                                                    <div class="col-12">
                                                        <div class="card-content collapse show">
                                                            <?php
                                                            foreach (yetkiSor($kullaniciadi) as $yetki);
                                                            if($yetki['MUSTR_HZMT_SEANS_ISLM'] != 1){
                                                                echo "<h1 style='text-align:center;'>Bu i??lemi yapma yetkiniz yok</h1>";
                                                            }else{ ?>
                                                                <div class="modal-body">
                                                                    <form id="formOdemeYapilandirma" class="was-validated">
                                                                        <div id="form-row">
                                                                            <fieldset class="border col-md-12 container-fluid">
                                                                                <legend class="w-auto">Hizmet Fiyatland??rma</legend>
                                                                                <div class="row">
                                                                                    <div class="col-md-12"  data-html="true" data-toggle="tooltip" data-original-title="Hizmet fiyat??n?? de??i??tirmek istedi??inize eminseniz<br>l??tfen ??ift t??klay??n." data-placement="bottom" data-trigger="focus">
                                                                                        <div class="form-group">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-prepend">
                                                                                                    <select class="form-control bolder required" name="inp-hizmet-currency" id="inp-hizmet-currency" title="D??viz Se??iniz" required>
                                                                                                        <option value="">D??viz?</option>
                                                                                                        <option value="TRY">TRY</option>
                                                                                                        <option value="USD">USD</option>
                                                                                                        <option value="EUR">EUR</option>
                                                                                                        <option value="GBP">GBP</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <input type="number" class="form-control pointer required" id="fiyat" onfocus="this.select();" data-index="1" onmouseup="return false;" placeholder="Hizmet Fiyat??" aria-label="" name="fiyat" readonly="true" ondblclick="this.readOnly='';" required>
                                                                                                <div class="input-group-append">
                                                                                                    <span class="input-group-text">.00</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>
                                                                            <br>
                                                                            <fieldset class="border col-md-12">
                                                                                <legend  class="w-auto">??deme Yap??land??rma</legend>
                                                                                <div class="row">
                                                                                    <div class="col-md-6 mt-1">
                                                                                        <div class="form-group">
                                                                                            <div id="taksitsayisiDiv">
                                                                                            <input type="number" class="form-control required" id="taksitsayisi" min="1" max="12" placeholder="Taksit Say??s??" aria-label="" name="taksitsayisi" aria-invalid="false" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6 mt-1">
                                                                                        <div class="form-group">
                                                                                            <input type="number" class="form-control required" id="odemeturu" placeholder="??deme T??r??" aria-label="" name="odemeturu" aria-invalid="false" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="taksitDT">Taksit Tarihi
                                                                                                <span class="danger">*</span>
                                                                                            </label>                                                                      
                                                                                            <input type="date" class="form-control required" id="taksitDT" placeholder="Taksit Tarihi" data-index="2" aria-label="" name="taksitDT" aria-invalid="false" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label id="ilkOdeme" for="odeme">??deme Girin:<span class="danger">*</span></label>
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-prepend">
                                                                                                    <select class="form-control bolder required" name="inp-odeme-currency" id="inp-odeme-currency" title="D??viz T??r??" required>
                                                                                                        <option value="">D??viz?</option>
                                                                                                        <option value="TRY">TRY</option>
                                                                                                        <option value="USD">USD</option>
                                                                                                        <option value="EUR">EUR</option>
                                                                                                        <option value="GBP">GBP</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                                <input type="number" class="form-control required" id="odeme" onfocus="this.select();" data-index="3" onmouseup="return false;" placeholder="??n ??deme" aria-label="" name="odeme" required>
                                                                                                <div class="input-group-append">
                                                                                                    <span class="input-group-text">.00</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="odeme">Kalan ??deme:</label>
                                                                                            <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text"><?php echo $currency; ?></span>
                                                                                            </div>
                                                                                            <input type="number" class="form-control no-required" id="kalan" placeholder="Kalan"  aria-label="" name="kalan" disabled="">
                                                                                                <div class="input-group-append">
                                                                                                    <span class="input-group-text">.00</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer center">
                                                    <button type="submit" class="btn bg-gradient-success waves-effect waves-light mr-auto" onclick="PaymentFunction()">Yap??land??r</button>
                                                    <button type="button" class="btn bg-gradient-warning waves-effect waves-light" data-dismiss="modal">Vazge??</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal animated bounceInUp text-left" id="SeansEditDIV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content shadowx">
                                                <div class="card">
                                                    <section id="add-patient">
                                                        <div class="icon-tabs">
                                                            <div class="row">
                                                                <div class="col" style="margin-top: 20px;margin-left: 20px;">
                                                                    <h2 class="card-title">Seans Ekleme</h2>
                                                                </div>
                                                                <div class="col col-lg-2" style="margin-top: 20px;">
                                                                    <h6 style="color:red;font-weight: bolder" class="seansne"></h6>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="card-content collapse show">
                                                                        <?php
                                                                        foreach (yetkiSor($kullaniciadi) as $yetki);
                                                                        if($yetki['MUSTR_HZMT_SEANS_ISLM'] != 1){
                                                                            echo "<h1 style='text-align:center;'>Bu i??lemi yapma yetkiniz yok</h1>";
                                                                        }else{ ?>
                                                                        <div class="card-body">
                                                                            <form id="FormEkleSeans"
                                                                                class="add-patient-tabs steps-validation wizard-notification">
                                                                                <fieldset>
                                                                                    <div class="row">
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="select2estetisyen">
                                                                                                    Eklenecek Seans: <span class="danger">*</span>
                                                                                                </label>
                                                                                                <input type="number" class="form-control" id="seansnumber" max="5" maxlength="6" value="" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="seansfark">
                                                                                                    Seanslar Aras?? Fark:
                                                                                                    <span class="danger">*</span>
                                                                                                </label>
                                                                                                <input type="number" class="form-control" id="seansfark" max="60" maxlength="6" value="" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="sure">
                                                                                                    .
                                                                                                </label>
                                                                                                <div style="text-align:right">
                                                                                                    <button type="button"
                                                                                                        class="btn btn-secondary "
                                                                                                        data-dismiss="modal">??ptal</button>
                                                                                                    <button type="button" id="seansEkle"
                                                                                                        class="btn btn-success ">Ekle</button>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div style="text-align: center;display:none"
                                                                                        id="result-edit">
                                                                                        <div class="alert bg-warning alert-icon-right alert-dismissible mb-2"
                                                                                            role="alert">
                                                                                            <span class="alert-icon"><i
                                                                                                    class="la la-warning"></i></span>
                                                                                            <strong>Dikkat!</strong><a> Gelecek tarih i??in
                                                                                                <b>(Seans ??ptali)</b> d??????nda i??lem
                                                                                                yap??lamaz.</a>.
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-2" style="display:none">
                                                                                        <div class="form-group">
                                                                                            <div class="input-group">
                                                                                                <input class="form-control"
                                                                                                    id="inp-seans-ids" name="inp-seans-ids">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </form>
                                                                            <div class="table-responsive">
                                                                                <table id="seansaddform"
                                                                                    class="table table-striped table-bordered patients-list"
                                                                                    id="tbl_hastalistesi">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th width="5%">SEANS</th>
                                                                                            <th width="13%">SEANS TARH.</th>
                                                                                            <th width="8%">SEANS SAAT??</th>
                                                                                            <th width="11%">SEANS S??RES??</th>
                                                                                            <th width="5%">DURUM</th>
                                                                                            <th width="1%">????lemler</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                        $query = $db->query("SELECT
                                                                        ID,
                                                                        SEANS_ID,
                                                                        SEANS_TARIH,
                                                                        SEANS_SAAT,
                                                                        (SELECT ADI FROM tbl_hizmet_sure WHERE ID=SEANS_SURE ) AS SEANS_SURE,
                                                                        ISLEM_TARIHI,
                                                                        ( to_days( `SEANS_TARIH` ) - to_days( curdate()) ) AS `KALANGUN`,
                                                                        DURUM,
                                                                        SEANS_DURUM 
                                                                        FROM
                                                                        tbl_seans_detay 
                                                                        WHERE
                                                                        KART_ID =  '{$id}' AND FIRMA_ID='{$user_Firma}'", PDO::FETCH_ASSOC);
                                                                        if ( $query->rowCount() ){
                                                                            foreach( $query as $row )
                                                                            {
                                                                                $durum = $row['SEANS_DURUM'];
                                                                        
                                                                                $kalangun  = $row['KALANGUN'];
                                                                        
                                                                                $bul      = "-";
                                                                                $degistir = "";
                                                                                $kalangunx = str_replace($bul, $degistir, $kalangun);
                                                                        
                                                                                print "<tr";
                                                                                    if($durum==2){ echo ' class="onaylandi"';}
                                                                                    if($durum==1){ echo ' class="iptal"';}
                                                                                                    print ">";
                                                                                                    print '<td>'. $row['SEANS_ID'].'</td>';
                                                                                    print '<td>';
                                                                                    print date('d.m.Y', strtotime($row['SEANS_TARIH'])).' ~ ';
                                                                                    if($kalangun==0){ echo "Bug??n";}
                                                                                    else if($kalangun<0){ echo $kalangunx; echo ' g??n ge??ti'; }
                                                                                    else if($kalangun>0){ echo $kalangunx; echo ' g??n kald??'; }
                                                                                    echo '</td>';
                                                                            
                                                                                    print '<td>'.$row['SEANS_SAAT'].'</td>';
                                                                                    print '<td>'.$row['SEANS_SURE'].'</td>';
                                                                                    print '<td>';
                                                                                                    if($durum==0) echo "<b style='font-weight:bolder;color:#c2246e'>Gelmedi";
                                                                                                    else if($durum==1) echo "<b style='color:red;font-weight:bolder'>??ptal</b>";
                                                                                                    else if($durum==2) echo "<b style='color:#28d094;'>Geldi</b>";
                                                                                    echo '</td>';
                                                                                    print'<td><button type="button" class="btn btn-danger round btn-sm seansSil" data-toggle="modal" ids="'.$row['ID'].'"';?> ><?php print 'Sil</button></td>';
                                                                                print "</tr>";
                                                                        }
                                                                        }else{
                                                                        print "<tr style='height:40px'>";
                                                                        print '<td></td>';
                                                                        print '<td></td>';
                                                                        print '<td></td>';
                                                                        print '<td></td>';
                                                                        print '<td></td>';
                                                                        print "</tr>";
                                                                        }
                                                                        ?>
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <tr>
                                                                                            <th>SEANS</th>
                                                                                            <th>SEANS TARH.</th>
                                                                                            <th>SEANS SAAT??</th>
                                                                                            <th>SEANS S??RES??</th>
                                                                                            <th>DURUM</th>
                                                                                            <th>????lemler</th>
                                                                                        </tr>
                                                                                    </tfoot>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        </p>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="session-schedule-tab" data-toggle="tab" href="#session-schedule" role="tab" aria-controls="session-schedule" aria-selected="true">Seans ??izgelesi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="session-payment-tab" data-toggle="tab" href="#session-payment" role="tab" aria-controls="session-payment" aria-selected="false">Taksit / Tahsilat ??izelgesi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="session-product-tab" data-toggle="tab" href="#session-product" role="tab" aria-controls="session-product" aria-selected="false">Kullan??lan ??r??nler</a>
                                            </li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content pt-1 col-md-12">
                                            <div class="tab-pane fade show active" id="session-schedule" role="tabpanel" aria-labelledby="session-schedule-tab">
                                                <?php foreach (yetkiSor($kullaniciadi) as $yetki);
                                                    if($yetki['MUSTR_HZMT_SEANS_LST'] != 1){
                                                    echo "<h1 style='text-align:center;'>Bu i??lemi yapma yetkiniz yok</h1>";
                                                    }else{ ?>
                                                    <div class="table-responsive">
                                                        <table id="tblSchedule" class="table table-striped table-bordered nowrap" style="text-align:center" cellspacing="0" width="100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>SEANS</th>
                                                                    <th>ODA</th>
                                                                    <th>ESTET??SYEN</th>
                                                                    <th>B??LGE</th>
                                                                    <th>TAR??H</th>
                                                                    <th>SAAT</th>
                                                                    <th>S??RE</th>
                                                                    <th>DURUM</th>
                                                                    <th>????LEM</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                    <button type="button" class="btn btn-danger round btn-sm float-right mb-3" data-toggle="modal" data-target="#SeansEditDIV">Seans Ekle / ????kar</button>
                                                <?php } ?>
                                            </div>
                                            <div class="tab-pane fade" id="session-payment" role="tabpanel" aria-labelledby="session-payment-tab">
                                                <?php foreach (yetkiSor($kullaniciadi) as $yetki);
                                                if($yetki['MUSTR_HZMT_TKST_LST'] != 1){
                                                    echo "<h1 style='text-align:center;'>Bu alan?? g??rme yetkiniz yok</h1>";
                                                }else{ ?>
                                                <div class="table-responsive">
                                                    <table id="tblPayment" class="table table-striped table-bordered nowrap" style="text-align:center" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>TAKS??T ID</th>
                                                                <th>TAKS??T TAR??H??</th>
                                                                <th>TAHS??LAT T??P??</th>
                                                                <th>F??YAT</th>
                                                                <th>??DEME</th>
                                                                <th>PERSONEL</th>
                                                                <th>????LEM</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                                <div id="yapilandirmaDiv">
                                                    <button type="button" data-toggle="modal" data-target="#TaksitYapilandir" class="btn btn-sm bg-gradient-danger mb-1 waves-effect waves-light float-right"><i class="fa fa-refresh"></i> Yeni ??deme Yap??land??r</button>
                                                </div>
                                                <br>
                                                <hr>
                                                <div class="col-12">
                                                    <h6>Al??nan ??deme % Oran??</h6>
                                                    <div class="progress progress-bar-success progress-xl waves-effect waves-light">
                                                        <div id="percentageServiceProgress" class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" ><ServicePercentege id="ServicePercentege">0 %</ServicePercentege></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-start pb-0" style="box-shadow: 0px 0px 14px 0px #adadad;">
                                                                    <div>
                                                                        <h4 class="text-bold-700 mb-0 text-warning" id="ServiceTotal">0</h4>
                                                                        <p>Hizmet Fiyat??</p>
                                                                    </div>
                                                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                                                        <div class="avatar-content">
                                                                            <i class="fa fa-tag text-warning font-medium-5"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-start pb-0" style="box-shadow: 0px 0px 14px 0px #adadad;">
                                                                    <div>
                                                                        <h4 class="text-bold-700 mb-0 text-success" id="ServiceReceived"></h4>
                                                                        <p>Toplam Al??nan</p>
                                                                    </div>
                                                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                                                        <div class="avatar-content">
                                                                            <i class="fa fa-check text-success font-medium-5"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-start pb-0" style="box-shadow: 0px 0px 14px 0px #adadad;">
                                                                    <div>
                                                                        <h4 class="text-bold-700 mb-0 text-danger" id="ServiceRemainingDebt"></h4>
                                                                        <p>Kalan ??deme Toplam??</p>
                                                                    </div>
                                                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                                                        <div class="avatar-content">
                                                                            <i class="fa fa-times text-danger font-medium-5"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <?php } ?>
                                            </div>
                                            <div class="tab-pane fade" id="session-product" role="tabpanel" aria-labelledby="session-product-tab">
                                                <div class="table-responsive">
                                                    <table id="tblProduct" class="table table-striped table-bordered nowrap" style="text-align:center" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>??R??N ADI</th>
                                                                <th>??L??EK</th>
                                                                <th>??DEME T??P??</th>
                                                                <th>F??YAT</th>
                                                                <th>TAR??H</th>
                                                                <th>??DEME</th>
                                                                <th>KULLANICI</th>
                                                                <th>????LEM</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <button type="button" style="float:right" class="btn bg-gradient-primary round btn-sm UrunEkle" data-toggle="modal" data-target="#UrunEkleLightbox">
                                                    <i class="fa fa-plus"></i> Bu M????teriye ??r??n Kullan</button>
                                                </div>
                                                <br>
                                                <hr>
                                                <div class="col-12">
                                                    <h6>Al??nan ??deme % Oran??</h6>
                                                    <div class="progress progress-bar-success progress-xl waves-effect waves-light">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" id="percentageProductProgress"><ProductPercentege id="ProductPercentege">0 %</ProductPercentege></div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-start pb-0" style="box-shadow: 0px 0px 14px 0px #adadad;">
                                                                    <div>
                                                                        <h4 class="text-bold-700 mb-0 text-warning" id="ProductTotal"></h4>
                                                                        <p>Toplam ??r??n Fiyat??</p>
                                                                    </div>
                                                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                                                        <div class="avatar-content">
                                                                            <i class="fa fa-tag text-warning font-medium-5"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-start pb-0" style="box-shadow: 0px 0px 14px 0px #adadad;">
                                                                    <div>
                                                                        <h4 class="text-bold-700 mb-0 text-success" id="ProductReceived"></h4>
                                                                        <p>Toplam Al??nan</p>
                                                                    </div>
                                                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                                                        <div class="avatar-content">
                                                                            <i class="fa fa-check text-success font-medium-5"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-sm-6 col-12">
                                                            <div class="card">
                                                                <div class="card-header d-flex align-items-start pb-0" style="box-shadow: 0px 0px 14px 0px #adadad;">
                                                                    <div>
                                                                        <h4 class="text-bold-700 mb-0 text-danger" id="ProductRemainingDebt"></h4>
                                                                        <p>Kalan ??deme Toplam??</p>
                                                                    </div>
                                                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                                                        <div class="avatar-content">
                                                                            <i class="fa fa-times text-danger font-medium-5"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal animated bounceInRight text-left" id="TahsilatDIV" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content shadowx">
                                <div class="card">
                                    <section id="add-patient">
                                        <div class="icon-tabs">
                                            <div class="row">
                                                <div class="col" style="margin-top: 20px;margin-left: 20px;">
                                                    <h2 class="card-title">Tahsilat D??zenleme</h2>
                                                </div>
                                                <div class="col col-lg-2" style="margin-top: 20px;">
                                                    <h6 style="color:red;font-weight: bolder" id="taksitne"></h6>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card-content collapse show">
                                                        <?php
                                            foreach (yetkiSor($kullaniciadi) as $yetki);
                                                if($yetki['MUSTR_HZMT_TKST_ISLM'] != 1){
                                                    echo "<h1 style='text-align:center;'>Bu i??lemi yapma yetkiniz yok</h1>";
                                                }else{ ?>
                                                        <div class="card-body">
                                                            <form id="FormEditTahsilat" class="add-patient-tabs steps-validation wizard-notification">
                                                                <fieldset>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="select2estetisyen">
                                                                                    Tahsilat Tarihi:
                                                                                    <span class="danger">
                                                                                        *
                                                                                    </span>
                                                                                </label>
                                                                                <input type='date' class="form-control"
                                                                                    id='inp-tahsilat-tarih'
                                                                                    name='inp-tahsilat-tarih'>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="sure">
                                                                                    Tahsilat Durum:
                                                                                </label>
                                                                                <input class="form-control"
                                                                                    id="inp-tahsilat-form-durum"
                                                                                    name="inp-tahsilat-form-durum">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 payStatus">
                                                                            <div class="form-group">
                                                                                <label for="sure">
                                                                                    Fiyat:
                                                                                </label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <select class="form-control bolder required" id="inp-tahsilat-edit-currency" title="D??viz Se??iniz" disabled>
                                                                                            <option value="">D??viz?</option>
                                                                                            <option value="TRY">TRY</option>
                                                                                            <option value="USD">USD</option>
                                                                                            <option value="EUR">EUR</option>
                                                                                            <option value="GBP">GBP</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <input class="form-control" type="number" id="inp-tahsilat-fiyat" name="inp-tahsilat-fiyat">
                                                                                    <input  class="form-control" type="hidden" id="inp-tahsilat-fiyats" name="inp-gtm" >
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">.00</span>
                                                                                        <button type="button" id="tahsilatIptali" class="btn btn-danger "> <i style="font-size:15px" class="la la-chevron-left"></i> ??deme ??ptali</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 payStatus">
                                                                            <div class="form-group">
                                                                                <label for="sure">
                                                                                    Tahsilat Tipi:
                                                                                </label>
                                                                                <input type="text" class="form-control"
                                                                                    id="inp-tahsilat-form-tipi"
                                                                                    aria-label=""
                                                                                    name="inp-tahsilat-form-tipi"
                                                                                    aria-invalid="false">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2" style="display:none">
                                                                        <div class="form-group">
                                                                            <div class="input-group">
                                                                                <input class="form-control" id="taksitid"
                                                                                    name="taksitid">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div id="tahsilatBtn" style="text-align:right">
                                                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">??ptal</button>
                                                                    <button type="button" id="tahsilatGuncelle" class="btn btn-success ">G??ncelle</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal animated bounceInDown text-left" id="UrunEkleLightbox" role="dialog"
                        aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content shadowx">
                                <div class="card">
                                    <section id="add-patient">
                                        <div class="icon-tabs">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-content collapse show">
                                                        <?php
                                                foreach (yetkiSor($kullaniciadi) as $yetki);
                                                if($yetki['HZMT_ISLM'] != 1){
                                                    echo "<h1 style='text-align:center;'>Bu alan?? g??rme yetkiniz yok</h1>";
                                                }else{ ?>
                                                        <div class="card-body">
                                                            <h2 class="card-title">Yeni ??r??n Ekle</h2>
                                                            <div class="default-collapse collapse-bordered alert alert-light">
                                                                <div class="card collapse-header">
                                                                    <div id="headingCollapse1" class="card-header" data-toggle="collapse" role="button" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                                                        <span class="lead collapse-title success">
                                                                            <i class="feather icon-star success"></i>
                                                                        EstetikPanel FIFO Tekni??i ile Stok Y??netimi sa??lar
                                                                        </span>
                                                                    </div>
                                                                    <div id="collapse1" role="tabpanel" aria-labelledby="headingCollapse1" class="collapse">
                                                                        <div class="card-content">
                                                                            <div class="card-body">
                                                                            FIFO: First In First Out olarak k??salt??lm????t??r. Bu teknikte stoklanan veya ilk getirilen ??r??nlerin ??nce hareket etmesi yani ??nce depodan ????kmas??n??n gereklili??i kural??d??r. Deponuzda bulunan ??ok partili bir ??r??n??n "??nce tarihli giri?? yap??lan ??r??n" i??leminize sunulur.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <form id="FormUrunEkle"
                                                                class="add-patient-tabs steps-validation wizard-notification">
                                                                <fieldset>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="select2estetisyen">
                                                                                    ??r??n Ad??:
                                                                                    <span class="danger">*</span>
                                                                                </label>
                                                                                <select class="select2 form-control required" id="inp-urun-adi" name="inp-urun-adi"></select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="sure">
                                                                                    Tahsilat Durum:
                                                                                </label>
                                                                                <input class="form-control" id="inp-urun-tahsilat-durum" name="inp-urun-tahsilat-durum" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="sure"  data-html="true" data-toggle="tooltip" data-original-title="Dikkat!</br>Fiyatta de??i??iklik yap??lmayacaksa</br>bu alan?? de??i??tirmeyiniz.">
                                                                                    Fiyatta De??i??iklik <i style="color:red">[?]</i>
                                                                                </label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <select class="form-control bolder required" name="inp-currency" id="inp-currency" title="D??viz Se??iniz">
                                                                                        </select>
                                                                                    </div>
                                                                                    <input type="number" class="form-control required" id="inp-fiyat" aria-label="" name="inp-fiyat">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">.00</span>
                                                                                    </div>
                                                                                    <input style="display:none" id="inp-product-text" name="inp-product-text">
                                                                                    <input style="display:none" id="inp-product-scale" name="inp-product-scale">
                                                                                    <input style="display:none" id="inp-product-type" name="inp-product-type">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6 payStatus">
                                                                            <div class="form-group">
                                                                                <label for="sure">
                                                                                    Tahsilat Tipi:
                                                                                </label>
                                                                                <input type="text" class="form-control" id="inp-urun-tahsilat-form-tipi" aria-label="" name="inp-urun-tahsilat-form-tipi" aria-invalid="false">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <div id="sonuc"
                                                                    style="text-align: left;color:red;font-weight: bolder">
                                                                </div>
                                                                <div style="text-align:right">
                                                                    <button type="button" id="urunEkle"
                                                                        class="btn btn-success ">Ekle</button>
                                                                    <button type="button" class="btn btn-secondary "
                                                                        data-dismiss="modal">??ptal</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal animated bounceInUp text-left" id="HizmetDuzenleDIV" role="dialog"
                        aria-labelledby="myModalLabel16" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content shadowx">
                                <div class="card">
                                    <section id="add-patient">
                                        <div class="icon-tabs">
                                            <div class="row">
                                                <div class="col" style="margin-top: 20px;margin-left: 20px;">
                                                    <h2 class="card-title">??r??n D??zenleme</h2>
                                                </div>
                                                <div class="col-12">
                                                    <div class="card-content collapse show">
                                                        <?php foreach (yetkiSor($kullaniciadi) as $yetki);
                                                        if($yetki['HZMT_ISLM'] != 1){ echo "<h1 style='text-align:center;'>Bu alan?? g??rme yetkiniz yok</h1>"; 
                                                        }else{ ?>
                                                        <div class="card-body">
                                                            <form id="FormEditUrun" class="add-patient-tabs steps-validation wizard-notification">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="inp-edit-urun-adi">??r??n Ad??: <span class="danger">*</span></label>
                                                                            <select class="select2 form-control required" id="inp-edit-urun-adi" name="inp-edit-urun-adi"></select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="sure"  data-html="true" data-toggle="tooltip" data-original-title="Dikkat!</br>Fiyatta de??i??iklik yap??lmayacaksa</br>bu alan?? de??i??tirmeyiniz.">
                                                                                Fiyatta De??i??iklik <i style="color:red">[?]</i>
                                                                            </label>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <select class="form-control bolder required" name="inp-edit-urun-currency" id="inp-edit-urun-currency" title="D??viz Se??iniz">
                                                                                    </select>
                                                                                </div>
                                                                                <input type="number" class="form-control required" id="inp-edit-urun-fiyat" aria-label="" name="inp-edit-urun-fiyat">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text">.00</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="inp-edit-urun-tahsilat-durum">Sat???? Durumu:
                                                                                <span class="danger">*</span>
                                                                            </label>
                                                                            <input style="display:none" id="kartid" value="<?php echo $id; ?>" name="kartid">
                                                                            <input style="display:none" id="hizmetid" name="hizmetid">
                                                                            <input style="display:none" id="inp-edit-product-text" name="inp-edit-product-text">
                                                                            <input style="display:none" id="inp-edit-product-scale" name="inp-edit-product-scale">
                                                                            <input style="display:none" id="inp-edit-product-type" name="inp-edit-product-type">
                                                                            <input class="form-control" id="inp-edit-urun-tahsilat-durum" name="inp-edit-urun-tahsilat-durum" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="inp-edit-urun-tahsilat-tipi">
                                                                                Tahsilat Tipi:
                                                                            </label>
                                                                            <input type="text" class="form-control" id="inp-edit-urun-tahsilat-tipi" aria-label="" name="inp-edit-urun-tahsilat-tipi" aria-invalid="false">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align:right">
                                                                    <button type="button" id="urunGuncelle" class="btn btn-success ">G??ncelle</button>
                                                                    <button type="button" class="btn btn-secondary " data-dismiss="modal">??ptal</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Nav Filled Ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php';?>
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- <script src="/app-assets/vendors/js/tables/datatable/datatables.js"></script> -->
    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="/app-assets/js/scripts/popover/popover.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="/app-assets/vendors/js/extensions/dropzone.min.js"></script> -->
   <!-- <script src="/app-assets/vendors/js/forms/form-file-uploader.js"></script> -->

    <!-- END: Footer-->
    <script>
    $(document).ready(function(){

        var d = $('#myDiv');
        d.scrollTop(d.prop("scrollHeight"));

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
        $( ".expensesFiles" ).on( "click", function(e) {
            var tag = e.target.tagName.toLowerCase();
            if (tag === 'div') {
                $("#clickBtn").click();
            }
        });

        function makeid(length) {
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }


        function scaleDataURL(dataURL) {
         return new Promise((done) => {
            var img = new Image()
            img.onload = () => {
                var scale, newWidth, newHeight, canvas, ctx
                WIDTH = 1920;
            //    WIDTH = (img.width/100) * 25;
                newWidth = img.width * scale
                newHeight = img.height * scale
                canvas = document.createElement('canvas')
            //    canvas.height = newHeight
            //    canvas.width = newWidth
                let ratio = WIDTH / img.width;
                canvas.width = WIDTH;
                canvas.height = img.height * ratio;
                ctx = canvas.getContext('2d')
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                done(canvas.toDataURL('image/webp', 0.5))
            }
            img.src = dataURL
         })
      }


        jQuery(document).ready(function () {
            ImgUpload();
        });

        function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('#file-upload').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $('.expensesFiles');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {
                    var fileName = null;
                    const compIDs = localStorage.getItem('CompID');
                    const SeansIDs = localStorage.getItem('SeansID');
                    const SessionID = localStorage.getItem('SessionID');
                    fileName = compIDs + '-' + '<?php echo $id; ?>' + '-' + SeansIDs + '-' + makeid(5)+'.'+ f.name.split('.').pop();
                    f.name = fileName;
                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                            len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                scaleDataURL(e.target.result)
                                .then((newBase64data) => {
                                    $.ajax({
                                        url:"/adropzone/file-process.php",
                                        data:{
                                            type: 'upload',
                                            sessionID: SessionID,
                                            base64: newBase64data,
                                            imageName: fileName
                                        },
                                        type:"post",
                                        complete:function(){
                                            toastr.success('Foto??raf y??klendi.', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                                        }
                                    });
                                })
                                .catch((err) => console.log(err))
                                
                                var html2 = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + fileName + "' class='img-bg'><div ids='"+fileName+"' class='upload__img-close'></div></div></div>";
                                var html = `<div class="dz-preview dz-file-preview">                                    
                                    <div class="dz-image">
                                        <a data-toggle="lightbox" data-gallery="example-gallery" href="/adropzone/upload/`+e.target.result+`">
                                            <img src="/adropzone/upload/`+e.target.result+`" />
                                        </a>
                                    </div>
                                    <div class="dz-remove" ids="`+fileName+`"><i class="fa fa-times-circle-o" style="cursor: pointer;font-size: 1.85rem;padding-top: 0.2em;"></i></div>
                                    </div>`;
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".dz-remove", function (e) {
            
            Swal.fire({
                title: "Ger??ekten mi?",
                text: "Bu foto??raf?? silmek istedi??inize emin misiniz?",
                width:600,
                padding: '2em',
                showClass: {
                    popup: 'animate__animated animate__flipInX'
                },
                imageUrl: '/app-assets/images/caps/cmylmz-eminmisin.jpg',
                showCancelButton: true,
                cancelButtonText: "Hay??r, Vazge??tim",
                confirmButtonText: "Evet, Hemen Sil",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"/adropzone/file-process.php",
                        data:{
                            type: 'delete',
                            imageName: $(this).attr('ids')
                        },
                        type:"post",
                        complete:function(){
                            toastr.success('Foto??raf silindi.', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                        }
                    });
                    $(this).parent().remove();
                    
                } else {
                    Swal.fire("??ptal Edildi", "Silme i??lemi iptal edildi..", "info");
                }
            });
        });
        }
        $.ajax({
            type: "POST",
            url: "/api/session-details/payment-summary.php",
            data: { ids : <?=$id;?> },
            success: function(res) {
                var obj = JSON.parse(res);
                var CurrencyService = obj[0]['PaymentServices'][0]['Currency'];
                var paymentTotal = obj[0]['Payments']['Total'];
                var paymentReceive = obj[0]['Payments']['Receive'];
                var TotalPercentage = paymentReceive / (paymentTotal / 100);
                
                var paymentServiceTotal = obj[0]['PaymentServices'][0]['Price'];
                var paymentServiceReceive = obj[0]['PaymentServices'][0]['Received'];
                var paymentServiceRemainingDebt = obj[0]['PaymentServices'][0]['RemainingDebt'];
                var paymentServiceCurrency = obj[0]['PaymentServices'][0]['Currency'];
                var ServicePercentage = paymentServiceReceive / (paymentServiceTotal / 100);

                var paymentProductTotal = obj[0]['PaymentProducts']['Total'];
                var paymentProductReceive = obj[0]['PaymentProducts']['Receive'];
                var paymentProductRemainingDebt = paymentProductTotal - paymentProductReceive;
                var ProductPercentage = paymentProductReceive / (paymentProductTotal / 100);

                if(obj[0]){
                    $('.currencyInput').html(CurrencyService);
                    $('#fiyat').val(paymentServiceTotal);
                    $("#inp-tahsilat-fiyat").attr({
                        "max" : paymentServiceRemainingDebt
                    });
                    $("#inp-hizmet-currency").val(paymentServiceCurrency).trigger("change");


                    $('#PaymentsTotal').html(paymentTotal+' '+CurrencyService);
                    $('#totalReceived').html(paymentReceive+' '+CurrencyService);
                    $('#percentege').html(parseInt(TotalPercentage).toLocaleString());
                    $('#percentageTotalProgress').css('width',TotalPercentage+'%');

                    $('#ServiceTotal').html(paymentServiceTotal+' '+CurrencyService);
                    $('#ServiceReceived').html(paymentServiceReceive+' '+CurrencyService);
                    $('#ServiceRemainingDebt').html(paymentServiceRemainingDebt+' '+CurrencyService);
                    $('#ServicePercentege').html(parseInt(ServicePercentage).toLocaleString()+' %');
                    $('#percentageServiceProgress').css('width',ServicePercentage+'%');

                    $('#ProductTotal').html(parseInt(paymentProductTotal).toLocaleString()+' '+CurrencyService);
                    $('#ProductReceived').html(parseInt(paymentProductReceive).toLocaleString()+' '+CurrencyService);
                    $('#ProductRemainingDebt').html(parseInt(paymentProductRemainingDebt).toLocaleString()+' '+CurrencyService);
                    $('#ProductPercentege').html(parseInt(ProductPercentage).toLocaleString()+' %');
                    $('#percentageProductProgress').css('width',ProductPercentage+'%');
                }
            }
        });
        let url = location.href.replace(/\/$/, "");
        if (location.hash) {
            const hash = url.split("#");
            $('#myTab a[href="#'+hash[1]+'"]').tab("show");
            url = location.href.replace(/\/#/, "#");
            history.replaceState(null, null, url);
            setTimeout(() => {
                $(window).scrollTop(0);
            }, 400);
        } 
        
        $('a[data-toggle="tab"]').on("click", function() {
        let newUrl;
        const hash = $(this).attr("href");
        if(hash == "#session-schedule") {
            newUrl = url.split("#")[0];
        } else {
            newUrl = url.split("#")[0] + hash;
        }
        newUrl += "";
        history.replaceState(null, null, newUrl);
        });

        var dataTable=$('#tblSchedule').DataTable({
            "searching": false,
            "lengthChange": false,
            "processing": true,
            "serverSide":true,
            "sDom": "lftr",
            hideEmptyRows: true,
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all",
                "orderable": false
            }],
            "ajax":{
                url:"/api/session-details/schedule.php?sessionID=<?=$id?>",
                type:"post"
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                $(aData).each(function(i) {
                    
                    if(aData[i]=="<b style='color:#28d094;'>Geldi</b>"){
                        nRow.className = "SessionAccepted";
                    }else if(aData[i]=="<b style='color:red'>??ptal</b>"){
                        nRow.className = 'SessionDenied';
                    }
                });
            
                return nRow;
            
            },rowCallback: function( row, data, index ) {
                if (data['column'] <= 0 && $("#btnHidden").hasClass("active")) {
                    $(row).hide();
                }
            }
        });
        

        var dataTable=$('#tblPayment').DataTable({
            "searching": false,
            "lengthChange": false,
            "processing": true,
            "serverSide":true,
            "sDom": "lftr",
            hideEmptyRows: true,
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all",
                "orderable": false
            }],
            "ajax":{
                url:"/api/session-details/payment.php?sessionID=<?=$id?>",
                type:"post"
            },
            "dataSrc": function (json) {
                console.log(json);
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                $(aData).each(function(index) {
                    if(aData[index]=="#<?=$GetServiceID?>"){
                        nRow.className = "focusRow";
                    }
                });

                if(!iDisplayIndex){
                    $('#yapilandirmaDiv').empty();
                    $('#yapilandirmaDiv').append(`<button type="button" data-toggle="modal" class="btn btn-sm bg-gradient-danger mb-1 waves-effect waves-light float-left yapilandirmaOnayi"><i class="fa fa-refresh"></i> Taksitlendirmeyi S??f??rdan Yap??land??r</button>
                    <button type="button" style="display:none" data-toggle="modal" class="btn btn-sm bg-gradient-info mb-1 waves-effect ml-1 waves-light float-right taksitEkle"><i class="fa fa-plus"></i> Taksit Ekle</button>
                    `);
                }

                $(aData).each(function(index) {
                    if(aData[index]=="<b>??dendi</b>"){
                        nRow.className = "SessionAccepted";
                    }else if(aData[index]=="<b>??ptal</b>"){
                        nRow.className = 'SessionDenied';
                    }
                });
            
            return nRow;
            }
        });
        var dataTable=$('#tblProduct').DataTable({
            "searching": false,
            "lengthChange": false,
            "processing": true,
            "serverSide":true,
            "sDom": "lftr",
            hideEmptyRows: true,
            columnDefs: [{
                "defaultContent": "-",
                "targets": "_all",
                "orderable": false
            }],
            "ajax":{
                url:"/api/session-details/product.php?sessionID=<?=$id?>",
                type:"post"
            },
            "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                $(aData).each(function(index) {
                    if(aData[index]=="#<?=$GetProductID?>"){
                        nRow.className = "focusRow";
                    }
                });
            
            return nRow;
            }
        });
        $("#odaSecimiSeans").append('<option value="" selected="selected">Se??iniz</option>');
        $("#odaSecimiKontrol").append('<option value="" selected="selected">Se??iniz</option>');

        var seansdurum=[{value:0,text:"Gelmedi"},{value:1,text:"??ptal"},{value:2,text:"Geldi"}];
        $("#inp-seans-durum").append('<option value="" selected="selected">Se??iniz</option>');
        $("#inp-kontrol-seans-durum").append('<option value="" selected="selected">Se??iniz</option>');
        $.each(seansdurum, function (key, value) {
            $("#inp-seans-durum").append($('<option>', seansdurum[key]));
            $("#inp-kontrol-seans-durum").append($('<option>', seansdurum[key]));
        });

        $.ajax({
            type: "POST",
            url: "/api/select/all-rooms.php",
            success: function(res) {
                var obj = JSON.parse(res);
                $.each( obj, function( i, field ) {
                    $("#odaSecimiSeans").append($('<option value="'+obj[i]["value"]+'">'+obj[i]['title']+'</option>'));
                    $("#odaSecimiKontrol").append($('<option value="'+obj[i]["value"]+'">'+obj[i]['title']+'</option>'));
                    // $("#odaSecimiKontrol").append($('<option>', obj[i]));
                });
            }
        });
        $('#hizmetBolgesi').select2({
            allowClear: true,
            multiple: true,
            tags: false,
            placeholder: 'Hizmet B??lgesi Se??in',
            ajax: {
                url: '/api/ajaxQhizmet.php?id=<?=$Str_select2hizmetID?>',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    // console.log(data['Regions']);
                    return {
                        results: data['Regions']
                    };

                },
                success: function(result) {
                    $('#selectedListChange').prop('disabled', false);
                },
                cache: true
            },
        });

        $( "#selectedListChange").click(function() {
            $.ajax({
                type: "POST",
                data: ({
                    CID: <?=$id;?>,
                    selectedRegionSend: $("#hizmetBolgesi").val()
                }),
                url: "/api/session-details/change-selected-regions.php",
                success: function(res) {
                    var obj = JSON.parse(res);
                    var TumBolgelers = JSON.parse(TumBolgeler);
                    var seciliAlanlar = $("#hizmetBolgesi").val();
                    var seciliAlanlarX = seciliAlanlar.map(Number);
                    //console.log(obj[0]['status']);
                    if(obj[0]['status']=='success'){
                        //location.reload('#');
                        //var loc = window.location;
                        window.location = $(location).attr('href');

                    }else if(obj[0]['status']=='failed'){
                        if (JSON.stringify(obj[0].hasOwnProperty("because"))){
                            var sss = obj[0]['because'];
                            var selectedListSet = [];
                            selectedListSet.push(seciliAlanlarX);
                            $.each( sss, function( i, field ) {
                                $.each( TumBolgelers, function (x, el){
                                    if(field==el['id']){
                                        toastr.success('<b>'+el['text']+'</b> listeye tekrar eklendi..', 'Bu b??lge Silinemez!', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                                        toastr.error('<b>'+el['text']+'</b> b??lgesi seanslar aras??nda kullan??l??yor. Silmek i??in l??tfen ??nce seansdan kald??r??n??z.', 'Bu b??lge Silinemez!', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                                    }
                                })
                                selectedListSet[0].push(field);
                            });
                            $("#hizmetBolgesi").val(seciliAlanlarX).trigger("change");
                        }
                    }else{
                        console.log('asd');
                    }
                }
            });
        });
        
        var return_first;
        function callback(response, obj) {
            return_first = response;
            TumBolgeler = obj;
        }

        $.ajax({
            async: false,
            type: "POST",
            data: ({
                CID: <?=$id;?>
            }),

            url: "/api/session-details/regions.php",
            success: function(res) {
                var obj = JSON.parse(res);

                var selectedRegions = obj['Selected'];
                var AllRegions = obj['allRegions'];
                var selectedListSet = [];

                $.each( selectedRegions, function( key, val ) {
                    $('#hizmetBolgesi').append($('<option>', {
                        value: val['id'],
                        text: val['text']
                    }));
                    selectedListSet.push(val['id']);
                });
                callback(selectedListSet, JSON.stringify(AllRegions));
                $("#hizmetBolgesi").val(selectedListSet).trigger("change");
            }
            
        });


        $('input[type="number"]').on('keyup',function(){
            v = parseInt($(this).val());
            min = parseInt($(this).attr('min'));
            max = parseInt($(this).attr('max'));

            $('#inp-tahsilat-fiyat').focusout(function(){
                // if (v < min){
                //     $(this).val(min);
                //     // alert('Minimum '+min+' Girilebilir!');

                //     Swal.fire("Hata", 'Minimum '+min+' Girilebilir!', "error");
                // } else
                if (v > max){
                    $(this).val(max);
                    // alert('Maksimum '+max+' Girilebilir!');
                    Swal.fire("Hata", 'Maximum '+max+' Girilebilir!', "error");
                }
            });
            
        })

        $('#formOdemeYapilandirma').on('keydown', 'input', function (event) {
            if (event.which == 13) {
                event.preventDefault();
                var $this = $(event.target);
                var index = parseFloat($this.attr('data-index'));
                $('[data-index="' + (index + 1).toString() + '"]').focus();
            }
        });
    })
    $("#seansEkle").click(function() {
        var giderEkleID = <?php echo $id; ?>;
        var giderEkleSeansNumber = $('#seansnumber').val();
        var giderEkleSeansFark = $('#seansfark').val();
        var giderEkleKullanici = <?php echo $tckimlikno; ?>;
        var giderEkleUserID = <?php echo $kullaniciadi; ?>;
        var giderEkleEstID = <?php echo $estID; ?>;
        $.ajax({
            type: "POST",
            url: "/api/insert/session-details/sessions.php",
            data: ({
                dataEkleID: giderEkleID,
                dataEkleHastaID: giderEkleEstID,
                dataEkleSeansNumber: giderEkleSeansNumber,
                dataEkleSeansFark: giderEkleSeansFark,
                dataEkleKullanici: giderEkleKullanici,
                dataEkleUserID: giderEkleUserID
            }),
            success: function(res) {
                var obj = JSON.parse(res);
                if(obj['code']==1000){
                    Swal.fire("Yeni Seanslar Eklendi", "Sayfa yenileniyor...", "success");
                    setTimeout(function(){
                        location.reload(1);
                    }, 2222);
                }
                if(obj['code']==9999){
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: true,
                            title: 'Ba??ar??s??z',
                            text: 'Bu i??lemi yapmaya yetkiniz yok!',
                            icon: 'error',
                        });
                }
            }
        });
    });

    function PaymentFunction(){
        toastr.remove();
        var FormOdemeSeri = $('#formOdemeYapilandirma').serialize();

        var noBlankInput = '';
        var formData = $("#formOdemeYapilandirma :input").filter(function(index, element) {

                if($(element)[0]['id']!=="kalan"){
                    if($(element)[0]['value']==""){
                        $('#'+$(element)[0]['id']).removeClass('is-valid');
                        $('#'+$(element)[0]['id']).addClass("is-invalid");
                        var emptyValue;
                        if($(element)[0]['placeholder']!=undefined){
                            emptyValue = $(element)[0]['placeholder'];
                        }else{
                            emptyValue = $(element)[0]['title'];
                        }
                        toastr.error(emptyValue+' belirtilmedi.', 'Eksik Alan!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
                    }else{
                        $('#'+$(element)[0]['id']).removeClass('is-invalid');
                        $('#'+$(element)[0]['id']).addClass("is-valid");
                    }
                }
                if($('#'+$(element)[0]['id']).hasClass('is-invalid')){
                    noBlankInput = true;
                }
            }).serialize();

            if(noBlankInput!=true){
                console.log('g??nderime haz??r!');
                let obj = Object.fromEntries(new URLSearchParams(FormOdemeSeri));

                $.ajax({
                        type: "POST",
                        url: "/api/update/installment.php",
                        dataType: "json",
                        data: {
                            cid: <?=$id?>,
                            mid: <?=$tckimlikno?>,
                            serialize: obj
                        },
                        success: function(result) {
                            console.log(result[0]['Result']);
                            if (result[0]['Result'] == "Successfull") {
                                Swal.fire("Yeniden Taksitlendirme Ba??ar??l??!", "Sayfa yenileniyor...", "success");
                                setTimeout(function(){
                                    location.reload(1);
                                }, 2222);
                            }else if(result[0]['Result']==false){
                                if(result[0]['code']==100140){
                                    var taksitSayisi=[{id:1,text:"Taksit Yok"},{id:2,text:"2 Taksit"},{id:3,text:"3 Taksit"},{id:4,text:"4 Taksit"},{id:5,text:"5 Taksit"},{id:6,text:"6 Taksit"},{id:7,text:"7 Taksit"},{id:8,text:"8 Taksit"},{id:9,text:"9 Taksit"},{id:10,text:"10 Taksit"},{id:11,text:"11 Taksit"},{id:12,text:"12 Taksit"},{id:13,text:"13 Taksit"},{id:14,text:"14 Taksit"},{id:15,text:"15 Taksit"},{id:16,text:"16 Taksit"},{id:17,text:"17 Taksit"},{id:18,text:"18 Taksit"},{id:19,text:"19 Taksit"},{id:20,text:"20 Taksit"},{id:21,text:"21 Taksit"},{id:22,text:"22 Taksit"},{id:23,text:"23 Taksit"},{id:24,text:"24 Taksit"}];
                                    function taksitDegistir(e){
                                        $('#taksitsayisiDiv').empty();
                                        $('#taksitsayisiDiv').append('<input type="number" class="form-control required" id="taksitsayisi" min="1" max="12" placeholder="Taksit Say??s??" aria-label="" name="taksitsayisi" aria-invalid="false">');
                                        $("#taksitsayisi").select2({allowClear: true,placeholder: 'Se??iniz',data: taksitSayisi});
                                        $('#taksitsayisi').val(e).trigger('change');
                                    }
                                    Swal.fire({
                                        showConfirmButton: true,
                                        confirmButtonText: 'Peki',
                                        title: 'Taksit say??s?? belirtmedin',
                                        text: '"Al??nan ??deme" miktar?? "Toplam Hizmet" fiyat??ndan daha az oldu??u i??in m????teri bor??lu durumdad??r. Taksit say??s??n?? (en az 2) olarak otomatik belirlenmi??tir. E??er istersen vade say??s??n?? diledi??in gibi uzatabilirsin.',
                                        icon: 'warning'
                                    });
                                    taksitDegistir(2);
                                }else if(result[0]['code']==100141){
                                    Swal.fire({
                                        showConfirmButton: true,
                                        confirmButtonText: 'Tamam',
                                        title: 'M??kerrer ????lem Engeli',
                                        text: 'Bu i??lem zaten biraz ??nce ger??ekle??ti. M??kerrer kay??t i??lemi engellendi. Sayfa yenileniyor...',
                                        icon: 'warning'
                                    });
                                    setTimeout(function(){
                                        location.reload(1);
                                    }, 2222);
                                }
                            }
                        }
                    })
            }
    }

    $(document).ready(function() {
        var taksitSayisi=[{id:1,text:"Taksit Yok"},{id:2,text:"2 Taksit"},{id:3,text:"3 Taksit"},{id:4,text:"4 Taksit"},{id:5,text:"5 Taksit"},{id:6,text:"6 Taksit"},{id:7,text:"7 Taksit"},{id:8,text:"8 Taksit"},{id:9,text:"9 Taksit"},{id:10,text:"10 Taksit"},{id:11,text:"11 Taksit"},{id:12,text:"12 Taksit"},{id:13,text:"13 Taksit"},{id:14,text:"14 Taksit"},{id:15,text:"15 Taksit"},{id:16,text:"16 Taksit"},{id:17,text:"17 Taksit"},{id:18,text:"18 Taksit"},{id:19,text:"19 Taksit"},{id:20,text:"20 Taksit"},{id:21,text:"21 Taksit"},{id:22,text:"22 Taksit"},{id:23,text:"23 Taksit"},{id:24,text:"24 Taksit"}];
        $("#taksitsayisi").select2({allowClear:true,minimumResultsForSearch: Infinity,placeholder:'Ka?? Taksit?',data:taksitSayisi}).addClass("custom-select");
        $('#taksitsayisi').on('select2:select', function(e){
            $("#odemeturu").select2("open");
        });
        var odemeturu = [{ id: 1, text: 'Nakit' },
                        { id: 2, text: 'Havale / EFT' },
                        { id: 3, text: 'Kredi Kart??' }];
        var tahsilatdurum = [{ id: 0, text: '??denmedi' },
                            { id: 1, text: '??ptal' },
                            { id: 2, text: '??dendi' }];

        var wto;
        $("#odeme").change(function(){
            if($(this).val()==0){
                Swal.fire({
                    title: 'Bir ??deme almad??n',
                    text: "Bu i??leme ??deme almadan devam etmek istedi??ine emin misin?",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#ff8510',
                    cancelButtonColor: '#1f9d57',
                    confirmButtonText: 'Eminim, daha sonra ??deme alaca????m',
                    cancelButtonText: 'Hay??r, hemen ??deme girece??im'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                        allowOutsideClick: false,
                        title: '??imdilik ??cret al??nmad??',
                        text: '??demeyi daha sonra alaca????n?? umuyorum.',
                        icon: 'success'
                        });
                    }else {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'Hadi hakk??m??z?? alal??m',
                            text: 'Bo??una m?? ??al??????yoruz :)',
                            icon: 'success',
                            timer: 1200
                        });
                        $( "#odeme" ).focus();
                    }
                })
            }else{
                console.log('Payment Thanks');
            }
        });
	    $("#odeme").keyup(function(){
			hizmethesapla();
	    });
        function taksitDegistir(e){
            $('#taksitsayisiDiv').empty();
            $('#taksitsayisiDiv').append('<input type="number" class="form-control required" id="taksitsayisi" min="1" max="12" placeholder="Taksit Say??s??" aria-label="" name="taksitsayisi" aria-invalid="false">');
            $("#taksitsayisi").select2({allowClear: true,placeholder: 'Se??iniz',data: taksitSayisi});
            $('#taksitsayisi').val(e).trigger('change');
        }
	    function hizmethesapla(){
			var hizmetfiyat = parseInt($("#fiyat").val());
			var hizmetodeme = parseInt($("#odeme").val());
			var iskonto 	= parseInt($("#iskonto").val());
			
			clearTimeout(wto);
			wto = setTimeout(function() {
                toastr.success('Kalan ??deme hesapland??');

				if(!hizmetfiyat)
				{
				  $("#fiyat").val(0);
				  $("#kalan").val(0);
				  return;
				}
				if(!hizmetodeme)
				{
				  $("#kalan").val(0);
				  $("#odeme").val(0);
				  return;
				}

				var kalan = hizmetfiyat - hizmetodeme;
				var yuzdeOn = kalan/hizmetfiyat*100;

				if(hizmetodeme>hizmetfiyat){
						$("#kalan").val(0);
						alert('Girilen ??deme Hizmet fiyat??ndan fazla olamaz!');
						$("#kalan").val(0);
						$("#odeme").val(0);
						$("#odeme").attr({"max" : hizmetfiyat,"min" : 0});
				}else{
					$("#kalan").val(kalan);
					if(kalan=="0" && $("#taksitsayisi").val()!=="1"){
						$("#odeme").attr({"max" : hizmetfiyat,"min" : 0});
							taksitDegistir(1);
						}
						//alert('??demenin tamam?? al??nd?????? i??in Taksit say??s?? 1 olarak g??ncellendi.');
				}

				if(yuzdeOn==10){
					if($("#taksitsayisi").val()>1){
							alert("Kalan ??deme Toplam ??demenin %10'una e??it oldu??u i??in taksit say??s?? 2 olarak g??ncellendi..");
							//$("#taksitsayisi").val(2);
								taksitDegistir(2);
								//console.log('else 2 takist olarak g??ncellendi');
					}
				}
				if(kalan>0 && $("#taksitsayisi").val()<2){
					Swal.fire({
						showConfirmButton: true,
						confirmButtonText: 'Peki',
						title: 'Taksit say??s?? belirtmedin',
						text: '"Al??nan ??deme" miktar?? "Toplam Hizmet" fiyat??ndan daha az oldu??u i??in m????teri bor??lu durumdad??r. Taksit say??s??n?? (en az 2) olarak otomatik belirlenmi??tir. E??er istersen vade say??s??n?? diledi??in gibi uzatabilirsin.',
						icon: 'warning'
					});
					taksitDegistir(2);
				}
			}, 2000);
		};
        $("#odemeturu").select2({
            allowClear: true,
            minimumResultsForSearch: Infinity,
            placeholder: '??deme T??r???',
            data: odemeturu
        }).addClass("custom-select");
        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [day, month, year].join('-');
        }
        
        $(document).on('click', '.seansedit', function() {
            $('#result-edit').hide();
            var ids = $(this).attr("ids");
            $.ajax({
                'async': false,
                type: "post",
                url: "/api/select/session-details/session-single.php",
                data: {
                    CID: <?=$id;?>,
                    SID: ids
                },
                success: function(res) {
                    var obj = JSON.parse(res);

                    var currentSessionID = obj['Session']['id'];

                    localStorage.setItem('SessionID', currentSessionID);
                    //seans
                    var seanstarihi = obj['Session']['seans_tarih'];
                    var seanstarih = moment(seanstarihi, 'YYYY-MM-DD').format('YYYY-MM-DD');
                    var seans_saat = obj['Session']['seans_saat'];
                    var seans_durum = obj['Session']['seans_durum'];
                    var seansOda = obj['Session']['seans_room'];
                    var seansNot = obj['Session']['seans_not'];
                    var seansEstID = obj['Session']['seans_estID'];
                    
                    var sessionPhotos = obj['Session']['photos'];
                    if(sessionPhotos.length>0){
                        var imgWrap = "";
                        $('.dz-preview').remove();
                        imgWrap = $('.expensesFiles');
                        $.each(sessionPhotos, function (key, value) {
                            var html = `<div class="dz-preview dz-file-preview">
                                <div class="dz-image">
                                    <a data-toggle="lightbox" data-gallery="example-gallery" data-title="Seans G??rseli" href="/adropzone/upload/`+sessionPhotos[key]['photo']+`">
                                    <img height="120" width="120" src="/adropzone/upload/`+sessionPhotos[key]['photo']+`" />
                                    </a>
                                </div>
                                <div class="dz-remove" ids="`+sessionPhotos[key]['photo']+`"><i class="fa fa-times-circle-o" style="cursor: pointer;font-size: 1.85rem;padding-top: 0.2em;"></i></div>
                                </div>`;
                            imgWrap.append(html);
                        });
                        
                    }
                    $('#select2estetisyen').empty();
                    $.ajax({
                        type: "json",
                        url: "/api/ajaxEstetisyen.php",
                        success: function(res) {
                            var estObj = JSON.parse(res);
                            $("#select2estetisyen").append('<option value="" selected="selected">Se??iniz</option>');
                            $.each(estObj, function (key, value) {
                                $("#select2estetisyen").append($('<option>', estObj[key]));
                                $('#select2estetisyen option[value="'+seansEstID+'"]').prop('selected', true);
                            });

                        }
                    });

                    //

                    //kontrol
                    var kontroltarihi = obj['Session']['kontrol_tarih'];
                    var kontroltarih = moment(kontroltarihi, 'YYYY-MM-DD').format('YYYY-MM-DD');
                    var kontrol_saat = obj['Session']['kontrol_saat'];
                    var kontrol_durum = obj['Session']['kontrol_durum'];
                    var kontrolOda = obj['Session']['kontrol_room'];
                    var kontrolNot = obj['Session']['kontrol_not'];

                    var hizmet_bolge = obj['Session']['hizmet_bolge'];
                    if(hizmet_bolge!=null){
                        var parcala=hizmet_bolge.split(", ");
                    }else{
                        var parcala = 0;
                    }
                    var seans_id = obj['Session']['seans_id'];
                    var allRegions = obj['allRegions'];
                    var selectedRegions = obj['Selected'];
                    var sessionSelecteds= [];
                    var etkinOlan = '';

                    $('#regionsListUL').empty();
                    $.each( selectedRegions, function( key, val ) {
                        var idx = val['id'];
                        var selectedx = val['selected'];
                        var etkinOlanlar;

                        
                        $('#regionsListUL').append(`<li class="d-inline-block app-area">
                            <fieldset>
                                <div class="vs-checkbox-con vs-checkbox-success">
                                    <input type="checkbox" class="`+currentSessionID+`" value="`+val['id']+`" name="regionSelected[]">
                                    <span class="vs-checkbox vs-checkbox-lg">
                                        <span class="vs-checkbox--check">
                                            <i class="vs-icon feather icon-check"></i>
                                        </span>
                                    </span>
                                    <label>`+val['text']+`</label>
                                </div>
                            </fieldset>
                        </li>`);
                        $('.'+currentSessionID+':input[value="'+val['id']+'"]').attr("checked",false);
                        for(i=0;i<parcala.length;i++){
                            etkinOlanlar = parcala[i];
                                if(val['id'] == etkinOlanlar){
                                    $('.'+currentSessionID+':input[value="'+val['id']+'"]').attr("checked",true);
                                }
                        }
                    });
                    // if($('#regionsListUL')[0].outerText.length==0){
                    if($('ul#regionsListUL  li').length<1){
                        $('#AppRegFieldset').empty();
                        $('#AppRegFieldset').append(`<div style="margin-top:1em" class="alert alert-warning" role="alert">
                                            <h4 class="alert-heading">Uygulama B??lgesi Tan??mlanmad??</h4>
                                            <p class="mb-0">
                                            Bu hizmete tan??ml?? bir Uygulama B??lgesi bulunamad??. L??tfen mor renkli alandan Uygulama B??lgesi tan??mlay??n??z.
                                            </p>
                                        </div>`);
                    }

                    localStorage.setItem('SeansID', seans_id);
                    $(".seansne").text('(' + seans_id + '. Seans)');
                    $(".seansnekontrol").text('(' + seans_id + '. Seans??n Kontrol??)');
                    $("#inp-seans-tarih").val(seanstarih+'T'+seans_saat);
                    // $("#inp-seans-start").val(seans_saat);
                    $("#inp-kontrol-seans-tarih").val(kontroltarih);
                    $("#inp-kontrol-seans-start").val(kontrol_saat);

                    $("#inp-seans-not").val(seansNot);
                    $("#inp-kontrol-not").val(kontrolNot);

                    $("#inp-edit-seans-ids").val(ids);
                    $("#inp-kontrol-seans-ids").val(ids);

                    $('#inp-kontrol-seans-durum option').eq(kontrol_durum+1).prop('selected', true);
                    $('#inp-seans-durum option').eq(seans_durum+1).prop('selected', true);
                    $('#odaSecimiSeans option[value="'+seansOda+'"]').prop('selected', true);
                    $('#odaSecimiKontrol option[value="'+kontrolOda+'"]').prop('selected', true);

                    $('#inp-seans-tarih').change(function() {
                        var date = $(this).val();
                        $('#seansDateCheck').show();
                        $("#seansDateCheck").empty(); 
                        var table = $('<table id="tblSessionDateCheck" style="text-align:center;font-size:0.8em" cellspacing="0" width="100%"></table>').addClass('table table-striped table-bordered nowrap');
                        var h2info = $('<h6 style="text-align:center;color:red;font-weight:bolder">['+date+'] tarihindeki Di??er Seanslar??n Listesi:</h6>');
                        $('#seansDateCheck').append(h2info);
                        $('#seansDateCheck').append(table);
                        $('#tblSessionDateCheck').DataTable( {
                            columns: [
                                { title: "ID"},
                                { title: "ADI SOYADI"},
                                { title: "ESTETISYEN"},
                                { title: "SEANS TAR??H??"},
                                { title: "SEANS SAAT??"},
                                { title: "SEANS S??RES??"},
                                { title: "ODA"},
                                { title: "DURUM"}
                            ],columnDefs: [
                                { orderable: false, targets: 0 },
                                { orderable: false, targets: 1 },
                                { orderable: false, targets: 2 },
                                { orderable: false, targets: 3 },
                                { orderable: false, targets: 4 },
                                { orderable: false, targets: 5 },
                                { orderable: false, targets: 6 },
                                { orderable: false, targets: 7 }
                            ],
                            "searching": false,
                            "lengthChange": false,
                            "processing": true,
                            "serverSide":true,
                            "sDom": "lfrti",
                            "ajax": {
                                url: "/api/ajaxSeansDateCheck.php?datetime="+date, // json datasource
                                type: "post"
                            }

                        });
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        $(document).on('click', '.seansSil', function() {
            $('#result-edit').hide();
            var ids = $(this).attr("ids");
            
            
            Swal.fire({
                title: "Bak Emin misin?",
                text: "Bu seans?? silerseniz geri kurtaramayabilirsiniz :(",
                width:600,
                padding: '2em',
                showClass: {
                    popup: 'animate__animated animate__flipInX'
                },
                imageUrl: '/app-assets/images/caps/cmylmz-eminmisin.jpg',
                showCancelButton: true,
                cancelButtonText: "Hay??r, Vazge??tim",
                confirmButtonText: "Evet, Hemen Sil",
            }).then((result) => {
                if (result.isConfirmed) {
                    var ids = $(this).attr("ids");
                    $.ajax({
                        type: "GET",
                        url: "api/delete/session-details/session.php",
                        data: {
                            id: ids
                        },
                        success: function(res) {
                            var obj = JSON.parse(res);
                            if (obj[0]['code'] == 9999) {
                                Swal.fire({
                                    allowOutsideClick: false,
                                    showConfirmButton: true,
                                    title: 'Ba??ar??s??z',
                                    text: 'Bu i??lemi yapmaya yetkiniz yok!',
                                    icon: 'error',
                                });
                            }else if (obj[0]['code'] == 1000) {
                                Swal.fire("Silindi!", "Bu seans ba??ar??yla silindi.", "success");
                                location.reload();
                            }else{
                                Swal.fire("Ba??ar??s??z!", "Silme esnas??nda bir hata olu??tu.", "error");
                            }
                        }
                    })
                    
                } else {
                    Swal.fire("??ptal Edildi", "Oh ??ok ????k??r! her??ey yerli yerinde.", "error");
                }
            });
        });
        $(document).on('click', '.taksitEkle', function() {
        });
        $(document).on('click', '.yapilandirmaOnayi', function() {
            $('#result-edit').hide();
            var ids = $(this).attr("ids");

            const swalWithBootstrapButtons = Swal.mixin({
            buttonsStyling: true
            })
            swalWithBootstrapButtons.fire({
            width:600,
            showClass: {
                popup: 'animate__animated animate__flipInX'
            },
            title: 'Bak Emin misin?',
            html: "??u anda <b><?=ucwords_tr($hastaadisoyadi); ?></b> isimli m????terinin <b><?=$SeansBilgisi?> Seansl?? - <?=ucwords_tr($Str_select2hizmet)?></b> hizmetinin <b><u>mevcut taksit yap??s??n?? siliyorsunuz</u></b>. Bu i??leme devam edilmesine emin misiniz?",
            width:600,
            padding: '2em',
            imageUrl: '/app-assets/images/caps/cmylmz-eminmisin.jpg',
            text: "Bu seans?? silerseniz geri kurtaramayabilirsiniz :(",
            showCancelButton: true,
            confirmButtonText: 'Eminim Mevcut Taksitlendirmeyi Temizle',
            cancelButtonText: 'Vazge??tim',
            reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {
                    /*
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )*/
                    //$('#TaksitYapilandir').modal('show');
                    var datas = 'true';

                    Swal.fire({
                        title: 'Y??netici Onay?? Gerekli',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        showCancelButton: true,
                        cancelButtonText: 'Vazge??',
                        html: `
                            <form id="loginBox" name="loginBox" action="POST" onsubmit="ajax_submit();return false;" autocomplete="off" role="presentation">
                                    <h6>Taksitlendirme yap??s??n?? silme i??lemi i??in, kurum y??netici onay?? gerekmektedir.</h6>
                                    <hr>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="adminSelect">
                                            <option value="">L??tfen bir y??netici se??in</option> 
                                        </select>
                                        <br>
                                        <div id="ekle"></div>
                                    </fieldset>
                                    <hr>
                                    <fieldset class="form-group">
                                        <input type="button" id="onayla" class="btn bg-gradient-success mr-1 mb-1 waves-effect waves-light" name="send" value="Onayla" disabled="disabled">
                                    </fieldset>
                            </form>
                            <div id="UnPwResult"></div>
                            `,
                            didOpen: () => {
                                $.ajax({
                                    type: "POST",
                                    url: "/api/verify/un.php",
                                    data: {
                                        verify: datas
                                    },
                                    success: function(data) {
                                        var dondur = JSON.parse(data);
                                        for (var i = 0; i < dondur.length; ++i) {
                                            $('#adminSelect').append('<option value=' + dondur[i].id + '>' + dondur[i].name + '</option>'); 
                                        }
                                    }
                                });
                            },
                    });
                    $('#loginBox').on('keyup keypress', function(e) {
                    var keyCode = e.keyCode || e.which;
                    if (keyCode === 13) { 
                        e.preventDefault();
                        return false;
                    }
                    });


                    $("#adminSelect").on('change', function() {
                        if ($(this).val() > 0){
                            enterID = $(this).val();
                            $('.no-autofill').each(function () {
                            var input = this;
                            var name = $(input).attr('name');
                            var id = $(input).attr('id');

                            $(input).removeAttr('name');
                            $(input).removeAttr('id');

                            setTimeout(function () {
                                $(input).attr('name', name);
                                $(input).attr('id', id);
                            }, 1);
                            });
                            $('#ekle').empty();
                            $('#ekle').append('<input id="passw" autocomplete="none" type="password" class="form-control no-autofill" value="" placeholder="Y??netici ??ifresi Girin">');
                            document.getElementById("onayla").disabled = false;

                            $('#passw').focus();
                            $('#passw').bind("enterKey",function(e){
                                $( "#onayla" ).trigger( "click" );

                            });
                            $('#passw').keyup(function(e){
                                if(e.keyCode == 13){
                                    $(this).trigger("enterKey");
                                }
                            });

                            $("#onayla").click(function(){
                                enterID = $('#adminSelect').val();
                                enterPW = $('#passw').val();
                                $.ajax({
                                    type: "POST",
                                    url: "/api/verify/pw.php",
                                    data: { verify: datas, userID: enterID, userPW: enterPW, cid: <?=$id?> },
                                    success: function(data) {
                                        var dondur = JSON.parse(data);
                                        if(dondur[0][0]=="Deletion Successful"){
                                            $('#UnPwResult').empty();
                                            $('#UnPwResult').append(`<div class="alert alert-success" role="alert"><p class="mb-0" style="font-size: 0.7em;">Taksitler ba??ar??yla silindi.</p></div>`);
                                            location.reload();

                                        }else if(dondur[0][0]=="Hatal?? ??ifre"){
                                            $('#UnPwResult').empty();
                                            $('#UnPwResult').append(`<div class="alert alert-danger" role="alert"><p class="mb-0" style="font-size: 0.7em;">??ifre Hatal??</p></div>`).delay(2000).fadeOut(300);
                                            
                                        }else{
                                            $('#UnPwResult').empty();
                                            $('#UnPwResult').append(`<div class="alert alert-info" role="alert"><p class="mb-0" style="font-size: 0.7em;">`+dondur[0][0]+`</p></div>`);
                                        }
                                    }
                                });
                            });
                            
                        } else {
                            console.log('nein!');
                            $('#ekle').empty();
                            document.getElementById("onayla").disabled = true;

                        }
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
            })
        });
        $(document).on('click', '.taksitedit', function() {
            var ids = $(this).attr("ids");
            $.ajax({
                type: "get",
                url: "/api/select/session-details/payments.php",
                data: {
                    id: ids
                },
                success: function(res) {
                    var obj = JSON.parse(res);
                    var taksittarihi = obj[0]['taksit_tarihi'];
                    var tahsilattarihi = moment(taksittarihi, 'YYYY-MM-DD').format('YYYY-MM-DD');
                    var tahsilat_durum = obj[0]['tahsilat_durum'];
                    var tahsilat_tipi = obj[0]['tahsilat_tipi'];
                    var taksitid = obj[0]['taksit_id'];
                    var fiyat = obj[0]['fiyat'];
                    var currency = obj[0]['currency'];

                    if(tahsilat_durum == 2){
                        $('.payStatus').show();
                    }else{
                        $('.payStatus').hide();
                    }
                    $("#taksitne").text('(' + taksitid + '. Taksit)');
                    $("#inp-tahsilat-tarih").val(tahsilattarihi);
                    $("#inp-tahsilat-fiyat").val(fiyat);
                    // $("#inp-tahsilat-fiyat").attr({
                    //     "min" : fiyat
                    // });
                    $("#inp-tahsilat-fiyats").val(fiyat);
                    $("#inp-tahsilat-edit-currency option[value="+currency+"]").attr('selected', 'selected');


                    if(tahsilat_durum==2) {
                        $('#tahsilatBtn').css('display', 'none');
                        $('#inp-tahsilat-fiyat').prop('disabled', true);
                        $('#inp-tahsilat-tarih').prop('disabled', true);
                        $('#inp-tahsilat-form-durum').prop('disabled', true);
                        $('#inp-tahsilat-form-tipi').prop('disabled', true);
                        $('#tahsilatIptali').show();
                        $('#tahsilatIptali').prop('disabled', false);
                    }else{
                        $('#tahsilatBtn').css('display', 'block');
                        $('#inp-tahsilat-fiyat').prop('disabled', false);
                        $('#inp-tahsilat-tarih').prop('disabled', false);
                        $('#inp-tahsilat-form-durum').prop('disabled', false);
                        $('#inp-tahsilat-form-tipi').prop('disabled', false);
                        $('#tahsilatIptali').hide();
                    }

                    $("#taksitid").val(ids);
                    //SELECT2 value change i??lemleri 2 defa arka arkaya ??a????r??ld??. 1 defa ??a????r??ld??????nda g??ncel value de??i??tirmiyor. bug var. ????z??ld??.
                    $("#inp-tahsilat-form-tipi").select2({
                        allowClear: true,
                        placeholder: 'Se??iniz',
                        data: odemeturu
                    }).val(tahsilat_tipi).trigger('change');
                    $("#inp-tahsilat-form-durum").select2({
                        allowClear: true,
                        placeholder: 'Se??iniz',
                        data: tahsilatdurum
                    }).val(tahsilat_durum).trigger('change');
                    $("#inp-tahsilat-form-tipi").select2({
                        allowClear: true,
                        placeholder: 'Se??iniz',
                        data: odemeturu
                    }).val(tahsilat_tipi).trigger('change');
                    $("#inp-tahsilat-form-durum").select2({
                        allowClear: true,
                        placeholder: 'Se??iniz',
                        data: tahsilatdurum
                    }).val(tahsilat_durum).trigger('change');

                    $(document).on('click', '#tahsilatIptali', function() {
                                Swal.fire({
                                    title: "Bak Emin misin?",
                                    text: taksitid+'. Taksit olan ['+fiyat+"<?php echo $currency;?>] bakiye ??demesini iptal etmek istedi??inize emin misiniz?",
                                    icon: "warning",
                                    showCancelButton: true,
                                    cancelButtonText: "Hay??r, Vazge??tim",
                                    confirmButtonText: "Evet, ??ptal Et",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var ids = $(this).attr("ids");
                                        var myform = $('#FormEditTahsilat');
                                        var disabled = myform.find(':input:disabled').removeAttr('disabled');
                                        var serialized = myform.serialize();
                                        disabled.attr('disabled','disabled');
                                            $.ajax({
                                            type: "GET",
                                            url: "api/ajaxTahsilatOdemeIptal.php",
                                            data: serialized + '&kartid=' + <?php echo $id; ?> ,
                                                success: function(result) {
                                                    if (result == "basarili") {
                                                        location.reload();
                                                        //window.location.href = 'session-details.php?CID=<?php echo $id.'#session-payment'; ?>';
                                                    } else if (result == "0") {
                                                        $('#result-edit').show();
                                                    }
                                                }
                                            })
                                        Swal.fire("Silindi!", "??deme ba??ar??yla iptal edildi.", "success");
                                    } else {
                                        Swal.fire("??ptal Edildi", "Oh ??ok ????k??r! her??ey yerli yerinde.", "error");
                                    }
                                });
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    $("#tahsilatGuncelle").click(function() {
        var myform = $('#FormEditTahsilat');
        var disabled = myform.find(':input:disabled').removeAttr('disabled');
        var serialized = myform.serialize();
        disabled.attr('disabled','disabled');

        $.ajax({
            type: "GET",
            url: "api/Upayment.php",
            data: serialized + '&kartid=' + <?php echo $id; ?> + '&mid=' + <?=$tckimlikno?> ,
            success : function(res) {
                var obj = JSON.parse(res);
                $.each(obj, function(key,value) {
                    var codes = obj[key]['code'];
                    if (typeof codes !== "undefined"){
                        var nCodes = codes.toString();
                        if(nCodes.substr(0, 4) == "1000"){
                            toastr.success('Ba??ar??l??', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                            <?php //if($user_ID!=33){?>
                                location.reload();
                            <?php //} ?>
                        }else{
                            toastr.success('Ba??ar??s??z', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                        }
                    }                    
                });
            }
        })

    });


    $("#seansGuncelle").click(function() {
        if(
            ($('#odaSecimiSeans').val() == "") ||
            ($('#inp-seans-durum').val() == "")
        ){
            toastr.error('Seans Durumu ve Oda Se??imi alanlar?? belirtilmedi. L??tfen tekrar deneyiniz.', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
        }else{
            var ExpensesIMG;
            if($('#fii').attr('src')!=undefined){
            ExpensesIMG = $('#fii').attr('src');
            }else if($("[name='media-ids[]']").val()!=undefined){
            ExpensesIMG = $("[name='media-ids[]']").val();
            }else{
            ExpensesIMG = null;
            }
            console.log('xx: '+ExpensesIMG);
            $.ajax({
                type: "GET",
                url: "/api/update/session-details/sessions.php",
                data: $('#FormEditSeans').serialize()+'&ExpensesIMG='+ExpensesIMG,
                success: function(res) {
                    var obj = JSON.parse(res);
                    if(obj[0]['code']==1000){
                     window.location.href = 'session-details.php?CID=<?php echo $id; ?>';
                    }else if(obj[0]['code']==1010){
                        $('#result-edit').show();
                    }else if(obj[0]['code']==1011){
                        $('#result-edit').hide();
                        toastr.error('En az Bir uygulama b??lgesi se??melisiniz. L??tfen tekrar deneyiniz.', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
                    }
                }
            })
        }
    });

    $("#kontrolGuncelle").click(function() {
        if(
            ($('#odaSecimiKontrol').val() == "") ||
            ($('#inp-kontrol-seans-durum').val() == "") ||
            ($('#inp-kontrol-seans-tarih').val() == "") ||
            ($('#inp-kontrol-seans-start').val() == "")
        ){
            toastr.error('Kontrol Seans?? Durumu ve Oda Se??imi alanlar?? belirtilmedi. L??tfen tekrar deneyiniz.', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
        }else{

            var giderSeansID = $('#inp-kontrol-seans-ids').val();
            var FormAddKontrolData = $('#FormAddkontrol').serializeArray();
            $.ajax({
                type: "POST",
                url: "/api/insert/session-details/control-session.php",
                data: FormAddKontrolData,
                success: function(res) {
                    var obj = JSON.parse(res);
                    if(obj[0]['status']=='success'){
                        Swal.fire("Ba??ar??l??", "Kontrol ????lemi eklendi. Sayfa yenileniyor...", "success");
                        window.location.href = 'session-details.php?CID=<?php echo $id; ?>';
                    }else if(obj[0]['status']==false && obj[0]['code']==1015){
                        Swal.fire("Hata", i18next.t("1015"), "error");
                    }
                    else if(obj[0]['code']==false){
                        $('#result-edit').show();
                    }else if(obj[0]['code']==1010){
                        $('#result-kontrol').show();                        
                    }
                }
            });
        }
    });

    function showEdit(editableObj) {
        $(editableObj).css("background", "#FFF");
    }

    $(document).ready(function() {

        $('#inp-tahsilat-form-durum').on('select2:select', function (e) {
            console.log('ok!');
            if(e.params.data.id==2){
                $('.payStatus').show();
            }else{
                $('.payStatus').hide();
            }
        });

        var scaleTypeList = [{
                id: 0,
                text: 'MiliLitre'
            },
            {
                id: 1,
                text: 'SantiLitre'
            },
            {
                id: 2,
                text: 'Litre'
            },
            {
                id: 3,
                text: 'KiloGram'
            },
            {
                id: 4,
                text: 'MiliGram'
            },
            {
                id: 5,
                text: 'Adet'
            }
        ];

        $(document).on('click', '.UrunEkle', function() {
            var odemeturu = [{ id: 1, text: 'Nakit' },
                            { id: 2, text: 'Havale / EFT' },
                            { id: 3, text: 'Kredi Kart??' }];
            var tahsilatdurum = [{ id: 0, text: '??denmedi' },
                                { id: 1, text: '??ptal' },
                                { id: 2, text: '??dendi' }];

            $("#inp-olcek-turu").select2({
                placeholder: 'Se??iniz',
                allowClear: true,
                data: scaleTypeList
            }).val(null).trigger('change');
            $("#inp-urun-tahsilat-durum").select2({
                placeholder: 'Se??iniz',
                allowClear: true,
                data: tahsilatdurum
            }).val(null).trigger('change');
            $("#inp-urun-tahsilat-form-tipi").select2({
                        allowClear: true,
                        placeholder: 'Se??iniz',
                        data: odemeturu
                    });
            
            $('#inp-urun-adi').select2({
                    allowClear: true,
                    placeholder: 'Se??iniz',
                    ajax: {
                    url: '/api/select/session-details/all-products.php',
                    dataType: 'json',
                    delay: 0,
                    processResults: function (data) {
                        return {
                        results: data
                        };
                    },
                    success: function(result) {
                    
                    },
                    cache: true
                    }
                });
                
            var AllCurrency = {null:"D??viz ?", TRY:"TRY", USD:"USD", EUR:"EUR", GBP:"GBP"};
            $('#inp-edit-urun-currency').html(null);
            $.each(AllCurrency, function (key, value) {
                $('#inp-currency').append('<option value=' + key + '>' + value + '</option>');
            });

            $('#inp-urun-adi').on('select2:select', function (e) {
                var data = e.params.data;
                var strID   = data["text2"];
                var strScale= data["scale"];
                var strType = data["type"];
                var strPrice= data["price"];
                var strStock= data["productStock"];
                var strUsed = data["productUsed"];
                var currency = data['currency'];
                $("#inp-currency option[value="+currency+"]").attr('selected', 'selected');

                if(strStock == strUsed){
                    Swal.fire("Stok Limit Uyar??s??", "<b>"+strID+"</b>, bu ??r??n <b>["+strStock+"/"+strUsed+"] maksimum stok seviyesine</b> ula??t??. L??tfen stok eklemesi yap??n??z.", "warning");
                    $('#inp-urun-adi').val(null).trigger('change');
                    $('#inp-product-text').val(null);
                    $('#inp-product-scale').val(null);
                    $('#inp-product-type').val(null);
                    $('#inp-fiyat').val(null);
                }else{
                    $('#inp-product-text').val(strID);
                    $('#inp-product-scale').val(strScale);
                    $('#inp-product-type').val(strType);
                    $('#inp-fiyat').val(strPrice);
                }
            });
            $('#inp-urun-adi').on('select2:clear', function () {
            $('#inp-product-text').val(null);
            $('#inp-product-scale').val(null);
            $('#inp-product-type').val(null);
            $('#inp-fiyat').val(null);
        });
            
        });
        $(document).on('click', '.urun-sil', function() {
            Swal.fire({
                title: "Bak Emin misin?",
                text: "Bu ??r??n?? silerseniz geri kurtaramayabilirsiniz :(",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Hay??r, Vazge??tim",
                confirmButtonText: "Evet, Hemen Sil"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    var ids = $(this).attr("ids");
                    $.ajax({
                        type: "GET",
                        url: "/api/delete/session-details/product.php",
                        data: {
                            id: ids
                        },
                        success: function(res) {
                            var obj = JSON.parse(res);
                            if(obj['code']==1000){
                                Swal.fire("??r??n Ba??ar??yla silindi", "Sayfa yenileniyor...", "success");
                                setTimeout(function(){
                                    location.reload(1);
                                }, 2222);
                            }
                        }
                    })
                    Swal.fire("Silindi!", "Bu hizmet ba??ar??yla silindi.", "success");
                } else {
                    Swal.fire("??ptal Edildi", "Oh ??ok ????k??r! her??ey yerli yerinde.", "error");
                }
            });
        });

        $(document).on('click', '.urun-duzenle', function() {
            var ids = $(this).attr("ids");
            var dataPost = { id : ids };
            console.log(dataPost);

            $.ajax({
                type: "POST",
                url: "/api/select/session-details/products.php",
                data: dataPost,
                success: function(res) {
                    var obj = JSON.parse(res);
                    var id = obj[0]['id'];
                    var product = obj[0]['product'];
                    var productID = obj[0]['productID'];
                    var scale = obj[0]['scale'];
                    var typess = obj[0]['type'];
                    var price = obj[0]['price'];
                    var currency = obj[0]['currency'];
                    var buyStatus = obj[0]['buy_status'];
                    var paymentType = obj[0]['paymentType'];

                    // console.log("#inp-currency option[value="+currency+"]");
                    $('#inp-edit-urun-adi').select2({
                        initSelection: function(element, callback) {
                            return callback({
                                text: product,
                                id: productID
                            });
                        },
                        allowClear: true,
                        placeholder: 'Se??iniz',
                        ajax: {
                            url: '/api/select/session-details/all-products.php',
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                    results: data
                                };
                            },
                            cache: true
                        }
                    });

                    var scaleTypeList = [
                        {id: 0,text: 'MiliLitre'},
                        {id: 1,text: 'SantiLitre'},
                        {id: 2,text: 'Litre'},
                        {id: 3,text: 'KiloGram'},
                        {id: 4,text: 'MiliGram'},
                        {id: 5,text: 'Adet'}
                    ];
            
    
                    var odemeturu = [{ id: 1, text: 'Nakit' },
                        { id: 2, text: 'Havale / EFT' },
                        { id: 3, text: 'Kredi Kart??' }];
                    var tahsilatdurum = [{ id: 0, text: '??denmedi' },
                                        { id: 1, text: '??ptal' },
                                        { id: 2, text: '??dendi' }];
                    $("#hizmetid").val(id);
                    $('#inp-edit-product-text').val(product);
                    $('#inp-edit-product-scale').val(scale);
                    $('#inp-edit-product-type').val(typess);
                    $('#inp-edit-urun-fiyat').val(price);
                    
                    var AllCurrency = {null:"D??viz ?", TRY:"TRY", USD:"USD", EUR:"EUR", GBP:"GBP"};
                    $('#inp-edit-urun-currency').html(null);
                    $.each(AllCurrency, function (key, value) {
                        $('#inp-edit-urun-currency').append('<option value=' + key + '>' + value + '</option>');
                    });

                    $("#inp-edit-urun-currency").prop('selectedIndex', 0);
                    $("#inp-edit-urun-currency").val(currency).trigger("change");
                    $(`#inp-edit-urun-currency option[value=`+currency+`]`).attr('selected', 'selected');

                    
                    $("#inp-edit-urun-tahsilat-tipi").select2({
                        placeholder: 'Se??iniz',
                        allowClear: true,
                        data: odemeturu
                    }).val(paymentType).trigger('change');
                    
                    $("#inp-edit-urun-tahsilat-durum").select2({
                        placeholder: 'Se??iniz',
                        allowClear: true,
                        data: tahsilatdurum
                    }).val(buyStatus).trigger('change');
                    // $("#inp-edit-urun-tahsilat-durum").select2({
                    //     placeholder: 'Se??iniz',
                    //     allowClear: true,
                    //     data: tahsilatdurum
                    // }).val(buyStatus).trigger('change');
                    
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $('#inp-edit-urun-adi').on('select2:select', function(e) {
                $.ajax({
                    type: 'get',
                    url: '/api/select/session-details/products.php',
                    data: $('#hastakayit').serialize(),
                    success: function(result) {}
                })

                var data = e.params.data;
                var strText = data["text2"];
                var strScale = data["scale"];
                var strType = data["type"];
                var strPrice = data["price"];

                $('#inp-edit-scale').val(strScale);

                if (strType == 'MiliLitre') {   var types = 0; } else
                if (strType == 'SantiLitre') {  var types = 1; } else
                if (strType == 'Litre') {       var types = 2; } else
                if (strType == 'KiloGram') {    var types = 3; } else
                if (strType == 'MiliGram') {    var types = 4; } else
                if (strType == 'Adet') {        var types = 5; }

                $('#inp-edit-product-text').val(strText).trigger('change');
                $('#inp-edit-product-scale').val(strScale).trigger('change');
                $('#inp-edit-product-type').val(types).trigger('change');
                //$('#inp-edit-fiyat').val(strPrice);
                $("#inp-edit-urun-fiyat").val(parseInt(strPrice));
            });


            $("#inp-edit-iskonto").keyup(function(){
                var hizmetfiyat = parseInt($("#inp-edit-urun-fiyat").val());
                var iskonto 	= parseInt($("#inp-edit-iskonto").val());

                var iskontoHesap = hizmetfiyat - (hizmetfiyat/100) * iskonto;
                $("#inp-edit-iskonto2").val(iskontoHesap+'???');
            });

        });
        $(document).on('click', '#urunEkle', function() {

            var serialized = $('#FormUrunEkle').serialize();
            console.log(serialized);
            var productNameVal = $('#inp-urun-adi').val();
            if(serialized.indexOf('=&') > -1 || serialized.substr(serialized.length - 1) == '=' || productNameVal == null){
                alert("L??tfen t??m alanlar?? kontrol edip tekrar deneyiniz.");
            }else{
                $.ajax({
                    type: "POST",
                    url: "/api/insert/session-details/products.php",
                    data: serialized + '&kartID=' + <?php echo $id; ?>,
                    success: function(res) {
                        var obj = JSON.parse(res);
                        if(obj['code']==1000){
                            Swal.fire("Yeni ??r??n Eklendi", "Sayfa yenileniyor...", "success");
                            setTimeout(function(){
                                location.reload(1);
                            }, 2222);
                        }
                    }
                })
            }

            

        });
        $(document).on('click', '#urunGuncelle', function() {
            console.log($('#FormEditUrun').serialize());
            $.ajax({
                type: "GET",
                url: "/api/update/session-details/product.php",
                data: $('#FormEditUrun').serialize(),
                success: function(res) {
                    var obj = JSON.parse(res);
                    if(obj['code']==1000){
                        Swal.fire("Ba??ar??l??", "??r??n g??ncellendi. Sayfa yenileniyor...", "success");
                        setTimeout(function(){
                            location.reload(1);
                        }, 2222);
                    }else if(obj['status'] == false){
                        Swal.fire("Ba??ar??s??z", "??r??n g??ncellenemedi. L??tfen sistem y??neticisi ile temasa ge??iniz.", "warning");
                    }else{
                        console.log('err');
                    }
                }
            })
        });
        const Srooling = setInterval(function(){ document.getElementById('yakala').scrollIntoView(); }, 4000);
        setTimeout(function (argument) { clearInterval(Srooling); },4000);
        
        
        $(document).on('click', '.smsSend', function() {
            var ids = $(this).attr("ids");


            Swal.fire({
                    title: 'Bor??lu SMS G??nderim ????lemi',
                    text: "Bu m????teriye taksit ??demesi yapmas??na dair bor?? sms g??nderimi yap??lacakt??r. Buna ger??ekten emin misin?",
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    confirmButtonColor: '#ff8510',
                    cancelButtonColor: '#1f9d57',
                    confirmButtonText: 'Eminim, hemen g??nder',
                    cancelButtonText: 'Hay??r, vazge??tim'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'L??tfen Bekleyiniz...',
                            text: 'SMS G??nderim i??lemi sa??lan??yor.',
                            icon: 'success',
                            timer: 10000
                        });
                        $.ajax({
                            type: "POST",
                            url: "/api/app-sms/taksit-table-send-sms.php",
                            data: {ids: ids},
                            success: function(res) {
                                var obj = JSON.parse(res);
                                if(obj[0]['code']==1000){
                                    Swal.fire("Ba??ar??l??", "SMS ba??ar??yla g??nderildi. Sayfa yenileniyor...", "success");
                                    setTimeout(function(){
                                        location.reload(1);
                                    }, 2222);
                                }else if(obj[0]['code'] == 1001){
                                    Swal.fire("Hatal?? ????lem Yapt??n??z", "Bu mesaj?? zaten daha ??nce g??nderildi. M??kerrer ??leti Koruma sistemi devreye al??nd??.", "warning");
                                }else if(obj[0]['status'] == false){
                                    Swal.fire("Ba??ar??s??z", "SMS G??nderimi ba??ar??s??z. L??tfen sistem y??neticisi ile temasa ge??iniz.", "warning");
                                }else{
                                    Swal.fire("SMS Entegrasyon Hatas??", "Bir??eyler ters gitti. L??tfen sistem y??neticisi ile temasa ge??iniz.", "warning");
                                }
                            }
                        })
                    }else {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'SMS G??nderimi ??ptal Edildi',
                            text: 'Bazen yanl????tan d??nmekte g??zeldir.',
                            icon: 'success',
                            timer: 6000
                        });
                    }
                })
        });
    });
</script>

</body>
<!-- END: Body-->

</html>