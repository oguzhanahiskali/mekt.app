<?php include 'header-top.php'; ?>

<?php if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<link href="/app-assets/dualList/dual-listbox.css" rel="stylesheet">

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
                                <h2 class="content-header-title float-left mb-0">SMS Gönderim İşlemleri</h2>
                                <div class="breadcrumb-wrapper col-12">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                                    </li>
                                    <li class="breadcrumb-item active">Uygulama Bölge Listesi
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
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="totalSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <p>Toplam SMS Paket</p>
                                        </div>
                                        <div class="avatar bg-rgba-primary p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-package text-primary font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="sentSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <p>Gönderilen SMS</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-message-square text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="remainingSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <input id="remainingSMSinput" type="hidden" val="">
                                            <p>Kalan SMS</p>
                                        </div>
                                        <div class="avatar bg-rgba-success p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-pie-chart text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="card">
                                    <div class="card-header d-flex align-items-start pb-0">
                                        <div>
                                            <h2 id="cancalledSMS" class="text-bold-700 mb-0">{~}</h2>
                                            <p>İptal Olan</p>
                                        </div>
                                        <div class="avatar bg-rgba-warning p-50 m-0">
                                            <div class="avatar-content">
                                                <i class="feather icon-x-square text-danger font-medium-5"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- users list start -->
                        <div class="row justify-content-center">
                            <div class="col">
                                <section id="payment-reports">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title" id="horz-layout-colored-controls">SMS Gönder</h4>
                                                    <div class="heading-elements">
                                                        <ul class="list-inline mb-0">
                                                            <button class="btn btn-danger round btn-min-width mr-1 mb-1 waves-effect waves-light" id="SendSMS">SMS Gönder!</button>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card-content collpase show">
                                                    
                                                    <form id="SendSMSforms" class="noselected" action="ajax/sms-ajax-send.php" method="POST">
                                                        <div class="card-body" >
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <select class="multipleSelects" name="numbers[]" id="multipleSelects" multiple></select>
                                                                    <p class="mt-1" style="text-align:center;">İlgili müşteriye <code>gönderilmesi istenilen mesaj</code> için lütfen <code>Sol Listede</code> bulunan kişileri <code>Sağ Listeye</code> taşıyınız.</p>
                                                                </div>
                                                                <div class="col-md-4" style="padding-top: 4.2%;">
                                                                    <textarea id="msg" class="form-control" style="height:26em" placeholder="Mesajınızı buraya girin..." maxlength="913" name="msg"></textarea>
                                                                    <div class="float-right">

                                                                        <span id="SMSCounts" class="success">1 Boy</span> SMS | <span id="countChars" class="success">0</span> Karakter | <span id="chars" class="success">913</span> karakter kaldı
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="mt-1" style="text-align:center;font-size: 0.9em;color:#b4b4b4;">Abone Numaralı SMS (Türkçe Karakterli) : 1 boy SMS 155, 2 boy SMS 301, 3 boy SMS 454, 4 boy SMS 607, 5 boy SMS 761, 6 boy SMS 913 karakterdir. Sadece ulaşan SMS'lerden ücret alınır. Mesajlar Yurt içi her yöne aynı fiyattır. K.K.T.C. numaralarına gönderim yapılamaz. EstetikPanel tarife tarih ve koşullarında degişiklik yapma hakkını saklı tutar.</p>
                                                        </div>
                                                    </form>
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
    <script src="/app-assets/dualList/dual-listbox.js"></script>
    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>

    <script>
		var returnSMSResult;
		function callback(response) { returnSMSResult = response; }
        $.ajax({
            type: "POST",
            url: "/api/app-sms/customers.php",
            success: function(res) {
                let obj = JSON.parse(res);
                $.each(obj, function(i, field) {
                    $('#multipleSelects').append($('<option>', { value : obj[i]['Phone'] }).text(obj[i]['Phone']+' | '+obj[i]['Customer']));
                });
            }
        });
        setTimeout(function(){
            let dualListbox = new DualListbox('#multipleSelects', {
                availableTitle:'Müşteri Veritabanı',
                selectedTitle: 'SMS Gönderilecek Müşteriler',
                addButtonText: 'Ekle',
                removeButtonText: 'Çıkar',
                addAllButtonText: 'Tümünü Ekle',
                removeAllButtonText: 'Tümünü Çıkar',
                searchPlaceholder: 'Müşteri Ara',
            });
        },1500);
        
        $.ajax({
                type: "POST",
                url: "/api/app-sms/available-count.php",
                success: function(res) {
                    var obj = JSON.parse(res);
                    var resTotal = obj[0]['Total'];
                    var resUsed = obj[0]['Used'];
                    var resAvailable = obj[0]['Available'];
                    callback(obj);
                }
            });
        setTimeout(function(){
            $('#totalSMS').html(returnSMSResult[0]['Total'])
            $('#sentSMS').html(returnSMSResult[0]['Used'])
            var remainingSMS = returnSMSResult[0]['Total']-returnSMSResult[0]['Used'];
            $('#remainingSMS').html(remainingSMS);
            $('#remainingSMSinput').val(remainingSMS);
        },500);
        var maxLength = 913;
        $('#msg').keyup(function() {
            var length1 = $(this).val().length;
            var length2 = maxLength-length1;
            $('#chars').text(length2);
            $('#countChars').text(length1);
            //1 boy SMS 155, 2 boy SMS 301, 3 boy SMS 454, 4 boy SMS 607, 5 boy SMS 761, 6 boy SMS 913 karakterdir. Sadece ulaşan SMS'lerden ücret alınır.
            if(length1<156){
                $('#SMSCounts').text('1 Boy');
            }else if(length1>0 && length1<302){
                $('#SMSCounts').text('2 Boy');
            }else if(length1>301 && length1<455){
                $('#SMSCounts').text('3 Boy');
            }else if(length1>454 && length1<608){
                $('#SMSCounts').text('4 Boy');
            }else if(length1>607 && length1<762){
                $('#SMSCounts').text('5 Boy');
            }else if(length1>761 && length1<914){
                $('#SMSCounts').text('6 Boy');
            }
        });
        $("#SendSMS").click(function() {
            $('#SendSMS').attr("disabled", 'disabled');
            var SelectedNumber = $("select[name='numbers[]'] option:selected").length;
            if( ( SelectedNumber>0 ) && ( $('#msg').val() !=='' ) ){

                remainingSMSinput = $('#remainingSMSinput').val();
                if(SelectedNumber<=remainingSMSinput){
                    Swal.fire({
                        title: "Emin misiniz?",
                        text: "SMS Gönderilecek 'Müşteriler' ve 'Mesaj' dan emin misin?",
                        width:600,
                        padding: '2em',
                        showClass: {
                            popup: 'animate__animated animate__flipInX'
                        },
                        showCancelButton: true,
                        cancelButtonText: "Hayır, Vazgeçtim",
                        confirmButtonText: "Evet, Gönder",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                    type: "POST",
                                    url: "/api/app-sms/toplu-sms.php",
                                    data: $('#SendSMSforms').serialize(),
                                    success: function(res) {
                                        var obj = JSON.parse(res);
                                        var successNumb = null;
                                        var errorNumb = null;
                                        wrongNumber = [];
                                        $.each(obj, function(i, field) {
                                            if(obj[i]['status']==true){
                                                // Swal.fire("Başarılı", "Başarıyla gönderildi.", "success");
                                                successNumb +=1;
                                            }else if(obj[i]['status']==false){
                                                // Swal.fire("Başarıdız", "İşlem sırasında bir hata oluştu. Lütfen sistem yönetici ile temasa geçiniz.", "error");
                                                errorNumb +=1;
                                                wrongNumber.push(obj[i]['wrongNumber']);
                                            }
                                            if(successNumb!=null && errorNumb!=null){
                                                Swal.fire("Gönderim Raporu", successNumb+" Kişiye Başarıyla gönderildi. Ancak "+errorNumb+" hatalı numara sebebiyle gönderilemedi.", "info");
                                                
                                            }else if(successNumb!=null && errorNumb==null){
                                                Swal.fire("Başarılı", "Gönderim listesinde bulunan tüm müşteriler olan toplam "+successNumb+" Kişiye Başarıyla gönderildi.", "Success");
                                            }else if(successNumb==null && errorNumb!=null){
                                                Swal.fire("Gönderim Raporu", "Toplam "+errorNumb+" Kişiye gönderme sırasında hata oluştu.", "error");
                                            }
                                        });
                                    }
                            })
                        } else {
                            Swal.fire("İptal Edildi", "Sms gönderim işlemi iptal edildi.", "error");
                        }
                    });
                }else{
                    Swal.fire("SMS Limiti Yetersiz", "Lütfen SMS Kredisi için sistem yönetici ile temasa geçiniz.", "error");
                }
            }else{
                console.log("okey değil");
                alert("Toplu SMS gönderilecek 'Kişi Listesi veya Mesaj' alanı boş!");
            }
        });

    </script>
</body>
<!-- END: Body-->

</html>