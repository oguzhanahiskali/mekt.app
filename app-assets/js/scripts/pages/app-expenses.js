/*=========================================================================================
    File Name: app-user.js
    Description: User page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var selectedListSet = [];

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
         console.log('tiks');
         console.log(ids);
         swal({
            title: "Emin misiniz?",
            text: "Bu harcama bilgisini silmek istediğinize emin misiniz?",
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
                  url: "/api/delete/app-expenses/this-expenses-delete.php",
                  data: {
                     ids: ids
                  },
                  success: function(result) {
                     res = JSON.parse(result)
                     console.log(res[0]['Results']);
                     if (res[0]['Results'] == true) {
                        swal("Silindi!", "Bu harcama başarıyla silindi.", "success");
                        location.reload();
                     }else if(res[0]['Results']==false) {
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
      //btn bg-gradient-danger btn-icon btn-relief-danger round mr-50 mb-100 btn-sm waves-effect waves-light feather icon-trash-2
      attr.value = "btn bg-gradient-success btn-icon btn-relief-success btn-sm round mr-50 mb-100 waves-effect waves-light feather icon-edit tetiks-"+params.data.ID
      attrID.value = params.data.ID
      EditIconHTML.setAttributeNode(attr);
      EditIconHTML.setAttributeNode(attrID);
      
      // var return_first;

      function callback(obj) {
          // return_first = response;
          selectedListSet = obj;
      }
      EditIconHTML.addEventListener("click", function () {
        var ids = $(this).attr("ids");
        $('#FormEditExpenses')[0].reset();
        $("#add-edit-data").addClass("show");
        $("#overlay-bg-edit").addClass("show");
        $.ajax({
           type: "get",
           url: "/api/app-expenses/expenses-fetch.php",
           data:{id:ids},
           success: function(res){
              var obj = JSON.parse(res);
              callback(obj);
              var CreateDT = obj[0]['CreateDT'];
              var PaymentDT = obj[0]['PaymentDT'];
              var Description = obj[0]['Description'];
              var Currency = obj[0]['Currency'];
              var Expenses = obj[0]['Expenses'];
              var ExpensesID = obj[0]['ExpensesID'];
              var PaymentTypeID = obj[0]['Payment']['TypeID'];
              var PaymentType = obj[0]['Payment']['Type'];
              var PaymentStatusID = obj[0]['Payment']['StatusID'];
              var PaymentStatus = obj[0]['Payment']['Status'];
              var Price = obj[0]['Price'];
              var Photo = obj[0]['Photo'];
              var fetchID = obj[0]['ID'];

              $("#inpEditAddCurrency").prop('selectedIndex', 0);
              $("#inpEditAddCurrency").val(Currency).trigger("change");
              $(`#inpEditAddCurrency option[value=`+Currency+`]`).attr('selected', 'selected');
        
              $("#intEditTypeOfExpenditure").prop('selectedIndex', 0);
              $("#intEditTypeOfExpenditure").val(ExpensesID).trigger("change");
              $(`#intEditTypeOfExpenditure option[value=`+ExpensesID+`]`).attr('selected', 'selected');

              $('#editPaidDT').val(PaymentDT);
              $('#expensesID').val(fetchID);
              $('#intEditDescription').val(Description);
              $('#inp-edit-tahsilat-form-tipi').val(PaymentTypeID);
              $('#inp-edit-paymentStatus').val(PaymentStatusID);
              $('#inp-edit-price').val(Price);
              $('#file-image').css({display: 'none'});
              $('#file-upload').css({display: 'none'});

              if(Photo=='~'){
                 $('#file-upload').css({display: 'block'});
                 $('#file-image').css({display: 'none'});
                 $("#fia").attr('href',null);
                 $("#fii").attr('src',null);
              }else{
                 $('#file-upload').css({display: 'none'});
                 $('#file-image').css({display: 'block'});
                  $("#fia").attr('href','/adropzone/upload/'+Photo);
                  $("#fii").attr('src','/adropzone/upload/'+Photo);
              }

              // $("#hizmetid").val(id);
              // $("#inp-edit-hizmet-adi").val(hizmet_adi);
              // $("#inp-edit-fiyat").val(hizmet_fiyat);
           },
           error:function(error)
           { console.log(error); }
        });
      });
      // selected row delete functionality
      usersIcons.appendChild(EditIconHTML);
      usersIcons.appendChild(deleteIconHTML);

      return usersIcons
    }
  
  
    // ag-grid
    /*** COLUMN DEFINE ***/
    var columnDefs = [
        {
          headerName: '#ID',
          field: 'ID',
          width:70,
          resizable: false,
          filter: false,
          cellStyle: {
            "text-align": "center",
          },
        },
        {
            headerName: 'Harcama Türü',
            field: 'Expenses',
            filter: true,
            width: 165,
            resizable: true,
            cellStyle: {
              "text-align": "left",
            }
        },
        {
          headerName: 'Açıklama',
          field: 'Description',
          width:150,
          resizable: false,
          filter: true,
          cellStyle: {
            "text-align": "center",
          }
        },
        {
          headerName: 'Fiyat',
          field: 'Price',
          width:95,
          resizable: false,
          filter: true,
          cellStyle: {
            "text-align": "left",
          },
          cellRenderer: function(params) {
            return params.data.Price+' TL'
          }
        },
        {
          headerName: 'Ödeme Tür',
          field: 'Payment.Type',
          width:135,
          cellStyle: {
            "text-align": "center",
          },
          resizable: false,
          filter: true,
        },
        {
          headerName: 'Ödeme Trh.',
          field: 'PaymentDT',
          width:135,
          resizable: false,
          filter: true,
        },
        {
          headerName: 'Fiş',
          field: 'Photo',
          width:90,
          resizable: false,
          filter: true,
          cellStyle: {
            "text-align": "center",
          },
          cellRenderer: function(params) {
            var returnVar;
            if(params.data.Photo!='~'){
              returnVar = '<a data-toggle="lightbox" href="/adropzone/upload/'+params.data.Photo+'"><img style="width:3em" src="/adropzone/upload/'+params.data.Photo+'"></a>';
            }else{
              returnVar = '~';
            }
            return returnVar
          }
        },
        {
          headerName: 'Personel',
          field: 'CreateUID',
          width:215,
          resizable: false,
          filter: true,
          cellRenderer: function(params) {
            return params.data.CreateUID+' | '+params.data.CreateDT
          }
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
          url: "/app-assets/data/app-expenses.php"
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
  
  
  $(document).on('click', '#expensesUpdate', function(){
    console.log('click');
    // var selListSet = selectedListSet[0];
    // console.log(selListSet);
    // console.log($('#FormEditExpenses').serialize());
    console.log($('#FormEditExpenses').serializeArray());
    $("#intEditTypeOfExpenditure").val();
    $("#editPaidDT").val();
    $("#intEditDescription").val();
    $("#inp-edit-paymentStatus").val();
    $("#inp-edit-tahsilat-form-tipi").val();
    $("#inpEditAddCurrency").val();
    $("#inp-edit-price").val();
    
    // $('#inp-edit-fiyat').val() >0
    var PhotoReq = true;
    if(PhotoReq==true){
      PhotoText = `&& $('#fii').attr('src')!=undefined || $("[name='media-ids[]']").val()!=undefined`;
    }else{
      var PhotoText = '';
    }
    if(
      $('#intEditTypeOfExpenditure').val().length >0 &&
      $('#editPaidDT').val().length >0 &&
      $('#intEditDescription').val().length >0 &&
      $('#inp-edit-paymentStatus').val()!='null' &&
      $('#inp-edit-tahsilat-form-tipi').val()!='null' &&
      $('#inpEditAddCurrency').val().length >0 && 
      $('#inp-edit-price').val().length >0
      ){
        var ExpensesIMG;
        if($('#fii').attr('src')!=undefined){
          ExpensesIMG = $('#fii').attr('src');
        }else if($("[name='media-ids[]']").val()!=undefined){
          ExpensesIMG = $("[name='media-ids[]']").val();
        }else{
          ExpensesIMG = null;
        }
      $.ajax({
         type: "POST",
         url: "/api/update/expenses/update.php",
         data: $('#FormEditExpenses').serialize()+'&ExpensesIMG='+ExpensesIMG,
         success: function(res) {
          var obj = JSON.parse(res);
          if(obj['status']==true){
              Swal.fire("Başarılı", "Güncelleme başarılı, Sayfa yenileniyor...", "success");
              location.reload();
          }else{
             Swal.fire("Hata", "Veritabanı güncelleme sırasında hata meydana geldi. Lütfen Sistem Yönetici ile temasa geçiniz.", "warning");
          }
          }
      })
      console.log('sikinti yok');
    }else{
      Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
    }  
  });
  
  $(document).on('click', '#addExpense', function(){
    var formSerializes = $('#FormAddHizmet').serialize();
    //   $('#inp-add-fiyat').val() >0 &&
    //   $('#inp-add-currency').val() != 'null' &&
    //   $('#inp-add-seans-sayisi').val() >0 &&
    //   $('#inp-add-hizmet-suresi').val() >0){

    if(formSerializes.indexOf('=&') > -1==false && $('#inp-tahsilat-form-tipi').val()!='null' && $('#inp-paymentStatus').val()!='null'){
      $.ajax({
          type: "POST",
          url: "/api/insert/expenses/insert.php",
          data: $('#FormAddHizmet').serialize(),
          success: function(res) {
            var obj = JSON.parse(res);
              if(obj['Results']==true){
                  Swal.fire("Başarılı", "Gider işlemi başarılı, Sayfa yenileniyor...", "success");
                  location.reload();
              }else{
                 Swal.fire("Hata", "Veritabanı ekleme sırasında hata meydana geldi. Lütfen Sistem Yönetici ile temasa geçiniz.", "warning");
              }
          }
      });
    }else{
      Swal.fire("Boş alanlar var", "Lütfen eksik alanları tamamlayıp yeniden deneyiniz.", "warning");
    }
  });