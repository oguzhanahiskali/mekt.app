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
      Swal.fire({
            title: "Buna gerçekten Emin misiniz?",
            text: "Bu oda silme işlemi geri alınamaz.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Evet, şimdi Sil',
            cancelButtonText: 'Hayır, Vazgeçtim'
            
      }).then((result) => {
            if (result.isConfirmed) {
                var ids = $(this).attr("ids");
                $.ajax({
                    type: "POST",
                    url: "/api/settings-room/delete.php",
                    data: {
                        ids: ids
                    },
                    success: function(result) {
                      res = JSON.parse(result)
                      // console.log(res['status']);
                        if (res['status'] == true) {
                          swal("Silindi!", "Bu hizmet başarıyla silindi.", "success");
                          window.location.href = "settings-room.php";
                        }else if(res['status']==false) {
                          var resThis = res['because'];
                          var CntrlSessionCount = null;
                          var cntrlMsg = null;
                          var sessionMsg = null;
                          var SessionCount = null;
                          var SessonCntrlMrg = null;
                          if(res['SessionsCount']){
                            var SessionCount = res['SessionsCount'];
                            sessionMsg = '<u>'+SessionCount+' Seans</u>';
                          }
                          if(res['ControlSessionsCount']){
                            var CntrlSessionCount = res['ControlSessionsCount'];
                            cntrlMsg = '<u>'+CntrlSessionCount+' Kontrol Seansı</u>';
                          }
                          if(cntrlMsg !== null && sessionMsg !== null){
                            SessonCntrlMrg = sessionMsg+' ve '+cntrlMsg;
                          }else if(cntrlMsg!== null){
                            SessonCntrlMrg = cntrlMsg;
                          }else if(sessionMsg!== null){
                            SessonCntrlMrg = sessionMsg;
                          }
                          Swal.fire("Bu Oda Silinemez!", 'Bu Oda '+SessonCntrlMrg+' için kullanılıyor!</br>Buna rağmen silmek istiyorsanız ilgili seansların Oda değişikliği için</br>lütfen sistem yöneticisi ile temasa geçiniz.', "error");


                          // Swal.fire({
                          //   allowOutsideClick: true,
                          //   backdrop: true,
                          //   html: `
                          //       <form id="loginBox" name="loginBox" action="POST" onsubmit="ajax_submit();return false;" autocomplete="off" role="presentation">
                          //               <h6>İlgili bölge aşağıdaki müşterilere bağlı hizmetlerde kullanılıyor. Bu bölgeyi silmeye devam etmek istiyorsanız lütfen öncelikle ilgili hizmetlerden kaldırınız.</h6>
                          //               <hr>
                          //               <div id="relatedUses"></div>
                          //       </form>
                          //       <div id="UnPwResult"></div>
                          //       `
                          // });
                          // Swal.fire({
                          //   title: 'Yönetici Onayı Gerekli',
                          //   allowOutsideClick: false,
                          //   showConfirmButton: false,
                          //   html: `
                          //       <form id="loginBox" name="loginBox" action="POST" onsubmit="ajax_submit();return false;" autocomplete="off" role="presentation">
                          //               <h6>Taksitlendirme yapısını silme işlemi için, kurum yönetici onayı gerekmektedir.</h6>
                          //               <hr>
                          //               <fieldset class="form-group">
                          //                   <select class="form-control" id="adminSelect">
                          //                       <option value="">Lütfen bir yönetici seçin</option> 
                          //                   </select>
                          //                   <br>
                          //                   <div id="ekle"></div>
                          //               </fieldset>
                          //               <hr>
                          //               <fieldset class="form-group">
                          //                   <input type="button" id="onayla" class="btn bg-gradient-success mr-1 mb-1 waves-effect waves-light" name="send" value="Onayla" disabled="disabled">
                          //                   <input type="button" id="AuthCancel" class="btn bg-gradient-warning mr-1 mb-1 waves-effect waves-light" name="AuthCancel" value="Vazgeç">
                          //               </fieldset>
                          //       </form>
                          //       <div id="UnPwResult"></div>
                          //       `,
                          //       didOpen: () => {
                          //           $.ajax({
                          //               type: "POST",
                          //               url: "/api/verify/un.php",
                          //               data: {
                          //                   verify: datas
                          //               },
                          //               success: function(data) {
                          //                   var dondur = JSON.parse(data);
                          //                   for (var i = 0; i < dondur.length; ++i) {
                          //                       $('#adminSelect').append('<option value=' + dondur[i].id + '>' + dondur[i].name + '</option>'); 
                          //                   }
                          //               }
                          //           });
                          //       },
                          //   });
    
                          // $.each(resThis, function (key, value) {
                          //   $('#relatedUses').append('<a target="_blank" href="/session-details.php?CID='+resThis[key]['id']+'"><button type="button" class="btn btn-danger mr-1 mb-1 waves-effect waves-light">Kullanılan Alan: '+resThis[key]['id']+'</button></a></br>');
                          // });
                          // window.location.href = "app-services-application-areas.php?respons=Hata!";
                        }
                    }
                })
            } else {
              const Toast = Swal.mixin({
                toast: false,
                position: 'center',
                showConfirmButton: false,
                showCancelButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  // toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })
              Toast.fire({
                icon: 'success',
                title: 'İptal Edildi'
              })
              
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
      $('#FormEditRoom')[0].reset();
      $("#add-edit-data").addClass("show");
      $("#overlay-bg-edit").addClass("show");
      $.ajax({
        type: "POST",
        url: "/app-assets/data/settings-room.php",
        data:{ID:ids},
        success: function(res){
          var obj = JSON.parse(res);
          var id = obj[0]['ID'];
          var roomName = obj[0]['NAME'];
          var roomColor = obj[0]['COLOR'];
            var roomColorReplace1 = roomColor.replace("var(--","");
            var roomColorReplace2 = roomColorReplace1.replace(")","");

          var roomID = obj[0]['RID'];
            var roomIDreplace = roomID.replace("Oda","");

          $("#inp-edit-id").val(id);
          $("#inp-edit-roomName").val(roomName);
          $("#inp-edit-roomID").val(roomIDreplace);
          $("#inp-edit-roomColor").val(roomColorReplace2).trigger('change');
          $('#inp-edit-roomColor').css('background-color',roomColor);
         
  
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

  // 'ID'        =>	intval($row['ID']),
  // 'RID'      =>  $row['ROOM_ID'],
  // 'NAME'  =>  $row['ROOM_NAME'],
  // 'COLOR'     =>  $row['COLOR']

  var columnDefs = [
      {
          headerName: 'ODA ADI',
          field: 'NAME',
          filter: true,
          resizable: true,
          cellStyle: {
            "text-align": "left",
          },
          cellRenderer: function(params) {
            return '<a style="font-weight:bolder;"><i class="feather icon-box" style="color:#1dab95"></i> '+ params.data.NAME+'</a>'
          }
      },
      {
        headerName: 'ODA ID',
        field: 'RID',
        resizable: false,
        filter: true,
      },
      {
        headerName: 'RENK',
        field: 'COLOR',
        resizable: false,
        filter: false,
        cellRenderer: function(params) {
          var roomColorReplace1 = params.data.COLOR.replace("var(--","");
          var roomColorReplace2 = roomColorReplace1.replace(")","");
        
          return '<a class="uppercase" style="font-weight:bolder;color:'+params.data.COLOR+'"><i class="feather icon-hash" style="color:'+params.data.COLOR+'"></i>'+roomColorReplace2+'</a>'
        }
      },      {
        headerName: 'İşlem Yap',
        resizable: false,
        width:125,
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
        url: "/app-assets/data/settings-room.php"
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


$(document).on('click', '#roomUpdate', function(){
  if( $('#inp-edit-roomName').val().length >0 && $('#inp-edit-roomID').val().length >0 && $('#inp-edit-roomColor').val().length >0){
    $.ajax({
       type: "POST",
       url: "/api/settings-room/update.php",
       data: $('#FormEditRoom').serialize(),
       success: function(result) {
        res = JSON.parse(result)
        if(res['status']==true){
          Swal.fire("Başarılı", "Başarıyla güncellendi.", "success");
          location.reload();
        }else if(res['status']==false && res['because']=='already in use'){
            Swal.fire("Başarısız", "Bu oda numarası zaten kullanılıyor.", "warning");
        }else{
          Swal.fire("Başarısız", "Güncelleme sırasında bir hata oluştu. Lütfen sistem yönetici ile temasa geçiniz.", "warning");
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
  $(document).on('click', '#RoomAdd', function(){
      var ProductPartyFormSerialize = $('#FormAddRoom').serialize();
      if(ProductPartyFormSerialize.indexOf('=&') > -1==false){
            $.ajax({
            type: "POST",
            url: "/api/settings-room/add.php",
            data: ProductPartyFormSerialize,
            success: function(res) {
                    var obj = JSON.parse(res);
                    toastr.clear();
                    if(obj['status']==false &&  obj['because']=='already in use'){
                        Swal.fire("Başarısız", "Bu Oda ismi zaten tanımlı.", "warning");
                    }else if(obj['status']==false){
                      Swal.fire("Başarısız", "Kayıt ekleme sırasında hata oluştu. Lütfen Sistem yönetici ile temasa geçiniz.", "warning");
                    }else if(obj['status']==true){
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
$("#inp-type").val('').trigger('change');