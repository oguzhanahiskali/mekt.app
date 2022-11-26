/*=========================================================================================
    File Name: app-user.js
    Description: User page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {

  
  var langs = localStorage.getItem("LangStatus");
  var jsonIssues = {};
  $.ajax({
      url: "/app-assets/data/locales/"+langs+".json", async: false, dataType: 'json', success: function(data) {
        ColDefCustomerName = data.customerName;
        ColDefAge = data.Age;
        ColDefPhone = data.Phone;
        ColDefServices = data.Services;
        ColDefAction = data.Action;
        ColDefCreateService = data.CreateService;
      }
  });


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
    var eventIconHTML = '<input type="button" class="btn bg-gradient-success round mr-50 mb-100 waves-effect waves-light" value="'+ColDefCreateService+'" onclick="window.location=`/app-events.php?id='+params.data.ID+'`;">';
    //var deleteIconHTML = '<button type="button" class="btn bg-gradient-danger round mr-50 mb-100 waves-effect waves-light CustomerDelete" ids="'+params.data.ID+'">Sil</button>';
    var deleteIconHTML = document.createElement('i');
    var attr = document.createAttribute("class")
    var attrID = document.createAttribute("ids")
    attr.value = "btn bg-gradient-danger round mr-50 mb-100 waves-effect waves-light feather icon-trash-2"
    attrID.value = params.data.ID
    deleteIconHTML.setAttributeNode(attr);
    deleteIconHTML.setAttributeNode(attrID);
    // selected row delete functionality
    deleteIconHTML.addEventListener("click", function () {
      var idsx = $(this).attr("ids");
      
      Swal.fire({
          title: 'Gerçekten buna emin misin?',
          text: "İlgili müşteriyi ve buna bağlı tüm seans, taksitlendirme bilgilerini kaybetmek üzeresiniz. Onaylamak istediğine emin misin?",
          icon: 'warning',
          allowOutsideClick: false,
          showCancelButton: true,
          confirmButtonColor: '#ff8510',
          cancelButtonColor: '#1f9d57',
          confirmButtonText: 'Eminim',
          cancelButtonText: 'Vazgeçtim'
      }).then((result) => {
          if (result.isConfirmed) {
              var ids = ids
              $.ajax({
                  type: "GET",
                  url: "/api/delete/app-customer/customer-delete.php",
                  data: {
                      ids: idsx
                  },
                  success: function(result) {
                      if (result == "basarili") {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            title: 'Başarılı',
                            text: 'Bu müşteri başarıyla silindi',
                            icon: 'success',
                            timer: 1200
                        });
                          window.location.href = "app-customer-list.php?respons=OK!";
                      }else if(result == "hata") {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: true,
                            title: 'Başarısız',
                            text: 'Bu müşterinin üzerinde ürün veya hizmet yapılandırması görünüyor. Bu işleme devam etmek istiyorsanız Lütfen öncelikle bağlı işlemleri siliniz.',
                            icon: 'warning',
                        });
                      }else if(result == "hata2") {
                        Swal.fire({
                            allowOutsideClick: false,
                            showConfirmButton: true,
                            title: 'Başarısız',
                            text: 'Bu işlemi yapmaya yetkiniz yok!',
                            icon: 'error',
                        });
                      }
                  }
              })
          }else {
              Swal.fire({
                  allowOutsideClick: false,
                  showConfirmButton: false,
                  title: 'Vazgeçildi',
                  text: 'Silme işleminden vazgeçildi',
                  icon: 'info',
                  timer: 1200
              });
          }
      })
    });
    usersIcons.appendChild($.parseHTML(eventIconHTML)[0]);
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
      headerName: ColDefCustomerName,
      width: 222,
      field: "Name",
      resizable: true,
      filter: true,
      pinned: "left",
      cellStyle: {
        "text-align": "left",
      },
      cellRenderer: function(params) {
        return '<a style="font-weight:bolder;" href="/app-customer-view.php?id='+params.data.ID+'"><i class="feather icon-user" style="color:#1dab95"></i> '+ params.data.Name+'</a>'
      }
    },
    {
      headerName: ColDefAge,
      field: 'Age',
      width:100,
      suppressSizeToFit: false,
      resizable: false,
      filter: true,
    },
    {
      headerName: ColDefPhone,
      field: 'Phone',
      width:150,
      suppressSizeToFit: true,
      resizable: false,
      filter: true,
      valueFormatter: function (params) {
        phone = params.data.Phone;
        if (phone.indexOf("000") >= 0){
          text = "Eksik Bilgi";
        }else{
          text = phone.replace(/(\d\d\d)(\d\d\d)(\d\d)(\d\d)/, "($1) $2 $3 $4");
        }
        return text;

      }
    },
    {
      headerName: ColDefAction,
      field: 'transactions',
      resizable: true,
      width:340,
      cellRenderer: customIconsHTML,
      cellStyle: {
        "float": "left",
      }
    },
  ];
  

  /*** GRID OPTIONS ***/
  var gridOptions = {
    rowBuffer: 10,
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
        url: "/app-assets/data/user-list.php"
      })
      .then(function (data) {
        gridOptions.api.setRowData(data);
        $('#myGridCount').html(gridOptions.api.getDisplayedRowCount());
      });

      // console.log('oks');
      // console.log('1. '+this.gridOptions.api.getDisplayedRowCount());
      // console.log('2. '+gridOptions.api.getDisplayedRowCount());
      // $('#myGridCount').html(this.gridOptions.api.getDisplayedRowCount());
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

