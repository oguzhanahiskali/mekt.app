<?php include 'header-top.php'; ?>
<?php if($staffMission!=1){ header("location: /?errorCode=2000&URLocation=".$_SERVER['REQUEST_URI']); exit(); }?>

<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php include 'includes/head.php'?>
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">

<style>
div.ag-theme-alpine div.ag-row {
   font-size: 5px !important;
}
</style>
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
                     <h2 class="content-header-title float-left mb-0">Şirket Çalışma Cetveli</h2>
                     <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.php">Özet Ekranı</a>
                           </li>
                           <li class="breadcrumb-item active">Şirket Çalışma Cetveli
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
                     <div id="basic-examples">
                        <div class="card">
                           <div class="card-content">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-12">
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
                                                            <input type="checkbox" class="custom-control-input" name="CheckTuesday" id="CheckTuesday">
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
                                                            <input type="checkbox" class="custom-control-input" name="CheckWednesday" id="CheckWednesday">
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
                                                            <input type="checkbox" class="custom-control-input" name="CheckThursday" id="CheckThursday">
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
                                                            <input type="checkbox" class="custom-control-input" name="CheckFriday" id="CheckFriday">
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
                                                            <input type="checkbox" class="custom-control-input" name="CheckSaturday" id="CheckSaturday">
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
                                                            <input type="checkbox" class="custom-control-input" name="CheckSunday" id="CheckSunday">
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
                                                      <th scope="row">Genel Ayar</th>
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
   <script src="/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>

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
        $('.action-edit').on("click", function(e) {
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
                if (obj[0]['status'] == 'true') $('#CheckMonday').attr('checked', true);
                else $('#CheckMonday').attr('checked', false);
                $('#StartMonday').val(obj[0]['start']);
                $('#FinishMonday').val(obj[0]['end']);

                if (obj[1]['status'] == 'true') $('#CheckTuesday').attr('checked', true);
                else $('#CheckTuesday').attr('checked', false);
                $('#StartTuesday').val(obj[1]['start']);
                $('#FinishTuesday').val(obj[1]['end']);

                if (obj[2]['status'] == 'true') $('#CheckWednesday').attr('checked', true);
                else $('#CheckWednesday').attr('checked', false);
                $('#StartWednesday').val(obj[2]['start']);
                $('#FinishWednesday').val(obj[2]['end']);

                if (obj[3]['status'] == 'true') $('#CheckThursday').attr('checked', true);
                else $('#CheckThursday').attr('checked', false);
                $('#StartThursday').val(obj[3]['start']);
                $('#FinishThursday').val(obj[3]['end']);

                if (obj[4]['status'] == 'true') $('#CheckFriday').attr('checked', true);
                else $('#CheckFriday').attr('checked', false);
                $('#StartFriday').val(obj[4]['start']);
                $('#FinishFriday').val(obj[4]['end']);

                if (obj[5]['status'] == 'true') $('#CheckSaturday').attr('checked', true);
                else $('#CheckSaturday').attr('checked', false);
                $('#StartSaturday').val(obj[5]['start']);
                $('#FinishSaturday').val(obj[5]['end']);

                if (obj[6]['status'] == 'true') $('#CheckSunday').attr('checked', true);
                else $('#CheckSunday').attr('checked', false);
                $('#StartSunday').val(obj[6]['start']);
                $('#FinishSunday').val(obj[6]['end']);

                // if(obj[7]['status']=='true') $('#CheckSunday').attr('checked', true); else $('#CheckSunday').attr('checked', false);
                $('#AllDayStart').val(obj[7]['start']);
                $('#AllDayFinish').val(obj[7]['end']);
            }
        });
    });

    function TrueFalse() {
        if ($('#CheckMonday').is(':checked') == true) {
            $('#StartMonday').prop('disabled', false);
            $('#FinishMonday').prop('disabled', false);
        } else {
            $('#StartMonday').prop('disabled', true);
            $('#FinishMonday').prop('disabled', true);
        }

        if ($('#CheckTuesday').is(':checked') == true) {
            $('#StartTuesday').prop('disabled', false);
            $('#FinishTuesday').prop('disabled', false);
        } else {
            $('#StartTuesday').prop('disabled', true);
            $('#FinishTuesday').prop('disabled', true);
        }

        if ($('#CheckWednesday').is(':checked') == true) {
            $('#StartWednesday').prop('disabled', false);
            $('#FinishWednesday').prop('disabled', false);
        } else {
            $('#StartWednesday').prop('disabled', true);
            $('#FinishWednesday').prop('disabled', true);
        }

        if ($('#CheckThursday').is(':checked') == true) {
            $('#StartThursday').prop('disabled', false);
            $('#FinishThursday').prop('disabled', false);
        } else {
            $('#StartThursday').prop('disabled', true);
            $('#FinishThursday').prop('disabled', true);
        }

        if ($('#CheckFriday').is(':checked') == true) {
            $('#StartFriday').prop('disabled', false);
            $('#FinishFriday').prop('disabled', false);
        } else {
            $('#StartFriday').prop('disabled', true);
            $('#FinishFriday').prop('disabled', true);
        }

        if ($('#CheckSaturday').is(':checked') == true) {
            $('#StartSaturday').prop('disabled', false);
            $('#FinishSaturday').prop('disabled', false);
        } else {
            $('#StartSaturday').prop('disabled', true);
            $('#FinishSaturday').prop('disabled', true);
        }

        if ($('#CheckSunday').is(':checked') == true) {
            $('#StartSunday').prop('disabled', false);
            $('#FinishSunday').prop('disabled', false);
        } else {
            $('#StartSunday').prop('disabled', true);
            $('#FinishSunday').prop('disabled', true);
        }
    }

    $(document).on('change', ':checkbox', function() {
        if (this.checked) {
            $('#' + this.id).attr('checked', true);
            $('#' + this.id).val(true);
            $('#' + this.id).prop('checked', true);
        } else {
            $('#' + this.id).attr('checked', false);
            $('#' + this.id).val(false);
            $('#' + this.id).prop('checked', false);
        }
        TrueFalse();
    });

    $("#dayOfworkUpdate").click(function() {
        $('#FormdayOfwork').find(':input:disabled').prop("disabled", false);
        var AllInputs = $('#FormdayOfwork input:not([type="checkbox"])').serialize();
        var checkInputs = $("#FormdayOfwork input[type='checkbox']").map(function() {
            return this.name + "=" + this.checked;
        }).get().join("&");
        if (checkInputs != "" && AllInputs != "") AllInputs += "&" + checkInputs;
        else AllInputs += checkInputs;
        $.ajax({
            type: "POST",
            url: "/api/update/dayOfWorks.php",
            data: AllInputs,
            success: function(res) {
                var obj = JSON.parse(res);
                if (obj['code'] == 1000) {
                location.reload();
                } else {
                alert('Errör');
                }
            }
        });

        TrueFalse();
    });
   </script>
</body>
<!-- END: Body-->

</html>