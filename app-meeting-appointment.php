<?php include 'header-top.php';
    if(!empty($_GET['id']) and isset($_GET['id'])){
        $musteriID =  $_GET['id'];
        $query = $db->query("SELECT * FROM tbl_musteri_kimlik WHERE ID='$musteriID'")->fetch(PDO::FETCH_ASSOC);
        $musteriOptionTC = $query['TC'];
        $musteriOption = $musteriID.' '.$query['ADI'].' '.$query['SOYADI'];
        $musteriAdiSoyadi = $query['ADI'].' '.$query['SOYADI'];
    }
?>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
   <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
   <meta name="author" content="PIXINVENT">
   <title>Randevu Takvimi | EstetikPanel v2</title>
   <link rel="apple-touch-icon" href="/app-assets/images/ico/apple-icon-120.png">
   <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/ico/favicon.ico">
   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

   <!-- BEGIN: Vendor CSS-->
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
   <script>
   if(localStorage.getItem("layout")=='light-layout'){
      var a = document.createElement('link');
      var linkText = document.createTextNode("");
      a.appendChild(linkText);
      a.rel = "stylesheet";
      a.type = "text/css";
      a.href = "/app-assets/vendors/css/calendars/light-fullcalendar.min.css";
      document.querySelector('head').appendChild(a);

   }else if(localStorage.getItem("layout")=='dark-layout'){
      var a = document.createElement('link');
      var linkText = document.createTextNode("");
      a.appendChild(linkText);
      a.rel = "stylesheet";
      a.type = "text/css";
      a.href = "/app-assets/vendors/css/calendars/dark-fullcalendar.min.css";
      document.querySelector('head').appendChild(a);
   }else{
      var a = document.createElement('link');
      var linkText = document.createTextNode("");
      a.appendChild(linkText);
      a.rel = "stylesheet";
      a.type = "text/css";
      a.href = "/app-assets/vendors/css/calendars/light-fullcalendar.min.css";
      document.querySelector('head').appendChild(a);
   }
   </script>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/extensions/daygrid.min.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/calendars/extensions/timegrid.min.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/toastr.css">

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
   <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/wizard.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/extensions/toastr.css">


   <!-- END: Page CSS-->

   <!-- BEGIN: Custom CSS-->
   <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
   <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

   <!-- BEGIN: Header-->
   <?php include 'includes/header.php';?>

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
         </div>
         <div class="content-body">
            <!-- Full calendar start -->
            <section id="basic-examples">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-content">
                           <div class="card-body">
                              <div class="cal-category-bullets d-none">
                                 <div class="bullets-group-1 mt-2">
                                    <div class="category-business mr-1">
                                       <span class="bullet bullet-success bullet-sm mr-25"></span>
                                       Business
                                    </div>
                                    <div class="category-work mr-1">
                                       <span class="bullet bullet-warning bullet-sm mr-25"></span>
                                       Work
                                    </div>
                                    <div class="category-personal mr-1">
                                       <span class="bullet bullet-danger bullet-sm mr-25"></span>
                                       Personal
                                    </div>
                                    <div class="category-others">
                                       <span class="bullet bullet-primary bullet-sm mr-25"></span>
                                       Others
                                    </div>
                                 </div>
                              </div>
                              <div class="divider">
                                 <div class="divider-text">
                                    <input type="date" class="form-control pickadate" id="dateField" data-html="true" data-toggle="tooltip" data-original-title="Işınlanmak İstediğin Tarihi Seç 😉" />
                                 </div>
                              </div>
                              <div id="fc-default"></div>

                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- calendar Modal starts-->
               <div class="modal animated bounceInLeft text-left" id="ModalAdd" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h4 class="modal-title text-text-bold-600" id="cal-modal">Ön Görüşme Planla</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                           </button>
                        </div>
                        <section id="validation">
                           <div class="row">
                              <div class="col-12">
                                 <div class="card">
                                    <div class="card-content">
                                       <div class="card-body">
                                          <form action="#" class="steps-validation wizard-circle">
                                             <!-- Step 1 -->
                                             <h6><i class="step-icon fa fa-handshake-o"></i> Ön Görüşme Planlama</h6>
                                             <fieldset>
                                                <fieldset class="border row col-md-12">
                                                   <legend class="w-auto text-right">Görüşme Zamanı & Not</legend>
                                                   <div class="col-md-4">
                                                      <div class="form-group">
                                                         <label for="start">Görüşme Tarih/Saati:<span class="danger">*</span></label>
                                                         <input type="datetime-local" name="start" class="form-control text-center" id="start" >
                                                      </div>
                                                   </div>
                                                   <div class="col-md-8">
                                                      <div class="form-group">
                                                         <label for="start">Not:</label>
                                                         <textarea type="text" id="note" class="form-control" placeholder="Bir not yazın..." name="note" rows="1"></textarea>
                                                      </div>
                                                   </div>
                                                </fieldset>
                                                <br>
                                                <fieldset class="border row col-md-12">
                                                   <legend class="w-auto text-center"><i class="fa fa-user-o"></i> Müşteri <i class="fa fa-handshake-o"></i> Estetisyen <i class="fa fa-id-card-o"></i></legend>
                                                   <div class="col-md-6">
                                                      <div id="selectCustomer" class="form-group">
                                                         <label for="patientID">Müşteri Seç<span class="danger">*</span></label>
                                                         <select class="select2 form-control required" id="patientID" name="patientID"></select>
                                                      </div>
                                                      <div id="AddNewCustomerForm" class="row d-none mt-2">
                                                         <div class="col-md-6">
                                                            <fieldset class="form-label-group">
                                                               <input type="text" id="firstname" class="form-control maxTwoName uppercase" name="data-firstname" data-index="1" data-i18n="[placeholder]Firstname">
                                                               <label for="firstname"><span data-i18n="Firstname">İsim</span></label>
                                                            </fieldset>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <fieldset class="form-label-group">
                                                               <input type="text" id="lastname" class="form-control maxTwoName uppercase" name="data-lastname" data-index="2" data-i18n="[placeholder]Lastname">
                                                               <label for="lastname"><span data-i18n="Lastname">Soyisim</span></label>
                                                            </fieldset>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <fieldset class="form-label-group">
                                                               <input type="text" id="mobilPhone" class="form-control phone-inputmask" value="5" name="data-mobilPhone" data-index="4" data-i18n="[placeholder]mobilPhone">
                                                               <label for="birthday"><span data-i18n="mobilPhone">Cep</span></label>
                                                            </fieldset>
                                                         </div>
                                                         <div class="col-md-6">
                                                            <fieldset class="form-label-group">
                                                               <input class="form-control" id="genders" name="data-genders" required>
                                                               <label for="genders"><span data-i18n="genders">Cinsiyet</span></label>
                                                            </fieldset>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label for="estheticianID">Estetisyen Seç<span class="danger">*</span></label>
                                                         <select class="select2 form-control required" id="estheticianID" name="estheticianID"></select>
                                                      </div>
                                                   </div>
                                                </fieldset>
                                                <br>
                                                <fieldset class="border row col-md-12">
                                                   <legend class="w-auto text-left">Hizmet Belirleyiniz</legend>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label for="serviceID">
                                                            Hizmet Seçin:
                                                            <span class="danger">*</span>
                                                         </label>
                                                         <select class="select2 form-control required" id="serviceID" name="serviceID"></select>
                                                      </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                      <div class="form-group">
                                                         <label for="serviceRegions">Hizmet Bölgesi
                                                            <span class="danger">*</span>
                                                         </label>
                                                         <select class="select2 form-control" id="serviceRegions" name="serviceRegions[]"></select>
                                                      </div>
                                                   </div>
                                                </fieldset>
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
               <!-- calendar Modal ends-->
            </section>
            <!-- // Full calendar end -->

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
   <script src="/app-assets/js/scripts/forms/jquery.inputmask.bundle.min.js"></script>
   <script>
      $(document).ready(function() {
      $('.phone-inputmask').inputmask("(999) 999-9999", {
         autoUnmask: true,
      });
         localStorage.removeItem('LangStatus');
         localStorage.setItem('LangStatus','<?php echo $userDil; ?>');
         
         if(localStorage.getItem("layout")=='light-layout'){
            localStorage.setItem('layout','light-layout');
            $('.loading').removeClass('dark-layout');
         }else if(localStorage.getItem("layout")=='dark-layout'){
            localStorage.setItem('layout','dark-layout');
            $('.loading').removeClass('light-layout');
            $('.loading').addClass('dark-layout');
         }else{
            localStorage.setItem('layout','dark-layout');
            $('.loading').removeClass('light-layout');
            $('.loading').addClass('dark-layout');
         }
         $.getJSON("/app-assets/data/locales/<?=$userDil?>.json", function(data){
                var gendersArr = [
                    { id: 1, text: data.Woman },
                    { id: 2, text: data.Man }
                ];
                $("#genders").select2({placeholder: data.genders,cache: false,allowClear: true,data: gendersArr});
            });
      });
   </script>
   <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
   <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
   <!-- BEGIN Vendor JS-->

   <!-- BEGIN: Page Vendor JS-->
   <script src="/app-assets/vendors/js/extensions/moment.min.js"></script>
   <!--<script src="/app-assets/vendors/js/calendar/fullcalendar.min.js"></script>-->
   <script src="/app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
   <script src="/app-assets/js/scripts/extensions/full-calendar-scheduler.min.js"></script>

   <script src="/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
   <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
   <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
   <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>

   <!-- END: Page Vendor JS-->

   <!-- BEGIN: Theme JS-->
   <script src="/app-assets/js/core/app-menu.js"></script>
   <script src="/app-assets/js/core/app.js"></script>
   <script src="/app-assets/js/scripts/components.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

   <!-- END: Theme JS-->

   <!-- BEGIN: Page JS-->
   <script src="/app-assets/js/scripts/forms/wizard-steps-meeting.js"></script>
   <!-- <script src="/app-assets/js/seans.js"></script> -->
   <script>
        $(document).ready(function() {
            $.urlParam = function (name) {
               var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
               if (results == null) {
               return null;
               }
               return decodeURI(results[1]) || 0;
            }
            i18next.on('loaded', function(loaded) {
                i18next.changeLanguage('<?=$userDil?>', function (err, t) {
                    $(document).localize();
                    localStorage.removeItem('LangStatus');
                    localStorage.setItem('LangStatus',i18next.language);
                });
            });
        });
    </script>
   <script>

   $('#patientID').select2({
      allowClear: true,
      placeholder: 'Seçiniz',
      ajax: {
         url: '/api/ajaxMusteri.php',
         dataType: 'json',
         delay: 250,
         processResults: function(data) {
            return {
               results: data
            };
            console.log(result);
         },
         success: function(result) {

         },
         cache: true
      }
   }).on('select2:open', () => {
         $(".select2-results:not(:has(a))").append('<a onclick="addNewCustomerFunc()" style="margin: 13px;color: #7367f0;font-weight: bolder;text-align: center;display: block;font-size: 12px;">Yeni Müşteri Ekle</a>');
   });
   function addNewCustomerFunc() {
      console.log('clicks!');
      $('#selectCustomer').hide();
      $('#AddNewCustomerForm').removeClass('d-none');
      $('#patientID').select2('close');
      $('#firstname').focus();
   }

   
   $('#estheticianID').select2({
      allowClear: true,
      placeholder: 'Seçiniz',
      ajax: {
         url: '/api/ajaxEstetisyen.php',
         dataType: 'json',
         delay: 250,
         processResults: function (data) {
         return {
            results: data
         };
         },
         cache: true
      }
   });
   
   $('#serviceID').select2({
      allowClear: true,
      placeholder: 'Seçiniz',
      ajax: {
         url: '/api/ajaxHizmet.php',
         dataType: 'json',
         delay: 250,
         processResults: function (data) {
            return {
               results: data.Services
            };
         },
         success: function(result) {},
         cache: true
      }
   });
		var return_first;
		function callback(response) { return_first = response; }
      
	$('#serviceRegions').select2({
		placeholder: 'Hizmet Belirleyiniz.'
	});
	  $('#serviceID').on('change', function (e) {
			$('#serviceRegions').select2().val(null);
			$('#serviceRegions').select2({
				allowClear: true,
				multiple: true,
				placeholder: 'Hizmet Bölgesi Seçin',
				ajax: {
					url: '/api/ajaxHizmet.php',
					dataType: 'json',
					delay: 250,
					data: function (params) {
						var queryParameters = {
							areaFilter: params.term
						}
				
						return queryParameters;
					},
					processResults: function (data) {
						$.each(data.Services, function(index, value){
							var valueID = JSON.stringify(value.id);
							var SelID = e.currentTarget.value;
							if(valueID==SelID){
								callback(data.Services[index].regions);
							}
						});
						return {
							results: return_first
						};
					},
					cache: true
				}
			});
	  });
   <?php
            if(!empty($musteriOption)){
                ?>
   var newOption = new Option('<?=$musteriOptionTC?> <?=$musteriAdiSoyadi?>', <?=$musteriID?>, false, false);
   $('#patientID').append(newOption).trigger('change');

   <?php
            }

        ?>

   $(document).ready(function() {
      
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
      })
      $('#fc-default').fullCalendar({
         defaultView: 'agendaDay',
         groupByResource: false,
         lazyFetching: true,
         selectConstraint: "businessHours",
         select: function(start, end, jsEvent, view) {
            if (start.isAfter(moment())) {
               alert(start.isAfter(moment()));

               var eventTitle = prompt("Provide Event Title");
               if (eventTitle) {
                  $("#calendar").fullCalendar('renderEvent', {
                     title: eventTitle,
                     start: start,
                     end: end,
                     stick: true
                  });
                  console.log('abc 1');

                  alert('Appointment booked at: ' + start.format("h(:mm)a"));
               } else {
                  console.log('abc 2');
               }
            } else {
               alert('Cannot book an appointment in the past');
            }
         },
         eventClick: function(calEvent, jsEvent, view) {
            console.log('Event: ' + calEvent.title);
         },
         closeText: "Kapat",
         currentText: "Bugun",
         monthNames: ["Ocak", "Subat", "Mart", "Nisan", "Mayis", "Haziran", "Temmuz", "Agustos", "Eylul", "Ekim", "Kasim", "Aralik"],
         monthNamesShort: ["Oca", "Şub", "Mar", "Nis", "May", "Haz", "Tem", "Ağu", "Eyl", "Eki", "Kas", "Ara"],
         // dayNames:["Pazar","Pazartesi","Sali","Carsamba","Persembe","Cuma","Cumartesi"],
         dayNames: ["Pazar", "Pazartesi", "Salı", "Çarsamba", "Perşembe", "Cuma", "Cumartesi"],
         dayNamesShort: ["Pz", "Pt", "Sa", "Ça", "Pe", "Cu", "Ct"],
         dayNamesMin: ["Pz", "Pt", "Sa", "Ça", "Pe", "Cu", "Ct"],
         weekHeader: "Hf",
         dateFormat: "dd.mm.yy",
         firstDay: 1,
         isRTL: !1,
         next: "Ileri",
         month: "Ay",
         weekText: "Hafta",
         day: "Gun",
         allDayText: "TumGun",
         list: "Ajanda",
         currentText: "Bugun",
         // minTime:"08:00",
         // maxTime:"23:00",
         slotLabelFormat: 'HH:mm',
         contentHeight: 'auto',
         eventLimitText: 'tane Daha',
         longPressDelay: 250,

         buttonText: {
            today: "Bugun",
            month: "Ay",
            week: "Hafta",
            day: "Gun",
            list: "Liste"
         },
         theme: false,
         allDaySlot: false,
         slotEventOverlap: false,
         timeFormat: 'H:mm',
         header: {
            left: 'prev,today,next',
            center: 'title',
            right: 'month,agendaDay,listWeek'
            // right: 'month,basicWeek,agendaDay,listWeek'
            // right: 'agendaDay,listWeek'
         },
         editable: true,
         titleFormat: "DD.MM.Y ~ dddd",

         eventLimit: true, // allow "more" link when too many events
         selectable: true,
         selectHelper: false,
         select: function(start, end, jsEvent, view, resource) {
            // if (start.format("HH") < 08 || start.format("HH") > 20) {
            //    $('#ModalAdd').modal('hide');
            //    $('#fc-default').fullCalendar('changeView', 'agendaDay');
            //    Swal.fire(
            //       'Saat Belirlenmedi😒',
            //       'Lütfen Oda alanına göre Saat belirleyiniz 😉',
            //       'warning'
            //    );
            // } else {
            //    // console.log(moment(start).format('YYYY-MM-DD'T'HH:mm'));
            //    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD[T]HH:mm'));
            //    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
            //    $('#ModalAdd').modal('show');
            // }

            $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD[T]HH:mm'));
               $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
               $('#ModalAdd').modal('show');
         },
         eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) {
            $('.popover').remove();
            Swal.fire({
                title: "Dikkat",
                text: "Bu değişikliği yapmak istediğinize emin misiniz?",
                icon: "question",
                showCancelButton: true,
                cancelButtonText: "Vazgeçtim",
                confirmButtonText: "Evet, Eminim"
            })
            .then((result) => {
               if(result.isConfirmed) {
                  $titles = event['title'];
                  $SessionType = null;
                  if ($titles.indexOf('KNTRL') > -1) { $SessionType = 'kontrol'; }
                  else { $SessionType = 'seans';}
                  $.ajax({
                     type: "POST",
                     url: "/api/update/app-events/dragDropRoom.php",
                     data: ({
                        eventID: event.id,
                        newDT: moment(event.start).format('YYYY-MM-DD[T]HH:mm'),
                        newRoom: event.resourceId,
                        sessionType: $SessionType
                     }),
                     success: function(result) {
                        var obj = JSON.parse(result);
                        if(obj['status']==true){
                           $focusDate = obj['focusDate'];
                           Toast.fire({
                              icon: 'success',
                              title: 'Seans değişikliği başarılı.'
                           });
                           window.location.href = '/app-events?focusDate=' + $focusDate;
                        }
                     }
                  });
               }else {
                  revertFunc();
                  Toast.fire({
                     icon: 'info',
                     title: 'Seans değişikliğinden vazgeçildi.'
                  });
               }
            });
         },
         eventRender: function(event, element) {
            element.bind('click', function() {
               var seansid = event.id;
               $.ajax({
                  type: "GET",
                  url: "api/ajaxStpk.php",
                  data: ({
                     SessionID: seansid
                  }),
                  success: function(result) {
                     var obj = JSON.parse(result);
                     var getdatas = obj[0]['id'];
                     window.location.href = 'session-details.php?CID=' + getdatas;
                  }
               });
            });
            element.popover({
               title: event.title,
               html: true,
               content: event.description,
               trigger: 'hover',
               placement: 'top',
               container: 'body'
            });
         },
         html: true,


         events: '/api/select/events-meeting.php'

      });
      $('#dateField').change(function() {
         dateString = $("#dateField").val();
         let d = $.fullCalendar.moment(dateString);
         $('#fc-default').fullCalendar('gotoDate', d);
      });

      if ($.urlParam('focusDate')) {
         $focusDate = $.urlParam('focusDate');
         let d = $.fullCalendar.moment($focusDate);
         $('#fc-default').fullCalendar('gotoDate', d);
      }
      $.ajax({
         type: 'POST',
         url: '/api/select/day-of-work.php',
         data: {
            id: $(this).val()
         },
         success: function(data) {
            bizHours = JSON.parse(data);
            var AllDayStart = bizHours[6]['start'];
            var AllDayFinish = bizHours[6]['end'];
            // console.log(AllDayStart);
            $('#fc-default').fullCalendar('option', {
               businessHours: bizHours
            });
            $('#fc-default').fullCalendar('option', {
               minTime: AllDayStart,
               maxTime: AllDayFinish,
            });
            $('.steps-validation').append('<input type="hidden" name="minHour" value="'+AllDayStart+'" />');
            $('.steps-validation').append('<input type="hidden" name="maxHour" value="'+AllDayFinish+'" />');

         }
      });
   });
   </script>
   <script src="/app-assets/js/snow.js"></script>
    <script>
        $( ".nav-link-layout" ).click(function() {
            if(localStorage.getItem("layout")=='light-layout'){
                localStorage.setItem('layout','dark-layout');
                $('.loaded').addClass('dark-layout');
            }else if(localStorage.getItem("layout")=='dark-layout'){
                localStorage.setItem('layout','light-layout');
                $('.loaded').removeClass('dark-layout');
            }else{
                localStorage.setItem('layout','dark-layout');
                $('.loaded').addClass('dark-layout');
            }
        });

    </script>

   <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>