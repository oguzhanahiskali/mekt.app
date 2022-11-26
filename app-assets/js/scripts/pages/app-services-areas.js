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
    deleteIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
            swal({
                title: "Hocam bak Emin misin?",
                text: "Bu bölgeyi silerseniz geri kurtaramayabilirsiniz :(",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Hayır, Vazgeçtim",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Evet, şimdi Sil",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    var ids = $(this).attr("ids");
                    $.ajax({
                        type: "GET",
                        url: "/api/delete/app-services-areas/region.php",
                        data: {
                            ids: ids
                        },
                        success: function(result) {
                          res = JSON.parse(result)
                          console.log(res['result']);
                            if (res['result'] == true) {
                              swal("Silindi!", "Bu hizmet başarıyla silindi.", "success");
                              window.location.href = "app-services-application-areas.php?respons=OK!";
                            }else if(res['result']==false) {
                              var resThis = res['This'];
                              swal("Hata!", "Silme esnasında hata oluştu.", "error");

                              Swal.fire({
                                allowOutsideClick: true,
                                backdrop: true,
                                html: `
                                    <form id="loginBox" name="loginBox" action="POST" onsubmit="ajax_submit();return false;" autocomplete="off" role="presentation">
                                            <h6>İlgili bölge aşağıdaki müşterilere bağlı hizmetlerde kullanılıyor. Bu bölgeyi silmeye devam etmek istiyorsanız lütfen öncelikle ilgili hizmetlerden kaldırınız.</h6>
                                            <hr>
                                            <div id="relatedUses"></div>
                                    </form>
                                    <div id="UnPwResult"></div>
                                    `
                              });
                              $.each(resThis, function (key, value) {
                                $('#relatedUses').append('<a target="_blank" href="/session-details.php?CID='+resThis[key]['id']+'"><button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">Kullanılan Alan: '+resThis[key]['id']+'</button></a></br>');
                              });
                              // window.location.href = "app-services-application-areas.php?respons=Hata!";
                            }
                        }
                    })
                    } else {
                    swal("İptal Edildi", "Oh çok şükür! herşey yerli yerinde.", "error");
                }
            });
    });
    
    var EditIconHTML = document.createElement('i');
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-success btn-icon btn-relief-success btn-sm round mr-50 mb-100 waves-effect waves-light feather icon-edit tetiks-"+params.data.ID
    attrID.value = params.data.ID
    EditIconHTML.setAttributeNode(attr);
    EditIconHTML.setAttributeNode(attrID);
    EditIconHTML.addEventListener("click", function () {
      var ids = $(this).attr("ids");
      $('#FormEditBolge')[0].reset();
      $("#add-edit-data").addClass("show");
      $("#overlay-bg-edit").addClass("show");
      $.ajax({
        type: "get",
        url: "/app-assets/data/app-services-areas.php",
        data:{AREA:ids},
        success: function(res){
          var obj = JSON.parse(res);
          var id = obj[0]['ID'];
          var hizmet_adi = obj[0]['AREA'];
          var hizmet_sure = obj[0]['DURATION'];
          var hizmet_fiyat = obj[0]['PRICE'];
          var ServicesCurrency = obj[0]['CURRENCY'];

          $("#hizmetid").val(id);
          $("#inp-edit-bolge-adi").val(hizmet_adi);
          $("#inp-edit-fiyat").val(hizmet_fiyat);
          $("#inp-edit-currency").prop('selectedIndex', 0);
					$("#inp-edit-currency").val(ServicesCurrency).trigger("change");
					$(`#inp-edit-currency option[value=`+ServicesCurrency+`]`).attr('selected', 'selected');


          $('#inp-edit-bolge-suresi').select2({
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
                cache: true
              }
          });
        },
        error:function(error)
        { console.log(error); }
      });
    });
    usersIcons.appendChild(EditIconHTML);
    usersIcons.appendChild(deleteIconHTML);
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
          headerName: 'UYGULAMA BÖLGESİ',
          field: 'AREA',
          filter: true,
          width: 300,
          resizable: true,
          cellStyle: {
            "text-align": "left",
          },
          cellRenderer: function(params) {
            return '<a style="font-weight:bolder;"><i class="feather icon-pocket" style="color:#1dab95"></i> '+ params.data.AREA+'</a>'
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
        headerName: 'SÜRE',
        field: 'DURATION',
        width:150,
        resizable: false,
        filter: true,
      },
      {
        headerName: 'FİYAT',
        field: 'PRICE',
        width:125,
        resizable: false,
        filter: true,
        cellRenderer: function(params) {
          return params.data.PRICE+' '+params.data.CURRENCY
        }
      },
      {
        headerName: 'SON GÜNCLLEME',
        field: 'UPD_DT',
        width:250,
        resizable: false,
        filter: false,
      },
      {
        headerName: 'İşlem Yap',
        resizable: false,
        width:180,
        cellStyle: {
          "text-align": "center",
        },
        cellRenderer: customIconsHTML
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
    paginationPageSize: 100,
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
    var gridWidth = document.getElementById('AppArea').offsetWidth;
  
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
  


  if (document.getElementById("AppArea")) {
    /*** DEFINED TABLE VARIABLE ***/
    var gridTable = document.getElementById("AppArea");

    /*** GET TABLE DATA FROM URL ***/
    agGrid
      .simpleHttpRequest({
        //url: "../../../app-assets/data/users-list.json"
        url: "/app-assets/data/app-services-areas.php"
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
    /*** INIT TABLE ***/
    new agGrid.Grid(gridTable, gridOptions);
  }
});


$(document).on('click', '#bolgeGuncelle', function(){
  if($('#inp-edit-bolge-adi').val().length >0 && $('#inp-edit-fiyat').val() >0  && $('#inp-edit-currency').val() !='null'){
    $.ajax({
       type: "POST",
       url: "/api/app-services/application-areas/update-areas.php",
       data: $('#FormEditBolge').serialize(),
       success: function(result) {
        res = JSON.parse(result)
        if(res['status']){
          Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
          location.reload();
        }
      }
    })
  }else{
    Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
  }  
});
