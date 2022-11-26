/*=========================================================================================
    File Name: app-user.js
    Description: User page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {

    var isRtl;
    if ( $('html').attr('data-textdirection') == 'rtl' ) {
      isRtl = true;
    } else {
      isRtl = false;
    }
  
    //  Rendering badge in status column
    var customBadgeHTML = function (params) {
      var color = "";
      if (params.value == "active") {
        color = "success"
        return "<div class='badge badge-pill badge-light-" + color + "' >" + params.value + "</div>"
      } else if (params.value == "blocked") {
        color = "danger";
        return "<div class='badge badge-pill badge-light-" + color + "' >" + params.value + "</div>"
      } else if (params.value == "deactivated") {
        color = "warning";
        return "<div class='badge badge-pill badge-light-" + color + "' >" + params.value + "</div>"
      }
    }
  
    //  Rendering bullet in verified column
    var customBulletHTML = function (params) {
      var color = "";
      if (params.value == true) {
        color = "success"
        return "<div class='bullet bullet-sm bullet-" + color + "' >" + "</div>"
      } else if (params.value == false) {
        color = "secondary";
        return "<div class='bullet bullet-sm bullet-" + color + "' >" + "</div>"
      }
    }
       
   
    // Renering Icons in Actions column
    var customIconsHTML = function (params) {
      var usersIcons = document.createElement("span");
      //var eventIconHTML = '<input type="button" class="btn bg-gradient-success round mr-50 mb-100 waves-effect waves-light" value="Yeni Paket" data-i18n="Add New Customer" onclick="window.location=`/takvim.php?id='+params.data.ID+'`;">';
      //var deleteIconHTML = '<button type="button" class="btn bg-gradient-danger round mr-50 mb-100 waves-effect waves-light CustomerDelete" ids="'+params.data.ID+'">Sil</button>';
      var deleteIconHTML = document.createElement('i');
      var attr = document.createAttribute("class")
      var attrID = document.createAttribute("ids")
      attr.value = "btn bg-gradient-danger btn-icon btn-relief-danger round mr-50 mb-100 btn-sm waves-effect waves-light feather icon-trash-2"
      attrID.value = params.data.ID
      deleteIconHTML.setAttributeNode(attr);
      deleteIconHTML.setAttributeNode(attrID);
      // selected row delete functionality
      var EditIconHTML = document.createElement('i');
      var attr = document.createAttribute("class")
      var attrID = document.createAttribute("ids")
      //btn bg-gradient-danger btn-icon btn-relief-danger round mr-50 mb-100 btn-sm waves-effect waves-light feather icon-trash-2
      attr.value = "btn bg-gradient-success btn-icon btn-relief-success btn-sm round mr-50 mb-100 waves-effect waves-light feather icon-edit tetiks-"+params.data.ID
      attrID.value = params.data.ID
      EditIconHTML.setAttributeNode(attr);
      EditIconHTML.setAttributeNode(attrID);
      // selected row delete functionality
      EditIconHTML.addEventListener("click", function () {
        var ids = $(this).attr("ids");
        $('#FormEditHizmet')[0].reset();
        $("#add-edit-data").addClass("show");
        $("#overlay-bg-edit").addClass("show");
            $.ajax({
                type: "get",
                url: "/api/ajaxQhizmet.php",
                data:{id:ids},
                success: function(res){
                    var obj = JSON.parse(res);
                    var id = obj['Service'][0]['ID'];
                    var hizmet_adi = obj['Service'][0]['Name'];
                    var hizmet_sure = obj['Service'][0]['Duration'];
                    var hizmet_seans = obj['Service'][0]['NumbOfSession'];
                    var hizmet_fiyat = obj['Service'][0]['Price'];
                    var Strcurrency = obj['Service'][0]['Currency'];

                    var selectedListSet = [];
                    var return_first;
                    function callback(response, obj) {
                        return_first = response;
                        TumBolgeler = obj;
                    }

                    $("#inp-edit-currency").prop('selectedIndex', 0);
                    $("#inp-edit-currency").val(Strcurrency).trigger("change");
                    $(`#inp-edit-currency option[value=`+Strcurrency+`]`).attr('selected', 'selected');
            
                    $('#hizmetBolgesi').empty();
                    var selectedRegions = obj['Regions'];
                    $.each( selectedRegions, function( key, val ) {
                        $('#hizmetBolgesi').append($('<option>', {
                            value: val['id'],
                            text: val['text']
                        }));
                        selectedListSet.push(val['id']);
                    });
                    // callback(selectedListSet, JSON.stringify(AllRegions));
                    $("#hizmetBolgesi").val(selectedListSet).trigger("change");

                    $("#hizmetid").val(id);
                    $("#inp-edit-hizmet-adi").val(hizmet_adi);
                    $("#inp-edit-fiyat").val(hizmet_fiyat);

                    $('#inp-edit-hizmet-suresi').select2({
                        initSelection: function(element, callback) {return callback({text: hizmet_sure });},
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
                          success: function(result) {
                           
                          },
                          cache: true
                        }
                    });
                    $('#inp-edit-seans-sayisi').select2({
                        initSelection: function(element, callback) {return callback({text: hizmet_seans });},
                        allowClear: true,
                        placeholder: 'Seçiniz',
                        ajax: {
                          url: '/api/ajaxSeans.php',
                          dataType: 'json',
                          delay: 250,
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



                },
                error:function(error)
                { console.log(error); }
            });
      });

      if(params.data.STATUS==1){
        deleteIconHTML.addEventListener("click", function () {
          var ids = $(this).attr("ids");
          
          $.ajax({
            type: "POST",
            url: "/api/delete/app-services/isitposible.php",
            data: {
                ids: ids
            },
            success: function(res) {
              res = JSON.parse(res)
              console.log(res);
                if (res['code'] == 1000) {
                  console.log('okey');
                  Swal.fire({
                    title: "Buna gerçekten min misiniz?",
                    html:'Bu hizmeti silmek istediğinize emin misiniz?',
                    icon: 'warning',
                    width: 600,
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    cancelButtonText: `Vazgeçtim`,
                  }).then((result) => {
                      if (result.isConfirmed) {
                          $.ajax({
                            type: "POST",
                            url: "/api/delete/app-services/service.php",
                            data: {
                                ids: ids,
                                important: true
                            },
                            success: function(res) {
                              res = JSON.parse(res);
                              if (res['status'] == true) {
                                Swal.fire({
                                  position: 'center',
                                  icon: 'success',
                                  title: 'Başarıyla gizlendi',
                                  html: 'Sayfa yenileniyor...',
                                  showConfirmButton: false,
                                  timer: 1500
                                })
                                setInterval(function() {
                                  location.reload();
                                }, 1500);
                              

                              }else if(res['status']==false){
                                alert('hata!!!!');
                              }
                            }
                          });
                      } else {
                        alert('hata!!!!');
                      }
                  });
                }else if(res['status']==false) {
                  // swal("Hata!", "Silme esnasında hata oluştu.", "error");
                  var ServiceCounts = res['serviceCounts'];
                  Swal.fire({
                    title: "Bu hizmet silinemez",
                    html:
                    'Bu Hizmet <b>'+ServiceCounts+'</b> işlemde kullanılıyor silinemez, ancak gizleyebilirsiniz.<br>Gizlemek istiyor musunuz?',
                    icon: 'warning',
                    showDenyButton: false,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    cancelButtonText: `Vazgeçtim`,
                  }).then((result) => {
                    if (result.isConfirmed) {
                      $.ajax({
                        type: "POST",
                        url: "/api/delete/app-services/service.php",
                        data: {
                            ids: ids,
                            important: true
                        },
                        success: function(res) {
                          res = JSON.parse(res);
                          if (res['status'] == true) {
                            Swal.fire({
                              position: 'center',
                              icon: 'success',
                              title: 'Başarıyla gizlendi',
                              html: 'Sayfa yenileniyor...',
                              showConfirmButton: false,
                              timer: 1500
                            })
                            setInterval(function() {
                              location.reload();
                            }, 1500);
                          

                          }else if(res['status']==false){
                            alert('hata!!!!');
                          }
                        }
                      });
                      // location.reload();
                    } else{
                      Swal.fire('İşlemden vazgeçildi.', '', 'info')
                      Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: 'İşlemden vazgeçildi.',
                        showConfirmButton: false,
                        timer: 1500
                      });
                    }
                  })
                }
            }
          })
        });
        usersIcons.appendChild(EditIconHTML);
        usersIcons.appendChild(deleteIconHTML);

      }else if(params.data.STATUS==0){
        usersIcons.appendChild(EditIconHTML);
      }

  
      return usersIcons
    }
  
    //  Rendering avatar in username column
    var customAvatarHTML = function (params) {
      return "<span class='avatar'><img src='" + params.data.avatar + "' height='32' width='32'></span>" + params.value
    }


  
    // ag-grid
    /*** COLUMN DEFINE ***/
  
    var columnDefs = [
        {
            headerName: 'Hizmet Adı',
            field: 'SERVICES',
            filter: true,
            width: 250,
            resizable: true,
            cellStyle: {
              "text-align": "left",
            },
            cellRenderer: function(params) {
              if(params.data.STATUS==1){
                return '<a style="font-weight:bolder;"><i class="feather icon-bookmark" style="color:#1dab95"></i> '+ params.data.SERVICES+'</a>'
              }else if(params.data.STATUS==0){
                return '<a style="font-weight:bolder;"><i class="feather icon-bookmark" style="color:red"></i> '+ params.data.SERVICES+'</a>'
              }
            }
        },
        {
          headerName: 'ID',
          field: 'ID',
          width:75,
          resizable: false,
          filter: false,
          cellStyle: {
            "text-align": "center",
          },
        },
        {
          headerName: 'DURUM',
          field: 'STATUS',
          width:115,
          resizable: false,
          filter: true,
          cellStyle: {
            "text-align": "center",
          },
          cellRenderer: function(params) {
            if(params.data.STATUS==1){
              return '<a class="success" style="font-weight:bolder;">AKTİF</a>'
            }else if(params.data.STATUS==0){
              return '<a class="danger" style="font-weight:bolder;">GİZLİ</a>'
            }
          }
        },
        {
          headerName: 'SEANS',
          field: 'SESSION',
          width:115,
          resizable: false,
          filter: true,
        },
        {
          headerName: 'SÜRE',
          field: 'TIME',
          width:150,
          resizable: false,
          filter: true,
        },
        {
          headerName: 'FİYAT',
          field: 'PRICE',
          width:150,
          resizable: false,
          filter: true,
          cellRenderer: function(params) {
            return params.data.PRICE+' '+params.data.CURRENCY
          }
        },
        {
          headerName: 'BÖLGE',
          field: 'COUNTS',
          width:125,
          resizable: false,
          filter: true,
        },
        {
          headerName: 'SON GÜNCLLEME',
          field: 'UPD_DT',
          width:150,
          resizable: false,
          filter: true,
        },
        {
          headerName: 'İşlem Yap',
          resizable: true,
          width:180,
          cellStyle: {
            "text-align": "center",
          },
          cellRenderer: customIconsHTML,
        }
    ];
    
  
    /*** GRID OPTIONS ***/
    var gridOptions = {
      defaultColDef: {
        resizable: true,
        sortable: true,
  
      },
      enableRtl: isRtl,
      columnDefs: columnDefs,
      rowSelection: "multiple",
      floatingFilter: false,
      pagination: true,
      paginationPageSize: 10,
      pivotPanelShow: "always",
      colResizeDefault: "shift",
      animateRows: true,
      
     // onFirstDataRendered: onFirstDataRendered,
     /* onGridSizeChanged: onGridSizeChanged, */
    };
  
    function onFirstDataRendered(params) {
      params.api.sizeColumnsToFit();
    }
    
    function onGridSizeChanged(params) {
      // get the current grids width
      var gridWidth = document.getElementById('myGrid').offsetWidth;
    
      // keep track of which columns to hide/show
      var columnsToShow = [];
      var columnsToHide = [];
    
      // iterate over all columns (visible or not) and work out
      // now many columns can fit (based on their minWidth)
      var totalColsWidth = 0;
      var allColumns = params.columnApi.getAllColumns();
      for (var i = 0; i < allColumns.length; i++) {
        var column = allColumns[i];
        totalColsWidth += column.getMinWidth();
        if (totalColsWidth > gridWidth) {
          columnsToHide.push(column.colId);
        } else {
          columnsToShow.push(column.colId);
        }
      }
    
      // show/hide columns based on current grid width
      params.columnApi.setColumnsVisible(columnsToShow, true);
      params.columnApi.setColumnsVisible(columnsToHide, false);
    
      // fill out any available space to ensure there are no gaps
      params.api.sizeColumnsToFit();
    }
    
  
  
    if (document.getElementById("myGrid")) {
      /*** DEFINED TABLE VARIABLE ***/
      var gridTable = document.getElementById("myGrid");
  
      /*** GET TABLE DATA FROM URL ***/
      agGrid
        .simpleHttpRequest({
          //url: "../../../app-assets/data/users-list.json"
          url: "/app-assets/data/app-services.php"
        })
        .then(function (data) {
          gridOptions.api.setRowData(data);
        });
  
      /*** FILTER TABLE ***/
      function updateSearchQuery(val) {
        gridOptions.api.setQuickFilter(val);
      }
  
      $(".ag-grid-filter").on("keyup", function () {
        updateSearchQuery($(this).val());
      });
  
      /*** CHANGE DATA PER PAGE ***/
      function changePageSize(value) {
        gridOptions.api.paginationSetPageSize(Number(value));
      }
  
      $(".sort-dropdown .dropdown-item").on("click", function () {
        var $this = $(this);
        changePageSize($this.text());
        $(".filter-btn").text("1 - " + $this.text() + " of 50");
      });
  
      /*** EXPORT AS CSV BTN ***/
      $(".ag-grid-export-btn").on("click", function (params) {
        gridOptions.api.exportDataAsCsv();
      });
  
      //  filter data function
      var filterData = function agSetColumnFilter(column, val) {
        var filter = gridOptions.api.getFilterInstance(column)
        var modelObj = null
        if (val !== "all") {
          modelObj = {
            type: "equals",
            filter: val
          }
        }
        filter.setModel(modelObj)
        gridOptions.api.onFilterChanged()
      }
      //  filter inside role
      $("#users-list-role").on("change", function () {
        var usersListRole = $("#users-list-role").val();
        filterData("role", usersListRole)
      });
      //  filter inside verified
      $("#users-list-verified").on("change", function () {
        var usersListVerified = $("#users-list-verified").val();
        filterData("is_verified", usersListVerified)
      });
      //  filter inside status
      $("#users-list-status").on("change", function () {
        var usersListStatus = $("#users-list-status").val();
        filterData("status", usersListStatus)
      });
      //  filter inside department
      $("#users-list-department").on("change", function () {
        var usersListDepartment = $("#users-list-department").val();
        filterData("department", usersListDepartment)
      });
      // filter reset
      $(".users-data-filter").click(function () {
        $('#users-list-role').prop('selectedIndex', 0);
        $('#users-list-role').change();
        $('#users-list-status').prop('selectedIndex', 0);
        $('#users-list-status').change();
        $('#users-list-verified').prop('selectedIndex', 0);
        $('#users-list-verified').change();
        $('#users-list-department').prop('selectedIndex', 0);
        $('#users-list-department').change();
      });
  
      /*** INIT TABLE ***/
      new agGrid.Grid(gridTable, gridOptions);
    }
    // users language select
    if ($("#users-language-select2").length > 0) {
      $("#users-language-select2").select2({
        dropdownAutoWidth: true,
        width: '100%'
      });
    }
    // users music select
    if ($("#users-music-select2").length > 0) {
      $("#users-music-select2").select2({
        dropdownAutoWidth: true,
        width: '100%'
      });
    }
    // users movies select
    if ($("#users-movies-select2").length > 0) {
      $("#users-movies-select2").select2({
        dropdownAutoWidth: true,
        width: '100%'
      });
    }
    // users birthdate date
    if ($(".birthdate-picker").length > 0) {
      $('.birthdate-picker').pickadate({
        format: 'mmmm, d, yyyy'
      });
    }
    // Input, Select, Textarea validations except submit button validation initialization
    if ($(".users-edit").length > 0) {
      $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
    }
  });
  
  
  $(document).on('click', '#hizmetGuncelle', function(){
    if($('#inp-edit-hizmet-adi').val().length >0 && $('#inp-edit-fiyat').val() >0){
      $.ajax({
         type: "GET",
         url: "/api/update/app-services/index.php",
         data: $('#FormEditHizmet').serialize(),
         success: function(res) {
          var obj = JSON.parse(res);

              if(obj['code']==1000){                  
                  Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Başarıyla güncellendi',
                    html: 'Sayfa yenileniyor...',
                    showConfirmButton: false,
                    timer: 1500
                  })
                  setInterval(function() {
                    location.reload();
                  }, 1500);
              }else if(obj['status']==false){
                toastr.error('Silmeye çalıştığınız bölge seanslar arasında kullanılıyor. Silmek için lütfen önce seansdan kaldırınız.', 'Bu bölge Silinemez!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
                toastr.success('Listeye tekrar eklendi..', 'Bu bölge Silinemez!', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });

                  var currentRegionValues = $('#hizmetBolgesi').val();
                  console.log('currentRegionValues: '+currentRegionValues);

                  var resReqireVal = obj['requireID'];

                  console.log('resReqireVal: '+resReqireVal);
                  $.each( resReqireVal, function( key, val ) {
                    // console.log(val);
                    currentRegionValues.push(val);

                });
                console.log('currentRegionValues: '+currentRegionValues);
                  $("#hizmetBolgesi").val(currentRegionValues).trigger("change");
              }
          }
      })
    }else{
      Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
    }  
  });
  
  $(document).on('click', '#hizmetEkle', function(){
    if( $('#inp-add-hizmet-adi').val().length >0 &&
      $('#inp-add-fiyat').val() >0 &&
      $('#inp-add-currency').val() != 'null' &&
      $('#inp-add-seans-sayisi').val() >0 &&
      $('#inp-add-hizmet-suresi').val() >0){
      $.ajax({
         type: "GET",
         url: "/api/ajaxInsHizmet.php",
         data: $('#FormAddHizmet').serialize(),
         success: function(result) {
              if(result=="basarili"){
                  location.reload();
                  window.location.href='/app-services';
              }
          }
      })
    }else{
      Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
    }  
  });