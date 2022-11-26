<?php include 'header-top.php'; ?>
<!DOCTYPE html>
<html class="loaded dark-layout" lang="en" data-textdirection="ltr" style="--vh:9.29px;">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<!-- <link rel="stylesheet" type="text/css" href="https://estetik.app/EstetikPanel//app-assets/vendors/css/file-uploaders/dropzone.min.css"> -->
<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/file-uploaders/dropzone.min.css?a=1">

<link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/form-file-uploader.css?a=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                     <h2 class="content-header-title float-left mb-0">Harcamalar</h2>
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="/index.php">Özet Ekranı</a>
                           </li>
                           <li class="breadcrumb-item active">Harcamalar Listesi
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
                                          <input type="text" class="ag-grid-filter form-control w-50 mr-1 mb-1 mb-sm-0" id="filter-text-box" data-i18n="[placeholder]Find Service">
                                          </button>
                                          <div class="btn-export">
                                             <button class="btn btn-success ag-grid-export-btn">
                                                <i class="fa fa-file-excel-o"></i> <b data-i18n="Export to Excel">Excele Aktar</b></button>
                                             <button type="button" class="btn bg-gradient-primary default action-add">
                                                <i class="feather icon-user-plus"></i> <b data-i18n="Add New Services">Yeni Harcama Ekle</b>
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
                     <!-- add edit sidebar starts -->
                     <div id="add-edit-data-sidebar" class="add-new-data-sidebar">
                        <div id="overlay-bg-edit" class="overlay-bg"></div>
                        <div id="add-edit-data" class="add-new-data">
                           <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                              <div>
                                 <h4 class="text-uppercase">HARCAMA DÜZENLE</h4>
                              </div>
                              <div class="hide-data-sidebar">
                                 <i class="feather icon-x"></i>
                              </div>
                           </div>
                           <form id="FormEditExpenses" class="add-patient-tabs h-75 col-12">
                              <div class="data-fields h-100 mt-1">
                                 <div style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                    <div class="row">
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="intTypeOfExpenditure">Harcama Türü:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <select type="text" class="form-control required" id="intEditTypeOfExpenditure" placeholder="Harcama Türü" name="intEditTypeOfExpenditure">
                                                   <option value="">Seçiniz</option>
                                                      <optgroup label="Aylık Ödemeler">
                                                         <option value="1">Aidat Gideri</option>
                                                         <option value="8">Kira Gideri</option>
                                                         <option value="11">Muhasebe Gideri</option>
                                                      </optgroup>
                                                      <optgroup label="Faturalar">
                                                         <option value="4">Doğalgaz Faturası</option>
                                                         <option value="5">Elektrik Faturası</option>
                                                         <option value="7">İnternet Faturası</option>
                                                         <option value="14">Su Faturası</option>
                                                         <option value="15">Telefon Faturası</option>
                                                      </optgroup>
                                                      <option value="17">Cihaz Kalibrasyon / Bakım Onarım</option>
                                                      <option value="2">Demirbaş Alımı</option>
                                                      <option value="6">Firma Ödemeleri</option>
                                                      <option value="9">Kargo Ödemeleri</option>
                                                      <option value="10">Malzeme Ödemeleri</option>
                                                      <option value="12">Mutfak Harcamaları</option>
                                                      <option value="13">Personel Harcamaları</option>
                                                      <option value="16">Temizlik Ürünleri</option>
                                                      <option value="3">Diğer Harcamalar</option>
                                                   </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="paidDT">Ödeme Tarihi:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <input class="form-control required text-center" id="editPaidDT" value="" name="editPaidDT" type="date">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 data-field-col">
                                          <div class="form-group">
                                             <label for="intEditDescription">Harcama Açıklaması:<span class="danger">*</span></label>
                                             <div class="input-group">
                                             <textarea class="form-control" name="intEditDescription" id="intEditDescription" rows="2" placeholder="Harcama Açıklaması"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-edit-paymentStatus">Ödeme Durum:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <select type="text" class="form-control" id="inp-edit-paymentStatus" name="inp-edit-paymentStatus"></select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-edit-tahsilat-form-tipi">Ödeme Türü:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <select type="text" class="form-control" id="inp-edit-tahsilat-form-tipi" name="inp-edit-tahsilat-form-tipi"></select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-2 data-field-col"></div>
                                       <div class="col-sm-8 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-edit-price">Fiyat:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <select class="form-control bolder required text-center" name="inpEditAddCurrency" id="inpEditAddCurrency" title="Döviz Seçiniz"></select>
                                                </div>
                                                <input type="number" class="form-control text-center" id="inp-edit-price" aria-label="" name="inp-edit-price" autocomplete="off" aria-invalid="false">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-2 data-field-col"></div>
                                       <div class="col-sm-12 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-price">Fatura / FİŞ Görseli:<span class="danger">* Max(1 Adet)</span></label>
                                             <div class="input-group dropzone dropzone-area expensesFiles" action="/adropzone/upload.php" id="file-upload" >
                                                <div class="dz-message">Dosyaları buraya bırakın veya yüklemek için tıklayın.</div>
                                             </div>
                                             <div id="file-image">
                                                <a data-toggle="lightbox" id="fia" href=""><img id="fii">
                                               </a>
                                               <button type="button" id="imgRemove" class="btn btn-danger mr-1 mb-1 waves-effect waves-light img-center"><i class="feather icon-x-square"></i> Sil x</button>
                                             </div>
                                          </div>
                                       </div>
                                       <input type="hidden" id="expensesID" name="expensesID" value="">
                                    </div>
                                 </div>
                              </div>
                           </form>
                           <hr>
                           <div class="add-data-footer d-flex justify-content-around px-3 mt-2 my-footer">
                              <div class="add-data-btn">
                                 <button class="btn btn-primary round" id="expensesUpdate">Güncelle</button>
                              </div>
                              <div class="cancel-data-btn">
                                 <button class="btn btn-outline-danger round">İptal</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- add edit sidebar ends -->

                     <!-- add new sidebar starts -->
                     <div id="add-new-data-sidebar" class="add-new-data-sidebar">
                        <div id="overlay-bg" class="overlay-bg"></div>
                        <div id="add-new-data" class="add-new-data">
                           <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                              <div>
                                 <h4 class="text-uppercase">Harcama Ekle</h4>
                              </div>
                              <div class="hide-data-sidebar">
                                 <i class="feather icon-x"></i>
                              </div>
                           </div>
                           <form id="FormAddHizmet" class="add-patient-tabs h-75 col-12">
                              <div class="data-fields h-100 mt-1">
                                 <div style="height: 100%;overflow:hidden;overflow-y:scroll;padding: 0 1em 0 1em;">
                                    <div class="row">
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="intTypeOfExpenditure">Harcama Türü:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <select type="text" class="form-control required" id="intTypeOfExpenditure" placeholder="Harcama Türü" name="intTypeOfExpenditure">
                                                   <option value="">Seçiniz</option>
                                                      <optgroup label="Aylık Ödemeler">
                                                         <option value="1">Aidat Gideri</option>
                                                         <option value="8">Kira Gideri</option>
                                                         <option value="11">Muhasebe Gideri</option>
                                                      </optgroup>
                                                      <optgroup label="Faturalar">
                                                         <option value="4">Doğalgaz Faturası</option>
                                                         <option value="5">Elektrik Faturası</option>
                                                         <option value="7">İnternet Faturası</option>
                                                         <option value="14">Su Faturası</option>
                                                         <option value="15">Telefon Faturası</option>
                                                      </optgroup>
                                                      <option value="17">Cihaz Kalibrasyon / Bakım Onarım</option>
                                                      <option value="2">Demirbaş Alımı</option>
                                                      <option value="6">Firma Ödemeleri</option>
                                                      <option value="9">Kargo Ödemeleri</option>
                                                      <option value="10">Malzeme Ödemeleri</option>
                                                      <option value="12">Mutfak Harcamaları</option>
                                                      <option value="13">Personel Harcamaları</option>
                                                      <option value="16">Temizlik Ürünleri</option>
                                                      <option value="3">Diğer Harcamalar</option>
                                                   </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="paidDT">Ödeme Tarihi:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <input class="form-control required text-center" id="paidDT" value="" name="paidDT" type="date">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12 data-field-col">
                                          <div class="form-group">
                                             <label for="intDescription">Harcama Açıklaması:<span class="danger">*</span></label>
                                             <div class="input-group">
                                             <textarea class="form-control" name="intDescription" id="intDescription" rows="2" placeholder="Harcama Açıklaması"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-tahsilat-form-tipi">Ödeme Durum:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <select type="text" class="form-control" id="inp-tahsilat-form-tipi" name="inp-tahsilat-form-tipi"></select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-paymentStatus">Ödeme Türü:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <select type="text" class="form-control" id="inp-paymentStatus" name="inp-paymentStatus"></select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-2 data-field-col"></div>
                                       <div class="col-sm-8 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-add-price">Fiyat:<span class="danger">*</span></label>
                                             <div class="input-group">
                                                <div class="input-group-prepend">
                                                   <select class="form-control bolder required text-center" name="inpAddCurrency" id="inpAddCurrency" title="Döviz Seçiniz"></select>
                                                </div>
                                                <input type="number" class="form-control text-center" id="inp-add-price" aria-label="" name="inp-add-price" autocomplete="off" aria-invalid="false">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-2 data-field-col"></div>
                                       <div class="col-sm-12 data-field-col">
                                          <div class="form-group">
                                             <label for="inp-price">Fatura / FİŞ Görseli:<span class="danger">* Max(1 Adet)</span></label>
                                             <div class="input-group dropzone dropzone-area expensesFiles" action="/adropzone/upload.php" id="expensesFiles" >
                                                <div class="dz-message">Dosyaları buraya bırakın veya yüklemek için tıklayın.</div>
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
                                 <button class="btn btn-primary round" id="addExpense">Ekle</button>
                              </div>
                              <div class="cancel-data-btn">
                                 <button class="btn btn-outline-danger round">İptal</button>
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
   <script src="/app-assets/vendors/js/extensions/dropzone.min.js?a=1"></script>
   <script src="/app-assets/vendors/js/forms/form-file-uploader.js?a=1"></script>
   <script>
      $( "#imgRemove" ).click(function() {
         
         Swal.fire({
                title: "Bak Emin misin?",
                text: "Bu görseli silmek istediğinize emin misiniz?",
                icon: "warning",
                showCancelButton: true,
                cancelButtonText: "Hayır, Vazgeçtim",
                confirmButtonText: "Evet, Şimdi Sil"
            })
            .then((result) => {
               if (result.isConfirmed) {
                  var deleteImg = $("#fii").attr('src').replace('/adropzone/upload/', '');
                  console.log('silinecek görsel: '+deleteImg);
                  var PostIDs = $('#expensesID').val();
                  $.ajax({
                     url: "/adropzone/delete.php",
                     data: {
                        imageId: deleteImg,
                        postID: PostIDs
                     },
                     type: 'POST',
                     success: function (res) {
                        var obj = JSON.parse(res);
                        if(obj['status']==true){
                           Swal.fire("Silindi", "Silme işlemi başarılı", "success");
                           $("#fia").attr('href',null);
                           $("#fii").attr('src',null);
                           location.reload();
                        }else if(obj['status']==false){
                           Swal.fire("Silme Hatası", "Silme işlemi başarısız.", "error");
                        }
                     }
                  });
               } else {
                  Swal.fire("İptal Edildi", "Oh çok şükür! herşey yerli yerinde.", "error");
               }
            });
      });
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <!-- END: Footer-->
   <script>
   // var AllCurrency = {null:"Döviz ?", TRY:"TRY", USD:"USD", EUR:"EUR", GBP:"GBP"};
   var AllCurrency = {TRY:"TRY"};
   var paymentStatus = [ { value: null, text: 'Seçiniz' }, { value: 0, text: 'Ödenmedi' }, { value: 1, text: 'İptal' }, { value: 2, text: 'Ödendi' }];
   var paymentType = [ { value: null, text: 'Seçiniz' },{ value: 1, text: 'Nakit' },{ value: 2, text: 'Havale / EFT' },{ value: 3, text: 'Kredi Kartı' }];
                            
   $.each(AllCurrency, function (key, value) {
      $('#inpAddCurrency').append('<option value=' + key + '>' + value + '</option>');
      $('#inpEditAddCurrency').append('<option value=' + key + '>' + value + '</option>');
   });
   $.each(paymentType, function (key, value) {
      $('#inp-tahsilat-form-tipi').append('<option value=' + value['value'] + '>' + value['text'] + '</option>');
      $('#inp-edit-tahsilat-form-tipi').append('<option value=' + value['value'] + '>' + value['text'] + '</option>');
   });
   $.each(paymentStatus, function (key, value) {
      $('#inp-paymentStatus').append('<option value=' + value['value'] + '>' + value['text'] + '</option>');
      $('#inp-edit-paymentStatus').append('<option value=' + value['value'] + '>' + value['text'] + '</option>');
   });

   $('#inp-add-hizmet-suresi').select2({
      allowClear: true,
      placeholder: 'Seçiniz',
      ajax: {
         url: '/api/ajaxSure.php',
         dataType: 'json',
         delay: 250,
         processResults: function(data) {
            return {
               results: data
            };
         },
         success: function(result) {

         },
         cache: true
      }
   });
   $('#inp-add-seans-sayisi').select2({
      allowClear: true,
      placeholder: 'Seçiniz',
      ajax: {
         url: '/api/ajaxSeans.php',
         dataType: 'json',
         delay: 250,
         processResults: function(data) {
            return {
               results: data
            };
         },
         success: function(result) {

         },
         cache: true
      }
   });
   $('#hizmetBolgesi').select2({
      allowClear: true,
      multiple: true,
      tags: false,
      placeholder: 'Hizmet Bölgesi Seçin',
      ajax: {
         url: '/api/ajaxHizmetBolge.php',
         dataType: 'json',
         delay: 250,
         processResults: function(data) {
            return {
               results: data
            };

         },
         success: function(result) {
            $('#selectedListChange').prop('disabled', false);
         },
         cache: true
      },
   });
   $('#AddhizmetBolgesi').select2({
      allowClear: true,
      multiple: true,
      tags: false,
      placeholder: 'Hizmet Bölgesi Seçin',
      ajax: {
         url: '/api/ajaxHizmetBolge.php',
         dataType: 'json',
         delay: 250,
         processResults: function(data) {
            return {
               results: data
            };

         },
         success: function(result) {
            $('#selectedListChange').prop('disabled', false);
         },
         cache: true
      },
   });

   var AllCurrency = {
      null: "Döviz ?",
      TRY: "TRY",
      USD: "USD",
      EUR: "EUR",
      GBP: "GBP"
   };
   $.each(AllCurrency, function(key, value) {
      $('#inp-add-currency').append('<option value=' + key + '>' + value + '</option>');
      $('#inp-edit-currency').append('<option value=' + key + '>' + value + '</option>');
   });
   localStorage.setItem('CompID', '<?=$user_Firma?>');
   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });


   </script>
   
</body>
<!-- END: Body-->

</html>