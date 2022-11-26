<?php include 'header-top.php'?>
<?php
$hastaid = $_GET['id'];

$query = $db->query("SELECT ID FROM tbl_musteri_kimlik WHERE ID = '{$hastaid}' AND DURUM=1 AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);

if(empty($hastaid)){
    header("Location: https://estetik.app/404.php?ID=0"); /* Redirect browser */
    exit();
}else{
    $query = $db->query("SELECT *,YEAR(CURDATE()) - YEAR(DOGUM_TARIHI) AS YAS FROM tbl_musteri_kimlik WHERE ID = '{$hastaid}' AND FIRMA_ID=$user_Firma")->fetch(PDO::FETCH_ASSOC);
    $tckimlikno = $query['TC'];
    $hastaadisoyadi = $query['ADI'].' '.$query['SOYADI'];
    $originalDate = $query['DOGUM_TARIHI'];
    $ProfilDogumTarihi = date("d.m.Y", strtotime($originalDate));

    $kimlikTC = $query['TC'];
    $adres = $query['ADRES'];
    $yass = $query['YAS'];
    $cep = $query['CEP'];
    $cep2 = $query['CEP2'];
    if(empty($musteriNot)){
        $musteriNot ="[girilmedi]";
    }else{
        $musteriNot = $query['MUSTERI_NOT'];
    }
}


?>
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
            </div>
            <div class="content-body">
                <!-- users edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                            <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Kimlik Bilgileri Düzenleme</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                        <!-- users edit media object start -->
                                        <div class="media mb-2">
                                            <a class="mr-2 my-25" href="#">
                                                <img id="people-img" src="/app-assets/images/pages/login/preloader2.gif" alt="users avatar" class="users-avatar-shadow rounded" height="90" width="90">
                                            </a>
                                            <div class="media-body mt-50">
                                                <h4 class="media-heading"><?=$hastaadisoyadi?></h4>

                                                    <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                                    <table>
                                                        <tr>
                                                            <td class="font-weight-bold">T.C. Kimlik</td>
                                                            <td><?=$kimlikTC?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold">Doğum Tarihi</td>
                                                            <td><?=$ProfilDogumTarihi?> (<?=$yass?> Yaşında)</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold">Telefon</td>
                                                            <td class="phone-inputmask" data-inputmask-mask="(999) 999-9999"><?=$cep?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                             </div>
                                        </div>
                                        <!-- users edit media object ends -->
                                        <!-- users edit account form start -->
                                        <form id="FormProfilEdit">
                                            <div class="row mt-1">
                                                <div class="col-12 col-sm-6">
                                                    <h5 class="mb-1"><i class="feather icon-user mr-25"></i>Kimlik Bilgisi</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>T.C. KİMLİK NO.</label>
                                                                    <input type="number" id="citizenNumb" class="form-control" placeholder="TC. KİMLİK" name="citizenNumb" required data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>DOĞUM TARİHİ.</label>
                                                                    <input type="date" id="dateOfBirth" class="form-control" placeholder="Doğum Tarihi" name="dateOfBirth" required data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <div class="controls">
                                                                <label>ADI</label>
                                                                <input type="text" id="firstName" class="form-control" placeholder="ADI" value="adoptionism744" name="firstName" required data-validation-required-message="This username field is required">
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>SOYADI</label>
                                                                    <input type="text" id="lastName" class="form-control" placeholder="SOYADI" name="lastName" required data-validation-required-message="This name field is required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Cinsiyet</label>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" id="woman" name="gender" value="1">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Kadın
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="vs-radio-con">
                                                                        <input type="radio" id="man" name="gender" value="2">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        Erkek
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <h5 class="mb-1"><i class="feather icon-user mr-25"></i>İletişim Bilgisi</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label>Telefon</label>
                                                                    <input type="text" id="phone" class="form-control" placeholder="Telefon" name="phone" required data-validation-required-message="This email field is required">
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <div class="controls">
                                                                        <label>Eposta</label>
                                                                        <input type="email" id="email" class="form-control" placeholder="Eposta" name="email" required data-validation-required-message="This email field is required">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="controls">
                                                            <label>ADRES</label>
                                                            <textarea type="text" id="address" class="form-control" placeholder="Adres" name="address" required data-validation-required-message="This email field is required" rows="3"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>İletişim Tercihleri</label>
                                                        <ul class="list-unstyled mb-0">
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="contactSMS" id="contactSMS">
                                                                        <label class="custom-control-label" for="contactSMS">SMS</label>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                            <li class="d-inline-block mr-2">
                                                                <fieldset>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="contactCall" id="contactCall">
                                                                        <label class="custom-control-label" for="contactCall">Arama</label>
                                                                    </div>
                                                                </fieldset>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button id="saveChanges" onclick="return false;" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Değişiklikleri Kaydet</button>
                                                    <a href="app-customer-view.php?id=<?=$hastaid?>"> <button type="button" class="btn btn-outline-warning">Vazgeç & Geri Dön</button></a>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- users edit account form ends -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- users edit ends -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <!-- BEGIN: Footer-->
    <?php include 'includes/footer.php'?>
    <script>
        $(document).ready(function() {
            $("#man").on("click", function() {
                $("#people-img").attr("src", '/app-assets/images/portrait/small/man.png');
            });
            $("#woman").on("click", function() {
                $("#people-img").attr("src", '/app-assets/images/portrait/small/woman.png');
            });

            $("#tckimlikno").val(<?php echo $tckimlikno;?>);
            $("#hastaid").val(<?php echo $hastaid; ?>);
            $("#hasta_profil_edit_hastaid").val(<?php echo $hastaid; ?>);
                
                var ids = <?php echo $hastaid; ?>;
                $.ajax({
                    type: "get",
                    url: "/api/ajaxQprofil.php",
                    data:{id:ids},
                    success: function(res){
                        var obj = JSON.parse(res);
                        var Qprofil_ID = obj[0]['id'];
                        var Qprofil_adi = obj[0]['adi'];
                        var Qprofil_soyadi = obj[0]['soyadi'];
                        var Qprofil_tc = obj[0]['tc'];
                        var Qprofil_dt = obj[0]['dogum_tarihi'];
                        var Qprofil_cep = obj[0]['cep'];
                        var Qprofil_eposta = obj[0]['eposta'];
                        var Qprofil_adres = obj[0]['adres'];
                        var Qgender = obj[0]['cinsiyet'];
                        var QfeedbackSMS = obj[0]['feedback_sms'];
                        var QfeedbackCall = obj[0]['feedback_call'];
                        
                        $("#firstName").val(Qprofil_adi);
                        $("#lastName").val(Qprofil_soyadi);
                        $("#citizenNumb").val(Qprofil_tc);
                        $("#phone").val(Qprofil_cep);
                        $("#address").val(Qprofil_adres);
                        $("#dateOfBirth").val(Qprofil_dt);
                        $("#email").val(Qprofil_eposta);
                        if(Qgender==1){
                            $('#man').attr("checked",false);
                            $('#woman').attr("checked", "checked");
                            $("#people-img").attr("src", '/app-assets/images/portrait/small/woman.png');

                        }else if(Qgender==2){
                            $('#woman').attr("checked",false);
                            $('#man').attr("checked", "checked");
                            $("#people-img").attr("src", '/app-assets/images/portrait/small/man.png');

                        }
                         if(QfeedbackSMS=='true'){
                            $('#contactSMS').attr("checked",false);
                            $('#contactSMS').attr("checked", "checked");
                        }
                         if(QfeedbackCall=='true'){
                            $('#contactCall').attr("checked",false);
                            $('#contactCall').attr("checked", "checked");
                        }

                    },
                    error:function(error)
                    { console.log(error);}
                });
            $('#saveChanges').click(function(){
                if($("#citizenNumb").val().length!=11){
                    Swal.fire("Hata", 'T.C. Kimlik numarası hatalı', "error");
                }else{
                    $.ajax({
                        type: "POST",
                        url: "/api/ajaxUprofil.php",
                        data: 'PatientID='+'<?=$hastaid?>&'+$('#FormProfilEdit').serialize(),
                        success: function(res) {
                            var obj = JSON.parse(res);
                            if(obj['results']['status']==true){
                                location.reload();
                            }else{
                                $.each(obj, function (key, value) {
                                    var asd = obj[key];
                                    if($.isNumeric(key)){
                                        $.each(asd, function (ke, val) {
                                            if(val==false){
                                                Swal.fire("Hata", i18next.t(ke)+' Eksik', "error");
                                            }
                                        });
                                    }
    
                                });
    
                            }
                        }
                    })  
                }
            });

        });
    </script>
    <!-- END: Footer-->
</body>
<!-- END: Body-->

</html>