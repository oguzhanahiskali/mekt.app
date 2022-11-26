
    <!-- Modal -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Destek Bildirimi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#">
                    <div class="modal-body">
                        <label>İlgili: </label>
                        <div class="form-group">
                            <select class="form-control" id="supportType">
                                <option>Satış Destek</option>
                                <option>Yazılım Destek</option>
                                <option>Yazılım Talep</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <fieldset class="form-label-group">
                                <input type="text" class="form-control" id="floating-label1" placeholder="Konu">
                                <label for="floating-label1">Konu</label>
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset class="form-label-group">
                                <textarea class="form-control" id="label-textarea" rows="3" placeholder="Mesajınız nedir?"></textarea>
                                <label for="label-textarea">Mesajınız nedir?</label>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Gönder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <ul class='custom-menu font-weight-bolder'>
        <li data-action="first" class="danger"><i class="fa fa-chevron-left"></i> Geri Dön</li>
        <li data-action="seconloadd" class="info"><i class="fa fa-repeat"></i> Sayfayı Yenile</li>
        <li data-action="third" class="success"><i class="fa fa-calendar"></i> Randevu Takvimi</li>
    </ul>
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2018-2022, EstetikPanel is a registered trademark of<a class="text-bold-800 grey darken-2" style="font-weight:bolder" href="https://www.webvilla.web.tr" target="_blank">Webvilla Creative</a>| All rights Reserved</span><span class="float-md-right d-none d-md-block">Hand-crafted & Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>


    <!-- BEGIN: Vendor JS-->
    <script src="/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
                
            i18next.on('loaded', function(loaded) {
                i18next.changeLanguage('<?=$userDil?>', function (err, t) {
                    $(document).localize();
                    localStorage.removeItem('LangStatus');
                    localStorage.setItem('LangStatus',i18next.language);
                });
            });
        });
    </script>

    <?php if($urls == 'index.php'){
        echo '<script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
        <script src="/app-assets/vendors/js/extensions/tether.min.js"></script>
        <script src="/app-assets/js/weather.js"></script>
        ';
    }elseif($urls == 'app-customer-list.php' || $urls == 'app-services.php' || $urls == 'app-products.php'  || $urls == 'app-services-application-areas.php' ){//app-customer-list.php?>
    <script src="/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>    <?php
    } ?>

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://unpkg.com/ag-grid-community@26.1.0/dist/ag-grid-community.min.noStyle.js"></script>
    <!-- <script src="/app-assets/vendors/js/tables/ag-grid/ag-grid-community.min.noStyle.js"></script> -->
    <!-- END: Page Vendor JS-->
    <script>

    </script>
    

    <!-- BEGIN: Theme JS-->
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>
    <script src="/app-assets/js/core/app-menu.js"></script>
    <script src="/app-assets/js/core/app.js"></script>
    <script src="/app-assets/js/scripts/components.js"></script>
    <!-- SESSION-DETAILS PAGE  -->
    <script src="app-assets/vendors/js/extensions/moment.min.js"></script>
    <?php if($urls == 'app-events.php'){
        echo '
        <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
        <script src="https://estetik.app/app-assets/js/scripts/extensions/full-calendar-scheduler.min.js"></script>
        <script src="/app-assets/vendors/js/extensions/fullcalendar.min.js"></script>
        <script src="/app-assets/js/scripts/extensions/full-calendar-scheduler.min.js"></script>
        <script src="/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
        <script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
        <script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    }
    ?>
    <!--<script src = "https://code.jquery.com/mobile/1.5.0-rc1/jquery.mobile-1.5.0-rc1.min.js"></script>-->
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="/app-assets/js/scripts/forms/jquery.inputmask.bundle.min.js"></script>
    <script src="/app-assets/js/scripts/forms/form-inputmask.js"></script>

    <script src="/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>

    <!-- SESSION-DETAILS PAGE  -->

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    
    <?php
    if($urls == 'app-wizard.php'){
        echo "<script src='/app-assets/vendors/js/forms/validation/jquery.validate.min.js'></script>
        <script src='/app-assets/js/scripts/forms/wizard-steps.js'></script>
        <script>
        var newId = (function() {
            var id = 1;
            return function() {
                return id++;
            };
        }());
        function drawNavigation() {
            var numAddresses = $('#to-add-first .clone').length;
            if (numAddresses > 1) {
                $('#primary .deleteNow').hide();
            }
            else {
                $('#primary .deleteNow').hide();
            }
        }
    
        function deleteAddress(e) {
            $(e).parents('.clone').remove();
            drawNavigation();
        }
    
        function counts(){
            var roomcount = $('#inp-count').val();
            for(var i = 0; i < roomcount; i++) {
                var clone = $('#primary').clone().attr('id', 'primary-'+(i+1));
                clone.find('[type=text]').val('');
                clone.find('.deleteNow').show();
                $('#to-add-first').append(clone);
                drawNavigation();
            }
        }
        function addAddress() {
            var clone = $('#primary').clone().attr('id', newId());
            clone.find('[type=text]').val('');
            clone.find('.deleteNow').show();
            $('#to-add-first').append(clone);
            drawNavigation();
        }
        $(function() {
            drawNavigation();
        });
    
        </script>";

    }
     if($urls == 'app-customer-list.php'){//app-customer-list.php?>
        <script src="/app-assets/js/scripts/pages/app-user.js"></script>
        <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
        <script src="/app-assets/js/scripts/ui/data-list-view.js"></script>
        <script>
        $(document).ready(function() {
                // Close sidebar
            $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
                $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")
                $("#data-name, #data-price").val("")
                $("#data-category, #data-status").prop("selectedIndex", 0)
            })
            // On Edit
            $('.action-edit').on("click",function(e){
                e.stopPropagation();
                $('#data-name').val('Altec Lansing - Bluetooth Speaker');
                $('#data-price').val('$99');
                $(".add-new-data").addClass("show");
                $(".overlay-bg").addClass("show");
            });
        });
        </script><?php
    }else if($urls == 'page-account-settings.php'){
        echo '    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-grid.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/ag-grid/ag-theme-material.css">
        <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/aggrid.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/css/plugins/forms/validation/form-validation.css">
    ';
    }elseif($urls=='report-earnings.php'){?>
        <script src="/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
        <script src="/app-assets/js/scripts/forms/validation/form-validation.js"></script>
        <script src="/app-assets/js/scripts/components.js"></script>

        <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
        <script src="/app-assets/js/scripts/pages/report-earnings.js"></script>

        <script>
            // Close sidebar
            $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
                $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")
                $("#data-name, #data-price").val("")
                $("#data-category, #data-status").prop("selectedIndex", 0)
                
            })
            // On Edit
            $('.action-add').on("click",function(e){
                $('.inp-add-seans-sayisi').val(null).trigger('change');
                $('.inp-add-hizmet-suresi').val(null).trigger('change');
                e.stopPropagation();
                $(".add-new-data").addClass("show");
                $(".overlay-bg").addClass("show");
                slugify = function(text) {
                    var trMap = {
                        'çÇ':'c',
                        'ğĞ':'g',
                        'şŞ':'s',
                        'üÜ':'u',
                        'ıİ':'i',
                        'öÖ':'o'
                    };
                    for(var key in trMap) {
                        text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
                    }
                    return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '') // remove non-alphanumeric chars
                                .replace(/\s/gi, "-") // convert spaces to dashes
                                .replace(/[-]+/gi, "-") // trim repeated dashes
                                .toLowerCase();
                }
            });
        </script>
    <?php
    }elseif($urls == 'app-services.php' || $urls == 'app-services-application-areas.php'){//app-services.php?>
        <script src="/app-assets/js/scripts/pages/app-services.js"></script>
        <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
        <!-- <script src="/app-assets/js/scripts/ui/data-list-view.js"></script> -->
        <script>
        $(document).ready(function() {
            const regionArray = [];
            
            function callback(response) {
                    return_first = response;
            }

                // Close sidebar
            $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
                $(".add-new-data").removeClass("show")
                $(".overlay-bg").removeClass("show")
                $("#data-name, #data-price").val("")
                $("#data-category, #data-status").prop("selectedIndex", 0)
                
            })
            // On Edit
            $('.action-add').on("click",function(e){
                $('.inp-add-seans-sayisi').val(null).trigger('change');
                $('.inp-add-hizmet-suresi').val(null).trigger('change');
                e.stopPropagation();
                $(".add-new-data").addClass("show");
                $(".overlay-bg").addClass("show");
                slugify = function(text) {
                    var trMap = {
                        'çÇ':'c',
                        'ğĞ':'g',
                        'şŞ':'s',
                        'üÜ':'u',
                        'ıİ':'i',
                        'öÖ':'o'
                    };
                    for(var key in trMap) {
                        text = text.replace(new RegExp('['+key+']','g'), trMap[key]);
                    }
                    return  text.replace(/[^-a-zA-Z0-9\s]+/ig, '') // remove non-alphanumeric chars
                                .replace(/\s/gi, "-") // convert spaces to dashes
                                .replace(/[-]+/gi, "-") // trim repeated dashes
                                .toLowerCase();
                }

                $.ajax({
                    type: "get",
                    url: "/api/ajaxRegionDiff.php",
                    success: function(res){
                        var obj = JSON.parse(res);
                        $('#to-addList').empty();
                        $.each(obj, function (key, value) {
                            var textToUrl = slugify(value);
                            $('#to-addList').append(`
                                <div id="div-`+textToUrl+`" style="margin-bottom : 0.5rem !important;">
                                    <div class="custom-control custom-switch switch-lg custom-switch-success">
                                        <div class="row">
                                            <div class="col-8 text-left" onclick='document.getElementById("`+textToUrl+`").click();'><p style="font-weight: 600;padding-left: .5em;" class="mb-0">`+value+`</p></div>
                                            <div class="col-4 text-right">
                                                <input type="checkbox" class="custom-control-input" id="`+textToUrl+`">
                                                <label class="custom-control-label" for="`+textToUrl+`">
                                                    <span class="switch-text-left">Olsun</span>
                                                    <span class="switch-text-right">Olmasın</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                            if(key%2==0){
                                $('#div-'+textToUrl).addClass( "evenb" );
                            }
                            $('#'+textToUrl).on('change', function() {
                                if ($(this).is(':checked')) {
                                    regionArray.push('inp-add-'+textToUrl+'-fiyat');
                                    regionArray.push('inp-add-'+textToUrl+'-hizmet-suresi');

                                    $(`#div-`+textToUrl).append(`
                                        <div class="row">
                                            <div class="col-12">
                                                <fieldset id="AppRegFieldset-`+textToUrl+`" class="border col-md-12 mb-1">
                                                    <legend class="w-auto">`+value+`</legend>
                                                    <div class="row">
                                                        <input name="regionName[]" type="hidden" value="`+value+`">
                                                        <div class="form-group col-6">
                                                            <label for="hizmet">Fiyat:<span class="danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="number" class="form-control inp-add-fiyat" placeholder="0,00" aria-label="" id="inp-add-`+textToUrl+`-fiyat" name="inp-add-`+textToUrl+`-fiyat" aria-invalid="false">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="hizmet">SEANS SÜRESİ:<span class="danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="select2sure select2 form-control required inp-add-hizmet-suresi" id="inp-add-`+textToUrl+`-hizmet-suresi" name="inp-add-`+textToUrl+`-hizmet-suresi"></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>`);
                                        $('#inp-add-'+textToUrl+'-hizmet-suresi').select2({
                                        allowClear: true,
                                        placeholder: 'Seçiniz',
                                        ajax: {
                                            url: '/api/ajaxSure.php',
                                            dataType: 'json',
                                            delay: 250,
                                            processResults: function (data) {
                                                return {
                                                    results: data
                                                };
                                            },
                                            success: function(result) {},
                                            cache: true
                                        }
                                    });
                                    // switchStatus = $(this).is(':checked');
                                    // console.log(textToUrl+' '+switchStatus);// To verify
                                }else{
                                    // switchStatus = $(this).is(':checked');
                                    // console.log(textToUrl+' '+switchStatus);// To verify
                                    regionArray.splice($.inArray('inp-add-'+textToUrl+'-fiyat', regionArray), 1);
                                    regionArray.splice($.inArray('inp-add-'+textToUrl+'-hizmet-suresi', regionArray), 1);
                                    $(`#AppRegFieldset-`+textToUrl).remove();
                                }
                            });

                        });
                    },
                    error:function(error)
                    { console.log(error); }
                });
            });
                        
            $(document).on('click', '#bolgeEkle', function(){
                if(regionArray.length>0){
                    var isEmptys = null;
                    $.each( regionArray, function( key, value ) {
                        // console.log( key + ": " + value );
                        if(!$('#'+value).val()){
                            isEmptys = 1;
                            Swal.fire("Boş alanlar var", "Lütfen eksik alanları kontrol edip yeniden deneyiniz.", "warning");
                        }
                    });
                    if(isEmptys!=1){
                        $.ajax({
                        type: "POST",
                        url: "/api/ajaxInsHizmetBolge.php",
                        data: $('#FormAddRegion').serialize(),
                        success: function(res) {
                                var obj = JSON.parse(res);
                                toastr.clear();
                                $.each( obj, function( i, field ) {
                                    if(obj[i]['code']==1033){
                                        toastr.error('<b>'+obj[i]['related']+'</b> zaten dahil edilmiş.', 'Başarısız:', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
                                    }else if(obj[i]['code']==1000){
                                        toastr.success('<b>'+obj[i]['related']+'</b> başarıyla dahil edildi.', 'Başarılı:', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
                                        setTimeout(function(){
                                            location.reload(1);
                                        }, 285);
                                    }
                                });
                            }
                        });
                    }
                }else{
                    Swal.fire("Bölge Seçilmedi", "Lütfen en az bir bölge aktif edip yeniden deneyiniz.", "warning");
                }
            });
        });
        </script>
        <script src="/app-assets/js/scripts/pages/app-services-areas.js"></script>
<?php
    }elseif($urls == 'app-products.php'){//app-products.php?>
        <script src="/app-assets/js/scripts/pages/app-products.js"></script>
        <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
        <!-- <script src="/app-assets/js/scripts/ui/data-list-view.js"></script> -->
<?php
    }elseif($urls == 'settings-room.php'){//settings-room.php?>
        <script src="/app-assets/js/scripts/pages/settings-room.js"></script>
        <script src="https://www.estetikpanel.com/app-assets/vendors/js/extensions/sweetalert.min.js"></script>
        <!-- <script src="/app-assets/js/scripts/ui/data-list-view.js"></script> -->
<?php
    }elseif($urls == 'app-customer-edit.php'){//app-customer-view.php?>
        <!--<script src="/app-assets/js/scripts/pages/app-user.js"></script>-->
        <script src="/app-assets/js/scripts/forms/jquery.inputmask.bundle.min.js"></script>
        <script src="/app-assets/js/scripts/forms/form-inputmask.js"></script>
        <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
        <?php
    }elseif($urls == 'app-customer-view.php'){//app-customer-view.php?>
        <!--<script src="/app-assets/js/scripts/pages/app-user.js"></script>-->
        <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

        <script src="/app-assets/js/scripts/forms/jquery.inputmask.bundle.min.js"></script>
        <script src="/app-assets/js/scripts/forms/form-inputmask.js"></script>
        <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
        <script>
            
            $('.hizmet-sil').click(function() {
                console.log("xxx");
            });
        </script>
        <?php
    }elseif($urls == 'index.php'){
        echo `<script src="/app-assets/js/scripts/pages/dashboard-analytics.js?aa"></script>`;
    }
    ?>
    <script>
        $(document).ready(function() {
            setTimeout(function(){
                $(document).prop('title', <?='i18next.t("Title '.$urlSlug.'")+" | EstetikPanel v2"'?>);
            }, 1500);
        });
    
    </script>
    <!-- END: Page JS-->
