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
      }
  });
  $.urlParam = function (name) {
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results == null) {
      return null;
    }
    return decodeURI(results[1]) || 0;
  }


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
 
  // Renering Icons in Actions column
  var customIconsHTML = function (params) {
    var usersIcons = document.createElement("span");
    var eventIconHTML = '<a href="/session-details.php?CID='+params.data.CID+'&SERVID='+params.data.ID+'#session-payment" target="_blank"><button class="btn bg-gradient-success btn-sm round mr-50 mb-100 waves-effect waves-light"><i class="feather icon-external-link"></i></button></a>';
    usersIcons.appendChild($.parseHTML(eventIconHTML)[0]);
    return usersIcons
  }

  //  Rendering avatar in username column
  var customAvatarHTML = function (params) {
    return "<span class='avatar'><img src='" + params.data.avatar + "' height='32' width='32'></span>" + params.value
  }

  // ag-grid
  /*** COLUMN DEFINE ***/

  var filterParams = {
    comparator: function (filterLocalDateAtMidnight, cellValue) {
      var dateAsString = cellValue;
      if (dateAsString == null) return -1;
      var dateParts = dateAsString.split('-');
      var cellDate = new Date(
        Number(dateParts[0]),
        Number(dateParts[1]) - 1,
        Number(dateParts[2])
      );
  
      if (filterLocalDateAtMidnight.getTime() === cellDate.getTime()) {
        return 0;
      }
  
      if (cellDate < filterLocalDateAtMidnight) {
        return -1;
      }
  
      if (cellDate > filterLocalDateAtMidnight) {
        return 1;
      }
    },
    browserDatePicker: true,
    minValidYear: 2000,
  };
  
  var columnDefs = [
    {
      headerName: 'M????TER?? ADI',
      width: 165,
      field: 'CUSTOMER.NAME',
      resizable: true,
      filter: true,
      // pinned: "left",
      cellStyle: {
        "text-align": "left",
      },
      cellRenderer: function(params) {
        return '<a href="app-customer-view?id=' + params.data.CUSTOMER.ID + '" style="font-weight:bolder;"><i class="feather icon-bookmark" style="color:#1dab95"></i> ' + params.data.CUSTOMER.NAME + '</a>'
     }
    },
    {
      headerName: 'TELEFON',
      field: 'CUSTOMER.PHONE',
      width:125,
      suppressSizeToFit: true,
      resizable: false,
      filter: true,
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function (params) {
        if (params.data.CUSTOMER.PHONE == false) {
          return 'Ge??ersiz';
        } else {
          return params.data.CUSTOMER.PHONE;
        }
      }
    },
    {
      headerName: '??DEME',
      field: 'PAYMENT.PRICE',
      width:115,
      suppressSizeToFit: false,
      resizable: false,
      filter: true,
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function (params) {
        return '<a style="font-weight:bolder;">' + params.data.PAYMENT.PRICE + ' ' + params.data.PAYMENT.CURRENCY;
      },
    },
    {
      headerName: 'TKST.NO',
      field: 'INSTALLMENT.ID',
      width: 120,
      resizable: false,
      filter: false,
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function (params) {
        return '<a style="font-weight:bolder;">' + params.data.INSTALLMENT.ID + '.</a> Taksit';
      }
    },
    {
      headerName: 'TKST.TRH.',
      field: 'INSTALLMENT.DT',
      width: 140,
      resizable: false,
      filter: 'agDateColumnFilter',
      filterParams: filterParams,
        cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function (params) {
        return params.data.INSTALLMENT.DT;
      }
    },
    {
      headerName: '??DEME T??R??',
      field: 'INSTALLMENT.TYPE',
      width: 125,
      resizable: false,
      filter: false,
      cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function (params) {
        if (params.data.INSTALLMENT.TYPE == 1) {
          return 'Nakit';
        } else if (params.data.INSTALLMENT.TYPE == 2) {
          return 'Havale / EFT';
        } else if (params.data.INSTALLMENT.TYPE == 3) {
          return 'Kredi Kart??';
        }
        // return params.data.INSTALLMENT.TYPE;
      }
    },
    {
      headerName: '????LEM ZAMANI',
      suppressSizeToFit: false,
      field: 'PROCESS.DT',
      width:150,
      filter: false,
      resizable: false,
      cellStyle: {
        "text-align": "center",
      },
    },
    {
      headerName: 'PERSONEL',
      field: 'PROCESS.USER',
      resizable: false,
      width:135,
      filter: false,
      cellStyle: {
        "text-align": "center",
      },
    },
    {
      headerName: 'DETAY',
      resizable: true,
      width: 100,
      cellRenderer: customIconsHTML,
      cellStyle: {
        "float": "center",
      }
    },
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
    pivotPanelShow: "never",
    colResizeDefault: "shift",
    animateRows: true
  };

  function onFirstDataRendered(params) {
    params.api.sizeColumnsToFit();
  }
  
  function onGridSizeChanged(params) {
    // get the current grids width
    var gridWidth = document.getElementById('GridService').offsetWidth;
  
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
  
  if (document.getElementById("GridService")) {
    /*** DEFINED TABLE VARIABLE ***/
    var gridTable = document.getElementById("GridService");
    if ($.urlParam('between') == 'true') {
      agGrid.simpleHttpRequest({
        url: "/app-assets/data/report-service-earnings.php?between=true&start=" + $.urlParam('start') + "&end=" + $.urlParam('end')
      }).then(function (data) {
        gridOptions.api.setRowData(data);
      });
    } else {
      agGrid.simpleHttpRequest({
        url: "/app-assets/data/report-service-earnings.php"
      }).then(function (data) {
        gridOptions.api.setRowData(data);
      });
    }

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
      $(".filter-btn").text("1 - " + $this.text() + " of 10");
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