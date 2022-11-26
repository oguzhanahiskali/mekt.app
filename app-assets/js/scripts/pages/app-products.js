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
                text: "Bu ürünü silerseniz geri kurtaramayabilirsiniz :(",
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
                        type: "POST",
                        url: "/api/delete/app-products/product.php",
                        data: {
                            ids: ids
                        },
                        success: function(result) {
                          res = JSON.parse(result)
                          console.log(res['result']);
                            if (res['result'] == true) {
                              swal("Silindi!", "Bu ürün başarıyla silindi.", "success");
                              location.reload();
                            }else if(res['result']==false) {
                              swal("Hata!", "Silme esnasında hata oluştu.", "error");
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
      $('#FormEditProduct')[0].reset();
      $("#add-edit-data").addClass("show");
      $("#overlay-bg-edit").addClass("show");
      $.ajax({
        type: "get",
        url: "/app-assets/data/app-products.php",
        data:{ProductID:ids},
        success: function(res){
          var obj = JSON.parse(res);
          var ProductIDS = obj[0]['ID'];
          var ProductName = obj[0]['PRODUCT'];
          var ProductBarcode = obj[0]['BARCODE'];
          var ProductCurrency = obj[0]['CURRENCY'];
          var ProductPrice = obj[0]['PRICE'];
          var ProductScale = obj[0]['SCALES'];
          var ProductType= obj[0]['TYPE'];
          var ProductInDT = obj[0]['IN_DT'];
          var ProductStock = obj[0]['STOCK'];
          var ProductStockAlarm = obj[0]['STOCK_ALARM'];
          var ProductSExpiryDT = obj[0]['EXPIRY_DT'];

          $('#inp-edit-product-id').val(ProductIDS);
          $("#inp-edit-product-name").val(ProductName);
          $("#inp-edit-barcode").val(ProductBarcode);
          $("#inp-edit-price").val(ProductPrice);
          $("#inp-edit-scale").val(ProductScale);
          if(ProductType=='MiliLitre') ProductTypeText = 0;
          else if (ProductType=='SantiLitre') ProductTypeText = 1;
          else if (ProductType == 'Litre') ProductTypeText = 2;
          else if (ProductType == 'KiloGram') ProductTypeText = 3;
          else if (ProductType == 'MiliGram') ProductTypeText = 4;
          else if (ProductType == 'Adet') ProductTypeText = 5;
          $("#inp-edit-type").val(ProductTypeText).trigger('change');
          $("#inp-edit-stock").val(ProductStock);
          $("#inp-edit-batch-arrival-dt").val(ProductInDT);
          $("#inp-edit-expiration-dt").val(ProductSExpiryDT);
          $("#inp-edit-stock-alarm").val(ProductStockAlarm);
					$("#inp-edit-currency").prop('selectedIndex', 0);
					$("#inp-edit-currency").val(ProductCurrency).trigger("change");
					$(`#inp-edit-currency option[value=`+ProductCurrency+`]`).attr('selected', 'selected');

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
          headerName: 'ÜRÜN',
          field: 'PRODUCT',
          filter: true,
          width: 450,
          resizable: true,
          cellStyle: {
            "text-align": "left",
          },
          cellRenderer: function(params) {
            return '<a style="font-weight:bolder;"><i class="feather icon-pocket" style="color:#1dab95"></i> '+ params.data.PRODUCT+'</a>'
          }
      },
      {
        headerName: 'BARKOD',
        field: 'BARCODE',
        width:155,
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
        headerName: 'ÖLÇEK',
        field: 'SCALES',
        width:125,
        resizable: false,
        filter: false,
        cellRenderer: function(params) {
          return params.data.SCALES+' '+params.data.TYPE
        }
      },
      {
        headerName: 'GELİŞ',
        field: 'IN_DT',
        width:110,
        resizable: false,
        filter: true,
      },
      {
        headerName: 'SKT',
        field: 'EXPIRY_DT',
        width:110,
        resizable: false,
        filter: true,
      },
      {
        headerName: 'STOK',
        field: 'STOCK',
        width:110,
        resizable: false,
        filter: true,
        cellRenderer: function(params) {
          return params.data.STOCK+' ['+params.data.STOCK_ALARM+']'
        }
      },
      {
        headerName: 'KULLANILAN',
        field: 'USED',
        width:150,
        resizable: false,
        filter: true,
        cellRenderer: function(params) {
          if(params.data.USED==0){
            return 'Kullanılmadı'
          }else if(params.data.USED>0){
            return params.data.USED+' Adet'
          }
        }
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
        url: "/app-assets/data/app-products.php"
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


$(document).on('click', '#productUpdate', function(){
  var ProductPartyEditFormSerialize = $('#FormEditProduct').serialize();
  if(ProductPartyEditFormSerialize.indexOf('=&') > -1==false && $('#inp-edit-currency').val() !='null' && $('#inp-edit-type').val() != null){
    $.ajax({
       type: "POST",
       url: "/api/app-product/update-party.php",
       data: ProductPartyEditFormSerialize,
       success: function(result) {
        res = JSON.parse(result)
        if(res['status']==true){
          Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
          location.reload();
        }else if(res['code']==1001){
          Swal.fire("Hata", "Güncelleme hatası.", "warning");
        }else if(res['code']==1012){
          Swal.fire("Hata", "Form gönderimi sırasında birşeyler ters gitti", "warning");
        }
      }
    })
  }else{
    Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
  }  
});

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
  });
  $(document).on('click', '#ProductPartyAdd', function(){
      var ProductPartyFormSerialize = $('#FormAddProduct').serialize();
      if(ProductPartyFormSerialize.indexOf('=&') > -1==false){
            $.ajax({
            type: "POST",
            url: "/api/app-product/add-party.php",
            data: ProductPartyFormSerialize,
            success: function(res) {
                    var obj = JSON.parse(res);
                    toastr.clear();
                    if(obj['code']==1001){
                        Swal.fire("Başarısız", "Kayıt ekleme sırasında hata oluştu. Lütfen Sistem yönetici ile temasa geçiniz.", "warning");

                    }else if(obj['code']==1000){
                        Swal.fire("Başarılı", "Kayıt başarıyla eklendi.", "success");
                        setTimeout(function(){
                            location.reload(1);
                        }, 285);
                    }
                }
            });
      }else{
        Swal.fire("Boş alanlar var", "Lütfen eksik alanları kontrol edip yeniden deneyiniz.", "warning");

        // toastr.error('<b>Eksik Alanlar var</b>', 'Başarısız:', { positionClass: 'toast-top-right', containerId: 'toast-top-right' });
      }

      // if(regionArray.length>0){
      //     var isEmptys = null;
      //     $.each( regionArray, function( key, value ) {
      //         // console.log( key + ": " + value );
      //         if(!$('#'+value).val()){
      //             isEmptys = 1;
      //             Swal.fire("Boş alanlar var", "Lütfen eksik alanları kontrol edip yeniden deneyiniz.", "warning");
      //         }
      //     });
      //     if(isEmptys!=1){
      //         $.ajax({
      //         type: "POST",
      //         url: "/api/ajaxInsHizmetBolge.php",
      //         data: $('#FormAddRegion').serialize(),
      //         success: function(res) {
      //                 var obj = JSON.parse(res);
      //                 toastr.clear();
      //                 $.each( obj, function( i, field ) {
      //                     if(obj[i]['code']==1033){
      //                         toastr.error('<b>'+obj[i]['related']+'</b> zaten dahil edilmiş.', 'Başarısız:', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
      //                     }else if(obj[i]['code']==1000){
      //                         toastr.success('<b>'+obj[i]['related']+'</b> başarıyla dahil edildi.', 'Başarılı:', { positionClass: 'toast-bottom-right', containerId: 'toast-bottom-right' });
      //                         setTimeout(function(){
      //                             location.reload(1);
      //                         }, 285);
      //                     }
      //                 });
      //             }
      //         });
      //     }
      // }else{
      //     Swal.fire("Bölge Seçilmedi", "Lütfen en az bir bölge aktif edip yeniden deneyiniz.", "warning");
      // }
  });
});

$('#inp-product').select2({
  allowClear: true,
  placeholder: 'Seçiniz',
  ajax: {
      url: '/api/app-product/default-products.php',
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
var scaleTypeList = [ { id: 0, text: 'MiliLitre' }, { id: 1, text: 'SantiLitre' }, { id: 2, text: 'Litre' }, { id: 3, text: 'KiloGram' }, { id: 4, text: 'MiliGram' }, { id: 5, text: 'Adet' } ];
$("#inp-type").select2({
    allowClear: true,
    placeholder: 'Seçiniz',
    data: scaleTypeList
});
$("#inp-edit-type").select2({
  allowClear: true,
  placeholder: 'Seçiniz',
  data: scaleTypeList
});
// $("#inp-type").val('').trigger('change');