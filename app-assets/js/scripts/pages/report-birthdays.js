/*=========================================================================================
    File Name: app-user.js
    Description: User page
    --------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(document).ready(function () {

  
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
 
  // Renering Icons in Actions column
  var customIconsHTML = function (params) {
    var usersIcons = document.createElement("span");
    var eventIconHTML = '<a><button class="btn bg-gradient-success btn-sm round mr-50 mb-100 waves-effect waves-light smsSend"><i class="feather icon-mail"></i> SMS Gönder</button>';
    // var eventIconHTML = ' <button type="button" class="btn bg-gradient-danger round btn-sm smsSend" data-toggle="modal" ids="'+params.data.ID+'">SMS Gönder</button>';
    usersIcons.appendChild($.parseHTML(eventIconHTML)[0]);
    return usersIcons
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
      headerName: 'MÜŞTERİ ADI',
      width: 250,
      field: 'NAME',
      resizable: true,
      filter: true,
      // pinned: "left",
      cellStyle: {
        "text-align": "left",
      },
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
          return 'Geçersiz';
        } else {
          return params.data.CUSTOMER.PHONE;
        }
      }
    },
    {
      headerName: 'DOĞUM TARİHİ',
      field: 'CUSTOMER.BIRTHDAY',
      width: 155,
      resizable: false,
      filter: 'agDateColumnFilter',
      filterParams: filterParams,
        cellStyle: {
        "text-align": "center",
      },
      cellRenderer: function (params) {
        return params.data.CUSTOMER.BIRTHDAY;
      }
    },
    {
      headerName: 'İşlem',
      field: 'transactions',
      cellRenderer: customIconsHTML,
      cellStyle: {
        "float": "left",
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
        url: "/app-assets/data/report-birthdays.php?between=true&start=" + $.urlParam('start') + "&end=" + $.urlParam('end')
      }).then(function (data) {
        gridOptions.api.setRowData(data);
      });
    } else {
      agGrid.simpleHttpRequest({
        url: "/app-assets/data/report-birthdays.php"
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